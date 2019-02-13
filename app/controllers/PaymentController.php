<?php

class PaymentController extends BaseController {

	public function Payment() 
	{
		$rec= DB::table('tbltransreservation')
			->where('ReserveStatus', '!=', 'Cancelled')
			->get();

		$recPaid= DB::table('tbltransreservation')
			->where('ReserveStatus', '!=', 'Cancelled')
			->where('PaymentStatus', '=', 'Paid')
			->count();

		$recUnpaid= DB::table('tbltransreservation')
			->where('ReserveStatus', '!=', 'Cancelled')
			->where('PaymentStatus', '=', 'Unpaid')
			->count();

		$recAll= DB::table('tbltransreservation')
			->where('ReserveStatus', '!=', 'Cancelled')
			->count();

		$recHalfpaid= DB::table('tbltransreservation')
			->where('ReserveStatus', '!=', 'Cancelled')
			->where('PaymentStatus', '=', 'Halfpaid')
			->count();

		$residents = DB::table('tblresident')
			->get();

		$nonresidents = DB::table('tblnonresident')
			->get();


		return View::make('transItem.payment')
			->with('records', $rec)
			->with('unpaid', $recUnpaid)
			->with('paid', $recPaid)
			->with('half', $recHalfpaid)
			->with('all', $recAll)
			->with('residents', $residents)
			->with('nonresidents', $nonresidents);
	}


		public function PaymentUnpaid() 
	{
		$rec= DB::table('tbltransreservation')
			->where('ReserveStatus', '!=', 'Cancelled')
			->where('PaymentStatus', '=', 'Unpaid')
			->get();

		$recPaid= DB::table('tbltransreservation')
			->where('ReserveStatus', '!=', 'Cancelled')
			->where('PaymentStatus', '=', 'Paid')
			->count();

		$recUnpaid= DB::table('tbltransreservation')
			->where('ReserveStatus', '!=', 'Cancelled')
			->where('PaymentStatus', '=', 'Unpaid')
			->count();

		$recAll= DB::table('tbltransreservation')
			->where('ReserveStatus', '!=', 'Cancelled')
			->count();

		$recHalfpaid= DB::table('tbltransreservation')
			->where('ReserveStatus', '!=', 'Cancelled')
			->where('PaymentStatus', '=', 'Halfpaid')
			->count();


		$residents = DB::table('tblresident')
			->get();

		$nonresidents = DB::table('tblnonresident')
			->get();


		return View::make('transItem.payment')
			->with('records', $rec)
			->with('unpaid', $recUnpaid)
			->with('paid', $recPaid)
			->with('half', $recHalfpaid)
			->with('all', $recAll)
			->with('residents', $residents)
			->with('nonresidents', $nonresidents);
	}


		public function PaymentPaid() 
	{
		$rec= DB::table('tbltransreservation')
			->where('ReserveStatus', '!=', 'Cancelled')
			->where('PaymentStatus', '=', 'Paid')
			->get();

		$recPaid= DB::table('tbltransreservation')
			->where('ReserveStatus', '!=', 'Cancelled')
			->where('PaymentStatus', '=', 'Paid')
			->count();

		$recUnpaid= DB::table('tbltransreservation')
			->where('ReserveStatus', '!=', 'Cancelled')
			->where('PaymentStatus', '=', 'Unpaid')
			->count();

		$recAll= DB::table('tbltransreservation')
			->where('ReserveStatus', '!=', 'Cancelled')
			->count();

		$recHalfpaid= DB::table('tbltransreservation')
			->where('PaymentStatus', '=', 'Halfpaid')
			->where('ReserveStatus', '!=', 'Cancelled')
			->count();

		$residents = DB::table('tblresident')
			->get();

		$nonresidents = DB::table('tblnonresident')
			->get();


		return View::make('transItem.payment')
			->with('records', $rec)
			->with('unpaid', $recUnpaid)
			->with('paid', $recPaid)
			->with('half', $recHalfpaid)
			->with('all', $recAll)
			->with('residents', $residents)
			->with('nonresidents', $nonresidents);
	}


		public function PaymentHalfpaid() 
	{
		$rec= DB::table('tbltransreservation')
			->where('ReserveStatus', '!=', 'Cancelled')
			->where('PaymentStatus', '=', 'Halfpaid')
			->get();

		$recPaid= DB::table('tbltransreservation')
			->where('PaymentStatus', '=', 'Paid')
			->where('ReserveStatus', '!=', 'Cancelled')
			->count();

		$recUnpaid= DB::table('tbltransreservation')
			->where('PaymentStatus', '=', 'Unpaid')
			->where('ReserveStatus', '!=', 'Cancelled')
			->count();

		$recAll= DB::table('tbltransreservation')
			->where('ReserveStatus', '!=', 'Cancelled')
			->count();

		$recHalfpaid= DB::table('tbltransreservation')
			->where('PaymentStatus', '=', 'Halfpaid')
			->where('ReserveStatus', '!=', 'Cancelled')
			->count();

		$residents = DB::table('tblresident')
			->get();

		$nonresidents = DB::table('tblnonresident')
			->get();


		return View::make('transItem.payment')
			->with('records', $rec)
			->with('unpaid', $recUnpaid)
			->with('paid', $recPaid)
			->with('half', $recHalfpaid)
			->with('all', $recAll)
			->with('residents', $residents)
			->with('nonresidents', $nonresidents);
	}


