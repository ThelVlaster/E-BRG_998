<?php

class TransFacilityIssueController extends BaseController {

	public function getFacReserveInfo()
	{
		if(Request::ajax())
		{
			$facility = DB::table('tbltransfacilityrequest')
				->where('ReservationID', '=', Input::get('reserveID'))
				->join('tblfacility', 'tbltransfacilityrequest.FacilityID', '=', 'tblfacility.FacilityID')
				->where('tblfacility.Availability', '=', 'Available')
				->get();

			$devices= DB::table('tbltransfacilityrequestdevices')
				->where('ReservationID', '=', Input::get('reserveID'))
				->join('tblfacilityenergy', 'tbltransfacilityrequestdevices.DeviceID', '=', 'tblfacilityenergy.DeviceID')
				->where('tblfacilityenergy.DeviceStatus', '=', 'Good')
				->get();

			$alldevices = DB::table('tblfacilityenergy')
				->get();

			if ($facility==null)
			{
				$Facctr=1;
			}
			else
			{
				$Facctr=0;
			}

			if ($devices==null)
			{
				$Devctr=1;
			}
			else
			{
				$Devctr=0;
			}

			return Response::json(array('fac'=> $facility, 'dev'=> $devices,'allD'=> $alldevices, 'HaveFac'=>$Facctr, 'HaveDev'=>$Devctr));
		}

	}

	public function addFacIssueHeader()
	{
		if(Request::ajax())
		{

			$FacIssueID= DB::table('tbltransfacilityissueheader')
 						->count();

 			if ($FacIssueID==0)
	 			{
	 				$FacIssueID=1;
	 			}

			else
			{
				$FacIssueID= DB::table('tbltransfacilityissueheader')
 					->orderBy('FacIssueID','desc')
 					->take(1)
 					->get();

				$FacIssueID = $FacIssueID[0]->FacIssueID+1;
			}

 		 	DB::table('tbltransfacilityissueheader')
	 		 	->insert(array(
	 		 	'FacIssueID'=> $FacIssueID,
	 		 	'ReservationID'=> Input::get('reserveID'),
	 		 	'FacIssueOfficialID'=> Input::get('offID'),
	 		 	'DateFacIssue' =>  date("Y/m/d H:i:s"),
	 		 	'DateReserveFrom' => Input::get('DateFrom'),
	 		 	'DateReserveTo' => Input::get('DateTo'),
	 		 	'TimeReserveTo' => Input::get('TimeTo'),
	 		 	'TimeReserveFrom'=>  Input::get('TimeFrom'),
	 		 	));

	 		$facility = DB::table('tbltransfacilityrequest')
	 			->get();

		}
		return Response::json(array('fac' => $facility,'issueID' => $FacIssueID));

	}
	

	public function addFacIssueDetails()
	{
		if(Request::ajax())
		{

 		 	DB::table('tbltransfacilityissuedetails')
	 		 	->insert(array(
	 		 	'FacIssueID'=> Input::get('issueID'),
	 		 	'FacilityID'=> Input::get('facID'),
	 		 	));

 		 	DB::table('tblfacility')
	 		 	->where ('FacilityID', '=',Input::get('facID'))
	 		 	->update (array(
	 		 	'Availability'=> 'Inused',
	 		 	));

	 		DB::table('tbltransreservation')
	 		 	->where('tbltransreservation.ReservationID', '=', Input::get('reserveID'))
	 			->where('tbltransreservation.DateReserveFrom', '=', Input::get('DateFrom'))
				->where('tbltransreservation.DateReserveTo', '=', Input::get('DateTo'))
				->where('tbltransreservation.TimeReserveTo', '=', Input::get('TimeTo'))
				->where('tbltransreservation.TimeReserveFrom', '=', Input::get('TimeFrom'))
	 		 	->update(array(
	 		 	'ReserveStatus'=> 'Released'
	 		 ));

	 		$devices = DB::table('tbltransfacilityrequestdevices')
	 			->get();

		}
		
		return Response::json(array('dev' => $devices));

	}


	public function addFacIssueDevice()
	{
		if(Request::ajax())
		{

 		 	DB::table('tbltransfacilityissuedevices')
	 		 	->insert(array(
	 		 	'FacIssueID'=> Input::get('issueID'),
	 		 	'DeviceID'=> Input::get('devID'),
	 		 	'DeviceFacilityID'=> Input::get('devFac'),
	 		 	));
	 		
	 		DB::table('tbltransreservation')
	 		 	->where('tbltransreservation.ReservationID', '=', Input::get('reserveID'))
				->where('tbltransreservation.DateReserveFrom', '=', Input::get('DateFrom'))
				->where('tbltransreservation.DateReserveTo', '=', Input::get('DateTo'))
				->where('tbltransreservation.TimeReserveTo', '=', Input::get('TimeTo'))
				->where('tbltransreservation.TimeReserveFrom', '=', Input::get('TimeFrom'))
	 		 	->update(array(
	 		 	'ReserveStatus'=> 'Released'
	 		 ));

		}
		
		//return Response::json(array('dev' => $devices));

	}

}