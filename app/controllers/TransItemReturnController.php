<?php

class TransItemReturnController extends BaseController {

	public function returnItems()
	{
		if (Input::get('RequestorType')=="0")
		{
			$reserve = DB::table('tbltransreservation')
				->join('tblpayment', 'tblpayment.RequestID', '=', 'tbltransreservation.ReservationID')
				->join('tblresident', 'tblresident.ResidentID', '=', 'tbltransreservation.RequestorID')
				->where('tbltransreservation.ReservationID', '=', Input::get('reserveid'))
				->where('tbltransreservation.DateReserveFrom', '=', Input::get('DateFrom'))
				->where('tbltransreservation.DateReserveTo', '=', Input::get('DateTo'))
				->where('tbltransreservation.TimeReserveTo', '=', Input::get('TimeTo'))
				->where('tbltransreservation.TimeReserveFrom', '=', Input::get('TimeFrom'))
				->get();
		}
		else
		{
				$reserve = DB::table('tbltransreservation')
				->join('tblnonresident', 'tblnonresident.NonResidentID', '=', 'tbltransreservation.RequestorID')
				->join('tblpayment', 'tblpayment.RequestID', '=','tbltransreservation.ReservationID')
				->where('tbltransreservation.ReservationID', '=', Input::get('reserveid'))
				->where('tbltransreservation.DateReserveFrom', '=', Input::get('DateFrom'))
				->where('tbltransreservation.DateReserveTo', '=', Input::get('DateTo'))
				->where('tbltransreservation.TimeReserveTo', '=', Input::get('TimeTo'))
				->where('tbltransreservation.TimeReserveFrom', '=', Input::get('TimeFrom'))
				->get();
		}

		$Itemissue= DB::table('tbltransissueheader')
				->where('ReservationID', '=', Input::get('reserveid'))
				->where('DateReserveFrom', '=', Input::get('DateFrom'))
				->where('DateReserveTo', '=', Input::get('DateTo'))
				->where('TimeReserveTo', '=', Input::get('TimeTo'))
				->where('TimeReserveFrom', '=', Input::get('TimeFrom'))
				->get();

		$Facissue= DB::table('tbltransfacilityissueheader')
				->where('ReservationID', '=', Input::get('reserveid'))
				->where('DateReserveFrom', '=', Input::get('DateFrom'))
				->where('DateReserveTo', '=', Input::get('DateTo'))
				->where('TimeReserveTo', '=', Input::get('TimeTo'))
				->where('TimeReserveFrom', '=', Input::get('TimeFrom'))
				->get();

		if ($Facissue==null)
		{
			$FacissueCtr=0;
		}
		else
		{
			$FacissueCtr=1;
		}

		if ($Itemissue==null)
		{
			$ItemissueCtr=0;
		}
		else
		{
			$ItemissueCtr=1;
		}

		return View::Make('transItem.item_return')
			->with("reserve",$reserve)
			->with("issue",$Itemissue)
			->with("Facissue",$Facissue)
			->with("facCtr",$FacissueCtr)
			->with("ItemCtr",$ItemissueCtr);
	}

	public function issueInfo()
	{
		$issueInfo = DB::table('tbltransissueheader')
			->where('ItemIssueID', '=', Input::get('issueID'))
			->get();

		$issueType = DB::table('tbltransissuetype')
			->where('ItemIssueID', '=', Input::get('issueID'))
			->join('tblitemtype', 'tblitemtype.ItemTypeID', '=', 'tbltransissuetype.ItemTypeID')
			->get();

		$issueIDs = DB::table('tbltransissuedetails')
			->where('ItemIssueID', '=', Input::get('issueID'))
			->join('tblitemtype', 'tblitemtype.ItemTypeID', '=', 'tbltransissuedetails.ITypeID')
			->get();


		$FacissueInfo = DB::table('tbltransfacilityissueheader')
			->where('FacIssueID', '=', Input::get('FacissueID'))
			->get();

		$FacissueDetails = DB::table('tbltransfacilityissuedetails')
			->where('FacIssueID', '=', Input::get('FacissueID'))
			->join('tblfacility', 'tblfacility.FacilityID', '=', 'tbltransfacilityissuedetails.FacilityID')
			->get();

		$FacissueDevices = DB::table('tbltransfacilityissuedevices')
			->where('FacIssueID', '=', Input::get('FacissueID'))
			->join('tblfacilityenergy', 'tbltransfacilityissuedevices.DeviceID', '=', 'tblfacilityenergy.DeviceID')
			->join('tblfacility', 'tbltransfacilityissuedevices.DeviceFacilityID', '=', 'tblfacility.FacilityID')
			->get();


		return Response::json(array('issueInfo' => $issueInfo, 'issueType' => $issueType, 'issueIDs' => $issueIDs,	'FacHeader' => $FacissueInfo, 'FacDetails' => $FacissueDetails, 'FacDev' => $FacissueDevices));
	}


//**********************SAVE TO RETURN HEADER****************************//
 
