<?php

class MainDocumentDetailsController extends BaseController {

	public function showRecords()
	{
		$documentDetails = DB::table('tbldocumentdetails')
			->where('DocStatus', '=', 'active')
			->get();

		$temp = DB::table('tbltemplate')
			->where('status', '=', 'active')
			->get();

		return View::make('mainDocument.doc_detail')
			->with('dDetails', $documentDetails)
			->with('template', $temp);
	}

	public function classification()
	{
		$doc = DB::table('tbldocumentdetails')
			->where('DocStatus', '=', 'active')
			->get();

		return Response::json(array('drop' => $doc));
	}

	public function addRecord()
	{
		date_default_timezone_set('Asia/Manila');
		
		if(Request::ajax())
		{

			//$newName = time().Input::file('fileTemplate')->getClientOriginalName();

			//Input::file('fileTemplate')->move(public_path().'/bower_components/admin-lte/dist/images/', $newName);


			$class;
			if(Input::get('txtClass') == "1")
			{
				$class = "Regular Document";
			}
			else
			{
				$class = "Business Document";
			}


			DB::table('tbldocumentdetails')
				->insert(array(
						'DocumentName' => Input::get('txtDocName'),
						'DocumentFee' => Input::get('txtFee'),
						'DuplicateFee' => Input::get('txtDFee'),
						'DocumentTemplate' => Input::get('txtTemplate'),
						'DocTemplate' => Input::get('txtDocTemplate'),
						'DocAvail' => Input::get('txtAvail'),
						'DocLayout' => Input::get('txtLayout'),
						'DocClass' => $class,
						'DocOrientation' => Input::get('orientation')

					));

			$loginInfo = DB::table('tblofficialaccount')
				->join('tblofficialdetails', 'tblofficialdetails.OfficialID', '=', 'tblofficialaccount.OfficialID')
				->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
				->join('tblresident', 'tblofficialdetails.ResidentID', '=', 'tblresident.ResidentID')
				->join('tblfamily', 'tblfamily.FamilyID', '=', 'tblresident.FamilyID')
				->join('tblhouse', 'tblhouse.HouseID', '=', 'tblfamily.HouseID')
				->where('tblofficialaccount.Username', '=', Session::get('username'))
				->where('tblofficialaccount.Password', '=', Session::get('password'))
				->where('tblofficialaccount.OfficialID', '=', Session::get('ID'))
				->get();

			Session::put('username', $loginInfo[0]->Username);
			Session::put('password', $loginInfo[0]->Password);
			Session::put('ID', $loginInfo[0]->OfficialID);



				DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Inserted',
						'Type' => 'Document Template',
						'NewValue' => Input::get('txtDocName'),
						'Date' => date('Y/m/d H:m:s')
					));

			$documentDetails = DB::table('tbldocumentdetails')
				->where('DocStatus', '=', 'active')
				->get();

			return Response::json(array('oDetails' => $documentDetails));
		}

	}

	public function updateRecord()
	{

		if(Request::ajax())
		{
			$class;
			if(Input::get('txtClass') == "1")
			{
				$class = "Regular Document";
			}
			else
			{
				$class = "Business Document";
			}


				DB::table('tbldocumentdetails')
					->where('DocumentID', '=', Input::get('txtID'))
					->update(array(
							'DocumentName' => Input::get('txtDocName'),
							'DocumentFee' => Input::get('txtFee'),
							'DuplicateFee' => Input::get('txtDFee'),
							'DocumentTemplate' => Input::get('txtTemplate'),
							'DocAvail' => Input::get('txtAvail'),
							'DocLayout' => Input::get('txtLayout'),
							'DocClass' =>$class
							//'DocOrientation' => Input::get('orientation')
						));

			$documentDetails = DB::table('tbldocumentdetails')
				->where('DocStatus', '=', 'active')
				->get();

			return Response::json(array('oDetails' => $documentDetails));
			
		}
	}


	public function deleteRecord()
	{

		if(Request::ajax())
		{
			
				DB::table('tbldocumentdetails')
					->where('DocumentID', '=', Input::get('dtxt1'))
					->update(array(
							'DocStatus' => 'inactive'
						));

 			 $fac = DB::table('tbldocumentdetails')
				->where('DocumentID', '=', Input::get('dtxt1'))
				->get();
   			
   			Session::put('docName', $fac[0]->DocumentName);
   			Session::put('docID', $fac[0]->DocumentID);



   				DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Deleted',
						'Type' => 'Document Template',
						'OldValue' => Session::get('docName'),
						'Date' => date('Y/m/d H:m:s')
					));

			
			$documentDetails = DB::table('tbldocumentdetails')
				->where('DocStatus', '=', 'active')
				->get();

			return Response::json(array('oDetails' => $documentDetails));
			
		}
	}

	public function getInfo()
	{
		if(Request::ajax())
		{
			$dDetails = DB::table('tbldocumentdetails')
				->join('tbltemplate', 'tbltemplate.TemplateID', '=', 'tbldocumentdetails.DocLayout')
				->where('tbldocumentdetails.DocumentID', '=', Input::get('id'))
				->get();

			
			return Response::json(array('dDetails' => $dDetails));
		}
	}

	public function getBG()
	{
		if(Request::ajax())
		{
			$BG = DB::table('tbltemplate')
				->where('TemplateID', '=', Input::get('id'))
				->get();

			return Response::json(array('BG' => $BG));
		}
	}

	public function template()
	{
		$temp = DB::table('tbldocumentdetails')
			->where('DocumentID', '=', Input::get('varname'))
			->get();

		return View::make('mainDocument.doc_template')
			->with('temp', $temp);
	}



	public function getContent()
	{
		if(Request::ajax())
		{
			$sample = DB::table('tbldocumentdetails')
				->where('DocumentID', '=', Input::get('varname'))
				->get();


			return Response::json(array('sample' => $sample));
		}
		
	}

	public function addTemplate()
	{
		DB::table('tbldocumentdetails')
			->where('DocumentID', '=', '1')
			->update(array(
					'DocTemplate' => Input::get('Template')
				));

		var_dump(Input::get('Template'));
	}

}
