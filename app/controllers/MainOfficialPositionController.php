<?php

class MainOfficialPositionController extends BaseController {

	public function showRecords()
	{
		$officialPosition = DB::table('tblofficialposition')
			->where('status', '=', 'active')
			->get();

		return View::make('mainOfficial.official_position')
			->with('oPosition', $officialPosition);
	}

	public function getInfoByID()
	{
		if(Request::ajax()){
			$officialPosition = DB::table('tblofficialposition')
				->where('OfficialPositionID', '=', Input::get('id'))
				->get();

			return Response::json(array('position' => $officialPosition));

		}
	}


	public function addRecord()
	{

		date_default_timezone_set('Asia/Manila');

		Validator::extend('alpha_spaces', function($attribute, $value)
		{
    		return preg_match('/[\pL\s]/u', $value);
		});
		$post = Input::all();
		$messages = array(
				'posName.required' => 'º The Position Name is Required.',
				'posName.alpha_spaces' => 'º Position Name: Invalid Characters!',
				'posNum.required' => 'º Please enter the Number of Officials.',
				'posNum.numeric' => 'º Number of Officials accepts numbers only.'
			);
		$v = Validator::make($post,
				[
					'posName'	=>'required|alpha_spaces',
					'posNum'    =>'required|numeric'
				], $messages);
			
		$officialPosition = DB::table('tblofficialposition')
				->where('status', '=', 'active')
				->get();

			if($v->fails()){

				return  Response::json( array(	'position' => $officialPosition, 'messages' => $v->errors() ));

			}
			else{
		if(Request::ajax()){
			DB::table('tblofficialposition')
				->insert(array(
					array(
						'OfficialPosition' => Input::get('posName'),
						'OfficialPositionCount' => Input::get('posNum')
						)
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



				DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Inserted',
						'Type' => 'Official Position',
						'NewValue' => Input::get('posName'),
						'Date' => date('Y/m/d H:m:s')
					));

			$officialPosition = DB::table('tblofficialposition')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('position' => $officialPosition));
			 
		}
	}
}
	public function updateRecord()
	{Validator::extend('alpha_spaces', function($attribute, $value)
		{
    		return preg_match('/[\pL\s]/u', $value);
		});
		$post = Input::all();
		$messages = array(
				'txt2.required' => 'º The Position Name is Required.',
				'txt2.alpha_spaces' => 'º Position Name: Invalid Characters!',
				'txt3.required' => 'º Please enter the Number of Officials.',
				'txt3.numeric' => 'º Number of Officials accepts numbers only.'
			);
		$v = Validator::make($post,
				[
					'txt2'	=>'required|alpha_spaces',
					'txt3'    =>'required|numeric'
				], $messages);
			
		$officialPosition = DB::table('tblofficialposition')
				->where('status', '=', 'active')
				->get();

			if($v->fails()){

				return  Response::json( array(	'position' => $officialPosition, 'messages' => $v->errors() ));

			}
			else{

		if(Request::ajax()){
			DB::table('tblofficialposition')
				->where('OfficialPositionID', Input::get('txt1'))
				->update(array(
					'OfficialPosition' => Input::get('txt2'),
					'OfficialPositionCount' => Input::get('txt3')
					));
					

			$officialPosition = DB::table('tblofficialposition')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('position' => $officialPosition));
		}
	}
}
	public function deleteRecord()
	{

		if(Request::ajax()){
			DB::table('tblofficialposition')
				->where('OfficialPositionID', '=', Input::get('txt1'))
				->update(array(
					'status' => 'inactive'
					));
					
  			
  		  $fac = DB::table('tblofficialposition')
				->where('OfficialPositionID', '=', Input::get('txt1'))
				->get();
   			
   			Session::put('posname', $fac[0]->OfficialPosition);
   			Session::put('posID', $fac[0]->OfficialPositionID);



   				DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Deleted',
						'Type' => 'Official Position',
						'OldValue' => Session::get('posname'),
						'Date' => date('Y/m/d H:m:s')
					));

			$officialPosition = DB::table('tblofficialposition')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('position' => $officialPosition));
		}
	}

}
