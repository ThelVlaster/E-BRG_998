<?php

class TransDocumentRequestController extends BaseController {

	public function showRecords()
	{

		if(Input::get('sort') != "")
		{

			$req = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->where('tbldocumentrequest2.DocReqStatus', '=', Input::get('sort'))
				->select('tbldocumentrequest.RequestID', 'Requestor', 'RFType', 'RFResidentID', 'DateOfRequest')
				->distinct()
				->get();


			$residents = DB::table('tblresident')
				->get();

			$nonresidents = DB::table('tblnonresident')
				->get();


			$reqdoc = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tbldocumentrequest2.DocumentID')
				->where('tbldocumentrequest2.DocReqStatus', '=', Input::get('sort'))
				->where('tbldocumentrequest2.DocReqStatus', '!=', 'Unclaimed')
				->get();

			$all = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->whereNotIn('tbldocumentrequest2.DocReqStatus', ['Claimed', 'Printed'])
				->count();
			$new = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->where('tbldocumentrequest2.DocReqStatus', '=', 'New')
				->count();
			$pen = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->where('tbldocumentrequest2.DocReqStatus', '=', 'Pending')
				->count();
			$app = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->where('tbldocumentrequest2.DocReqStatus', '=', 'For Approval')
				->count();
			$done = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->where('tbldocumentrequest2.DocReqStatus', '=', 'Done')
				->count();
			$can = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->where('tbldocumentrequest2.DocReqStatus', '=', 'Cancelled')
				->count();

		
			return View::make('transDocument.doc_request')
				->with('info', $req)
				->with('new', $new)
				->with('all', $all)
				->with('pen', $pen)
				->with('app', $app)
				->with('done', $done)
				->with('can', $can)
				->with('residents', $residents)
				->with('nonresidents', $nonresidents)
				->with('docInfo', $reqdoc);
		}

		else
		{
			$req = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->whereNotIn('tbldocumentrequest2.DocReqStatus', ['Claimed', 'Printed'])
				->select('tbldocumentrequest.RequestID', 'Requestor', 'RFType', 'RFResidentID', 'DateOfRequest')
				->distinct()
				->get();

			$reqdoc = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tbldocumentrequest2.DocumentID')
				->whereNotIn('tbldocumentrequest2.DocReqStatus', ['Claimed', 'Printed'])
				->get();

			$residents = DB::table('tblresident')
				->get();

			$nonresidents = DB::table('tblnonresident')
				->get();

			$checkReqID = DB::table('tbldocumentrequest')
				->where('EmailSent', '=', 'No')
				->get();

			$checkReqIDcount = DB::table('tbldocumentrequest')
				->where('EmailSent', '=', 'No')
				->count();

			$all = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->whereNotIn('tbldocumentrequest2.DocReqStatus', ['Claimed', 'Printed'])
				->count();
			$new = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->where('tbldocumentrequest2.DocReqStatus', '=', 'New')
				->count();
			$pen = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->where('tbldocumentrequest2.DocReqStatus', '=', 'Pending')
				->count();
			$app = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->where('tbldocumentrequest2.DocReqStatus', '=', 'For Approval')
				->count();
			$done = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->where('tbldocumentrequest2.DocReqStatus', '=', 'Done')
				->count();
			$can = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->where('tbldocumentrequest2.DocReqStatus', '=', 'Cancelled')
				->count();


			$checkReqID2 = DB::table('tbldocumentrequest2')
				->get();

			$checkReqID2count = DB::table('tbldocumentrequest2')
				->count();

			for($i = 0; $i < $checkReqIDcount; $i++)
			{
				$ctr = 0;
				for($j = 0; $j < $checkReqID2count; $j++)
				{
					if($checkReqID[$i]->RequestID == $checkReqID2[$j]->RequestID)
					{
						$ctr++;
					}
				}

				$ctr2 = 0;
				for($j = 0; $j < $checkReqID2count; $j++)
				{
					if($checkReqID[$i]->RequestID == $checkReqID2[$j]->RequestID && $checkReqID2[$j]->DocReqStatus == "Done")
					{
						$ctr2++;
					}
				}

				if($ctr == $ctr2)
				{
					// $done = DB::table('tbldocumentrequest')
					// 	->join('tbldocumentrequest2', 'tbldocumentrequest.RequestID', '=', 'tbldocumentrequest.RequestID')
					// 	->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tbldocumentrequest2.DocumentID')
					// 	->where('tbldocumentrequest.EmailSent', '=', 'No')
					// 	->where('tbldocumentrequest.RequestID', '=', $checkReqID[$i]->RequestID)
					// 	->where('tbldocumentrequest2.RequestID', '=', $checkReqID[$i]->RequestID)
					// 	->where('tbldocumentrequest2.DocReqStatus', '=', 'Done/Unclaimed')
					// 	->get();

					

					// Mail::send('emailPDF.doneDocRequest', array('data' => $done), function($message) use ($done, $i)
					// {
					//     $message->to($done[$i]->Email)->subject('Document Update');
					// });

					DB::table('tbldocumentrequest')
						->where('RequestID', '=', $checkReqID[$i]->RequestID)
						->update(array(
								'EmailSent' => "Yes"
							));

				}


			}


		
			return View::make('transDocument.doc_request')
				->with('info', $req)
				->with('new', $new)
				->with('all', $all)
				->with('pen', $pen)
				->with('app', $app)
				->with('done', $done)
				->with('can', $can)
				->with('residents', $residents)
				->with('nonresidents', $nonresidents)				
				->with('docInfo', $reqdoc);
		}
	}

