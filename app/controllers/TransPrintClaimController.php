<?php

class TransPrintClaimController extends BaseController {

	public function getFirstPrint()
	{
		if(Input::get('docType') == 'Reg')
		{
			$request = DB::table('tbldocumentrequest2')
			->where('tbldocumentrequest2.RequestID', '=', Input::get('rID'))
			->where('tbldocumentrequest2.DocumentID', '=', Input::get('dID'))
			->join('tbldocumentrequest', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
			->join('tbldocumentdetails', 'tbldocumentrequest2.DocumentID', '=', 'tbldocumentdetails.DocumentID')
			->get();
		}
		else
		{
			$request = DB::table('tblbusdocheader')
			->where('tblbusdocheader.BusRequestID', '=', Input::get('rID'))
			->where('tblbusdocheader.BusDocumentID', '=', Input::get('dID'))
			->join('tblbusinessdetails', 'tblbusinessdetails.BusinessID', '=', 'tblbusdocheader.BusinessID')
			->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tblbusdocheader.BusDocumentID')
			->get();
		}
		

		return Response::JSON(array('request' => $request));
	}

	public function donePrinting()
	{
		if(Input::get('docType') == "Reg")
		{
		DB::table('tbldocumentrequest2')
			->where('RequestID', '=', Input::get('rID'))
			->where('DocumentID', '=', Input::get('dID'))
			->update(array(
					'DocReqStatus' => 'Printed'
				));
		} else {

			DB::table('tblbusdocheader')
			->where('BusRequestID', '=', Input::get('rID'))
			->where('BusDocumentID', '=', Input::get('dID'))
			->update(array(
					'BusDocStatus' => 'Printed'
				));
		}
	}

	public function claimingDocument()
	{ 

		if(Input::get('docType') == "Reg")
		{

			for($i = 0; $i < Input::get('ctr'); $i++)
			{
				var_dump(Input::get('docID_'.$i));
				DB::table('tbldocumentrequest2')
					->where('RequestID', '=', Input::get('sampleID'))
					->where('DocumentID', '=', Input::get('docID_'.$i))
					->update(array(
							'DateClaimed' => date('Y/m/d H:m:s'),
							'Claimedby' => Input::get('claimedby'),
							'Releasedby' => Session::get('officialID'),
							'DocReqStatus' => 'Claimed'
						));
			}

		}
		else
		{
			for($i = 0; $i < Input::get('ctr'); $i++)
			{
				var_dump(Input::get('docID_'.$i));
				DB::table('tblbusdocheader')
					->where('BusRequestID', '=', Input::get('sampleID'))
					->where('BusDocumentID', '=', Input::get('docID_'.$i))
					->update(array(
							'DateClaimed' => date('Y/m/d H:m:s'),
							'Claimedby' => Input::get('claimedby'),
							'Releasedby' => Session::get('officialID'),
							'BusDocStatus' => 'Claimed'
						));
			}
		}
		return Redirect::to('claimDocs?sort=reg');
	}

	public function ReprintPayment()
	{
		$tryArrayDocID = array();
		$tryArrayReqID = array();
		$tryArrayPayment = array();
		$tryArrayAdditional = array();

		
			for($i = 0; $i < Input::get('ReprintCTR'); $i++)
			{
				if(Input::get('pcheckbox_'.$i))
				{
					array_push($tryArrayDocID, Input::get('hiddenDocID_'.$i));
					array_push($tryArrayReqID, Input::get('hiddenReqID_'.$i));
				
	
					// $payment = DB::table('tbldocumentrequest2')
					// 	->where('RequestID', '=', Input::get('hiddenReqID_'.$i))
					// 	->where('tbldocumentrequest2.DocumentID', '=', Input::get('hiddenDocID_'.$i))
					// 	//->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tbldocumentrequest2.DocumentID')
					// 	->get();
	
					// array_push($tryArrayPayment, $payment);
					array_push($tryArrayAdditional, Input::get('adcopy_'.$i));
				}
	
	
				
			}
	if(Input::get('pDocType') == "Reg"){
			$payment = DB::table('tbldocumentrequest2')
			->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tbldocumentrequest2.DocumentID')
			->whereIn('RequestID', $tryArrayReqID)
			->whereIn('tbldocumentrequest2.DocumentID', $tryArrayDocID)
			->get();
		}

		else
		{
			$payment = DB::table('tblbusdocheader')
			->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tblbusdocheader.BusDocumentID')
			->whereIn('BusRequestID', $tryArrayReqID)
			->whereIn('tblbusdocheader.BusDocumentID', $tryArrayDocID)
			->get();
		}
		// array_push($tryArrayPayment, $payment);
		// array_push($tryArrayAdditional, Input::get('adcopy_'.$i));

		

		return Response::JSON(array('doc' => $payment, 'adds' => $tryArrayAdditional));
	}

	public function reprintDone()
	{
		if(Input::get('docType') == "Reg"){
			DB::table('tblpayment')
				->insert(array(
						'RequestID' => Input::get('rID'),
						'PaidBy' => Input::get('paidBy'),
						'TransacName' => 'RegularDoc',
						'PaidAmount' => Input::get('total'),
						'TotalAmount' => Input::get('total'),
						'OriginalPrice' => Input::get('total'),
						'PaymentType' => 'Regular',
						'PaymentOfficialID' => Session::get('officialID')
					));
		}
		else 
		{
			DB::table('tblpayment')
				->insert(array(
						'RequestID' => Input::get('rID'),
						'PaidBy' => Input::get('paidBy'),
						'TransacName' => 'BusinessDoc',
						'PaidAmount' => Input::get('total'),
						'TotalAmount' => Input::get('total'),
						'OriginalPrice' => Input::get('total'),
						'PaymentType' => 'Regular',
						'PaymentOfficialID' => Session::get('officialID')
					));
		}
	}

}
