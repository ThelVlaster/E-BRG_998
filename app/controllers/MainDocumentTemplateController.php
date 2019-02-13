<?php

class MainDocumentTemplateController extends BaseController {

	public function showRecords()
	{
		$template = DB::table('tbltemplate')
			->where('status', '=', 'active')
			->get();

		return View::make('mainDocument.doc_template')
			->with('temp', $template);
	}

	public function getInfo()
	{
		if(Request::ajax())
		{
			$template = DB::table('tbltemplate')
				->where('TemplateID', '=', Input::get('id'))
				->get();

			return Response::json(array('temp' => $template));
		}
	}

public function addRecord()
	{
				date_default_timezone_set('Asia/Manila');
		if(Request::ajax())
		{
			
				$newName = time().Input::file('txtTemplate')->getClientOriginalName();

				Input::file('txtTemplate')->move(public_path().'/bower_components/admin-lte/dist/images/', $newName);

				DB::table('tbltemplate')
					->insert(array(
							'TemplateName' => Input::get('txtTemplateName'),
							'Template' => $newName,
							'TemplateOrientation' => Input::get('txtTemplateOrientation'),
							'TemplateSize' => Input::get('txtTemplateSize'),
							'status' => 'active'

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
						'Type' => 'Document Layout',
						'NewValue' => Input::get('txtTemplateName'),
						'Date' => date('Y/m/d H:m:s')
					));

			$template = DB::table('tbltemplate')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('temp' => $template));
		}
	}

	public function updateRecord()
	{
		if(Request::ajax())
		{
			if(Input::hasFile('etxtImageChange'))
			{
				$newName = time().Input::file('etxtImageChange')->getClientOriginalName();

				Input::file('etxtImageChange')->move(public_path().'/bower_components/admin-lte/dist/images/', $newName);

				DB::table('tbltemplate')
					->where('TemplateID', '=', Input::get('etxtID'))
					->update(array(
							'TemplateName' => Input::get('etxtTemplateName'),
							'TemplateOrientation' => Input::get('etxtTemplateOrient'),
							'TemplateSize' => Input::get('etxtTemplateSize'),
							'Template' => $newName

						));
			}
			else
			{

				DB::table('tbltemplate')
					->where('TemplateID', '=', Input::get('etxtID'))
					->update(array(
							'TemplateName' => Input::get('etxtTemplateName'),
							'TemplateOrientation' => Input::get('etxtTemplateOrient'),
							'TemplateSize' => Input::get('etxtTemplateSize')
							
						));
			}

			
			
	
			$template = DB::table('tbltemplate')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('temp' => $template));
		}
	}

	public function deleteRecord()
	{

		if(Request::ajax())
		{
			DB::table('tbltemplate')
				->where('TemplateID', '=', Input::get('dtxtID'))
				->update(array(
						'status' => 'inactive'

					));

 			$fac = DB::table('tbltemplate')
				->where('TemplateID', '=', Input::get('dtxtID'))
				->get();
   			
   			Session::put('tempname', $fac[0]->TemplateName);
   			Session::put('tempID', $fac[0]->TemplateID);



   				DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Deleted',
						'Type' => 'Document Layout',
						'OldValue' => Session::get('tempname'),
						'Date' => date('Y/m/d H:m:s')
					));


			$template = DB::table('tbltemplate')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('temp' => $template));
		}
	}

}
