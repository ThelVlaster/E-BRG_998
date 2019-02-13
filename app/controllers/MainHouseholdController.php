<?php

class MainHouseholdController extends BaseController {

	public function showRecords()
	{
		$household = DB::table('tblhouse')
			->join('tblstreet', 'tblstreet.StreetID', '=', 'tblhouse.HouseStreet')		
			->leftJoin('tblcompound', 'tblcompound.compID', '=', 'tblhouse.HouseComp')		
			->leftJoin('tblsubdivision', 'tblsubdivision.subdivisionID', '=', 'tblhouse.HouseSub')		
			->where('tblhouse.status', '=', 'active')
			->get();

		$street = DB::table('tblstreet')
			->where('status', '=', 'active')
			->get();

		$comp = DB::table('tblcompound')
			->where('status', '=', 'active')
			->get();

		$sub = DB::table('tblsubdivision')
			->where('status', '=', 'active')
			->get();

		$bdetail = DB::table('tblbrgydetail')
			->get();

		return View::make('mainResident.household')
			->with('hhold', $household)
			->with('street', $street)
			->with('comp', $comp)
			->with('bdetail', $bdetail)
			->with('sub', $sub);
	}

	public function getInfo()
	{
		if(Request::ajax()){
			$household = DB::table('tblhouse')
				->join('tblstreet', 'tblstreet.StreetID', '=', 'tblhouse.HouseStreet')		
				->leftJoin('tblcompound', 'tblcompound.compID', '=', 'tblhouse.HouseComp')		
				->leftJoin('tblsubdivision', 'tblsubdivision.subdivisionID', '=', 'tblhouse.HouseSub')
				->where('HouseID', '=', Input::get('id'))
				->get();


			$street = DB::table('tblstreet')
				->where('status', '=', 'active')
				->get();

			$comp = DB::table('tblcompound')
				->where('status', '=', 'active')
				->get();

			$sub = DB::table('tblsubdivision')
				->where('status', '=', 'active')
				->get();


			return Response::json(array('house' => $household, 'street' => $street, 'comp' => $comp, 'sub' => $sub));

		}
	}

	public function getAddress()
	{
		if(Request::ajax()){
			$add = DB::table('tblbrgydetail')
				->get();

			return Response::json(array('add' => $add));

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
				'hhlast.required' => 'º The Last Name is Required.',
				'hhlast.alpha_spaces' => 'º Last Name: Invalid Characters!',
				'hhfirst.required' => 'º The First Name is Required.',
				'hhfirst.alpha_spaces' => 'º First Name: Invalid Characters!',
				'hhaddno.required' => 'º The House Number is Required.',
				'hhstreet.required' => 'º Please enter the Street name',
				'hhzone.required' => 'º Please enter the Zone number.',
				'hhzone.numeric' => 'º The Zone field accepts numbers only.',
				'hhtype.required' => 'º Please select your House Type.'
			);
		$v = Validator::make($post,
				[
					'hhlast'	=>'required|alpha_spaces',
					'hhfirst'	=>'required|alpha_spaces',
					'hhaddno'	=>'required',
					'hhstreet'	=>'required', 
					'hhzone'	=>'required|numeric',
					'hhtype'	=>'required'
				],$messages);

		$household = DB::table('tblhouse')
				->where('status', '=', 'active')
				->get();

			if($v->fails()){

				return  Response::json( array(	'house' => $household, 'messages' => $v->errors() ));

			}
			else{

			
		if(Request::ajax()){
			DB::table('tblhouse')
				->insert(array(
					array(
						'HLastName' => Input::get('hhlast'),
						'HFirstName' => Input::get('hhfirst'),
						'HMidName' => Input::get('hhmid'),
						'HouseAddNo' => Input::get('hhaddno'),
						'HouseComp' => Input::get('hhcomp'),
						'HouseSub' => Input::get('hhsub'),
						'HouseStreet' => Input::get('hhstreet'),
						'HouseZone' => Input::get('hhzone'),
						'HouseType' => Input::get('hhtype'),
						'status' => 'active'
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
						'Type' => 'Household',
						'NewValue' => Input::get('hhaddno')." ".Input::get('hhstreet')." ".Input::get('hhzone'),
						'Date' => date('Y/m/d H:m:s')
					));



			$household = DB::table('tblhouse')
				->join('tblstreet', 'tblstreet.StreetID', '=', 'tblhouse.HouseStreet')
				->where('tblhouse.status', '=', 'active')
				->get();

			return Response::json(array('house' => $household));
			 
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
				'txtl.required' => 'º The Last Name is Required.',
				'txtl.alpha_spaces' => 'º Last Name: Invalid Characters!',
				'txtf.required' => 'º The First Name is Required.',
				'txtf.alpha_spaces' => 'º First Name: Invalid Characters!',
				'txtm.required' => 'º The Middle Name is Required.',
				'txtm.alpha_spaces' => 'º Middle Name: Invalid Characters!',
				'etxtzone.required' => 'º The House Number is Required.',
				'etxtstreet.required' => 'º Please select the Street name',
				'etxtzone.required' => 'º Please enter the Zone number.',
				'etxtzone.numeric' => 'º The Zone field accepts numbers only.',
				'txt6.required' => 'º Please select your House Type.'
			);
		$v = Validator::make($post,
				[
					'txtl'	=>'required|alpha_spaces',
					'txtf'	=>'required|alpha_spaces',
					'txtm'	=>'required|alpha_spaces',
					'etxthouse'	=>'required',
					'etxtstreet'	=>'required', 
					'etxtzone'	=>'required|numeric',
					'txt6'	=>'required'
				],$messages);

		$household = DB::table('tblhouse')
				->where('status', '=', 'active')
				->get();

			if($v->fails()){

				return  Response::json( array(	'ehouse' => $household, 'messages' => $v->errors() ));

			}
			else{

		if(Request::ajax()){
			DB::table('tblhouse')
				->where('HouseID', Input::get('txt1'))
				->update(array(
						'HLastName' => Input::get('txtl'),
						'HFirstName' => Input::get('txtf'),
						'HMidName' => Input::get('txtm'),
						'HouseAddNo' => Input::get('etxthouse'),
						'HouseStreet' => Input::get('etxtstreet'),
						'HouseZone' => Input::get('etxtzone'),
						'HouseSub' => Input::get('etxtsub'),
						'HouseComp' => Input::get('etxtcomp'),
						'HouseType' => Input::get('txt6'),
						'status' => 'active'
					));
					

			$household = DB::table('tblhouse')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('ehouse' => $household));
		}
	}
	}

	public function deleteRecord()
	{

		if(Request::ajax()){
			DB::table('tblhouse')
				->where('HouseID', '=', Input::get('txt1'))
				->update(array(
					'status' => 'inactive'
					));
					
    $fac = DB::table('tblhouse')
				->where('HouseID', '=', Input::get('txt1'))
				->get();
   			
   			Session::put('HouseAdd', $fac[0]->HouseAddNo);
   			Session::put('HouseSt', $fac[0]->HouseStreet);
   			Session::put('HouseZone', $fac[0]->HouseZone);
   			Session::put('houseID', $fac[0]->HouseID);



   				DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Deleted',
						'Type' => 'Facility Details',
						'OldValue' => Session::get('HouseAdd')." ".Session::get('HouseSt')." ".Session::get('HouseZone'),
						'Date' => date('Y/m/d H:m:s')
					));


			$household = DB::table('tblhouse')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('dhouse' => $household));
		}
	}



}

