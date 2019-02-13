<?php

class LoginController extends BaseController {

	public function index()
	{
		return View::make('login.login');
	}

	public function loginVerification()
	{
		date_default_timezone_set('Asia/Manila');

		$username = Input::get('username');
		$password = Input::get('password');

		$result = DB::table('tblofficialaccount')
			->where('Username', '=', Input::get('username'))
			->where('Password', '=', Input::get('password'))
			->count();

		$barangay = DB::table('tblbrgydetail')
			->get();


		if($result == 1)
		{

			$result2 = DB::table('tblofficialaccount')
				->join('tblofficialdetails', 'tblofficialdetails.OfficialID', '=', 'tblofficialaccount.OfficialID')
				->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
				->join('tblresident', 'tblofficialdetails.ResidentID', '=', 'tblresident.ResidentID')
				->where('tblofficialaccount.Username', '=', Input::get('username'))
				->where('tblofficialaccount.Password', '=', Input::get('password'))
				->get();

var_dump($barangay);
			Session::put('ID', $result2[0]->OfficialID);
			Session::put('username', $username);
			Session::put('password', $password);
			Session::put('brgyname', $barangay[0]->brgyName);
			Session::put('brgyadd', $barangay[0]->brgyAddress);
			Session::put('brgyemail', $barangay[0]->brgyEmail);
			Session::put('firstname', $result2[0]->FirstName);
			Session::put('lastname', $result2[0]->LastName);
			Session::put('position', $result2[0]->OfficialPosition);
			Session::put('image', $result2[0]->Image);
			Session::put('officialID', $result2[0]->OfficialID);

			 
		 
		

			 $log =	DB::table('tbllog')
			 		->count();

			 if($log == 0)
			 {
			 	$log =	DB::table('tbllog')
			 	->insert(array(
						'OfficialID' => Session::get('ID'),
						'logFirstname' => Session::get('firstname'),
						'logLastname' => Session::get('lastname'),
						'logAction' => 'Logged In',
						'logDate' => date('Y/m/d H:m:s')
						));

			 }
			 else
			 {
			
			  $log = DB::table('tbllog')
			 	->update(array(
						'OfficialID' => Session::get('ID'),
						'logFirstname' => Session::get('firstname'),
						'logLastname' => Session::get('lastname'),
						'logAction' => 'Logged In',
						'logDate' => date('Y/m/d H:m:s')
						));

			 }
				
			if($result2[0]->Admin == 1)
			{
				Session::put('admin', 'Admin');
			}
			else
			{
				Session::put('admin', 'Not Admin');	
			}

			return Redirect::to('dashboard');
		}
		else
		{
			return Redirect::to('/')
				->with('messageLogin', 'User does not exists');
		}
	}

	public function Logout()
	{
			

			 $log =	DB::table('tbllog')
			 		->count();

			 if($log == 0)
			 {
			 	$log =	DB::table('tbllog')
			 	->insert(array(
						'OfficialID' => Session::get('ID'),
						'logFirstname' => Session::get('firstname'),
						'logLastname' => Session::get('lastname'),
						'logAction' => 'Logged Out',
						'logDate' => date('Y/m/d H:m:s')
						));

			 }
			 else
			 {
			
			  $log = DB::table('tbllog')
			 	->update(array(
						'OfficialID' => Session::get('ID'),
						'logFirstname' => Session::get('firstname'),
						'logLastname' => Session::get('lastname'),
						'logAction' => 'Logged Out',
						'logDate' => date('Y/m/d H:m:s')
						));

			 }
						
				
		return Redirect::to('/');
	}

}