	public function documentRequestForm()
	{

		$rname = DB::table('tblresident')
			->where('status', '=', "active")
			->get();

		

		$docs = DB::table('tbldocumentdetails')
				->where('DocClass', '=', "Regular Document")
				->where('DocAvail', '=', "1")
				->get();

		$reqID = DB::table('tbldocumentrequest')
			->orderBy('RequestID', 'desc')
			->take(1)
			->get();

		return View::make('transDocument.docRequest_form')
			->with('rname', $rname)
			->with('docs', $docs)
			->with('reqID', $reqID);

		
	}

	public function getDocResident()
	{
		if(Request::ajax())
		{
			$docs = DB::table('tbldocumentdetails')
				->where('DocClass', '=', "Regular Document")
				->where('DocAvail', '=', "1")
				->get();

			return Response::json(array('docs' => $docs));
		}
	}

	public function getAccess()
	{
		if(Request::ajax())
		{
			$access = DB::table('tblofficialaccount')
			->where('OfficialID', '=', Input::get('id'))
			->get();

			return Response::json(array('access' => $access));
		}
	}

	public function getDocNonResident()
	{
		if(Request::ajax())
		{
			$docs = DB::table('tbldocumentdetails')
				->where('DocClass', '=', "Regular Document")
				->where('DocAvail', '=', "2")
				->get();

			return Response::json(array('docs' => $docs));
		}
	}


	public function getPaymentInfo()
	{
		if(Request::ajax()) 
		{
			$req = DB::table('tbldocumentrequest')
				->where('RequestID', '=', Input::get('idr'))
				->get();

			

			return Response::json(array('req' => $req));
		}

	}

