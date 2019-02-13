<?php

class TransBusDocumentRequestController extends BaseController {

	public function showRecords()
	{

		if(Input::get('sort') != "")
		{

			$req = DB::table('tblbusdocheader')
				->join('tblbusinessdetails', 'tblbusinessdetails.BusinessID', '=', 'tblbusdocheader.BusinessID')
				->where('tblbusdocheader.BusDocStatus', '=', Input::get('sort'))
				->get();

			$reqdoc = DB::table('tblbusdocheader')
				->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tblbusdocheader.BusDocumentID')
				->where('tblbusdocheader.BusDocStatus', '=', Input::get('sort'))
				->get();

			$busname = DB::table('tblbusinessdetails')
				->join('tblbusdocheader', 'tblbusdocheader.BusinessID', '=', 'tblbusinessdetails.BusinessID')
				->where('tblbusdocheader.DateOfExpiration','<' ,date('Y/m/d'))
				->get();

			$docs = DB::table('tbldocumentdetails')
					->where('DocClass', '=', "Business Document")
					->get();

			$reqID = DB::table('tblbusdocheader')
				->orderBy('BusRequestID', 'desc')
				->take(1)
				->get();

			$type = DB::table('tblbusinesstype')
					->where('status', '=', "active")
					->get();

			$all = DB::table('tblbusdocheader')
				->whereNotIn('BusDocStatus', ['Claimed', 'Printed'])
				->count();

			$new = DB::table('tblbusdocheader')
				->where('BusDocStatus', '=', "New")
				->count();
			$pen = DB::table('tblbusdocheader')
				->where('BusDocStatus', '=', "Pending")
				->count();
			$app = DB::table('tblbusdocheader')
				->where('BusDocStatus', '=', "For Approval")
				->count();
			$done = DB::table('tblbusdocheader')
				->where('BusDocStatus', '=', "Done")
				->count();
			$can = DB::table('tblbusdocheader')
				->where('BusDocStatus', '=', "Cancelled")
				->count();

		
			return View::make('transDocument.busdoc_request')
				->with('info', $req)
				->with('new', $new)
				->with('all', $all)
				->with('pen', $pen)
				->with('app', $app)
				->with('done', $done)
				->with('can', $can)
				->with('docInfo', $reqdoc)
				->with('bname', $busname)
				->with('docs', $docs)
				->with('type', $type)
				->with('reqID', $reqID);
		}

		else
		{
			$req = DB::table('tblbusdocheader')
				->join('tblbusinessdetails', 'tblbusinessdetails.BusinessID', '=', 'tblbusdocheader.BusinessID')
				->get();

			$reqdoc = DB::table('tblbusdocheader')
				->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tblbusdocheader.BusDocumentID')
				->get();
			$busname = DB::table('tblbusinessdetails')
				->join('tblbusdocheader', 'tblbusdocheader.BusinessID', '=', 'tblbusinessdetails.BusinessID')
				->where('tblbusdocheader.DateOfExpiration','<' ,date('Y/m/d'))
				->get();


			$docs = DB::table('tbldocumentdetails')
					->where('DocClass', '=', "Business Document")
					->get();

			$type = DB::table('tblbusinesstype')
					->where('status', '=', "active")
					->get();

			$reqID = DB::table('tblbusdocheader')
				->orderBy('BusRequestID', 'desc')
				->take(1)
				->get();

			$all = DB::table('tblbusdocheader')
				->whereNotIn('BusDocStatus', ['Claimed', 'Printed'])
				->count();

			$new = DB::table('tblbusdocheader')
				->where('BusDocStatus', '=', "New")
				->count();
			$pen = DB::table('tblbusdocheader')
				->where('BusDocStatus', '=', "Pending")
				->count();
			$app = DB::table('tblbusdocheader')
				->where('BusDocStatus', '=', "For Approval")
				->count();
			$done = DB::table('tblbusdocheader')
				->where('BusDocStatus', '=', "Done")
				->count();
			$can = DB::table('tblbusdocheader')
				->where('BusDocStatus', '=', "Cancelled")
				->count();
				
		
			return View::make('transDocument.busdoc_request')
				->with('info', $req)
				->with('new', $new)
				->with('all', $all)
				->with('pen', $pen)
				->with('app', $app)
				->with('done', $done)
				->with('can', $can)
				->with('docInfo', $reqdoc)
				->with('bname', $busname)
				->with('docs', $docs)
				->with('type', $type)
				->with('reqID', $reqID);
		}
	}



