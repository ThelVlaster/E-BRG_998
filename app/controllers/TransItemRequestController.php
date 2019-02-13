<?php

class TransItemRequestController extends BaseController {


//auto cancellation
	public function CancelRequestAuto ()
	{
		If(Request::ajax())
		{

			$reserves= DB::table('tbltransreservation')
				->where('ReserveStatus', '=' ,'Approved')
				->where('PaymentStatus', '=' ,'Unpaid')
				->distinct()
				->get();

			return Response::json(array('reserves'=>$reserves));
		}

	}


	public function ItemRequest ()
	{
		
		$records = DB::table('tbltransreservation')
			->get();

		$rescount = DB::table('tbltransreservation')
			->distinct()
			->count();

		$count = DB::table('tbltransreservation')
			->where ('ReserveStatus', '=', 'New')
			->count();

		$acount = DB::table('tbltransreservation')
			->where ('ReserveStatus', '=', 'Approved')
			->count();

		$recount = DB::table('tbltransreservation')
			->where ('ReserveStatus', '=', 'Released')
			->count();

		$rtcount= DB::table('tbltransreservation')
				->where ('ReserveStatus', '=', 'Returned')
				->count();


		$ccount = DB::table('tbltransreservation')
				->where ('ReserveStatus', '=', 'Cancelled')
				->count();

		$residents = DB::table('tblresident')
			->get();

		$nonresidents = DB::table('tblnonresident')
			->get();

		$payment= DB::table('tblpayment')
			->get();
    
       	$today = DB::table('tbltransreservation')
				->select('DateRequested')
				->get();

		return View::Make('transItem.item_request')
			->with('records', $records)
			->with('reservecount', $rescount)
			->with('newcount', $count)
			->with('acount', $acount)
			->with('rtcount', $rtcount)
			->with('ccount', $ccount)
			->with('recount', $recount)
			->with('residents', $residents)
			->with('nonresidents', $nonresidents)
			->with('payment', $payment);
	}




	
	public function ItemRequestNew ()
	{
		
		$records = DB::table('tbltransreservation')
				->where ('ReserveStatus', '=', 'New')
				->get();
		
		$rescount = DB::table('tbltransreservation')
			->select('ReservationID')
			->distinct()
			->count();

		$count = DB::table('tbltransreservation')
			->where ('ReserveStatus', '=', 'New')
			->count();

		$acount = DB::table('tbltransreservation')
			->where ('ReserveStatus', '=', 'Approved')
			->count();

		$recount = DB::table('tbltransreservation')
			->where ('ReserveStatus', '=', 'Released')
			->count();

		$rtcount= DB::table('tbltransreservation')
				->where ('ReserveStatus', '=', 'Returned')
				->count();


		$ccount = DB::table('tbltransreservation')
				->where ('ReserveStatus', '=', 'Cancelled')
				->count();

		$residents = DB::table('tblresident')
			->get();

		$nonresidents = DB::table('tblnonresident')
			->get();

		$payment= DB::table('tblpayment')
			->get();
    
       	$today = DB::table('tbltransreservation')
				->select('DateRequested')
				->get();

		return View::Make('transItem.item_request')
			->with('records', $records)
			->with('reservecount', $rescount)
			->with('newcount', $count)
			->with('acount', $acount)
			->with('rtcount', $rtcount)
			->with('ccount', $ccount)
			->with('recount', $recount)
			->with('residents', $residents)
			->with('nonresidents', $nonresidents)
			->with('payment', $payment);
			
	}

