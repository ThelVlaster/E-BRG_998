<?php

class TransDocumentPaymentController extends BaseController {

////////////////NEW PAYMENT DOCS/////////////////////

	public function showPayment()
	{	
		if(Input::get('sort') == "reg")
		{
			$request = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest.RequestID', '=', 'tbldocumentrequest2.RequestID')
				->select('tbldocumentrequest.RequestID', 'Requestor', 'RFType', 'RFResidentID','DateOfRequest', 'PaymentDate', 'PaymentStatus', 'Email')
				->distinct()
				->get();

			$nres = DB::table('tblnonresident')
				->get();

			$res = DB::table('tblresident')
				->get();

			$reqDocs = DB::table('tbldocumentrequest2')
				->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tbldocumentrequest2.DocumentID')
				->get();

			$sort = Input::get('sort');

			return View::make('transDocument.doc_payment')
				->with('request', $request)
				->with('nres', $nres)
				->with('res', $res)
				->with('reqDocs', $reqDocs)
				->with('sort', $sort);
		}//reg

		else if(Input::get('sort') == "bus")
		{
			$req = DB::table('tblbusdocheader')
				->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tblbusdocheader.BusDocumentID')
				->join('tblbusinessdetails', 'tblbusdocheader.BusinessID', '=', 'tblbusinessdetails.BusinessID')
				->get();

			$sort = Input::get('sort');

			return View::make('transDocument.doc_payment')
				->with('req', $req)
				->with('sort', $sort);
		}
		
	}//function


	public function docPaymentForm()
	{	

			$request = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tbldocumentrequest2.DocumentID')
				->where('tbldocumentrequest.RequestID', '=', Input::get('RequestID'))
				->get();

			if($request[0]->RFType == 0)
			{
				$res = DB::table('tblresident')
					->where('ResidentID', '=', $request[0]->RFResidentID)
					->get();

				$person = $res[0]->LastName.', '.$res[0]->FirstName.' '.$res[0]->MidName;
			}
			else
			{
				$nres = DB::table('tblnonresident')
					->where('NonResidentID', '=', $request[0]->RFResidentID)
					->get();

				$person = $nres[0]->NonResName;
			}

			

			return View::make('transDocument.doc_payment_form')
				->with('request', $request)
				->with('person', $person);

		
	}//function

	public function busdocPaymentForm()
	{	

			

			$request = DB::table('tblbusdocheader')
				->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tblbusdocheader.BusDocumentID')
				->join('tblbusinessdetails', 'tblbusdocheader.BusinessID', '=', 'tblbusinessdetails.BusinessID')
				->where('tblbusdocheader.BusRequestID', '=', Input::get('RequestID'))
				->get();

			

			return View::make('transDocument.busdoc_payment_form')
				->with('request', $request);

		
	}//function

	public function computeTotal()
	{
		$prices = DB::table('tbldocumentrequest2')
			->where('RequestID', '=', Input::get('reqID'))
			->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tbldocumentrequest2.DocumentID')
			->get();

		return Response::json(array('prices' => $prices));
	}

	public function payDocs()
	{
		DB::table('tblpayment')
			->insert(array(
					'RequestID' => Input::get('reqID'),
					'PaidBy' => Input::get('paidBy'),
					'TransacName' => Input::get('transacName'),
					'PaidAmount' => Input::get('paidAmount'),
					'TotalAmount' => Input::get('totalAmount'),
					'OriginalPrice' => Input::get('origPrice'),
					'PaymentDate'  => date('Y-m-d H:i:s'),
					'PaymentType' => Input::get('paymentType'),
					'PaymentOfficialID' => Input::get('officialID'),
				));


	}

	public function buspayDocs()
	{
		DB::table('tblpayment')
			->insert(array(
					'RequestID' => Input::get('reqID'),
					'PaidBy' => Input::get('paidBy'),
					'TransacName' => Input::get('transacName'),
					'PaidAmount' => Input::get('paidAmount'),
					'TotalAmount' => Input::get('totalAmount'),
					'OriginalPrice' => Input::get('origPrice'),
					'PaymentDate'  => date('Y-m-d H:i:s'),
					'PaymentType' => Input::get('paymentType'),
					'PaymentOfficialID' => Input::get('officialID'),
				));


	}

	public function docReceipt()
	{
		// $summary = DB::table('tbldocumentrequest')
		// 	->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
		// 	->join('tblresident', 'tblresident.ResidentID', '=', 'tbldocumentrequest.RFResidentID')
		// 	->join('tbldocumentdetails', 'tbldocumentrequest2.DocumentID', '=', 'tbldocumentdetails.DocumentID')
		// 	->where('tbldocumentrequest.RequestID','=', Input::get('reqID'))
		// 	->get();


		$request = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tbldocumentrequest2.DocumentID')
				->where('tbldocumentrequest.RequestID', '=', Input::get('reqID'))
				->get();

			if($request[0]->RFType == 0)
			{
				$res = DB::table('tblresident')
					->where('ResidentID', '=', $request[0]->RFResidentID)
					->get();

				$person = $res[0]->LastName.', '.$res[0]->FirstName.' '.$res[0]->MidName;
			}
			else
			{
				$nres = DB::table('tblnonresident')
					->where('NonResidentID', '=', $request[0]->RFResidentID)
					->get();

				$person = $nres[0]->NonResName;
			}

		$payment = DB::table('tbldocumentrequest')
			->join('tblpayment', 'tbldocumentrequest.RequestID', '=', 'tblpayment.RequestID')
			->orderBy('PaymentID', 'desc')
			->take(1)
			->get();


		$pdf = PDF::loadView('emailPDF.docPayment', array('request' =>$request, 'person' => $person, 'payment' => $payment));
        return $pdf->download("DocumentPayment.pdf");
     	   
	}

	public function docPaid()
	{
		DB::table('tbldocumentrequest')
			->where('RequestID', '=', Input::get('reqID'))
			->update(array(
					'PaymentDate'  => date('Y-m-d H:i:s'),
					'PaymentStatus' => 'Paid'
				));
	}

	public function busdocReceipt()
	{
		

		$request = DB::table('tblbusdocheader')
				->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tblbusdocheader.BusDocumentID')
				->join('tblbusinessdetails', 'tblbusdocheader.BusinessID', '=', 'tblbusinessdetails.BusinessID')
				->where('tblbusdocheader.BusRequestID', '=', Input::get('reqID'))
				->get();


		$payment = DB::table('tblbusdocheader')
			->join('tblpayment', 'tblbusdocheader.BusRequestID', '=', 'tblpayment.RequestID')
			->orderBy('PaymentID', 'desc')
			->take(1)
			->get();


		$pdf = PDF::loadView('emailPDF.busdocPayment', array('request' =>$request,  'payment' => $payment));
        return $pdf->download("DocumentPayment.pdf");
     	   
	}
	public function busdocPaid()
	{
		DB::table('tblbusdocheader')
			->where('BusRequestID', '=', Input::get('reqID'))
			->update(array(
					'PaymentDate'  => date('Y-m-d H:i:s'),
					'PaymentStatus' => 'Paid'
				));
	}
}