<?php

class ProfileController extends BaseController {

	public function index()
	{
		$loginInfo= DB::table('tblofficialaccount')
				->join('tblofficialdetails', 'tblofficialdetails.OfficialID', '=', 'tblofficialaccount.OfficialID')
				->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
				->join('tblresident', 'tblofficialdetails.ResidentID', '=', 'tblresident.ResidentID')
				->join('tblfamily', 'tblfamily.FamilyID', '=', 'tblresident.FamilyID')
				->join('tblhouse', 'tblhouse.HouseID', '=', 'tblfamily.HouseID')
				->where('tblofficialaccount.Username', '=', Session::get('username'))
				->where('tblofficialaccount.Password', '=', Session::get('password'))
				->get();

		$account = DB::table('tblofficialaccount')
				->where('tblofficialaccount.Username', '=', Session::get('username'))
				->where('tblofficialaccount.Password', '=', Session::get('password'))
				->get();


		return View::make('profile.profile')
			->with('loginInfo', $loginInfo)
			->with('account', $account);
	}

	public function changeDPSign()
	{
		if(Input::hasFile('txtProfileImage'))
			{
				$newName = time().Input::file('txtProfileImage')->getClientOriginalName();

				Input::file('txtProfileImage')->move(public_path().'/bower_components/admin-lte/dist/images/', $newName);

				DB::table('tblofficialaccount')
					->where('tblofficialaccount.Username', '=', Session::get('username'))
					->where('tblofficialaccount.Password', '=', Session::get('password'))
					->update(array(
							'Image' => $newName,
							'Username' => Input::get('txtUsername'),
							'Password' => Input::get('txtPass')

						));

				Session::put('image', $newName);
			}else {
				DB::table('tblofficialaccount')
					->where('tblofficialaccount.Username', '=', Session::get('username'))
					->where('tblofficialaccount.Password', '=', Session::get('password'))
					->update(array(
							'Username' => Input::get('txtUsername'),
							'Password' => Input::get('txtPass')

						));
			}

		if(Input::hasFile('txtSignature'))
			{
				$newName2 = time().Input::file('txtSignature')->getClientOriginalName();

				Input::file('txtProfileImage')->move(public_path().'/bower_components/admin-lte/dist/images/', $newName2);

				DB::table('tblofficialaccount')
					->where('tblofficialaccount.Username', '=', Session::get('username'))
					->where('tblofficialaccount.Password', '=', Session::get('password'))
					->update(array(
							'Signature' => $newName2,
							'Username' => Input::get('txtUsername'),
							'Password' => Input::get('txtPass')

						));

				Session::put('image', $newName2);
			}else {
				DB::table('tblofficialaccount')
					->where('tblofficialaccount.Username', '=', Session::get('username'))
					->where('tblofficialaccount.Password', '=', Session::get('password'))
					->update(array(
							'Username' => Input::get('txtUsername'),
							'Password' => Input::get('txtPass')
							));
			}

	
		return Redirect::to('login');
	}



}