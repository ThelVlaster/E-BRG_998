<?php

class WebBusDocRequestController extends BaseController {

	public function index()
	{
		

		

			

			$busname = DB::table('tblbusinessdetails')
				->where('status', '=', 'active')
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
		
			return View::make('website.busdocs.busdocs')
				->with('bname', $busname)
				->with('docs', $docs)
				->with('type', $type)
				->with('reqID', $reqID);
	

		
	}


	public function onlineBusRequest()
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
							'DateOfRequest' => date('Y/m/d H:i:s'),
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
									'DateOfRequest' => date('Y/m/d H:i:s'),
									'DateOfExpiration' => date('Y/m/d', strtotime('+1 year')),
									'BusDocumentID' => Input::get('radioDoc'),
									'BusPermitType' => Input::get('radioBus'),
									'BusDocStatus' => 'New'
								));
				
		}


		//return Redirect::to('busdocumentRequest');
	}
}
