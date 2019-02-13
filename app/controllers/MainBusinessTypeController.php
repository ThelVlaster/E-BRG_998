<?php

class MainBusinessTypeController extends BaseController {

	public function showRecords()
	{
		$businessType = DB::table('tblbusinessType')
			->where('status', '=', 'active')
			->get();

		return View::make('mainBusiness.bus_type')
			->with('btype', $businessType);
	}

	public function getBusinessTypeInfo(){
		if(Request::ajax()){
			$businessType = DB::table('tblbusinessType')
				->where('BusinessTypeID', '=', Input::get('id'))
				->get();
			return Response::json(array('bType' => $businessType));
		}
	}

	public function addRecord(){
		
		date_default_timezone_set('Asia/Manila');

		Validator::extend('alpha_spaces', function($attribute, $value)
		{
    		return preg_match('/[\pL\s]/u', $value);
		});
		$post = Input::all();
		$messages = array(
			'bt.required' => 'º Business Type is required.',
			'bt.alpha_spaces' => 'º Business Type: Invalid Characters!'
			);
		$v = Validator::make($post,
				[
					'bt'	=>'required|alpha_spaces'
				],$messages);

		$businessType = DB::table('tblbusinessType')
				->where('status', '=', 'active')
				->get();

			if($v->fails()){

				return  Response::json( array(	'btype' => $businessType, 'messages' => $v->errors() ));

			}
			else{
		if(Request::ajax()){
			DB::table('tblbusinessType')
				->insert(array(
					array(
						'BusinessType' => Input::get('bt')
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
						'NewValue' => Input::get('bt'),
						'Date' => date('Y/m/d H:m:s')
					));


			$businessType = DB::table('tblbusinessType')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('btype' => $businessType));
		}
	}
}
	public function updateRecord(){
		if(Request::ajax()){
			DB::table('tblbusinessType')
				->where('BusinessTypeID', '=', Input::get('str1'))
				->update(array(
						'BusinessType' => Input::get('str2')
					));
			$businessType = DB::table('tblbusinessType')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('btype' => $businessType));
		}
	}

	public function deleteRecord(){
		if(Request::ajax()){
			DB::table('tblbusinessType')
				->where('BusinessTypeID', '=', Input::get('str1'))
				->update(array(
						'status' => 'inactive'
					));
				
	
  		  $fac = DB::table('tblbusinessType')
				->where('BusinessTypeID', '=', Input::get('str1'))
				->get();
   			
   			Session::put('busname', $fac[0]->BusinessType);
   			Session::put('busID', $fac[0]->BusinessTypeID);



   				DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Deleted',
						'Type' => 'Business Type',
						'OldValue' => Session::get('busname'),
						'Date' => date('Y/m/d H:m:s')
					));


			$businessType = DB::table('tblbusinessType')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('btype' => $businessType));
		}
	}

}