	public function ItemRequestApproved ()
	{
		
		$records = DB::table('tbltransreservation')
				->where ('ReserveStatus', '=', 'Approved')
				->get();

		$rescount = DB::table('tbltransreservation')
			->select('ReservationID')
			->distinct()
			->count();

		$count = DB::table('tbltransreservation')
			->where ('ReserveStatus', '=', 'New')
			->count();

		$acount = DB::table('tbltransreservation')
			->where ('ReserveStatus', '=', 'Approved')
			->count();

		$recount = DB::table('tbltransreservation')
			->where ('ReserveStatus', '=', 'Released')
			->count();

		$rtcount= DB::table('tbltransreservation')
				->where ('ReserveStatus', '=', 'Returned')
				->count();


		$ccount = DB::table('tbltransreservation')
				->where ('ReserveStatus', '=', 'Cancelled')
				->count();

		$residents = DB::table('tblresident')
			->get();

		$nonresidents = DB::table('tblnonresident')
			->get();

		$payment= DB::table('tblpayment')
			->get();
    
       	$today = DB::table('tbltransreservation')
				->select('DateRequested')
				->get();

		return View::Make('transItem.item_request')
			->with('reservecount', $rescount)
			->with('newcount', $count)
			->with('acount', $acount)
			->with('rtcount', $rtcount)
			->with('ccount', $ccount)
			->with('recount', $recount)
			->with('records', $records)
			->with('residents', $residents)
			->with('nonresidents', $nonresidents)
			->with('payment', $payment);
	}


public function ItemRequestReleased ()
	{
		
		$records = DB::table('tbltransreservation')
				->where ('ReserveStatus', '=', 'Released')
				->get();

		$rescount = DB::table('tbltransreservation')
			->select('ReservationID')
			->distinct()
			->count();

			
		$count = DB::table('tbltransreservation')
			->where ('ReserveStatus', '=', 'New')
			->count();

		$acount = DB::table('tbltransreservation')
			->where ('ReserveStatus', '=', 'Approved')
			->count();

		$recount = DB::table('tbltransreservation')
			->where ('ReserveStatus', '=', 'Released')
			->count();

		$rtcount= DB::table('tbltransreservation')
				->where ('ReserveStatus', '=', 'Returned')
				->count();


		$ccount = DB::table('tbltransreservation')
				->where ('ReserveStatus', '=', 'Cancelled')
				->count();

		$residents = DB::table('tblresident')
			->get();

		$nonresidents = DB::table('tblnonresident')
			->get();

		$payment= DB::table('tblpayment')
			->get();
    
       	$today = DB::table('tbltransreservation')
				->select('DateRequested')
				->get();

		return View::Make('transItem.item_request')
			->with('records', $records)
			->with('reservecount', $rescount)
			->with('newcount', $count)
			->with('acount', $acount)
			->with('rtcount', $rtcount)
			->with('ccount', $ccount)
			->with('recount', $recount)
			->with('residents', $residents)
			->with('nonresidents', $nonresidents)
			->with('payment', $payment);
	}


public function ItemRequestReturned ()
	{
		
		$records = DB::table('tbltransreservation')
				->where ('ReserveStatus', '=', 'Returned')
				->get();

		$rescount = DB::table('tbltransreservation')
			->count();

		$count = DB::table('tbltransreservation')
			->where ('ReserveStatus', '=', 'New')
			->count();

		$acount = DB::table('tbltransreservation')
			->where ('ReserveStatus', '=', 'Approved')
			->count();

		$recount = DB::table('tbltransreservation')
			->where ('ReserveStatus', '=', 'Released')
			->count();

		$rtcount= DB::table('tbltransreservation')
				->where ('ReserveStatus', '=', 'Returned')
				->count();


		$ccount = DB::table('tbltransreservation')
				->where ('ReserveStatus', '=', 'Cancelled')
				->count();

		$residents = DB::table('tblresident')
			->get();

		$nonresidents = DB::table('tblnonresident')
			->get();

		$payment= DB::table('tblpayment')
			->get();
    
       	$today = DB::table('tbltransreservation')
				->select('DateRequested')
				->get();

		return View::Make('transItem.item_request')
			->with('records', $records)
			->with('reservecount', $rescount)
			->with('newcount', $count)
			->with('acount', $acount)
			->with('rtcount', $rtcount)
			->with('ccount', $ccount)
			->with('recount', $recount)
			->with('residents', $residents)
			->with('nonresidents', $nonresidents)
			->with('payment', $payment);
	}


public function ItemRequestCancel ()
	{
		
		$records = DB::table('tbltransreservation')
				->where ('ReserveStatus', '=', 'Cancelled')
				->get();

		$rescount = DB::table('tbltransreservation')
			->count();

		$count = DB::table('tbltransreservation')
			->where ('ReserveStatus', '=', 'New')
			->count();

		$acount = DB::table('tbltransreservation')
			->where ('ReserveStatus', '=', 'Approved')
			->count();

		$recount = DB::table('tbltransreservation')
			->where ('ReserveStatus', '=', 'Released')
			->count();

		$rtcount= DB::table('tbltransreservation')
				->where ('ReserveStatus', '=', 'Returned')
				->count();


		$ccount = DB::table('tbltransreservation')
				->where ('ReserveStatus', '=', 'Cancelled')
				->count();

		$residents = DB::table('tblresident')
			->get();

		$nonresidents = DB::table('tblnonresident')
			->get();

		$payment= DB::table('tblpayment')
			->get();
    
       	$today = DB::table('tbltransreservation')
				->select('DateRequested')
				->get();

		return View::Make('transItem.item_request')
			->with('records', $records)
			->with('reservecount', $rescount)
			->with('newcount', $count)
			->with('acount', $acount)
			->with('rtcount', $rtcount)
			->with('ccount', $ccount)
			->with('recount', $recount)
			->with('residents', $residents)
			->with('nonresidents', $nonresidents)
			->with('payment', $payment);
	}











