<?php

class MainFacilityController extends BaseController {

	public function showRecords()
	{

		$facilities = DB::table('tblfacility')
			->join('tblstreet', 'tblfacility.Location', '=', 'tblstreet.StreetID')
			->where('tblfacility.status', '=', 'active')
			->get();

		$loc = DB::table('tblstreet')
			->where('status', '=', 'active')
			->get();


		return View::make('mainFacility.facility')
			->with('faci', $facilities)
			->with('loc', $loc);
	}


	public function getFacDetails()
	{
		if(Request::ajax()){
			$fac =  DB::table('tblfacility')
				->join('tblstreet', 'tblfacility.Location', '=', 'tblstreet.StreetID')
				->where('tblfacility.status', '=', 'active')
				->where('tblfacility.FacilityID', '=', Input::get('id'))
				->get();

			$loc = DB::table('tblstreet')
			->where('status', '=', 'active')
			->get();


			return Response::json(array('fac' => $fac, 'loc' => $loc));
		}
		
	}

	public function addFacility()
	{
			date_default_timezone_set('Asia/Manila');

				if(Input::hasFile('txtImage'))
				{
					$newName = time().Input::file('txtImage')->getClientOriginalName();

					Input::file('txtImage')->move(public_path().'/bower_components/admin-lte/dist/images/', $newName);


					DB::table('tblfacility')
						->insert(array(
								'FacilityName' => Input::get('txtFacility'),
								'Description' => Input::get('txtDesciption'),
								'Location' => Input::get('txtLocation'),
								'Capacity' => Input::get('txtCapacity'),
								'ResRental' => Input::get('txtResFee'),
								'NResRental' => Input::get('txtNonResFee'),
								'FacilityImage' => $newName
							));
				

				$loginInfo = DB::table('tblofficialaccount')
				->join('tblofficialdetails', 'tblofficialdetails.OfficialID', '=', 'tblofficialaccount.OfficialID')
				->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
				->join('tblresident', 'tblofficialdetails.ResidentID', '=', 'tblresident.ResidentID')
				->join('tblfamily', 'tblfamily.FamilyID', '=', 'tblresident.FamilyID')
				->join('tblhouse', 'tblhouse.HouseID', '=', 'tblfamily.HouseID')
				->where('tblofficialaccount.Username', '=', Session::get('username'))
				->where('tblofficialaccount.Password', '=', Session::get('password'))
				->where('tblofficialaccount.OfficialID', '=', Session::get('ID'))
				->get();

			Session::put('username', $loginInfo[0]->Username);
			Session::put('password', $loginInfo[0]->Password);
			Session::put('ID', $loginInfo[0]->OfficialID);



				// DB::table('tblaudit')
				//     ->insert(array(
				// 		'OfficialID' => Session::get('ID'),
				// 		'Action' => 'Inserted',
				// 		'Type' => 'Facility Details',
				// 		'NewValue' => Input::get('txtFacility'),
				// 		'Date' => date('Y/m/d H:m:s')
				// 	));



				}

				else
				{
					DB::table('tblfacility')
						->insert(array(
								'FacilityName' => Input::get('txtFacility'),
								'Description' => Input::get('txtDesciption'),
								'Location' => Input::get('txtLocation'),
								'Capacity' => Input::get('txtCapacity'),
								'ResRental' => Input::get('txtResFee'),
								'NResRental' => Input::get('txtNonResFee')
							));

					// 	DB::table('tblaudit')
				 //    ->insert(array(
					// 	'OfficialID' => Session::get('ID'),
					// 	'Action' => 'Inserted',
					// 	'Type' => 'Facility Details',
					// 	'NewValue' => Input::get('txtFacility'),
					// 	'Date' => date('Y/m/d H:m:s')
					// ));
				}




		$facilities = DB::table('tblfacility')
			->join('tblstreet', 'tblfacility.Location', '=', 'tblstreet.StreetID')
			->where('tblfacility.status', '=', 'active')
			->get();

		return Response::json(array('faci' => $facilities));
				
				
	}

	public function updateFacility()
	{
		if(Input::hasFile('etxtFile'))
				{
					$newName = time().Input::file('etxtFile')->getClientOriginalName();

					Input::file('etxtFile')->move(public_path().'/bower_components/admin-lte/dist/images/', $newName);


					DB::table('tblfacility')
						->where('FacilityID', '=', Input::get('hiddenID'))
						->update(array(
								'FacilityName' => Input::get('etxtFacility'),
								'Description' => Input::get('etxtDesc'),
								'Location' => Input::get('etxtLoc'),
								'Capacity' => Input::get('etxtCap'),
								'ResRental' => Input::get('etxtRFee'),
								'NResRental' => Input::get('eTxtNFee'),
								'FacilityImage' => $newName
							));
				}

				else
				{
					DB::table('tblfacility')
						->where('FacilityID', '=', Input::get('hiddenID'))
						->update(array(
								'FacilityName' => Input::get('etxtFacility'),
								'Description' => Input::get('etxtDesc'),
								'Location' => Input::get('etxtLoc'),
								'Capacity' => Input::get('etxtCap'),
								'ResRental' => Input::get('etxtRFee'),
								'NResRental' => Input::get('eTxtNFee')
							));
				}


				$facilities = DB::table('tblfacility')
			->join('tblstreet', 'tblfacility.Location', '=', 'tblstreet.StreetID')
			->where('tblfacility.status', '=', 'active')
			->get();

		return Response::json(array('faci' => $facilities));
	}


	public function deleteFacility()
	{
		if(Request::ajax())
		{
			DB::table('tblfacility')
				->where('FacilityID', '=', Input::get('dtxtID'))
				->update(array(
								'status' => 'inactive'
							));

		    $fac = DB::table('tblfacility')
				->where('FacilityID', '=', Input::get('dtxtID'))
				->get();
   			
   			Session::put('facility', $fac[0]->FacilityName);
   			Session::put('facilityID', $fac[0]->FacilityID);



   				DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Deleted',
						'Type' => 'Facility Details',
						'OldValue' => Session::get('facility'),
						'Date' => date('Y/m/d H:m:s')
					));


			$facilityDetails = DB::table('tblfacility') 
				->join('tblstreet', 'tblfacility.Location', '=', 'tblstreet.StreetID')
				->where('tblfacility.status', '=', 'active')
				->get();

			return Response::json(array('faci' => $facilityDetails));
		}


	}
	

}