	public function getDocRequestedForInfo()
	{
		if(Request::ajax())
		{
			$info = DB::table('tblresident')
				->join('tblfamily', 'tblfamily.FamilyID', '=', 'tblresident.FamilyID')
				->join('tblhouse', 'tblhouse.HouseID', '=', 'tblfamily.HouseID')
				->where('ResidentID', '=', Input::get('resID'))
				->get();

			

			return Response::json(array('info' => $info));
		}
	}

	
	public function addDocumentRequest()
	{
		date_default_timezone_set("Asia/Manila");

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


		if(Input::get('radioDoc') == "1") {
			DB::table('tbldocumentrequest')
				->insert(array(
						'RequestID' => Input::get('txtRequestID'),
						'Requestor' => Input::get('txtRequestor'),
						'RFType' => "0",
						'RFResidentID' => Input::get('txtRequestedFor'),
						'DateOfRequest' => date('Y/m/d H:i:s'),
						'Email' => Input::get('txtEmail')
					));
			}

		else {
			DB::table('tblnonresident')
				->insert(array(
						'NonResidentID' => $NonResID,
						'NonResName' => Input::get('txtNRequestedFor'),
						'FRAddress' => Input::get('txtAddress'),
						'FRBday' => Input::get('txtNBirthdate'),
						'FRGender' => Input::get('txtNGender'),
						'FRRequestType' => "Doc"
					));

			DB::table('tbldocumentrequest')
				->insert(array(
						'RequestID' => Input::get('txtRequestID'),
						'Requestor' => Input::get('txtRequestor'),
						'RFType' => "1",
						'RFResidentID' => $NonResID,
						'DateOfRequest' => date('Y/m/d H:i:s'),
						'Email' => Input::get('txtEmail')
					));
		}


		$docCount = DB::table('tbldocumentdetails')
			->where('DocStatus', '=', 'active')
			->count();

		$docD = DB::table('tbldocumentdetails')
				->where('DocStatus', '=', 'active')
				->get();

		$i;
		for($i=0; $i<$docCount;$i++)
		{
			if(Input::get('checkDoc_'.$docD[$i]->DocumentID))
			{
				DB::table('tbldocumentrequest2')
					->insert(array(
							'RequestID' => Input::get('txtRequestID'),
							'DocumentID' => $docD[$i]->DocumentID,
							'DocReqPurpose' => Input::get('purpose_'.$docD[$i]->DocumentID),
							'DocReqStatus' => 'New'
						));
			}
		}


		//return Redirect::to('documentRequest');
	}

	public function docSummary()
	{
		$summary = DB::table('tbldocumentrequest')
			->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
			->join('tblresident', 'tblresident.ResidentID', '=', 'tbldocumentrequest.RFResidentID')
			->join('tbldocumentdetails', 'tbldocumentrequest2.DocumentID', '=', 'tbldocumentdetails.DocumentID')
			->where('tbldocumentrequest.RequestID','=', Input::get('ReqID'))
			->get();

		$pdf = PDF::loadView('emailPDF.docSummary', array('summary' =>$summary));
        return $pdf->download("Summary.pdf");
	}

	public function sendDocStat()
	{
		if(Input::get('reqType') == 0)
		{
			$summary = DB::table('tbldocumentrequest')
			->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
			->join('tblresident', 'tblresident.ResidentID', '=', 'tbldocumentrequest.RFResidentID')
			->join('tbldocumentdetails', 'tbldocumentrequest2.DocumentID', '=', 'tbldocumentdetails.DocumentID')
			->where('tbldocumentrequest.RequestID','=', Input::get('ReqID'))
			->get();

			$name = $summary[0]->LastName.", ".$summary[0]->FirstName." ".$summary[0]->MidName;
		}
		else
		{
			$summary = DB::table('tbldocumentrequest')
			->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
			->join('tblnonresident', 'tblnonresident.NonResidentID', '=', 'tbldocumentrequest.RFResidentID')
			->join('tbldocumentdetails', 'tbldocumentrequest2.DocumentID', '=', 'tbldocumentdetails.DocumentID')
			->where('tbldocumentrequest.RequestID','=', Input::get('ReqID'))
			->get();

			$name = $summary[0]->NonResName;
		}
		


		Mail::send('emailPDF.doneDocRequest', array('summary' => $summary, 'name' => $name), function($message) use ($summary)
			{
			    $message->to($summary[0]->Email)->subject('Request Update');
			});

			//var_dump($name);


		return Redirect::to('claimDocs?sort=reg');


	}


