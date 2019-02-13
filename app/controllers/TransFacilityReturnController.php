<?php

class TransFacilityReturnController extends BaseController {


//**********************SAVE TO Facility RETURN HEADER****************************//
 
	public function returnFacilityHeader()
	{

		$FacReturnID= DB::table('tbltransfacilityreturnheader')
 						->count();

 			if ($FacReturnID==0)
	 			{
	 				$FacReturnID=1;
	 			}

			else
			{
				$FacReturnID= DB::table('tbltransfacilityreturnheader')
 					->orderBy('FacReturnID','desc')
 					->take(1)
 					->get();

				$FacReturnID= $FacReturnID[0]->FacReturnID+1;
			}

		DB::table('tbltransfacilityreturnheader')
			->insert(array(
					'FacReturnID' => $FacReturnID,
					'ReservationID' => Input::get('reserveid'),
					'FacIssueID' => Input::get('FacissueID'),
					'ReturnOfficialID' => Input::get('offID'),
					'DateReserveFrom' => Input::get('DateFrom'),
		 		 	'DateReserveTo' => Input::get('DateTo'),
		 		 	'TimeReserveTo' => Input::get('TimeTo'),
		 		 	'TimeReserveFrom'=>  Input::get('TimeFrom'),

				));


		DB::table('tbltransreservation')
	 		 	->where('ReservationID', '=', Input::get('reserveid'))
				->where('tbltransreservation.DateReserveFrom', '=', Input::get('DateFrom'))
				->where('tbltransreservation.DateReserveTo', '=', Input::get('DateTo'))
				->where('tbltransreservation.TimeReserveTo', '=', Input::get('TimeTo'))
				->where('tbltransreservation.TimeReserveFrom', '=', Input::get('TimeFrom'))
	 		 	->update(array(
	 		 	'ReserveStatus' => 'Returned'
	 		 ));


		$facIssueDetails = DB::table('tbltransfacilityissuedetails')
			->where('FacIssueID', '=', Input::get('FacissueID'))
			->join('tblfacility', 'tblfacility.FacilityID', '=', 'tbltransfacilityissuedetails.FacilityID')
			->get();


		//penalty//penalty
	if (Input::get('txtpenalty')=='0' && Input::get('txtitem')=='0')
	{
		$PaymentID = DB::table('tblpayment')
					->count();

		if ($PaymentID==0) {
			$PaymentID=1;
		}

		else {
			$PaymentID = DB::table('tblpayment')
				->orderBy('PaymentID', 'desc')
				->take(1)
				->get();
				$PaymentID= $PaymentID[0]->PaymentID+1;
			}


			DB::table('tblpayment')
				->insert(array(
					'PaymentID' => $PaymentID,
					'RequestID'=> Input::get('reserveid'),
					'paidBy'=> Input::get('paidBy'),
					'TransacName' => 'FacilityItem',
					'PaymentBalance'=> 0,
					'PaidAmount'=> Input::get('penaltyAmt'),
					'TotalAmount'=> Input::get('penaltyAmt'),
					'OriginalPrice'=> Input::get('penaltyAmt'),
					'PaymentType'=> 'Penalty',
					'PaymentOfficialID'=> Input::get('offID'),
					));
		}

		return Response::json(array('FacIssueDetails' => $facIssueDetails));
	}

//*****************save to RETURN facility details***********************************//
 
	public function returnFacilityDetails()
	{
		$FacissueID = DB::table('tbltransfacilityreturnheader')
			->orderBy('FacReturnID', 'desc')
			->take(1)
			->get();

		DB::table('tbltransfacilityreturndetails')
			->insert(array(
					'FacReturnID' => $FacissueID[0]->FacReturnID,
					'FacilityID' => Input::get('facilityID'),
				));

		DB::table('tbltransreservation')
	 		 	->where('ReservationID', '=', Input::get('reserveid'))
				->where('tbltransreservation.DateReserveFrom', '=', Input::get('DateFrom'))
				->where('tbltransreservation.DateReserveTo', '=', Input::get('DateTo'))
				->where('tbltransreservation.TimeReserveTo', '=', Input::get('TimeTo'))
				->where('tbltransreservation.TimeReserveFrom', '=', Input::get('TimeFrom'))
	 		 	->update(array(
	 		 	'ReserveStatus' => 'Returned',
	 		 ));

	 	DB::table('tblfacility')
	 		 	->where('FacilityID', '=', Input::get('facilityID'))
	 		 	->update(array(
	 		 	'Availability' => 'Available',
	 		 ));

		$issueDevices = DB::table('tbltransfacilityissuedevices')
			->where('FacIssueID', '=', Input::get('FacissueID'))
			->join('tblfacilityenergy', 'tblfacilityenergy.DeviceID', '=', 'tbltransfacilityissuedevices.DeviceID')
			->get();

		if ($issueDevices==null)
			$DevCtr=0;
		else
			$DevCtr=1;

		return Response::json(array('issueDevices' => $issueDevices, 'DevCtr'=> $DevCtr));
	}


//********************save to RETURN facility devices***************************************//
 
	public function returnFacilityDevices()
	{
		$FacreturnID = DB::table('tbltransfacilityreturnheader')
			->orderBy('FacReturnID', 'desc')
			->take(1)
			->get();

		DB::table('tbltransfacilityreturndevices')
			->insert(array(
					'FacReturnID' => $FacreturnID[0]->FacReturnID,
					'DeviceID' => Input::get('DeviceID'),
				));

		DB::table('tblfacilityenergy')
			->where ('DeviceID', '=',  Input::get('DeviceID'))
			->where ('DeviceFacility', '=', Input::get('DFID'))
			->update(array(
					'DeviceStatus' => Input::get('Devstat'),
				));

		DB::table('tbltransreservation')
	 		 	->where('ReservationID', '=', Input::get('reserveID'))
				->where('tbltransreservation.DateReserveFrom', '=', Input::get('DateFrom'))
				->where('tbltransreservation.DateReserveTo', '=', Input::get('DateTo'))
				->where('tbltransreservation.TimeReserveTo', '=', Input::get('TimeTo'))
				->where('tbltransreservation.TimeReserveFrom', '=', Input::get('TimeFrom'))
	 		 	->update(array(
	 		 	'ReserveStatus' => 'Returned',
	 		 ));


		$issueDevices = DB::table('tbltransfacilityissuedevices')
			->where('FacIssueID', '=', Input::get('FacissueID'))
			->join('tblfacilityenergy', 'tblfacilityenergy.DeviceID', '=', 'tbltransfacilityissuedevices.DeviceID')
			->get();

		return Response::json(array('issueDevices' => $issueDevices));
	}
	//************END*********************//

	public function FacilityPenalty()
	{
		if (Request::ajax())
		{
			$facility = DB::table('tbltransfacilityissuedetails')
				->where('FacIssueID', '=', Input::get('FacIssueID'))
				->join('tblfacility', 'tblfacility.FacilityID', '=', 'tbltransfacilityissuedetails.FacilityID')
				->get();


			return Response::json(array('facility' => $facility));

		}
	}

	public function DevicePenalty()
	{
		if (Request::ajax())
		{
			$device = DB::table('tbltransfacilityissuedevices')
				->where('FacIssueID', '=', Input::get('FacIssueID'))
				->whereIn('tbltransfacilityissuedevices.DeviceID', Input::get('deviceid'))
				->join('tblfacilityenergy', 'tblfacilityenergy.DeviceID', '=', 'tbltransfacilityissuedevices.DeviceID')
				->get();

			return Response::json(array('device' => $device));

		}
	}

}
