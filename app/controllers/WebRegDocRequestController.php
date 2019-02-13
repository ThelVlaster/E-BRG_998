<?php

class WebRegDocRequestController extends BaseController {

	public function index()
	{
		$rname = DB::table('tblresident')
			->get();

		

		$docs = DB::table('tbldocumentdetails')
				->where('DocClass', '=', "Regular Document")
				->where('DocAvail', '=', "1")
				->get();

		$reqID = DB::table('tbldocumentrequest')
			->orderBy('RequestID', 'desc')
			->take(1)
			->get();

		return View::make('website.docreq.docreq')
			->with('rName', $rname)
			->with('docs', $docs)
			->with('reqID', $reqID);
	}

	public function getDocs()
	{
		if(Input::get('docs') == "1")
		{
			$docs = DB::table('tbldocumentdetails')
				->where('DocClass', '=', "Regular Document")
				->where('DocAvail', '=', "1")
				->get();
		}
		else if(Input::get('docs') == "2")
		{
			$docs = DB::table('tbldocumentdetails')
				->where('DocClass', '=', "Regular Document")
				->where('DocAvail', '=', "2")
				->get();
		}
		return Response::json(array('docs'=>$docs));
	}

	public function onlineDocRequest()
	{
		if(Input::get('radioDoc') == "1")
		{
			$ResID = DB::table('tblresident')
				->where('FirstName', '=', Input::get('txtFReqFor'))
				->where('MidName', '=', Input::get('txtMReqFor'))
				->where('LastName', '=', Input::get('txtLReqFor'))
				->where('Gender', '=', Input::get('txtNGender'))
				->where('Birthdate', '=', Input::get('txtNBirthdate'))
				->get();

			if($ResID == null)
			{
				return Response::json(array('resID' => $ResID));
			}
			else
			{
				DB::table('tbldocumentrequest')
					->insert(array(
							'RequestID' => Input::get('txtRequestID'),
							'Requestor' => Input::get('txtRequestor'),
							'RFType' => "0",
							'RFResidentID' => $ResID[0]->ResidentID,
							'DateOfRequest' => date('Y/m/d H:i:s'),
							'Email' => Input::get('txtEmail'),
						));

				//return Response::json(array('resID' => $ResID));
			}
			
		}
		else
		{
			$NResID = DB::table('tblnonresident')
				->count();

			if($NResID == 0)
			{
				$NResID = 1;
			}
			else
			{
				$NResID = DB::table('tblnonresident')
					->orderBy('NonResidentID', 'desc')
					->take(1)
					->get();

				$NResID = $NResID[0]->NonResidentID+1;
			}

			DB::table('tblnonresident')
				->insert(array(
						'NonResidentID' => $NResID,
						'NonResName' =>Input::get('txtLReqFor').", ".Input::get('txtFReqFor')." ".Input::get('txtMReqFor'),
						'FRAddress' =>Input::get('txtAddress'),
						'FRBday' =>Input::get('txtNBirthdate'),
						'FRGender' =>Input::get('txtNGender'),
						'FRRequestType' => 'Doc'
					));

			DB::table('tbldocumentrequest')
				->insert(array(
						'RequestID' => Input::get('txtRequestID'),
						'Requestor' => Input::get('txtRequestor'),
						'RFType' => "1",
						'RFResidentID' => $NResID,
						'DateOfRequest' => date('Y/m/d H:i:s'),
						'Email' => Input::get('txtEmail'),
					));
		}

		$docCount = DB::table('tbldocumentdetails')
			->where('DocStatus', '=', 'active')
			->count();

		$docD = DB::table('tbldocumentdetails')
			->where('DocStatus', '=', 'active')
			->get();

		$i;
		for($i=0; $i < $docCount; $i++)
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

		return Response::json(array('resID' => 'done'));
	}
}
