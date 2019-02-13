<?php

class TransRequestFacController extends BaseController {

	public function showRecords()
	{
		//return View::make('transFacility.facilityCalendar');
	
		$checkResident = DB::table('tblresident')
			->get();


		$facilityType = DB::table('tblfacilitytype')
			->where('status', '=', 'active')
			->get();
	
		

		return View::make('transFacility.facilityCalendar')
			
			->with('cResident', $checkResident)
			->with('rfType', $facilityType);
			
	}
	public function getResidentInfo()
	{
		
		if(Request::ajax())
		{
			$rDetails = DB::table('tblresident')
				->where('ResidentID', '=', Input::get('resID'))
				->join('tblfamily', 'tblresident.FamilyID', '=', 'tblfamily.FamilyID')
				->join('tblhouse', 'tblfamily.HouseID', '=', 'tblhouse.HouseID')
				->get();

			return Response::json(array('rD' => $rDetails));
		}
	}



	public function getFacilityTable()
	{
		
		if(Request::ajax())
		{
			$factable = DB::table('tblfacrequestdetails')
				->where('FacilityID', '=', Input::get('detail'))
				->where('ResFacilityType', '=', Input::get('type'))	
				->where('facReqStatus', '=', 'active')
				->get();

			return Response::json(array('factable' => $factable));
		}
	}


public function getFacilityDetails()
	{
		
		if(Request::ajax())
		{
			$facDetails = DB::table('tblfacilitydetails')
				->join('tblfacilitytype', 'tblfacilitydetails.FacilityTypeID', '=', 'tblfacilitytype.FacilityTypeID')
				->where('tblfacilitydetails.FacilityTypeID', '=', Input::get('factypeID'))
				->get();


			//var_dump($facDetails);

			return Response::json(array('rfD' => $facDetails));
		}
	}


public function addRecords()
	{


		if(Request::ajax())
		{

			$nonresID;
			$frDetailsID;


			$cntnon = DB:: table('tblnonresident')
				->count();

				if($cntnon == 0)
				{
					$nonresID = 1;
				}
				else
				{ 
					$addnon = DB:: table('tblnonresident')
						->orderBy('NonResidentID','desc')
						->take(1)
						->get();

					$nonresID = ($addnon[0] -> NonResidentID) + 1;

				}

				$cntreq = DB:: table('tblfacrequestdetails')
					->count();

				if($cntreq == 0)
				{
					$frDetailsID = 1;

				}
				else
				{	
					$addfrdet = DB:: table('tblfacrequestdetails')
						->orderBy('facReqDetailsID','desc')
						->take(1)
						->get();

					$frDetailsID = ($addfrdet[0] -> facReqDetailsID) + 1;

				} 

			 if(Input::get('rad')=="no")
			{
		
			
		//$res = Input::get('autosearch');
	   

				DB::table('tblfacrequestdetails')
					 ->insert( array('facReqDetailsID' =>  $frDetailsID,
					 				 'RequestorID' =>  Input::get('R'),
			 						 'RequestorTypeID' => 0,
			 						 'FacilityID' => Input:: get('F'),
			 						 'facreqPurpose' => Input::get('P'),
			  		  				 'facStartDate' => Input::get('df'),
				      				 'facStartTime'=> Input::get('tf'),
				      				 'facEndDate' => Input::get('dt'),
					 	    		 'facEndTime'=> Input::get('tt'),
					 	    		 'facDateReq' => date('Y/m/d'),
					 	    		 'ResFacilityType' => Input::get('type'),
					 	    		 'facReqStatus' => 'active',
					 	    		 'faciPaymentStatus' => 'Unpaid'
					 		 ));

				      
				$res = DB::table('tblresident')
					-> get(); 

				return Response::json(array('R'=> $res));
			}

			else {

			//	 $nName = Input::get('txtnonName');

				DB::table('tblnonresident')
					->insert(array( 'NonResidentID' =>  $nonresID,
						 			'NonResName'=> Input::get('not'),
						 			'FRAddress' => Input::get('A'),
				         			'FRMobileNo'=> Input::get('M'),
				         			'FRBday' => Input::get('B')
				         			
				        	 ));



				DB::table('tblfacrequestdetails')
			 		 ->insert( array('facReqDetailsID' =>  $frDetailsID,
			 						 'RequestorID' => $nonresID,
			 						 'RequestorTypeID' => 1,
			 						 'FacilityID' => Input:: get('F'),
			 						 'facreqPurpose' => Input:: get('P'),
			  		  				 'facStartDate' => Input::get('df'),
				      				 'facStartTime'=> Input::get('tf'),
				      				 'facEndDate' => Input::get('dt'),
					 	    		 'facEndTime'=> Input::get('tt'),
					 	    		 'facDateReq' => date('Y/m/d'),
					 	    		 'ResFacilityType' => Input::get('type'),
					 	    		 'facReqStatus' => 'active',
					 	    		 'faciPaymentStatus' => 'Unpaid'
					 		 ));


			$nonres = DB::table('tblnonresident')
					-> get(); 

			return Response::json(array('noR' => $nonres));
		

					
			}

		}

	}

	public function getAvailFaci()
	{
		$afReqDet = DB::table('tblfacrequestdetails')
			->where('ResFacilityType', '=', Input::get('fType'))
			->where('FacilityID', '=', Input::get('fDetail'))
			->get();

		// $afFaciType = DB::table('tblfacilitytype')
		// 	->get();

		// $afFaciDet = DB::table('tblfacilitydetails')
		// 	->get();"faciType" => $afFaciType, "faciDet" => $afFaciDet,
		
		// $ft = DB::table('tblfacrequestdetails')
		// 		->join('tblfacilitydetails',  'tblfacrequestdetails.FacilityID', '=', 'tblfacilitydetails.FacilityID')
		// 		->join('tblfacilitytype', 'tblfacilitydetails.FacilityTypeID', '=', 'tblfacilitytype.FacilityTypeID')
		// 		->where('tblfacilitydetails.FacilityTypeID', '=', Input::get('fType'))
		// 		->where('tblfacilitytype.FacilityID', '=', Input::get('fDetail'))
		// 		//->orderBy('tblfacilitytype.FacilityName', 'asc')
		// 		->get(); 'available'=> $ft


		return Response::json(array("reqDet" => $afReqDet));
	}

		
	public function getEachFacility()
	{

	}
	

}
	




