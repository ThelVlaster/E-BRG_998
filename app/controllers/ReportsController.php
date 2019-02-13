<?php

class ReportsController extends BaseController {

	public function index()
	{
		return View::make('reports.reports');
	}

	
	public function ReqPerRegDoc()
	{
		function random_color_part() {
		    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
		}

		function random_color() {
		    return random_color_part() . random_color_part() . random_color_part();
		}

		$docs = DB::table('tbldocumentdetails')
			->selectRaw('tbldocumentdetails.DocumentID, DocumentName, count(tbldocumentrequest2.RequestID) as Total')
			->leftJoin('tbldocumentrequest2', 'tbldocumentdetails.DocumentID', '=', 'tbldocumentrequest2.DocumentID')
			->join('tbldocumentrequest', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
			->where('DocClass', '=', 'Regular Document')
			->whereBetween('DateOfRequest', array(date('Y-m-01 00:00:00'), date('Y-m-t 23:59:59')))
			->groupBy('DocumentID', 'DocumentName')
			->get();



		$docCount = DB::table('tbldocumentdetails')
			->where('DocClass', '=', 'Regular Document')
			->count();

		$doc = array();
		
		$colors = array();
		for($i = 0; $i < $docCount; $i++)
		{
			$kulay = "#".random_color();
			if(empty($docs[$i]))
			{
				
				$docu['value'] = 0;
				$docu['color'] = $kulay;
				$docu['highlight'] = $kulay;
				$docu['label'] = "name";
				$doc[] = $docu;
			}
			else
			{
				$docu['value'] = $docs[$i]->Total;
				$docu['color'] = $kulay;
				$docu['highlight'] = $kulay;
				$docu['label'] = $docs[$i]->DocumentName;
				$docu['labelColor'] = "white";
				$docu['labelFontSize'] = "16";

				$doc[] = $docu;
			}


			$colors[] = $kulay;

		}

		// $a = json_encode($doc);

		$a=$doc;


		return Response::json(array('datas' =>  $a));
	}

	public function docPerDateRange()
	{
	
		function random_color_part() {
		    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
		}

		function random_color() {
		    return random_color_part() . random_color_part() . random_color_part();
		}

		$docs = DB::table('tbldocumentdetails')
			->selectRaw('tbldocumentdetails.DocumentID, DocumentName, count(tbldocumentrequest2.RequestID) as Total')
			->leftJoin('tbldocumentrequest2', 'tbldocumentdetails.DocumentID', '=', 'tbldocumentrequest2.DocumentID')
			->join('tbldocumentrequest', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
			->where('DocClass', '=', 'Regular Document')
			->whereBetween('DateOfRequest', array(Input::get('dateFrom'), Input::get('dateTo')))
			->groupBy('DocumentID', 'DocumentName')
			->get();



		$docCount = DB::table('tbldocumentdetails')
			->where('DocClass', '=', 'Regular Document')
			->count();

		$doc = array();
		

		for($i = 0; $i < $docCount; $i++)
		{
			$kulay = "#".random_color();
			if(empty($docs[$i]))
			{
				
				$docu['value'] = 0;
				$docu['color'] = $kulay;
				$docu['highlight'] = $kulay;
				$docu['label'] = "name";
				$doc[] = $docu;
			}
			else
			{
				$docu['value'] = $docs[$i]->Total;
				$docu['color'] = $kulay;
				$docu['highlight'] = $kulay;
				$docu['label'] = $docs[$i]->DocumentName;
				$doc[] = $docu;
			}


		}

		// $a = json_encode($doc);


		return Response::json(array('datas' =>  $doc));

	}

	public function getReport1()
	{
		$docs = DB::table('tbldocumentdetails')
			->leftJoin('tbldocumentrequest2', 'tbldocumentdetails.DocumentID', '=', 'tbldocumentrequest2.DocumentID')
			->join('tbldocumentrequest', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
			->where('DocClass', '=', 'Regular Document')
			->whereBetween('DateOfRequest', array(Input::get('dateFrom'), Input::get('dateTo')))
			->orderBy('tbldocumentrequest2.DocumentID')
			->get();

		$total = DB::table('tbldocumentdetails')
			->leftJoin('tbldocumentrequest2', 'tbldocumentdetails.DocumentID', '=', 'tbldocumentrequest2.DocumentID')
			->join('tbldocumentrequest', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
			->where('DocClass', '=', 'Regular Document')
			->whereBetween('DateOfRequest', array(Input::get('dateFrom'), Input::get('dateTo')))
			->orderBy('tbldocumentrequest2.DocumentID')
			->count();

		$totalPerDoc = DB::table('tbldocumentdetails')
			->selectRaw('tbldocumentdetails.DocumentID, DocumentName, count(tbldocumentrequest2.RequestID) as Total')
			->leftJoin('tbldocumentrequest2', 'tbldocumentdetails.DocumentID', '=', 'tbldocumentrequest2.DocumentID')
			->join('tbldocumentrequest', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
			->where('DocClass', '=', 'Regular Document')
			->whereBetween('DateOfRequest', array(Input::get('dateFrom'), Input::get('dateTo')))
			->groupBy('DocumentID', 'DocumentName')
			->get();


		$doc = DB::table('tbldocumentdetails')
			->where('DocClass', '=', 'Regular Document')
			->get();

		return Response::json(array('datas' =>  $docs, 'doc' => $doc, 'total' => $total, 'totalPerDoc' => $totalPerDoc));
	}





	// REQUEST PER BUSINESS DOCUMENTSS

	public function ReqPerBusDoc()
	{
		function random_color_part() {
		    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
		}

		function random_color() {
		    return random_color_part() . random_color_part() . random_color_part();
		}

		$docs = DB::table('tbldocumentdetails')
			->selectRaw('tbldocumentdetails.DocumentID, DocumentName, count(tblbusdocheader.BusRequestID) as Total')
			->leftJoin('tblbusdocheader', 'tbldocumentdetails.DocumentID', '=', 'tblbusdocheader.BusDocumentID')
			->where('DocClass', '=', 'Business Document')
			->whereBetween('DateOfRequest', array(date('Y-m-01 00:00:00'), date('Y-m-t 23:59:59')))
			->groupBy('DocumentID', 'DocumentName')
			->get();



		$docCount = DB::table('tbldocumentdetails')
			->where('DocClass', '=', 'Business Document')
			->count();

		$doc = array();
		

		for($i = 0; $i < $docCount; $i++)
		{
			$kulay = "#".random_color();
			if(empty($docs[$i]))
			{
				
				$docu['value'] = 0;
				$docu['color'] = $kulay;
				$docu['highlight'] = $kulay;
				$docu['label'] = "name";
				$doc[] = $docu;
			}
			else
			{
				$docu['value'] = $docs[$i]->Total;
				$docu['color'] = $kulay;
				$docu['highlight'] = $kulay;
				$docu['label'] = $docs[$i]->DocumentName;
				$doc[] = $docu;
			}


		}

		// $a = json_encode($doc);

		$a=$doc;


		return Response::json(array('datas' =>  $a));
	}

	public function BusDocPerDateRange()
	{
	
		function random_color_part() {
		    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
		}

		function random_color() {
		    return random_color_part() . random_color_part() . random_color_part();
		}

		$docs = DB::table('tbldocumentdetails')
			->selectRaw('tbldocumentdetails.DocumentID, DocumentName, count(tblbusdocheader.BusRequestID) as Total')
			->leftJoin('tblbusdocheader', 'tbldocumentdetails.DocumentID', '=', 'tblbusdocheader.BusDocumentID')
			->where('DocClass', '=', 'Business Document')
			->whereBetween('DateOfRequest', array(Input::get('dateFrom'), Input::get('dateTo')))
			->groupBy('DocumentID', 'DocumentName')
			->get();



		$docCount = DB::table('tbldocumentdetails')
			->where('DocClass', '=', 'Business Document')
			->count();

		$doc = array();
		

		for($i = 0; $i < $docCount; $i++)
		{
			$kulay = "#".random_color();
			if(empty($docs[$i]))
			{
				
				$docu['value'] = 0;
				$docu['color'] = $kulay;
				$docu['highlight'] = $kulay;
				$docu['label'] = "name";
				$doc[] = $docu;
			}
			else
			{
				$docu['value'] = $docs[$i]->Total;
				$docu['color'] = $kulay;
				$docu['highlight'] = $kulay;
				$docu['label'] = $docs[$i]->DocumentName;
				$doc[] = $docu;
			}


		}

		// $a = json_encode($doc);


		return Response::json(array('datas' =>  $doc));

	}

	public function getReport2()
	{
		
		$docs = DB::table('tbldocumentdetails')
			->leftJoin('tblbusdocheader', 'tbldocumentdetails.DocumentID', '=', 'tblbusdocheader.BusDocumentID')
			->where('DocClass', '=', 'Business Document')
			->whereBetween('DateOfRequest', array(Input::get('dateFrom'), Input::get('dateTo')))
			->orderBy('tblbusdocheader.BusDocumentID')
			->get();


		$total = DB::table('tbldocumentdetails')
			->leftJoin('tblbusdocheader', 'tbldocumentdetails.DocumentID', '=', 'tblbusdocheader.BusDocumentID')
			->where('DocClass', '=', 'Business Document')
			->whereBetween('DateOfRequest', array(Input::get('dateFrom'), Input::get('dateTo')))
			->orderBy('tblbusdocheader.BusDocumentID')
			->count();


		$totalPerDoc = DB::table('tbldocumentdetails')
			->selectRaw('tbldocumentdetails.DocumentID, DocumentName, count(tblbusdocheader.BusRequestID) as Total')
			->leftJoin('tblbusdocheader', 'tbldocumentdetails.DocumentID', '=', 'tblbusdocheader.BusDocumentID')
			->where('DocClass', '=', 'Business Document')
			->whereBetween('DateOfRequest', array(Input::get('dateFrom'), Input::get('dateTo')))
			->groupBy('DocumentID', 'DocumentName')
			->get();





		$doc = DB::table('tbldocumentdetails')
			->where('DocClass', '=', 'Business Document')
			->get();

		return Response::json(array('datas' =>  $docs, 'doc' => $doc, 'total' => $total, 'totalPerDoc' => $totalPerDoc));
	}

	public function RegDocPayment()
	{
		$monthlyPayment = array();

		for($i = 1; $i <= 12; $i++)
		{
			$monthPayment = DB::table('tblpayment')
				->where('TransacName', '=', "RegularDoc")
				->whereBetween('PaymentDate', array(date('Y-'.$i.'-01 00:00:00'), date('Y-'.$i.'-t 23:59:59')))
				->selectRaw('sum(PaidAmount) as Total')
				->get();	

			$monthlyPayment[] = $monthPayment[0]->Total; 
		}

		return Response::json(array('datas' =>  $monthlyPayment));
	}

	public function getReport3()
	{
			$monthPayment = DB::table('tblpayment')
				->where('TransacName', '=', "RegularDoc")
				->whereBetween('PaymentDate', array(Input::get('dateFrom'), Input::get('dateTo')))
				->orderBy('PaymentDate')
				->get();

				$total = DB::table('tblpayment')
				->selectRaw('sum(PaidAmount) as Total')
				->where('TransacName', '=', "RegularDoc")
				->whereBetween('PaymentDate', array(Input::get('dateFrom'), Input::get('dateTo')))
				->orderBy('PaymentDate')
				->get();
				

		return Response::json(array('datas' =>  $monthPayment, 'total' => $total));
	}



	public function BusDocPayment()
	{
		$monthlyPayment = array();

		for($i = 1; $i <= 12; $i++)
		{
			$monthPayment = DB::table('tblpayment')
				->where('TransacName', '=', "BusinessDoc")
				->whereBetween('PaymentDate', array(date('Y-'.$i.'-01 00:00:00'), date('Y-'.$i.'-t 23:59:59')))
				->selectRaw('sum(PaidAmount) as Total')
				->get();	

			$monthlyPayment[] = $monthPayment[0]->Total; 
		}

		return Response::json(array('datas' =>  $monthlyPayment));
	}

	public function getReport4()
	{
			$monthPayment = DB::table('tblpayment')
				->where('TransacName', '=', "BusinessDoc")
				->whereBetween('PaymentDate', array(Input::get('dateFrom'), Input::get('dateTo')))
				->orderBy('PaymentDate')
				->get();

			$total = DB::table('tblpayment')
				->selectRaw('sum(PaidAmount) as Total')
				->where('TransacName', '=', "BusinessDoc")
				->whereBetween('PaymentDate', array(Input::get('dateFrom'), Input::get('dateTo')))
				->orderBy('PaymentDate')
				->get();

		return Response::json(array('datas' =>  $monthPayment, 'total' => $total));
	}

	public function ReservationPayment()
	{
		$monthlyPayment = array();

		for($i = 1; $i <= 12; $i++)
		{
			$monthPayment = DB::table('tblpayment')
				->where('TransacName', '=', "FacilityItem")
				->whereBetween('PaymentDate', array(date('Y-'.$i.'-01 00:00:00'), date('Y-'.$i.'-t 23:59:59')))
				->selectRaw('sum(PaidAmount) as Total')
				->get();	

			$monthlyPayment[] = $monthPayment[0]->Total; 
		}

		return Response::json(array('datas' =>  $monthlyPayment));
	}

	public function getReport5()
	{
		$monthPayment = DB::table('tblpayment')
				->where('TransacName', '=', 'FacilityItem')
				->whereBetween('PaymentDate', array(Input::get('dateFrom'), Input::get('dateTo')))
				->orderBy('PaymentDate')
				->get();

			$total = DB::table('tblpayment')
				->selectRaw('sum(PaidAmount) as Total')
				->where('TransacName', '=', 'FacilityItem')
				->whereBetween('PaymentDate', array(Input::get('dateFrom'), Input::get('dateTo')))
				->orderBy('PaymentDate')
				->get();

		return Response::json(array('datas' =>  $monthPayment, 'total' => $total));
	}

	public function ReservationItem()
	{
		function random_color_part() {
		    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
		}

		function random_color() {
		    return random_color_part() . random_color_part() . random_color_part();
		}

		$docs = DB::table('tblitemtype')
			->selectRaw('tblitemtype.ItemTypeID, ItemName, count(*) as Total')
			->leftJoin('tbltransissuedetails', 'tblitemtype.ItemTypeID', '=', 'tbltransissuedetails.ITypeID')
			->join('tbltransissueheader', 'tbltransissueheader.ItemIssueID', '=', 'tbltransissuedetails.ItemIssueID')
			->whereBetween('DateIssue', array(date('Y-m-01 00:00:00'), date('Y-m-t 23:59:59')))
			->groupBy('ItemTypeID', 'ItemName')
			->get();



		$docCount = DB::table('tblitemtype')
			->where('status', '=', 'active')
			->count();

		$doc = array();
		

		for($i = 0; $i < $docCount; $i++)
		{
			$kulay = "#".random_color();
			if(empty($docs[$i]))
			{
				
				$docu['value'] = 0;
				$docu['color'] = $kulay;
				$docu['highlight'] = $kulay;
				$docu['label'] = "name";
				$doc[] = $docu;
			}
			else
			{
				$docu['value'] = $docs[$i]->Total;
				$docu['color'] = $kulay;
				$docu['highlight'] = $kulay;
				$docu['label'] = $docs[$i]->ItemName;
				$doc[] = $docu;
			}


		}

		// $a = json_encode($doc);

		$a=$doc;


		return Response::json(array('datas' =>  $a));
	}

	public function ReserveDateItem()
	{
	
		function random_color_part() {
		    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
		}

		function random_color() {
		    return random_color_part() . random_color_part() . random_color_part();
		}

		$docs = DB::table('tblitemtype')
			->selectRaw('tblitemtype.ItemTypeID, ItemName, count(*) as Total')
			->leftJoin('tbltransissuedetails', 'tblitemtype.ItemTypeID', '=', 'tbltransissuedetails.ITypeID')
			->join('tbltransissueheader', 'tbltransissueheader.ItemIssueID', '=', 'tbltransissuedetails.ItemIssueID')
			->whereBetween('DateIssue', array(Input::get('dateFrom'), Input::get('dateTo')))
			->groupBy('ItemTypeID', 'ItemName')
			->get();



		$docCount = DB::table('tblitemtype')
			->where('status', '=', 'active')
			->count();

		$doc = array();
		

		for($i = 0; $i < $docCount; $i++)
		{
			$kulay = "#".random_color();
			if(empty($docs[$i]))
			{
				
				$docu['value'] = 0;
				$docu['color'] = $kulay;
				$docu['highlight'] = $kulay;
				$docu['label'] = "name";
				$doc[] = $docu;
			}
			else
			{
				$docu['value'] = $docs[$i]->Total;
				$docu['color'] = $kulay;
				$docu['highlight'] = $kulay;
				$docu['label'] = $docs[$i]->ItemName;
				$doc[] = $docu;
			}


		}

		// $a = json_encode($doc);

		$a=$doc;


		return Response::json(array('datas' =>  $a));

	}

	public function getReport6()
	{
		
		$docs = DB::table('tblitemtype')
			->leftJoin('tbltransissuedetails', 'tblitemtype.ItemTypeID', '=', 'tbltransissuedetails.ITypeID')
			->join('tbltransissueheader', 'tbltransissueheader.ItemIssueID', '=', 'tbltransissuedetails.ItemIssueID')
			->whereBetween('DateIssue', array(Input::get('dateFrom'), Input::get('dateTo')))
			->get();


		$total = DB::table('tblitemtype')
			->leftJoin('tbltransissuedetails', 'tblitemtype.ItemTypeID', '=', 'tbltransissuedetails.ITypeID')
			->join('tbltransissueheader', 'tbltransissueheader.ItemIssueID', '=', 'tbltransissuedetails.ItemIssueID')
			->whereBetween('DateIssue', array(Input::get('dateFrom'), Input::get('dateTo')))
			->count();



		$totalPerDoc = DB::table('tblitemtype')
			->selectRaw('tblitemtype.ItemTypeID, ItemName, count(*) as Total')
			->leftJoin('tbltransissuedetails', 'tblitemtype.ItemTypeID', '=', 'tbltransissuedetails.ITypeID')
			->join('tbltransissueheader', 'tbltransissueheader.ItemIssueID', '=', 'tbltransissuedetails.ItemIssueID')
			->whereBetween('DateIssue', array(Input::get('dateFrom'), Input::get('dateTo')))
			->groupBy('ItemTypeID', 'ItemName')
			->orderBy('ItemName')
			->get();



		$doc = DB::table('tbldocumentdetails')
			->where('DocClass', '=', 'Business Document')
			->get();

		return Response::json(array('datas' =>  $docs, 'total' => $total, 'totalPerDoc' => $totalPerDoc));
	}


	public function ReservationFacility()
	{
		function random_color_part() {
		    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
		}

		function random_color() {
		    return random_color_part() . random_color_part() . random_color_part();
		}

		$docs = DB::table('tblfacility')
			->selectRaw('tblfacility.FacilityID, FacilityName, count(*) as Total')
			->leftJoin('tbltransfacilityissuedetails', 'tblfacility.FacilityID', '=', 'tbltransfacilityissuedetails.FacilityID')
			->join('tbltransfacilityissueheader', 'tbltransfacilityissueheader.FacIssueID', '=', 'tbltransfacilityissuedetails.FacIssueID')
			->whereBetween('DateFacIssue', array(date('Y-m-01 00:00:00'), date('Y-m-t 23:59:59')))
			->groupBy('FacilityID', 'FacilityName')
			->get();



		$docCount = DB::table('tblFacility')
			->count();

		$doc = array();
		

		for($i = 0; $i < $docCount; $i++)
		{
			$kulay = "#".random_color();
			if(empty($docs[$i]))
			{
				
				$docu['value'] = 0;
				$docu['color'] = $kulay;
				$docu['highlight'] = $kulay;
				$docu['label'] = "name";
				$doc[] = $docu;
			}
			else
			{
				$docu['value'] = $docs[$i]->Total;
				$docu['color'] = $kulay;
				$docu['highlight'] = $kulay;
				$docu['label'] = $docs[$i]->FacilityName;
				$doc[] = $docu;
			}


		}

		// $a = json_encode($doc);

		$a=$doc;


		return Response::json(array('datas' =>  $a));
	}

	public function ReserveDateFacility()
	{
		function random_color_part() {
		    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
		}

		function random_color() {
		    return random_color_part() . random_color_part() . random_color_part();
		}

		$docs = DB::table('tblfacility')
			->selectRaw('tblfacility.FacilityID, FacilityName, count(*) as Total')
			->leftJoin('tbltransfacilityissuedetails', 'tblfacility.FacilityID', '=', 'tbltransfacilityissuedetails.FacilityID')
			->join('tbltransfacilityissueheader', 'tbltransfacilityissueheader.FacIssueID', '=', 'tbltransfacilityissuedetails.FacIssueID')
			->whereBetween('DateFacIssue', array(Input::get('dateFrom'), Input::get('dateTo')))
			->groupBy('FacilityID', 'FacilityName')
			->get();



		$docCount = DB::table('tblFacility')
			->count();

		$doc = array();
		

		for($i = 0; $i < $docCount; $i++)
		{
			$kulay = "#".random_color();
			if(empty($docs[$i]))
			{
				
				$docu['value'] = 0;
				$docu['color'] = $kulay;
				$docu['highlight'] = $kulay;
				$docu['label'] = "name";
				$doc[] = $docu;
			}
			else
			{
				$docu['value'] = $docs[$i]->Total;
				$docu['color'] = $kulay;
				$docu['highlight'] = $kulay;
				$docu['label'] = $docs[$i]->FacilityName;
				$doc[] = $docu;
			}


		}

		// $a = json_encode($doc);

		$a=$doc;


		return Response::json(array('datas' =>  $a));
	}

	public function getReport7()
	{
		
		$docs = DB::table('tblfacility')
			->leftJoin('tbltransfacilityissuedetails', 'tblfacility.FacilityID', '=', 'tbltransfacilityissuedetails.FacilityID')
			->join('tbltransfacilityissueheader', 'tbltransfacilityissueheader.FacIssueID', '=', 'tbltransfacilityissuedetails.FacIssueID')
			->whereBetween('DateFacIssue',array(Input::get('dateFrom'), Input::get('dateTo')))
			->get();


		$total = DB::table('tblfacility')
			->leftJoin('tbltransfacilityissuedetails', 'tblfacility.FacilityID', '=', 'tbltransfacilityissuedetails.FacilityID')
			->join('tbltransfacilityissueheader', 'tbltransfacilityissueheader.FacIssueID', '=', 'tbltransfacilityissuedetails.FacIssueID')
			->whereBetween('DateFacIssue', array(Input::get('dateFrom'), Input::get('dateTo')))
			->count();



		$totalPerDoc = DB::table('tblfacility')
			->selectRaw('tblfacility.FacilityID, FacilityName, count(*) as Total')
			->leftJoin('tbltransfacilityissuedetails', 'tblfacility.FacilityID', '=', 'tbltransfacilityissuedetails.FacilityID')
			->join('tbltransfacilityissueheader', 'tbltransfacilityissueheader.FacIssueID', '=', 'tbltransfacilityissuedetails.FacIssueID')
			->whereBetween('DateFacIssue', array(Input::get('dateFrom'), Input::get('dateTo')))
			->groupBy('FacilityID', 'FacilityName')
			->orderBy('FacilityName')
			->get();



		$doc = DB::table('tbldocumentdetails')
			->where('DocClass', '=', 'Business Document')
			->get();

		return Response::json(array('datas' =>  $docs, 'total' => $total, 'totalPerDoc' => $totalPerDoc));
	}


}