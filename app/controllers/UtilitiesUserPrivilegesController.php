<?php

class UtilitiesUserPrivilegesController extends BaseController {

	public function showRecords()
	{
		$userPriv = DB::table('tblofficialaccount')
			->join('tblofficialdetails', 'tblofficialaccount.OfficialID', '=', 'tblofficialdetails.OfficialID')
			->join('tblofficialposition', 'tblofficialposition.OfficialPositionID', '=', 'tblofficialdetails.OfficialPositionID')
			->join('tblresident', 'tblofficialdetails.ResidentID', '=', 'tblresident.ResidentID')
				->get();

		return View::make('utilities.userprivileges')
				->with('access', $userPriv);
	}

	public function getUPInfo(){
		 if (Request::ajax())
		  {

		  		$access = DB::table('tblofficialaccount')
		  		 	->get();


		  	return Response::json(array('a' => $access));
		  		
		  }

	}

	public function updateUP(){
		  	$count=DB::table('tblofficialaccount')
		  			->count();

		  	$officials = DB::table('tblofficialaccount')
		  		->get();


		  	$a = 0;
		  	$b = 0;
		  	$c = 0;

		  	for($i=0; $i < $count; $i++){

		  	if(Input::get('checkNew_'.$officials[$i]->OfficialID)) {

		  		 $a = 1;

		  	}else  $a = 0;

		  	if(Input::get('checkPen_'.$officials[$i]->OfficialID)) {
		  		 $b = 1;
		  	}else  $b = 0;

		  	if(Input::get('checkApp_'.$officials[$i]->OfficialID)) {
		  		 $c = 1;
		  	}else $c = 0;



		  	DB::table('tblofficialaccount')
				->where('OfficialID', '=', Input::get('offid_'.$officials[$i]->OfficialID))
		  		->update(array('isNew' => $a,
		  					   'isPend' => $b,
		  					   'isApp' => $c
		  				 ));



		  	}
		  	

		  	$access = DB::table('tblofficialaccount')
		  		 	->get();

		  	return Response::json(array('a' => $access));
		  		
		  

	}


}