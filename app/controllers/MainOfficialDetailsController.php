<?php

class MainOfficialDetailsController extends BaseController {

	public function showRecords()
	{
		$officialDetails = DB::table('tblofficialdetails')
			->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
			->join('tblresident', 'tblofficialdetails.ResidentID', '=', 'tblresident.ResidentID')
			->where('tblofficialdetails.status', '=', 'active')
			->get();

		$officialPosition = DB::table('tblofficialposition')
			->where('status', '=', 'active')
			->get();

		$checkResident = DB::table('tblresident')
			->where('status', '=', 'active')
			->get();

		return View::make('mainOfficial.official_detail')
			->with('oDetails', $officialDetails)
			->with('oPosition', $officialPosition)
			->with('cResident', $checkResident);
	}

	public function getResidentInfo()
	{
		if(Request::ajax())
		{
			$rDetails = DB::table('tblresident')
				->where('ResidentID', '=', Input::get('resID'))
				->join('tblfamily', 'tblresident.FamilyID', '=', 'tblfamily.FamilyID')
				->join('tblhouse', 'tblfamily.HouseID', '=', 'tblhouse.HouseID')
				->get();

			return Response::json(array('rD' => $rDetails));
		}
	}

	public function getInfo()
	{
		if(Request::ajax()){
			$officialDetails = DB::table('tblofficialdetails')
				->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
				->join('tblresident', 'tblofficialdetails.ResidentID', '=', 'tblresident.ResidentID')
				->where('tblofficialdetails.status', '=', 'active')
				->where('OfficialID', '=', Input::get('id'))
				->get();

			return Response::json(array('oDetails' => $officialDetails));
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
			'txtResidentID.required' => 'º Please Select Resident Name.',
			'txtPosition.required' => 'º Please Select Position.',
			'txtStart.required' => 'º Start of Term is required.',
			'txtStart.after' => 'º Start of Term: Invalid! You may Enter the date today.',
			'txtEnd.required' => 'º End of Term is required.',
			'txtEnd.after' => 'º End of Term: Invalid!'
			);

		$v = Validator::make($post,
				[
					'txtResidentID'	=>'required',
					'txtPosition'	=>'required',
					'txtStart'	=>'required|after:yesterday',
					'txtEnd'	=>'required|after:txtStart'
				],$messages);	

			$officialDetails = DB::table('tblofficialdetails')
				->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
				->join('tblresident', 'tblofficialdetails.ResidentID', '=', 'tblresident.ResidentID')
				->where('tblofficialdetails.status', '=', 'active')
				->get();

			if($v->fails()){

				return  Response::json( array(	'oDetails' => $officialDetails, 'messages' => $v->errors() ));

			}
			else{
		if(Request::ajax()){

			DB::table('tblofficialdetails')
				->insert(array(
						'ResidentID' => Input::get('txtResidentID'),
						'OfficialPositionID' => Input::get('txtPosition'),
						'OfficialTermStart' => Input::get('txtStart'),
						'OfficialTermEnd' => Input::get('txtEnd')
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
						'NewValue' => Input::get('txtResidentID')." ".Input::get('txtPosition'),
						'Date' => date('Y/m/d H:m:s')
					));


			$officialDetails = DB::table('tblofficialdetails')
				->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
				->join('tblresident', 'tblofficialdetails.ResidentID', '=', 'tblresident.ResidentID')
				->where('tblofficialdetails.status', '=', 'active')
				->get();

			return Response::json(array('oDetails' => $officialDetails));

		}
	}
}
	public function updateRecord()
	{
		Validator::extend('alpha_spaces', function($attribute, $value)
		{
    		return preg_match('/[\pL\s]/u', $value);
		});
		$post = Input::all();
		$messages = array(
			'etxtPosition.required' => 'º Please Select Position.',
			'etxtStart.required' => 'º Start of Term is required.',
			'etxtEnd.required' => 'º End of Term is required.'
			);

		$v = Validator::make($post,
				[
					'etxtPosition'	=>'required',
					'etxtStart'	=>'required',
					'etxtEnd'	=>'required'
				],$messages);	

			$officialDetails = DB::table('tblofficialdetails')
				->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
				->join('tblresident', 'tblofficialdetails.ResidentID', '=', 'tblresident.ResidentID')
				->where('tblofficialdetails.status', '=', 'active')
				->get();

			if($v->fails()){

				return  Response::json( array(	'oDetails' => $officialDetails, 'messages' => $v->errors() ));

			}
			else{
		if(Request::ajax())
		{
			DB::table('tblofficialdetails')
				->where('OfficialID', '=', Input::get('etxtID'))
				->update(array(
						'OfficialPositionID' => Input::get('etxtPosition'),
						'OfficialTermStart' => Input::get('etxtStart'),
						'OfficialTermEnd' => Input::get('etxtEnd')
					));

			$officialDetails = DB::table('tblofficialdetails')
				->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
				->join('tblresident', 'tblofficialdetails.ResidentID', '=', 'tblresident.ResidentID')
				->where('tblofficialdetails.status', '=', 'active')
				->get();

			return Response::json(array('oDetails' => $officialDetails));
		}
	}
}
	public function deleteRecord()
	{
		if(Request::ajax())
		{
			DB::table('tblofficialdetails')
				->where('OfficialID', '=', Input::get('dtxtID'))
				->update(array(
						'status' => 'inactive'
					));


	
  		  $fac = DB::table('tblofficialdetails')
				->where('OfficialID', '=', Input::get('dtxtID'))
				->get();
   			
   			Session::put('offID', $fac[0]->OfficialID);
   			Session::put('posID', $fac[0]->OfficialPositionID);



   				DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Deleted',
						'Type' => 'Official Details',
						'OldValue' => Session::get('offID')." ".Session::get('posID'),
						'Date' => date('Y/m/d H:m:s')
					));



			$officialDetails = DB::table('tblofficialdetails')
				->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
				->join('tblresident', 'tblofficialdetails.ResidentID', '=', 'tblresident.ResidentID')
				->where('tblofficialdetails.status', '=', 'active')
				->get();

			return Response::json(array('oDetails' => $officialDetails));
		}
	}

}