	public function ItemRequestForm()
	{
		$getResident = DB::table('tblresident')
			->get();

		return View::make('transItem.item_request_content')
			->with ('cResident', $getResident);
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


	public function getItemTypes()
	{
		$iitype = DB::table('tblitemtype')
			->where('tblitemtype.status', '=','active')
			->orderBy('ItemName', 'asc')
			->get();

		$irHeaders = DB::table('tbltransreservation')
			->where ('ReserveStatus', '!=', 'Returned')
			->where ('ReserveStatus', '!=', 'Cancelled')
			->get();

		$irDetails  = DB::table('tbltransitemtype')
			->get();


		return Response::json(array("types" => $iitype, "headers" => $irHeaders, "details" => $irDetails));
	}

	public function getAvailableItems()
	{
		if(Request::ajax())
		{
			$it = DB::table('tblitemtype')
				->join('tblitemdetails', 'tblitemdetails.ItemTypeID', '=', 'tblitemtype.ItemTypeID')
				->where('tblitemdetails.ItemTypeID', '=', Input::get('iType'))
				->where('tblitemdetails.ItemStatus', '=','Good')
				->orderBy('tblitemtype.ItemName', 'asc')
				->count();


			$avail = $it-Input::get('minusItem');

			return Response::json(array('available'=> $avail));
		}
	}

public function addItemRequest()
 	{
 		$NonResID = DB::table('tblnonresident')
 				  ->count();

 	   	if ($NonResID==0) {
	 			$NonResID=1;
	 		}

	 	else {
	 			$NonResID = DB::table('tblnonresident')
	 			->orderBy('NonResidentID', 'desc')
	 			->take(1)
	 			->get();
	 			$NonResID= $NonResID[0]->NonResidentID+1;
	 		}

 		$NextID = DB::table('tbltransreservation')
				->count();

 	   	if ($NextID==0)	 {
	 			$NextID=1;
	 		}

	 	else {
	 			$NextID = DB::table('tbltransreservation')
	 			->orderBy('ReservationID', 'desc')
	 			->take(1)
	 			->get();
	 			$NextID= $NextID[0]->ReservationID+1;
	 		}


	 		if(Input::get('reserveType') == 'dateRange')
			{
		 		if (Input::get('radioRes') == "yes") //non resident
		 		{
		 			DB::table('tblnonresident')
		 			->insert(array(
			 			'NonResidentID' => $NonResID,
						'NonResName' => Input::get('txtName'),
						'FRAddress' => Input::get('txtAddress'),
						'FRMobileNo' => Input::get('txtMobile'),
						'FRBday' => Input::get('txtBdate'),
						'FRRequestType' => "Item",
					));


					DB::table('tbltransreservation')
		 			->insert (array(
		 				'ReservationID' => $NextID,
		 				'DateReserveFrom' => Input::get('dateFrom'),
		 				'DateReserveTo' => Input::get('dateTo'),
		 				'TimeReserveFrom' => Input::get('timeFrom'),
		 				'TimeReserveTo' => Input::get('timeTo'),
		 				'RequestorType' => 1,
		 				'RequestorID' => $NonResID,
		 				'Code' => bin2hex(openssl_random_pseudo_bytes(3)),
		 			));
		 		}

		 	else {
		 		DB::table('tbltransreservation')
		 			->insert (array(
		 				'ReservationID' => $NextID,
		 				'DateReserveFrom' => Input::get('dateFrom'),
		 				'DateReserveTo' => Input::get('dateTo'),
		 				'TimeReserveFrom' => Input::get('timeFrom'),
		 				'TimeReserveTo' => Input::get('timeTo'),
		 				'RequestorType' => 0,
		 				'RequestorID' => Input::get('autosearch'),
		 				'Purpose' => Input::get('purpose'),
		 				'Code' => bin2hex(openssl_random_pseudo_bytes(3)),
		 			));
		 		}

		 
		 		$ctr= DB::table('tblitemtype')
		 			->where('status', '=', 'active')
		 			->count();

		 		$ctr_get= DB::table('tblitemtype')
		 			->where('status', '=', 'active')
		 			->get();

			 	for ($i= 0;$i<$ctr; $i++) {
			 		if (Input::get('checkbox_'.$ctr_get[$i] -> ItemTypeID))
			 		{
			 			DB::table('tbltransitemtype')
			 				->insert (array(
			 					'ReservationID' =>  $NextID,
			 					'ItemTypeID' => $ctr_get[$i]-> ItemTypeID,
			 					'ReserveQuantity' => Input::get('textbox_'.$ctr_get[$i]-> ItemTypeID)
			 			));
			 		}
			 	}
			 
			 //***FOR FACILITY****//
			 	 $ctr= DB::table('tblfacility')
					->where ('FCondition', '=', 'Good')
		 			->count();

		 		$ctr_get= DB::table('tblfacility')
					->where('FCondition', '=', 'Good')
		 			->get();

			 	for ($i= 0;$i<$ctr; $i++) {
			 		if (Input::get('checkbox_'.$ctr_get[$i] -> FacilityID))
			 		{
			 			DB::table('tbltransfacilityrequest')
			 				->insert (array(
			 					'ReservationID' =>  $NextID,
			 					'FacilityID' => $ctr_get[$i]-> FacilityID,
			 			));
			 		}
			 	}

			 	 $Dctr= DB::table('tblfacilityenergy')
		 			->count();

			 	 $Dctr_get= DB::table('tblfacilityenergy')
		 			->get();

			 	for ($i= 0;$i<$Dctr; $i++) {
			 		if (Input::get('device_'.$Dctr_get[$i] -> DeviceID))
			 		{
			 			DB::table('tbltransfacilityrequestdevices')
			 				->insert (array(
			 					'ReservationID' =>  $NextID,
			 					'DeviceFacilityID' => $Dctr_get[$i]-> DeviceFacility,
			 					'DeviceID' => $Dctr_get[$i]-> DeviceID,
			 			));
			 		}
			 	}
	 		}


	 	else if (Input::get('reserveType') == "manualDate")
	 	{

		 		if (Input::get('radioRes') == "yes") //non resident
		 		{
		 			DB::table('tblnonresident')
		 			->insert(array(
			 			'NonResidentID' => $NonResID,
						'NonResName' => Input::get('txtName'),
						'FRAddress' => Input::get('txtAddress'),
						'FRMobileNo' => Input::get('txtMobile'),
						'FRBday' => Input::get('txtBdate'),
						'FRRequestType' => "Item",
					));

		 			for( $i = 0; $i < Input::get('dateClicks'); $i++)
		 			{	
						DB::table('tbltransreservation')
			 			->insert (array(
			 				'ReservationID' => $NextID,
			 				'DateReserveFrom' => Input::get('datepick_'.$i),
			 				'DateReserveTo' => Input::get('datepick_'.$i),
			 				'TimeReserveFrom' => Input::get('timeFrom_'.$i),
			 				'TimeReserveTo' => Input::get('timeTo_'.$i),
			 				'RequestorType' => 1,
			 				'RequestorID' => $NonResID,
			 				'Code' => bin2hex(openssl_random_pseudo_bytes(3)),
			 			));	
		 			}
		 		}
		 		else 
		 		{
		 			for( $i = 0; $i < Input::get('dateClicks'); $i++)
		 			{
				 		DB::table('tbltransreservation')
				 			->insert (array(
				 				'ReservationID' => $NextID,
				 				'DateReserveFrom' => Input::get('datepick_'.$i),
				 				'DateReserveTo' => Input::get('datepick_'.$i),
				 				'TimeReserveFrom' => Input::get('timeFrom_'.$i),
				 				'TimeReserveTo' => Input::get('timeTo_'.$i),
				 				'RequestorType' => 0,
				 				'RequestorID' => Input::get('autosearch'),
				 				'Purpose' => Input::get('purpose'),
				 				'Code' => bin2hex(openssl_random_pseudo_bytes(3)),
				 			));
				 	}
			 	}
			 	$ctr= DB::table('tblitemtype')
		 			->where('status', '=', 'active')
		 			->count();

		 		$ctr_get= DB::table('tblitemtype')
		 			->where('status', '=', 'active')
		 			->get();

			 	for ($i= 0;$i<$ctr; $i++) {
			 		if (Input::get('checkbox_'.$ctr_get[$i] -> ItemTypeID))
			 		{
			 			DB::table('tbltransitemtype')
			 				->insert (array(
			 					'ReservationID' =>  $NextID,
			 					'ItemTypeID' => $ctr_get[$i]-> ItemTypeID,
			 					'ReserveQuantity' => Input::get('textbox_'.$ctr_get[$i]-> ItemTypeID)
			 			));
			 		}
			 	}
			 
			 //***FOR FACILITY****//
			 	 $ctr= DB::table('tblfacility')
					->where ('FCondition', '=', 'Good')
		 			->count();

		 		$ctr_get= DB::table('tblfacility')
					->where('FCondition', '=', 'Good')
		 			->get();

			 	for ($i= 0;$i<$ctr; $i++) {
			 		if (Input::get('checkbox_'.$ctr_get[$i] -> FacilityID))
			 		{
			 			DB::table('tbltransfacilityrequest')
			 				->insert (array(
			 					'ReservationID' =>  $NextID,
			 					'FacilityID' => $ctr_get[$i]-> FacilityID,
			 			));
			 		}
			 	}

			 	 $Dctr= DB::table('tblfacilityenergy')
		 			->count();

			 	 $Dctr_get= DB::table('tblfacilityenergy')
		 			->get();

			 	for ($i= 0;$i<$Dctr; $i++) {
			 		if (Input::get('device_'.$Dctr_get[$i]-> DeviceID))
			 		{
			 			DB::table('tbltransfacilityrequestdevices')
			 				->insert (array(
			 					'ReservationID' =>  $NextID,
			 					'DeviceID' => $Dctr_get[$i]-> DeviceID,
			 					'DeviceFacilityID' => $Dctr_get[$i]-> DeviceFacility,
			 			));
			 		}
			 	}

	 	}
	 	return Redirect::to('ItemRequest');
	}

	
	public function getReserveInfotoCancel ()
	{

	if (Input::get('requestortype')=='1')
	{
		$reserveinfo = DB::table('tbltransreservation')
					->where('ReservationID', '=', Input::get('reserveid'))
					->join('tblnonresident', 'tblnonresident.NonResidentID', '=', 'tbltransreservation.RequestorID')
					->get();
	}

	else if (Input::get('requestortype')=='0')
	{
		$reserveinfo = DB::table('tbltransreservation')
					->where('ReservationID', '=', Input::get('reserveid'))
					->join('tblresident', 'tblresident.ResidentID', '=', 'tbltransreservation.RequestorID')
					->get();
	}

	$paymentInfo = DB::table('tblpayment')
				->where('RequestID', '=', Input::get('reserveid'))
				->get();

			return Response::json(array('reserveinfo' => $reserveinfo, 'paymentinfo' => $paymentInfo));			
	}


	public function CancelRequest ()
	{

	if (Request::ajax())
	{
		DB::table('tbltransreservation')
			->where('ReservationID', '=', Input::get('requestID'))
			->update(array(
				'ReserveStatus' => 'Cancelled',
			));
		
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
					'RequestID'=> Input::get('requestID'),
					'paidBy'=> Input::get('paidBy'),
					'TransacName' => 'FacilityItem',
					'PaymentBalance'=> '0.00',
					'PaidAmount'=> Input::get('crefund')*-1,
					'TotalAmount'=> Input::get('crefund')*-1,
					'OriginalPrice'=> '0.00',
					'PaymentType'=> 'Refund/Cancel',
					'PaymentOfficialID'=> Input::get('offID')
					));

			//return Response::json(array('reserveinfo' => $reserveinfo, 'paymentinfo' => $paymentInfo));			
		}
	}

}