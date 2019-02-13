<?php

class MainFacilityEnergyController extends BaseController {

	public function showRecords()
	{
		$facility = DB::table('tblfacility')
			->join('tblstreet', 'tblfacility.Location', '=', 'tblstreet.StreetID')
			->where('tblfacility.status', '=', 'active')
			->get();

		return View::make('mainFacility.facility_energy')
			->with('facility', $facility);
	}

	public function getFacilityInfo()
	{
		$faciInfo = DB::table('tblfacility')
			->where('FacilityID', '=', Input::get('facilityID'))
			->get();

		$faciDev = DB::table('tblfacilityenergy')
			->where('status', '=', 'active') 
			->where('DeviceFacility', '=', Input::get('facilityID'))
			->get();

		return Response::json(array('faciInfo' => $faciInfo, 'faciDev' => $faciDev));
				
	}

	public function addDevice()
	{
		date_default_timezone_set('Asia/Manila');

		DB::table('tblfacilityenergy')
			->insert(array(
					'DeviceName' => Input::get('deviceName'),
					'DeviceDesc' => Input::get('devDesc'),
					'DevicePrice' => Input::get('devPrice'),
					'DeviceQuantity' => Input::get('devQuantity'),
					'DeviceAmount' => Input::get('devPrice') * Input::get('devQuantity'),
					'DeviceFacility' => Input::get('devFaci')
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
						'Type' => 'Consuming Devices',
						'NewValue' => Input::get('deviceName')." ".Input::get('devFaci'),
						'Date' => date('Y/m/d H:m:s')
					));



		$dev = DB::table('tblfacilityenergy')
			->where('status', '=', 'active') 
			->where('DeviceFacility', '=', Input::get('devFaci'))
			->get();

		return Response::json(array('devices' => $dev));
	}


	public function getDevice()
	{
		if(Request::ajax()){
			$fac =  DB::table('tblfacilityenergy')
				->where('status', '=', 'active') 
				->where('DeviceID', '=', Input::get('id'))
				->get();

			return Response::json(array('fac' => $fac));
		}
		
	}

	public function updateDevice()
	{
		if(Request::ajax()){
			DB::table('tblfacilityenergy')
			->where('DeviceID', '=', Input::get('id'))
			->update(array(
					'DeviceName' => Input::get('deviceName'),
					'DeviceDesc' => Input::get('devDesc'),
					'DevicePrice' => Input::get('devPrice'),
					'DeviceQuantity' => Input::get('devQuantity'),
					'DeviceAmount' => Input::get('devPrice') * Input::get('devQuantity')
				));

			$devices = DB::table('tblfacilityenergy')
			->where('status', '=', 'active') 
			->where('DeviceFacility', '=', Input::get('devFaci'))
			->get();

			return Response::json(array('devices' => $devices));
		}
		
	}

	public function deleteDevice()
	{
		if(Request::ajax()){
			 DB::table('tblfacilityenergy')
			->where('DeviceID', '=', Input::get('id'))
			->update(array(
					'status' => 'inactive'
				));


  		  $fac = DB::table('tblfacilityenergy')
				->where('DeviceID', '=', Input::get('id'))
				->get();
   			
   			Session::put('devsName', $fac[0]->DeviceName);
   			Session::put('devsFaci', $fac[0]->DeviceFacility);



   				DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Deleted',
						'Type' => 'Consuming Devices',
						'OldValue' => Session::get('devsName')." ".Session::get('devsFaci'),
						'Date' => date('Y/m/d H:m:s')
					));



			$devices = DB::table('tblfacilityenergy')
			->where('status', '=', 'active') 
			->where('DeviceFacility', '=', Input::get('devFaci'))
			->get();

			return Response::json(array('devices' => $devices));
		}
		
	}
	

}
