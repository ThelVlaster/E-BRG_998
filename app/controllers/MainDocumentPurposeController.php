<?php

class MainDocumentPurposeController extends BaseController {

	public function showRecords()
	{
		$documentPurpose = DB::table('tbldocumentpurpose')
			->where('status', '=', 'active')
			->get();

		return View::make('mainDocument.doc_purpose')
			->with('dPurpose', $documentPurpose);
	}

	public function getInfo(){
		if(Request::ajax()){
			$purpose = DB::table('tbldocumentpurpose')
				->where('DocumentPurposeID', '=', Input::get('id'))
				->get();

			return Response::json(array('purpose' => $purpose));
		}
	}

	public function addRecord(){
		if(Request::ajax()){
			DB::table('tbldocumentpurpose')
				->insert(array(
					'DocumentPurpose' => Input::get('tp')
					));

			$purpose = DB::table('tbldocumentpurpose')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('purpose' => $purpose));
		}
	}

	public function updateRecord(){
		if(Request::ajax()){
			DB::table('tbldocumentpurpose')
				->where('DocumentPurposeID', '=', Input::get('etxt1'))
				->update(array(
					'DocumentPurpose' => Input::get('etxt2')
					));
				
			$purpose = DB::table('tbldocumentpurpose')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('purpose' => $purpose));
		}
	}

	public function deleteRecord(){
		if(Request::ajax()){
			DB::table('tbldocumentpurpose')
				->where('DocumentPurposeID', '=', Input::get('dtxt1'))
				->update(array(
					'status' => 'inactive'
					));
				
			$purpose = DB::table('tbldocumentpurpose')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('purpose' => $purpose));
		}
	}

}