	public function returnNa()
	{

		$ItemReturnID= DB::table('tbltransreturnheader')
 						->count();

 			if ($ItemReturnID==0)
	 			{
	 				$ItemReturnID=1;
	 			}

			else
			{
				$ItemReturnID= DB::table('tbltransreturnheader')
 					->orderBy('ItemReturnID','desc')
 					->take(1)
 					->get();

				$ItemReturnID= $ItemReturnID[0]->ItemReturnID+1;
			}


		DB::table('tbltransreturnheader')
			->insert(array(
					'ItemReturnID' => $ItemReturnID,
					'ReservationID' => Input::get('reserveid'),
					'ItemIssueID' => Input::get('issueID'),
					'ReturnOfficialID' => Input::get('offID'),
					'DateReserveFrom' => Input::get('DateFrom'),
		 		 	'DateReserveTo' => Input::get('DateTo'),
		 		 	'TimeReserveTo' => Input::get('TimeTo'),
		 		 	'TimeReserveFrom'=>  Input::get('TimeFrom'),
				));

		DB::table('tbltransreservation')
	 		 	->where('ReservationID', '=', Input::get('reserveID'))
				->where('tbltransreservation.DateReserveFrom', '=', Input::get('DateFrom'))
				->where('tbltransreservation.DateReserveTo', '=', Input::get('DateTo'))
				->where('tbltransreservation.TimeReserveTo', '=', Input::get('TimeTo'))
				->where('tbltransreservation.TimeReserveFrom', '=', Input::get('TimeFrom'))
	 		 	->update(array(
	 		 	'ReserveStatus'=> 'Returned'
	 		 ));


		$issueType = DB::table('tbltransissuetype')
			->where('ItemIssueID', '=', Input::get('issueID'))
			->join('tblitemtype', 'tblitemtype.ItemTypeID', '=', 'tbltransissuetype.ItemTypeID')
			->get();


		//penalty

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

		if (Input::get('txtpenalty')=='0')
		{
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

		return Response::json(array('issueType' => $issueType));
	}

//************save to RETURN TYPE*********************************//
 
	public function returnType()
	{
		$issueID = DB::table('tbltransreturnheader')
			->orderBy('ItemReturnID', 'desc')
			->take(1)
			->get();

		DB::table('tbltransreturntype')
			->insert(array(
					'ItemReturnID' => $issueID[0]->ItemReturnID,
					'ItemTypeID' => Input::get('itemTypeID')
				));

		$issueIDs = DB::table('tbltransissuedetails')
			->where('ItemIssueID', '=', Input::get('issueID'))
			->join('tblitemtype', 'tblitemtype.ItemTypeID', '=', 'tbltransissuedetails.ITypeID')
			->get();

		return Response::json(array('issueIDs' => $issueIDs));
	}


//***************save to RETURN DETAILS***************************//
 
	public function returnIDs()
	{
		$issueID = DB::table('tbltransreturnheader')
			->orderBy('ItemReturnID', 'desc')
			->take(1)
			->get();

		DB::table('tbltransreturndetails')
			->insert(array(
					'ItemReturnID' => $issueID[0]->ItemReturnID,
					'ItemTypeID' => Input::get('itemTypeID'),
					'ItemID' => Input::get('itemID'),
				));

		DB::table('tblitemdetails')
			->where ('ItemTypeID', '=',  Input::get('itemTypeID'))
			->where ('ItemID', '=', Input::get('itemID'))
			->where ('ReserveStatus', '=', 'Issued')
			->update(array(
					'ReserveStatus' => 'Available',
					'ItemStatus' => Input::get('stat'),
				));

		DB::table('tbltransreservation')
	 		 	->where('ReservationID', '=', Input::get('reserveID'))
	 		 	->where('tbltransreservation.DateReserveFrom', '=', Input::get('DateFrom'))
				->where('tbltransreservation.DateReserveTo', '=', Input::get('DateTo'))
				->where('tbltransreservation.TimeReserveTo', '=', Input::get('TimeTo'))
				->where('tbltransreservation.TimeReserveFrom', '=', Input::get('TimeFrom'))
	 		 	->update(array(
	 		 	'ReserveStatus'=> 'Returned'
	 		 ));


		$issueIDs = DB::table('tbltransissuedetails')
			->where('ItemIssueID', '=', Input::get('issueID'))
			->join('tblitemtype', 'tblitemtype.ItemTypeID', '=', 'tbltransissuedetails.ITypeID')
			->get();

		return Response::json(array('issueIDs' => $issueIDs));
	}
	//******************PENALTY********************//

	public function ItemPenalty()
	{
		if(Request::ajax())
		{
			$penalty= DB::table('tblitemtype')
					->whereIn('ItemTypeID', Input::get('ItemType'))
					->get();
					
			if ($penalty==null)
				$penaltyctr=1;
			else
				$penaltyctr=0;


			return Response::json(array('penalty'=> $penalty, 'itempen'=> $penaltyctr));
		}


	}
}