	public function getDocRequestedForInfo()
	{
		if(Request::ajax())
		{
			$info = DB::table('tblbusinessdetails')
				->join('tblbusinesstype', 'tblbusinessdetails.BusinessTypeID', '=', 'tblbusinesstype.BusinessTypeID')
				->where('BusinessID', '=', Input::get('busID'))
				->get();

			

			return Response::json(array('info' => $info));
		}
	}


	
	public function documentRequestForm()
	{

		$bname = DB::table('tblbusinessdetails')
				->where('status', '=', 'active')
				->get();

		$type = DB::table('tblbusinesstype')
				->where('status', '=', 'active')
				->get();

		$docs = DB::table('tbldocumentdetails')
				->where('DocClass', '=', "Business Document")
				->get();

		$reqID = DB::table('tblbusdocheader')
			->orderBy('BusRequestID', 'desc')
			->take(1)
			->get();

		return View::make('transDocument.busdoc_form')
			->with('bname', $bname)
			->with('docs', $docs)
			->with('type', $type)
			->with('reqID', $reqID);

		
	}


	public function addDocumentRequest()
	{


		if(Input::get('radioBus') == "new")
		{


			DB::table('tblbusinessdetails')
				->insert(array(
						'BusinessName' => Input::get('txtNewBusName'),
						'BusinessTypeID' => Input::get('txtBusType'),
						'BusinessOwnerName' => Input::get('txtOwner'),
						'BusinessAddress' => Input::get('txtAddress'),
						'BusEmail' => Input::get('txtEmail'),
						'BusIncome' => Input::get('txtIncome'),
						'BusContactNo' => Input::get('txtMobile'),
						'status' => 'active'
					));

			$bus = DB::table('tblbusinessdetails')
					->orderBy('BusinessID', 'desc')
					->take(1)
					->get(); 

					
					DB::table('tblbusdocheader')
					->insert(array(
							'BusRequestID' => Input::get('txtRequestID'),
							'BusRequestor' => Input::get('txtRequestor'),
							'BusinessID' => $bus[0]->BusinessID,
							'DateOfRequest' => date('Y/m/d H:m:s'),
							'DateOfExpiration' => date('Y/m/d', strtotime('+1 year')),
							'BusDocumentID' => Input::get('radioDoc'),
							'BusPermitType' => Input::get('radioBus'),
							'BusDocStatus' => 'New'
						));

			
		}

		else {


					DB::table('tblbusdocheader')
							->insert(array(
									'BusRequestID' => Input::get('txtRequestID'),
									'BusRequestor' => Input::get('txtRequestor'),
									'BusinessID' => Input::get('txtRequestedFor'),
									'DateOfRequest' => date('Y/m/d H:m:s'),
									'DateOfExpiration' => date('Y/m/d', strtotime('+1 year')),
									'BusDocumentID' => Input::get('radioDoc'),
									'BusPermitType' => Input::get('radioBus'),
									'BusDocStatus' => 'New'
								));
				
		}


		//return Redirect::to('busdocumentRequest');
	}

