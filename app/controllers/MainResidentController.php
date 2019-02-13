<?php

class MainResidentController extends BaseController {

	public function showRecords()
	{
		$resident = DB::table('tblresident')
			->where('tblresident.status', '=', 'active')
			->join('tblfamily', 'tblresident.FamilyID', '=', 'tblfamily.FamilyID')
			->join('tblhouse', 'tblhouse.HouseID', '=', 'tblfamily.HouseID')
			->get();

		$household = DB::table('tblhouse')
			->where('status', '=', 'active')
			->get();

		

		return View::make('mainResident.resident')
			->with('res', $resident)
			->with('house', $household);
			
	}


	public function getRInfo()
	{
		if(Request::ajax()){
			$household = DB::table('tblhouse')
				->where('HouseID', '=', Input::get('id'))
				->get();

			return Response::json(array('house' => $household));

			$resident = DB::table('tblresident')
				->where('ResidentID', '=', Input::get('id'))
				->get();

			return Response::json(array('resi' => $resident));

		}
	}

	public function getResInfo()
	{
		if(Request::ajax()){

			$resident = DB::table('tblresident')
				->where('ResidentID', '=', Input::get('id'))
				->get();

			return Response::json(array('resi' => $resident));

		}
	}

	public function addFamily()
	{	
		date_default_timezone_set('Asia/Manila');

		if(Request::ajax()){

			$familyCount = DB::table('tblfamily')
				->orderBy('FamilyID', 'desc')
				->count();

			if($familyCount == 0) {

				$f = 1;

			}
			else {

				$family = DB::table('tblfamily')
					->orderBy('FamilyID', 'desc')
					->take(1)
					->get();

					$f = $family[0]->FamilyID + 1;
			}

			DB::table('tblfamily')
				->insert(array(
					array(
						'HouseID' => Input::get('houseid'),
						'FamilyID' => $f
						)
					));

		}
	}


	public function addRecord()
	{				
		if(Request::ajax()){


			$familyid = DB::table('tblfamily')
					->orderBy('FamilyID', 'desc')
					->take(1)
					->get();

			DB::table('tblresident')
				->insert(array(
					array(
						'FamilyID' => $familyid[0]->FamilyID,
						'LastName' => Input::get('lname'),
						'FirstName' => Input::get('fname'),
						'MidName' => Input::get('mname'),
						'RelationHead' => Input::get('relationhead'),
						'ResidencyStat' => Input::get('restype'),
						'Birthdate' => Input::get('bdate'),
						'Birthplace' => Input::get('bplace'),
						'Gender' => Input::get('gender'),
						'CivilStat' => Input::get('civil'),
						'Religion' => Input::get('religion'),
						'MobileNo' => Input::get('mobileno'),
						'TelNo' => Input::get('telno'),
						'EmailAdd' => Input::get('email'),
						'Height' => Input::get('height'),
						'Weight' => Input::get('weight'),
						'HealthStat' => Input::get('healthstat'),
						'CurrStudy' => Input::get('currentstud'),
						'CurrLevel' => Input::get('currentlevel'),
						'HighLevel' => Input::get('highestlevel'),
						'ReadLiteracy' => Input::get('read'),
						'WriteLiteracy' => Input::get('write'),
						'CurrEmployed' => Input::get('currentemp'),
						'Occupation' => Input::get('occup'),
						'Salary' => Input::get('salary'),
						'status' => 'active',
						'Voter' => Input::get('voter'),
						'PrecintNo' => Input::get('precintNo'),
						'YearLastVoted' => Input::get('lastVoted')
						)
					));
/*
			DB::table('tblvoter')
				->insert(array(
					array(
					'Voter' => Input::get('voter'),
					'PrecintNo' => Input::get('precintNo'),
					'YearLastVoted' => Input::get('lastVoted')
					)
				));
				*/

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
			Session::put('fam', $familyid[0]->FamilyID);



				DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Inserted',
						'Type' => 'Resident',
						'NewValue' => Session::get('fam')." ".Input::get('lname')." ".Input::get('fname'),
						'Date' => date('Y/m/d H:m:s')
					));	

			

			$resident = DB::table('tblresident')
			->where('tblresident.status', '=', 'active')
			->join('tblfamily', 'tblresident.FamilyID', '=', 'tblfamily.FamilyID')
			->join('tblhouse', 'tblfamily.HouseID', '=', 'tblhouse.HouseID')
			->get();

			return Response::json(array('res' => $resident));
			 
		}
	}

	public function updateRecord()
	{

		if(Request::ajax()){
			DB::table('tblresident')
				->where('ResidentID', Input::get('txt1'))
				->update(array(
						'FirstName' => Input::get('txt2'),
						'LastName' => Input::get('txt3'),
						'MidName' => Input::get('txt4'),
						'RelationHead' => Input::get('txt5'),
						'ResidencyStat' => Input::get('txt6'),
						'Birthdate' => Input::get('txt7'),
						'Birthplace' => Input::get('txt8'),
						'Gender' => Input::get('txt9'),
						'CivilStat' => Input::get('txt10'),
						'Religion' => Input::get('txt11'),
						'MobileNo' => Input::get('txt12'),
						'TelNo' => Input::get('txt13'),
						'EmailAdd' => Input::get('txt14'),
						'Height' => Input::get('txt15'),
						'Weight' => Input::get('txt16'),
						'HealthStat' => Input::get('txt17'),
						'CurrStudy' => Input::get('txt18'),
						'HighLevel' => Input::get('txt19'),
						'CurrLevel' => Input::get('txt20'),
						'ReadLiteracy' => Input::get('txt21'),
						'WriteLiteracy' => Input::get('txt22'),
						'CurrEmployed' => Input::get('txt23'),
						'Occupation' => Input::get('txt24'),
						'Salary' => Input::get('txt25'),
						'status' => 'active',
						'Voter' => Input::get('txt26'),
						'PrecintNo' => Input::get('txt27'),
						'YearLastVoted' => Input::get('txt28')
					));
					

			$resident = DB::table('tblresident')
			->where('tblresident.status', '=', 'active')
			->join('tblfamily', 'tblresident.FamilyID', '=', 'tblfamily.FamilyID')
			->get();

			return Response::json(array('res' => $resident));
		}
	}


	public function deleteRecord()
	{

		if(Request::ajax()){
			DB::table('tblresident')
				->where('ResidentID', '=', Input::get('txt1'))
				->update(array(
					'status' => Input::get('txt2')
					));

			   $fac = DB::table('tblresident')
				->where('ResidentID', '=', Input::get('txt1'))
				->get();
   			
   			Session::put('reslname', $fac[0]->LastName);
   			Session::put('resfname', $fac[0]->FirstName);
   			Session::put('famID', $fac[0]->FamilyID);



   				DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Deleted',
						'Type' => 'Facility Details',
						'OldValue' => 'FamilyNo.'." ".Session::get('famID')." ".Session::get('reslname')." ".Session::get('resfname'),
						'Date' => date('Y/m/d H:m:s')
					));
					

			$resident = DB::table('tblresident')
			->where('tblresident.status', '=', 'active')
			->join('tblfamily', 'tblresident.FamilyID', '=', 'tblfamily.FamilyID')
			->get();

			return Response::json(array('res' => $resident));
		}
	}


}