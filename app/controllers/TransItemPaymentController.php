<?php

class TransItemPaymentController extends BaseController {

////////////////NEW PAYMENT DOCS/////////////////////

	public function itemReceipt()
	{


		$payment = DB::table('tblpayment')
				->where('tblpayment.RequestID', '=', Input::get('reserveid'))
				->where('tblpayment.TransacName', '=', 'FacilityItem')
				->orWhere('tblpayment.TransacName', '=', 'Item')
				->get();

		$request = DB::table('tblpayment')
				->where('tblpayment.RequestID', '=', Input::get('reserveid'))
				->where('tblpayment.TransacName', '=', 'FacilityItem')
				->orWhere('tblpayment.TransacName', '=', 'Item')
				->join('tbltransreservation', 'tblpayment.RequestID', '=', 'tbltransreservation.ReservationID')
				->get();

		$p = DB::table('tblpayment')
				->where('tblpayment.RequestID', '=', Input::get('reserveid'))
				->where('tblpayment.TransacName', '=', 'FacilityItem')
				->orWhere('tblpayment.TransacName', '=', 'Item')
				->count();
		
		$total = 0;

		for ($i=0;$i<$p;$i++)
		{
			$total = $total + $payment[$i]->PaidAmount;

		}

			if($request[0]->RequestorType == 0)
			{
				$res = DB::table('tblresident')
					->where('ResidentID', '=', $request[0]->RequestorID)
					->get();

				$person = $res[0]->LastName.', '.$res[0]->FirstName.' '.$res[0]->MidName;
			}
			else
			{
				$nres = DB::table('tblnonresident')
					->where('NonResidentID', '=', $request[0]->RequestorID)
					->get();

				$person = $nres[0]->NonResName;
			}

		$pdf = PDF::loadView('emailPDF.itemPayment', array('res' =>$request, 'person' => $person, 'payment'=>$payment, 'total'=>$total));
        return $pdf->download("ItemReceipt.pdf");
     	   
	}
}