	public function createDocumentRequest()
	{
		$template = DB::table('tbldocumentdetails')
			->where('DocumentID', '=', Input::get('varname'))
			->get();

		$information = DB::table('tblbusdocheader')
			->join('tblbusinessdetails', 'tblbusinessdetails.BusinessID', '=', 'tblbusdocheader.BusinessID')
			->join('tblbusinesstype', 'tblbusinessdetails.BusinessTypeID', '=', 'tblbusinesstype.BusinessTypeID')
			->where('tblbusdocheader.BusRequestID', '=', Input::get('ReqID'))
			->where('tblbusdocheader.BusDocumentID', '=', Input::get('varname'))
			->get();

		$forSignature = DB::table('tblofficialaccount')
			->where('Username', '=', Session::get('username'))
			->get();

		$payment =  DB::table('tblbusdocheader')
				->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tblbusdocheader.BusDocumentID')
				->join('tblbusinessdetails', 'tblbusinessdetails.BusinessID', '=', 'tblbusdocheader.BusinessID')
				->where('BusRequestID', '=', Input::get('ReqID'))
				->where('BusDocumentID', '=', Input::get('varname'))
				->get();

		return View::make('transDocument.busdoc_make')
			->with('template', $template)
			->with('reqInfo', $information)
			->with('fs', $forSignature)
			->with('payment', $payment)
			->with('IDR', Input::get('ReqID'))
			->with('IDD', Input::get('varname'));
	}

	public function saveTemplate()
	{
		if(Input::get('stat')!="Done/Unclaimed")
		{


			if(Input::get('stat') == "New")
			{
				DB::table('tblbusdocheader')
					->where('BusRequestID', '=', Input::get('idr'))
					->where('BusDocumentID', '=', Input::get('idd'))
					->update(array(
							'BusTemplate' => Input::get('doc'),
							'BusDocStatus' => "Pending"
						));
			}
			else if(Input::get('stat') == "Pending")
			{
				DB::table('tblbusdocheader')
					->where('BusRequestID', '=', Input::get('idr'))
					->where('BusDocumentID', '=', Input::get('idd'))
					->update(array(
							'BusTemplate' => Input::get('doc'),
							'BusDocStatus' => "For Approval"
						));
			}
			else if(Input::get('stat') == "For Approval")
			{
				DB::table('tblbusdocheader')
					->where('BusRequestID', '=', Input::get('idr'))
					->where('BusDocumentID', '=', Input::get('idd'))
					->update(array(
							'BusTemplate' => Input::get('doc'),
							'BusDocStatus' => "Done"
						));
			}

		}
		

		//return View('documentRequest');
	}

	public function getFinalTemplate()
	{
		if(Request::ajax()){
			$ft = DB::table('tblbusdocheader')
				->where('BusRequestID', '=', Input::get('idr'))
				->where('BusDocumentID', '=', Input::get('idd'))
				->get();


			return Response::json(array('ft' => $ft));
		}
		
	}