	public function sendRDocStat()
	{
		if(Input::get('reqType') == 0)
		{
			$summary = DB::table('tbldocumentrequest')
			->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
			->join('tblresident', 'tblresident.ResidentID', '=', 'tbldocumentrequest.RFResidentID')
			->join('tbldocumentdetails', 'tbldocumentrequest2.DocumentID', '=', 'tbldocumentdetails.DocumentID')
			->where('tbldocumentrequest.RequestID','=', Input::get('ReqID'))
			->get();

			$name = $summary[0]->LastName.", ".$summary[0]->FirstName." ".$summary[0]->MidName;
		}
		else
		{
			$summary = DB::table('tbldocumentrequest')
			->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
			->join('tblnonresident', 'tblnonresident.NonResidentID', '=', 'tbldocumentrequest.RFResidentID')
			->join('tbldocumentdetails', 'tbldocumentrequest2.DocumentID', '=', 'tbldocumentdetails.DocumentID')
			->where('tbldocumentrequest.RequestID','=', Input::get('ReqID'))
			->get();

			$name = $summary[0]->NonResName;
		}
		


		Mail::send('emailPDF.doneDocRequest', array('summary' => $summary, 'name' => $name), function($message) use ($summary)
			{
			    $message->to($summary[0]->Email)->subject('Request Update');
			});

			//var_dump($name);


		return Redirect::to('documentRequest');


	}

	