		public function paymentDetails()
	{
		
		$ctr = DB::table('tbltransreservation')
			->where('ReservationID', '=', Input::get('reserveid'))
			->count();

		$reserve = Input::get('reserveid');


		return View::make('transItem.payment_details')
				->with('rid',$reserve)
				->with('idctr',$ctr);
	}




		public function getPaymentInfoforManual()
	{
		$arrayofreserve = array();

		$ctr = DB::table('tbltransreservation')
			->where('ReservationID', '=', Input::get('reserveid'))
			->count();

		
		$R = DB::table('tbltransreservation')
				->where('ReservationID', '=', Input::get('reserveid'))
				->get();

		if ($R[0]->RequestorType=='0')
		{
			$resident= DB::table('tblresident')
				->where('ResidentID', '=', $R[0]->RequestorID)
				->get();
		}
		else
		{
			$resident = DB::table('tblnonresident')
				->where('NonResidentID', '=', $R[0]->RequestorID)
				->get();
		}

		$ReserveType= DB::table('tbltransitemtype')
				->join('tblitemtype','tblitemtype.ItemTypeID','=','tbltransitemtype.ItemTypeID')
				->get();

		$facility= DB::table('tbltransfacilityrequest')
				->join('tblfacility', 'tblfacility.FacilityID', '=', 'tbltransfacilityrequest.FacilityID')
				->get();

		$device= DB::table('tbltransfacilityrequestdevices')
				->join('tblfacilityenergy', 'tbltransfacilityrequestdevices.DeviceID','=','tblfacilityenergy.DeviceID')
				->get();


		return Response::json(array('ctrIDs'=>$ctr, 'reserveInfo' => $R, 'res'=>$resident, 'reservetype'=> $ReserveType, 'facility'=> $facility,'device'=> $device));
	}


	public function DPpaymentDetails()
	{


		$ctr = DB::table('tbltransreservation')
			->where('ReservationID', '=', Input::get('reserveid'))
			->count();

		$reserve = Input::get('reserveid');

		$payment=DB::table('tblpayment')
				->where('RequestID', '=', Input::get('reserveid'))
				->where('TransacName', '=', 'FacilityItem')
				->orderBy('PaymentDate', 'asc')
				->take(1)
				->get();

		return View::make('transItem.DPpayment_details')
				->with('rid',$reserve)
				->with('payment',$payment)
				->with('idctr',$ctr);

	}

	public function getPaymentInfo()
	{
		if(Request::ajax()) 
		{
			$ReserveRec= DB::table('tbltransreservation')
						->get();


			$Rresidents= DB::table('tblresident')
						->get();


			$Rnonresidents= DB::table('tblnonresident')
						->get();


			$ReserveType= DB::table('tbltransitemtype')
						->join('tblitemtype','tblitemtype.ItemTypeID','=','tbltransitemtype.ItemTypeID')
						->get();

			$facility= DB::table('tbltransfacilityrequest')
						->join('tblfacility', 'tblfacility.FacilityID', '=', 'tbltransfacilityrequest.FacilityID')
						->get();

			$device= DB::table('tbltransfacilityrequestdevices')
						->join('tblfacilityenergy', 'tbltransfacilityrequestdevices.DeviceID','=','tblfacilityenergy.DeviceID')
						->get();
						

			return Response::json(array('ReserveRec'=>$ReserveRec, 'Rnonresidents'=>$Rnonresidents, 'Rresidents'=>$Rresidents, "ReserveType"=>$ReserveType, "facility"=>$facility, "device" =>$device));

		}

	}


	public function addPayment()
	{
		if (Request::ajax())
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
					'PaymentBalance'=> Input::get('balance'),
					'PaidAmount'=> Input::get('paidAmt'),
					'TotalAmount'=> Input::get('totalAmt'),
					'OriginalPrice'=> Input::get('OrgPrice'),
					'PaymentType'=> Input::get('paymentType'),
					'PaymentOfficialID'=> Input::get('offID'),
					));

			if (Input::get('balance')==0) {
					DB::table('tbltransreservation')
					->where('ReservationID','=', Input::get('reserveid'))
					->update(array(
						'PaymentStatus'=>'Paid'
						));
					}

				else {
					DB::table('tbltransreservation')
					->where('ReservationID','=', Input::get('reserveid'))
					->update(array(
						'PaymentStatus'=>'Halfpaid'
						));
					}
		}
	}



	public function halfPayment()
	{
		if (Request::ajax())
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
					'RequestID'=> Input::get('requestID'),
					'PaidBy'=> Input::get('paidBy'),
					'TransacName' => Input::get('TransacName'),
					'PaymentBalance'=> "0",
					'PaidAmount'=> Input::get('pAmt'),
					'TotalAmount'=> "0",
					'OriginalPrice'=> Input::get('oPrice'),
					'PaymentType'=> Input::get('pType'),
					'PaymentOfficialID'=> Input::get('offID')
					));

				DB::table('tbltransreservation')
					->where('ReservationID','=', Input::get('requestID'))
					->update(array(
						'PaymentStatus'=>'Paid'
						));
		}
 	
	}


}