	public function printTemplate()
	{
		//if(Request::ajax())
		//{
			$finalTemplate = DB::table('tblbusdocheader')
				->where('BusRequestID', '=', Input::get('idr'))
				->where('BusDocumentID', '=', Input::get('idd'))
				->get();

			$orient = DB::table('tbldocumentdetails')

				->join('tbltemplate', 'tbltemplate.TemplateID', '=', 'tbldocumentdetails.DocLayout')
				->where('DocumentID', '=', Input::get('idd'))
				->get();

//			var_dump($finalTemplate[0]->TemplateFinal);
			if($orient[0]->TemplateSize == "A4" && $orient[0]->TemplateOrientation == "Portrait")
			{


				$pdf = PDF::loadHTML('<html style = "margin: 0px;"><div style = "position:relative">'.$finalTemplate[0]->BusTemplate.'</div></div></html>')->setPaper('a4', 'Portrait');
			}
			else if($orient[0]->TemplateSize == "A4" && $orient[0]->TemplateOrientation == "Landscape")
			{
				$pdf = PDF::loadHTML('<html style = "margin: 0px;"><div style = "position:relative">'.$finalTemplate[0]->BusTemplate.'</div></div></html>')->setPaper('a4', 'Landscape');
				
			}
			else if($orient[0]->TemplateSize == "Short" && $orient[0]->TemplateOrientation == "Portrait")
			{


				$pdf = PDF::loadHTML('<html style = "margin: 0px;"><div style = "position:relative">'.$finalTemplate[0]->BusTemplate.'</div></div></html>')->setPaper('letter', 'Portrait');
			}
			else if($orient[0]->TemplateSize == "Short" && $orient[0]->TemplateOrientation == "Landscape")
			{
				$pdf = PDF::loadHTML('<html style = "margin: 0px;"><div style = "position:relative">'.$finalTemplate[0]->BusTemplate.'</div></div></html>')->setPaper('letter', 'Landscape');
				
			}
			else if($orient[0]->TemplateSize == "Long" && $orient[0]->TemplateOrientation == "Portrait")
			{


				$pdf = PDF::loadHTML('<html style = "margin: 0px;"><div style = "position:relative">'.$finalTemplate[0]->BusTemplate.'</div></div></html>')->setPaper(array(0,0,612,936), 'Portrait');
			}
			else if($orient[0]->TemplateSize == "Long" && $orient[0]->TemplateOrientation == "Landscape")
			{
				$pdf = PDF::loadHTML('<html style = "margin: 0px;"><div style = "position:relative">'.$finalTemplate[0]->BusTemplate.'</div></div></html>')->setPaper(array(0,0,612,936), 'Landscape');
			}


        	return $pdf->download("Business Document.pdf");
		//}
		
	}


	public function sendBusDocStat()
	{
		$summary = DB::table('tblbusdocheader')
			->join('tblbusinessdetails', 'tblbusinessdetails.BusinessID', '=', 'tblbusdocheader.BusinessID')
			->join('tblbusinesstype', 'tblbusinesstype.BusinessTypeID', '=', 'tblbusinessdetails.BusinessTypeID')
			->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tblbusdocheader.BusDocumentID')
			->where('tblbusdocheader.BusRequestID','=', Input::get('ReqID'))
			->get();



			Mail::send('emailPDF.busDocUpdate', array('summary' => $summary), function($message) use ($summary)
			{
			    $message->to($summary[0]->BusEmail)->subject('Request Update');
			});


		return Redirect::to('claimDocs?sort=bus');

	}


	public function sendRBusDocStat()
	{
		$summary = DB::table('tblbusdocheader')
			->join('tblbusinessdetails', 'tblbusinessdetails.BusinessID', '=', 'tblbusdocheader.BusinessID')
			->join('tblbusinesstype', 'tblbusinesstype.BusinessTypeID', '=', 'tblbusinessdetails.BusinessTypeID')
			->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tblbusdocheader.BusDocumentID')
			->where('tblbusdocheader.BusRequestID','=', Input::get('ReqID'))
			->get();



			Mail::send('emailPDF.busDocUpdate', array('summary' => $summary), function($message) use ($summary)
			{
			    $message->to($summary[0]->BusEmail)->subject('Request Update');
			});


		return Redirect::to('busdocumentRequest');

	}


	public function getForCancel()
	{
		if(Request::ajax()){
			$cancel = DB::table('tblbusdocheader')
			->join('tblbusinessdetails', 'tblbusinessdetails.BusinessID', '=', 'tblbusdocheader.BusinessID')
			->join('tblbusinesstype', 'tblbusinesstype.BusinessTypeID', '=', 'tblbusinessdetails.BusinessTypeID')
			->join('tbldocumentdetails', 'tbldocumentdetails.DocumentID', '=', 'tblbusdocheader.BusDocumentID')
			->where('tblbusdocheader.BusRequestID','=', Input::get('id'))
			->get();


			return Response::json(array('cancel' => $cancel));
		}
		
	}

	public function updateCancel()
 	{

	 			DB::table('tblbusdocheader')
	 				->where('BusRequestID', '=', Input::get('sampleID'))
	 				->update (array(
	 					'BusDocStatus' =>  "Cancelled"
	 			));

	 	return Redirect::to('busdocumentRequest');
	}//updateCancel


}