<?php

class UtilitiesBrgyDetailsController extends BaseController {

	public function showRecords()
	{
		$bryDetails = DB::table('tblbrgydetail')
					->get();

		$stFields = DB::table('tblstreet')
					->where('status', '=', 'active')
					->get();

		$subDetails = DB::table('tblsubdivision')
					->where('status', '=', 'active')
					->get();
		$subcomp	= DB::table('tblcompound')
					->where('status', '=', 'active')
					->get();

		  return View::make('utilities.brgyDetails')
		  	->with('bryDetail', $bryDetails)
		  	->with('stF', $stFields)
		  	->with('stComp', $subcomp)
		  	->with('subD', $subDetails);
	}

	public function updateLogos()
	{
		if(Input::hasFile('txtLogo1'))
			{
				$newLogo1 = time().Input::file('txtLogo1')->getClientOriginalName();

				Input::file('txtLogo1')->move(public_path().'/bower_components/admin-lte/dist/images/', $newLogo1);


				    DB::table('tblbrgydetail')
						->where('brgyDetailsID', '=', '1')
						->update(array(
								'brgyLogo1' => $newLogo1,
								'brgyName' => Input::get('txtBrgyName'),
								'brgyAddress' => Input::get('txtBrgyAdd'),
								'brgyEmail' => Input::get('txtBrgyEmail'),
								'brgyTelNo' => Input::get('txtBrgyTel'),
								'brgyMobileNo' => Input::get('txtBrgyMobile')
							));

				Session::put('logo1', $newLogo1);
			}
		else {
			DB::table('tblbrgydetail')
						->where('brgyDetailsID', '=', '1')
						->update(array(
								'brgyName' => Input::get('txtBrgyName'),
								'brgyAddress' => Input::get('txtBrgyAdd'),
								'brgyEmail' => Input::get('txtBrgyEmail'),
								'brgyTelNo' => Input::get('txtBrgyTel'),
								'brgyMobileNo' => Input::get('txtBrgyMobile')
							));

		}

		if(Input::hasFile('txtLogo2'))
			{
				$newLogo2 = time().Input::file('txtLogo2')->getClientOriginalName();

				Input::file('txtLogo2')->move(public_path().'/bower_components/admin-lte/dist/images/', $newLogo2);

				DB::table('tblbrgydetail')
						->where('brgyDetailsID', '=', '1')
						->update(array(
								'brgyLogo1' => $newLogo2,
								'brgyName' => Input::get('txtBrgyName'),
								'brgyAddress' => Input::get('txtBrgyAdd'),
								'brgyEmail' => Input::get('txtBrgyEmail'),
								'brgyTelNo' => Input::get('txtBrgyTel'),
								'brgyMobileNo' => Input::get('txtBrgyMobile')
							));

				Session::put('logo2', $newLogo2);
			}

		else {
			DB::table('tblbrgydetail')
						->where('brgyDetailsID', '=', '1')
						->update(array(
								'brgyName' => Input::get('txtBrgyName'),
								'brgyAddress' => Input::get('txtBrgyAdd'),
								'brgyEmail' => Input::get('txtBrgyEmail'),
								'brgyTelNo' => Input::get('txtBrgyTel'),
								'brgyMobileNo' => Input::get('txtBrgyMobile')
							));

		}

		
		return Redirect::to('bryDetails');
	}

	public function updateDetails(){
		 if (Request::ajax())
		  {
		  	DB::table('tblbrgydetail')
		  		->update(array('brgyName' => Input::get('bName'),
		  					   'brgyStreet' => Input::get('bSt'),
		  					   'brgyDistrict' => Input::get('bDist'),
		  					   'brgyCity' => Input::get('bCity'),
		  					   'brgyCountry' => Input::get('bCountry'),
		  					   'brgyZipCode' => Input::get('bZipCode'),
		  					   'brgyEmail' => Input::get('bEmail'),
		  				 	   'brgyContact' => Input::get('bContact'),
							   'CancelResNum' => Input::get('bCanRes'),
							   'CancelRes' => Input::get('bDrop')
		  				 ));

		  		$bDetails = DB::table('tblbrgydetail')
		  		 	->get();

		  	return Response::json(array('bD' => $bDetails));
		  		
		  }

	}


	public function updateUAdd(){
		 if (Request::ajax())
		  {
		  	DB::table('tblbrgydetail')
		  		->update(array('isHouse' => Input::get('houseno'),
		  					   'isSub' => Input::get('sub'),
		  					   'isComp' => Input::get('comp'),
		  					   'isStreet' => Input::get('street'),
		  					   'isZone' => Input::get('zone')
		  				 ));

		  		$bDetails = DB::table('tblbrgydetail')
		  		 	->get();

		  	return Response::json(array('bD' => $bDetails));
		  		
		  }

	}
	
	public function addStreet(){

	 if(Request::ajax())
	 {
	 	DB::table('tblstreet')
	 		->insert(array('StreetName' => Input::get('street'),
	 						'status' => 'active'
	 			));

	 	$addSt = DB::table('tblstreet')
				->where('status', '=', 'active')
	 			->get();

	 	return Response::json(array('aS' => $addSt));
	 }

	}



	public function addSubdivision(){

	 if(Request::ajax())
	 {
	 	DB::table('tblsubdivision')
	 		->insert(array('subdivisionName' => Input::get('subdiv'),
	 						'status' => 'active'
	 			));

	 	$addSub = DB::table('tblsubdivision')
				->where('status', '=', 'active')
	 			->get();

	 	return Response::json(array('aSub' => $addSub));
	 }
	 
	}

	public function addComp(){

	 if(Request::ajax())
	 {
	 	DB::table('tblcompound')
	 		->insert(array('compName' => Input::get('comp'),
	 						'status' => 'active'
	 			));

	 	$addComp = DB::table('tblcompound')
				->where('status', '=', 'active')
	 			->get();

	 	return Response::json(array('aComp' => $addComp));
	 }
	 
	}



	public function deleteStreet(){
		
		if(Request::ajax()){
			DB::table('tblstreet')
				->where('StreetID', '=', Input::get('id'))
				->update(array(
					'status' => 'inactive'
					));
					

			$dStreet = DB::table('tblstreet')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('dSt' => $dStreet));
		}

	}

	public function deleteSubdivision(){

		if(Request::ajax()){
			DB::table('tblsubdivision')
				->where('subdivisionID', '=', Input::get('id'))
				->update(array(
					'status' => 'inactive'
					));
					

			$dSubdivision = DB::table('tblsubdivision')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('dSub' => $dSubdivision));
		}
	 
	}

	public function deleteComp(){

		if(Request::ajax()){
			DB::table('tblcompound')
				->where('compID', '=', Input::get('id'))
				->update(array(
					'status' => 'inactive'
					));
					

			$dComp = DB::table('tblcompound')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('dComp' => $dComp));
		}
	 
	}

	public function getCheck(){

	 if(Request::ajax())
	 {
	 	

	 	$bd = DB::table('tblbrgydetail')
	 			->get();

	 	return Response::json(array('bd' => $bd));
	 }

	}

}