	public function createDocumentRequest()
	{
		$template = DB::table('tbldocumentdetails')
			->where('DocumentID', '=', Input::get('varname'))
			->get();

		$req = DB::table('tbldocumentrequest2')
				->join('tbldocumentrequest', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->where('tbldocumentrequest2.RequestID', '=', Input::get('ReqID'))
				->where('tbldocumentrequest2.DocumentID', '=', Input::get('varname'))
				->get();


		$res = DB::table('tbldocumentrequest')
			->join('tblresident', 'tblresident.ResidentID', '=', 'tbldocumentrequest.RFResidentID')
			->join('tblfamily', 'tblfamily.FamilyID', '=', 'tblresident.FamilyID')
			->join('tblhouse', 'tblhouse.HouseID', '=', 'tblfamily.HouseID')
			->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
			->where('tbldocumentrequest.RequestID', '=', Input::get('ReqID'))
			->get();

		$nonres = DB::table('tbldocumentrequest')
			->join('tblnonresident', 'tblnonresident.NonResidentID', '=', 'tbldocumentrequest.RFResidentID')
			->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
			->where('tbldocumentrequest.RequestID', '=', Input::get('ReqID'))
			->get();

		$forSignature = DB::table('tblofficialaccount')
			->where('Username', '=', Session::get('username'))
			->get();

		$payment = DB::table('tbldocumentrequest')
				->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->join('tbldocumentdetails', 'tbldocumentrequest2.DocumentID', '=', 'tbldocumentdetails.DocumentID')
				->where('tbldocumentrequest.RequestID', '=', Input::get('ReqID'))
				->where('tbldocumentrequest2.DocumentID', '=', Input::get('varname'))
				->get();

		return View::make('transDocument.doc_make')
			->with('template', $template)
			->with('req', $req)
			->with('ri', $res)
			->with('nri', $nonres)
			->with('fs', $forSignature)
			->with('payment', $payment)
			->with('IDR', Input::get('ReqID'))
			->with('IDD', Input::get('varname'));
	}

	public function saveTemplate()
	{


			if(Input::get('stat') == "New")
			{
				DB::table('tbldocumentrequest2')
					->where('RequestID', '=', Input::get('idr'))
					->where('DocumentID', '=', Input::get('idd'))
					->update(array(
							'TemplateFinal' => Input::get('doc'),
							'DocReqStatus' => "Pending"
						));
			}
			else if(Input::get('stat') == "Pending")
			{
				DB::table('tbldocumentrequest2')
					->where('RequestID', '=', Input::get('idr'))
					->where('DocumentID', '=', Input::get('idd'))
					->update(array(
							'TemplateFinal' => Input::get('doc'),
							'DocReqStatus' => "For Approval"
						));
			}
			else if(Input::get('stat') == "For Approval")
			{
				DB::table('tbldocumentrequest2')
					->where('RequestID', '=', Input::get('idr'))
					->where('DocumentID', '=', Input::get('idd'))
					->update(array(
							'TemplateFinal' => Input::get('doc'),
							'DocReqStatus' => "Done"
						));
			}


		// else if(Input::get('stat')=="Done")
		// {
		// 	DB::table('tbldocumentrequest2')
		// 		->where('RequestID', '=', Input::get('idr'))
		// 		->where('DocumentID', '=', Input::get('idd'))
		// 		->update(array(
		// 				'DocReqStatus' => "For Claiming"
		// 			));

		// }

		//return View('documentRequest');
	}

	public function getFinalTemplate()
	{
		if(Request::ajax()){
			$ft = DB::table('tbldocumentrequest2')
				->where('RequestID', '=', Input::get('idr'))
				->where('DocumentID', '=', Input::get('idd'))
				->get();


			return Response::json(array('ft' => $ft));
		}
		
	}

	public function getForCancel()
	{
		if(Request::ajax()){
			$cancel = DB::table('tbldocumentrequest2')
				->join('tbldocumentdetails', 'tbldocumentrequest2.DocumentID', '=', 'tbldocumentdetails.DocumentID')
				->join('tbldocumentrequest', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
				->where('tbldocumentrequest2.RequestID', '=', Input::get('id'))
				->get();


			return Response::json(array('cancel' => $cancel));
		}
		
	}

	public function updateCancel()
 	{

 
 		$ctr= DB::table('tbldocumentdetails')
 			->where('DocStatus', '=', 'active')
 			->count();


 		$ctr_get= DB::table('tbldocumentdetails')
 			->where('DocStatus', '=', 'active')
 			->get();

 		$i;
	 	for ($i= 0;$i<$ctr; $i++) {

	 		if (Input::get('checkbox_'.$ctr_get[$i] -> DocumentID))
	 		{
	 			DB::table('tbldocumentrequest2')
	 				->where('DocumentID', '=', $ctr_get[$i] -> DocumentID)
	 				->where('RequestID', '=', Input::get('sampleID'))
	 				->update (array(
	 					'DocReqStatus' =>  "Cancelled"
	 			));
	 		}
	 	}
	 	return Redirect::to('documentRequest');
	}//updateCancel


	public function printTemplate()
	{
		//if(Request::ajax())
		//{
			

			$finalTemplate = DB::table('tbldocumentrequest2')
				->where('RequestID', '=', Input::get('idr'))
				->where('DocumentID', '=', Input::get('idd'))
				->get();

			$orient = DB::table('tbldocumentdetails')
				->join('tbltemplate', 'tbltemplate.TemplateID', '=', 'tbldocumentdetails.DocLayout')
				->where('DocumentID', '=', Input::get('idd'))
				->get();

			//var_dump($finalTemplate[0]->TemplateFinal);
			if($orient[0]->TemplateSize == "A4" && $orient[0]->TemplateOrientation == "Portrait")
			{


				$pdf = PDF::loadHTML('<html style = "margin: 0px;"><div style = "position:relative">'.$finalTemplate[0]->TemplateFinal.'</div></div></html>')->setPaper('a4', 'Portrait');
			}
			else if($orient[0]->TemplateSize == "A4" && $orient[0]->TemplateOrientation == "Landscape")
			{
				$pdf = PDF::loadHTML('<html style = "margin: 0px;"><div style = "position:relative">'.$finalTemplate[0]->TemplateFinal.'</div></div></html>')->setPaper('a4', 'Landscape');
				
			}
			else if($orient[0]->TemplateSize == "Short" && $orient[0]->TemplateOrientation == "Portrait")
			{


				$pdf = PDF::loadHTML('<html style = "margin: 0px;"><div style = "position:relative">'.$finalTemplate[0]->TemplateFinal.'</div></div></html>')->setPaper('letter', 'Portrait');
			}
			else if($orient[0]->TemplateSize == "Short" && $orient[0]->TemplateOrientation == "Landscape")
			{
				$pdf = PDF::loadHTML('<html style = "margin: 0px;"><div style = "position:relative">'.$finalTemplate[0]->TemplateFinal.'</div></div></html>')->setPaper('letter', 'Landscape');
				
			}
			else if($orient[0]->TemplateSize == "Long" && $orient[0]->TemplateOrientation == "Portrait")
			{


				$pdf = PDF::loadHTML('<html style = "margin: 0px;"><div style = "position:relative">'.$finalTemplate[0]->TemplateFinal.'</div></div></html>')->setPaper(array(0,0,612,936), 'Portrait');
			}
			else if($orient[0]->TemplateSize == "Long" && $orient[0]->TemplateOrientation == "Landscape")
			{
				$pdf = PDF::loadHTML('<html style = "margin: 0px;"><div style = "position:relative">'.$finalTemplate[0]->TemplateFinal.'</div></div></html>')->setPaper(array(0,0,612,936), 'Landscape');
			}

			// $pdf = PDF::loadHTML('<html style = "margin: 0px; 0px; 0px; 0px;"><div style = "position:relative">
                
   //                <div id="forBG" style="position: inherit; left: 0px; top: 0px; right: 0px; height: 793px; width: 1055px; border: 1px solid black">

   //                <img src = "" width="100%" height = "100%">
                  	
                    
   //                  <div id="forTextArea" style="text-align: left; position: absolute; left: 340px; top: 160px; right: 20px; bottom: 70px;"><blockquote style="margin: 0px 0px 0px 40px; border: none; padding: 0px;"><blockquote style="margin: 0px 0px 0px 40px; border: none; padding: 0px;"><blockquote style="margin: 0px 0px 0px 40px; border: none; padding: 0px;"><blockquote style="margin: 0px 0px 0px 40px; border: none; padding: 0px;"><blockquote style="margin: 0px 0px 0px 40px; border: none; padding: 0px;"><h1>Barangay Certificate</h1></blockquote></blockquote></blockquote></blockquote></blockquote><br><h1><b></b></h1><div>To whom it may concern:<br><br>This certify that <u>______________________</u>, of legal age, is a bonafide resident of this barangay with postal address at <u>______________________</u> Old Sta. Mesa, Manila.<br><br>He/She presently do not have any pending case of any kind in our barangay records.<br><br>This certification is being used upon the request of<u>______________________</u>for <u>______________________</u> purpose only.<br><br>Issued <u>______________________</u>  day of<u>______________________</u>, year<u>______________________</u> at Barangay 599, Zone 59, District VI City of Manila.<br><br><br>Certified by:<br><br><br><br><br>Barangay Captain<br></div><div id="Kagawadsign" class="ui-draggable ui-draggable-handle" style="position: relative; width: 757px; right: auto; height: 56px; bottom: auto; left: -9px; top: -52px;"><img src="http://localhost/BREMS%20072316/public/bower_components/admin-lte/dist/images/pau.png" width="20%"></div><div id="Secretarysign" class="ui-draggable ui-draggable-handle" style="position: relative; width: 757px; right: auto; height: 98px; bottom: auto; left: 153px; top: -137px;"><img src="http://localhost/BREMS%20072316/public/bower_components/admin-lte/dist/images/5.png" width="20%"></div><div id="Chairmansign" class="ui-draggable ui-draggable-handle" style="position: relative; width: 757px; right: auto; height: 60px; bottom: auto; left: 236px; top: -378px;"><img src="http://localhost/BREMS%20072316/public/bower_components/admin-lte/dist/images/4.png" width="20%"></div></div>
   //                </div>


                
   //              </div></div></html>')->setPaper('letter', 'Landscape');
			

        	return $pdf->download("Document.pdf");
		//}
		
	}


	//CLAIM DOCUMENTS!!
		public function showClaim()
			{

				if(Input::get('sort') == "reg")
				{

					$req = DB::table('tbldocumentrequest')
					->leftJoin('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
					->leftJoin('tblofficialdetails', 'tblofficialdetails.OfficialID', '=', 'tbldocumentrequest2.Releasedby')
					->leftJoin('tblresident', 'tblofficialdetails.ResidentID', '=', 'tblresident.ResidentID')
					->where('tbldocumentrequest2.DocReqStatus', '=', 'Done')
					->orWhere('tbldocumentrequest2.DocReqStatus', '=', 'Printed')
					->orWhere('tbldocumentrequest2.DocReqStatus', '=', 'Claimed')
					->select('tbldocumentrequest.RequestID', 'Requestor', 'RFType', 'RFResidentID', 'DateOfRequest', 'FirstName', 'LastName', 'DocReqStatus')
					->distinct()
					->get();

					$reqdoc = DB::table('tbldocumentrequest')
						->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
						->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tbldocumentrequest2.DocumentID')
						->where('tbldocumentrequest2.DocReqStatus', '=', 'Done')
						->orWhere('tbldocumentrequest2.DocReqStatus', '=', 'Printed')
						->orWhere('tbldocumentrequest2.DocReqStatus', '=', 'Claimed')
						->get();

					$residents = DB::table('tblresident')
						->get();

					$nonresidents = DB::table('tblnonresident')
						->get();

					$sort = Input::get('sort');

					$claim = DB::table('tbldocumentrequest2')
						->select('RequestID', 'DateClaimed', 'Claimedby', 'Releasedby')
						->where('tbldocumentrequest2.DocReqStatus', '=', 'Done')
						->orWhere('tbldocumentrequest2.DocReqStatus', '=', 'Printed')
						->orWhere('tbldocumentrequest2.DocReqStatus', '=', 'Claimed')
						->distinct()
						->get();



					return View::make('transDocument.claim_doc')
							->with('info', $req)
							->with('residents', $residents)
							->with('nonresidents', $nonresidents)
							->with('sort', $sort)
							->with('docInfo', $reqdoc)
							->with('claim', $claim);
				}//sort=reg

				else if(Input::get('sort') == "bus") {

					$req = DB::table('tblbusdocheader')
						->join('tblbusinessdetails', 'tblbusinessdetails.BusinessID', '=', 'tblbusdocheader.BusinessID')
						->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tblbusdocheader.BusDocumentID')
						->leftJoin('tblofficialdetails', 'tblofficialdetails.OfficialID', '=', 'tblbusdocheader.Releasedby')
						->leftJoin('tblresident', 'tblofficialdetails.ResidentID', '=', 'tblresident.ResidentID')
						->where('tblbusdocheader.BusDocStatus', '=', 'Done')
						->orWhere('tblbusdocheader.BusDocStatus', '=', 'Printed')
						->orWhere('tblbusdocheader.BusDocStatus', '=', 'Claimed')

						->get();

					$sort = Input::get('sort');

					return View::make('transDocument.claim_doc')
							->with('sort', $sort)
							->with('info', $req);
				}//bus
			}//function


			public function getForClaim()
			{
			if(Request::ajax()){
				if(Input::get('docType')=='Bus'){
				$claim = DB::table('tblbusdocheader')
					->join('tbldocumentdetails', 'tblbusdocheader.BusDocumentID', '=', 'tbldocumentdetails.DocumentID')
					->join('tblbusinessdetails', 'tblbusdocheader.BusinessID', '=', 'tblbusinessdetails.BusinessID')
					->where('tblbusdocheader.BusRequestID', '=', Input::get('id'))
					->where('tblbusdocheader.BusDocStatus', '=', 'Printed')
					->get();
				}
				else
				{
					$claim = DB::table('tbldocumentrequest2')
					->join('tbldocumentdetails', 'tbldocumentrequest2.DocumentID', '=', 'tbldocumentdetails.DocumentID')
					->join('tbldocumentrequest', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
					->where('tbldocumentrequest2.RequestID', '=', Input::get('id'))
					->where('tbldocumentrequest2.DocReqStatus', '=', 'Printed')
					->get();
				}


				return Response::json(array('claim' => $claim));
				}
			
			}

			public function getView()
			{
			if(Request::ajax()){
				$view = DB::table('tbldocumentrequest2')
					->join('tbldocumentdetails', 'tbldocumentrequest2.DocumentID', '=', 'tbldocumentdetails.DocumentID')
					->join('tbldocumentrequest', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
					->where('tbldocumentrequest2.RequestID', '=', Input::get('reqid'))
					->where('tbldocumentrequest2.DocumentID', '=', Input::get('docid'))
					->get();


				return Response::json(array('view' => $view));
				}
			
			}


			public function getAdPrint()
			{
			if(Request::ajax()){

					if(Input::get('docType') == 'Reg')
					{
						$print = DB::table('tbldocumentrequest2')
							->join('tbldocumentdetails', 'tbldocumentrequest2.DocumentID', '=', 'tbldocumentdetails.DocumentID')
							->join('tbldocumentrequest', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
							->where('tbldocumentrequest2.RequestID', '=', Input::get('id'))
							->Where('tbldocumentrequest2.DocReqStatus', '=', 'Claimed')

							->get();
					}
					else
					{
						$print = DB::table('tblbusdocheader')
							->join('tbldocumentdetails', 'tblbusdocheader.BusDocumentID', '=', 'tbldocumentdetails.DocumentID')
							->join('tblbusinessdetails', 'tblbusdocheader.BusinessID', '=', 'tblbusinessdetails.BusinessID')
							->where('tblbusdocheader.BusRequestID', '=', Input::get('id'))
							->Where('tblbusdocheader.BusDocStatus', '=', 'Claimed')

							->get();
					}
				return Response::json(array('print' => $print));
				}
			
			}


	//PAYMENT OF DOCUMENTS!!!
			public function paymentDoc()
			{	

					$regdoc = DB::table('tbldocumentrequest')
						->get();

					$residents = DB::table('tblresident')
						->get();

					$nonresidents = DB::table('tblnonresident')
						->get();


					return View::make('transDocument.payment_doc')
						//->with('business',$busdoc)
						->with('regular', $regdoc)
						->with('resident', $residents)
						->with('nonres', $nonresidents);

				
			}//function

			public function getReg()
			{
			if(Request::ajax()){
				$regDoc = DB::table('tbldocumentrequest')
						->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
						->get();


				return Response::json(array('regDoc' => $regDoc));
				}
			
			}

			public function getBus()
			{
			if(Request::ajax()){
				$busDoc = DB::table('tblbusdocheader')
						->get();


				return Response::json(array('busDoc' => $busDoc));
				}
			
			}

			public function getRegInfo()
			{
			if(Request::ajax()){
				$pay = DB::table('tbldocumentrequest')
					->join('tbldocumentrequest2', 'tbldocumentrequest2.RequestID', '=', 'tbldocumentrequest.RequestID')
					->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tbldocumentrequest2.DocumentID')
					->where('tbldocumentrequest.RequestID', '=', Input::get('id'))
					->get();


				return Response::json(array('pay' => $pay));
				}
			
			}

			public function getBusInfo()
			{
			if(Request::ajax()){
				$pay = DB::table('tblbusdocheader')	
						->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tblbusdocheader.BusDocumentID')
						->join('tblbusinessdetails', 'tblbusinessdetails.BusinessID', '=', 'tblbusdocheader.BusinessID')
						->where('BusRequestID', '=', Input::get('id'))
						->get();


				return Response::json(array('pay' => $pay));
				}
			
			}

			

}