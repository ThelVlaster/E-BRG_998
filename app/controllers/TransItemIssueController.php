<?php

class TransItemIssueController extends BaseController {

	public function itemIssueForm()
	{
		if (Input::get('RequestorType')==0)
		{
			$reserve = DB::table('tbltransreservation')
				->join('tblresident', 'tblresident.ResidentID', '=', 'tbltransreservation.RequestorID')
				->where('tbltransreservation.ReservationID', '=', Input::get('reserveid'))
				->where('tbltransreservation.DateReserveFrom', '=', Input::get('DateFrom'))
				->where('tbltransreservation.DateReserveTo', '=', Input::get('DateTo'))
				->where('tbltransreservation.TimeReserveTo', '=', Input::get('TimeTo'))
				->where('tbltransreservation.TimeReserveFrom', '=', Input::get('TimeFrom'))
				->get();
		}
		else if (Input::get('RequestorType')==1)
		{
				$reserve = DB::table('tbltransreservation')
				->join('tblnonresident', 'tblnonresident.NonResidentID', '=', 'tbltransreservation.RequestorID')
				->where('tbltransreservation.ReservationID', '=', Input::get('reserveid'))
				->where('tbltransreservation.DateReserveFrom', '=', Input::get('DateFrom'))
				->where('tbltransreservation.DateReserveTo', '=', Input::get('DateTo'))
				->where('tbltransreservation.TimeReserveTo', '=', Input::get('TimeTo'))
				->where('tbltransreservation.TimeReserveFrom', '=', Input::get('TimeFrom'))
				->get();
		}

		return View::Make('transItem.item_issue')
			->with("reserve", $reserve);
	}

	public function getReserveInfo()
	{
		if(Request::ajax())
		{
			$header= DB::table('tbltransreservation')
				->where('ReserveStatus', '=', 'Approved')
				->where('PaymentStatus', '=', 'Paid')
				->join('tblresident', 'tblresident.ResidentID', '=', 'tbltransreservation.RequestorID')
				->join('tblnonresident', 'tblnonresident.NonResidentID', '=', 'tbltransreservation.RequestorID')
				->get();
			
			return Response::json(array('header'=> $header));
		}

	}
	public function getReserveDetailInfo()
	{
		if(Request::ajax())
		{
			$itemtype= DB::table('tbltransitemtype')
				->where('ReservationID', '=', Input::get('reserveID'))
				->join('tblitemtype', 'tbltransitemtype.ItemTypeID', '=', 'tblitemtype.ItemTypeID')
				->get();

			$ItemInventory= DB::table('tblitemdetails')
						->where('ItemStatus','=','Good')
		 				->where('ReserveStatus','=','Available')
		 				->orderBy('tblitemdetails.ItemTypeID', 'asc')
		 				->orderBy('tblitemdetails.ItemID', 'asc')
		 				->get();

			$itemName=DB::table('tblitemtype')
		 				//->orderBy('tblitemtype.ItemTypeID', 'asc')
		 				->get();

			if ($itemtype==null)
			
			{
				$Itemctr=1;
			}
			else
			{
				$Itemctr=0;
			}
		 				
		return Response::json(array('Itemctr'=>$Itemctr, 'itemtype'=>$itemtype,'inventory'=> $ItemInventory, 'itemname'=>$itemName));
		}
	}


 	public function getIssueItems()
 	{ 
 		if (Request::ajax())
 		{
 			$itemtype= DB::table('tbltransitemtype')
				->where('ReservationID', '=', Input::get('reserveID'))	
				->join('tblitemtype', 'tbltransitemtype.ItemTypeID', '=', 'tblitemtype.ItemTypeID')
				->get();

			$ItemInventory= DB::table('tblitemdetails')
						->where('ItemStatus','=','Good')
		 				->where('ReserveStatus','=','Available')
		 				->orderBy('tblitemdetails.ItemTypeID', 'asc')
		 				->orderBy('tblitemdetails.ItemID', 'asc')
		 				->get();


		 	return Response::json(array('itemtype'=>$itemtype,'inventory'=> $ItemInventory));
 		}

 	}	

//*******************************************SAVE TO DB*******************************************************//


//******************save to ISSUE HEADER, UPDATE ITEM HEADER TO RELEASED******************************************//
 	public function addIssueHeader()
 	{ 
 		if(Request::ajax())
 		{
 			$ItemIssueID= DB::table('tbltransissueheader')
 						->count();

 			if ($ItemIssueID==0)
	 			{
	 				$ItemIssueID=1;
	 			}

			else
			{
				$ItemIssueID= DB::table('tbltransissueheader')
 					->orderBy('ItemIssueID','desc')
 					->take(1)
 					->get();

				$ItemIssueID= $ItemIssueID[0]->ItemIssueID+1;
			}

 		 	DB::table('tbltransissueheader')
	 		 	->insert(array(
	 		 	'ItemIssueID'=> $ItemIssueID,
	 		 	'ReservationID'=> Input::get('reserveID'),
	 		 	'IssueOfficialID'=> Input::get('offID'),
	 		 	'DateReserveFrom' => Input::get('DateFrom'),
	 		 	'DateReserveTo' => Input::get('DateTo'),
	 		 	'TimeReserveTo' => Input::get('TimeTo'),
	 		 	'TimeReserveFrom'=>  Input::get('TimeFrom'),
	 		 		 ));

	 		DB::table('tbltransreservation')
	 		 	->where('tbltransreservation.ReservationID', '=', Input::get('reserveID'))
				->where('tbltransreservation.DateReserveFrom', '=', Input::get('DateFrom'))
				->where('tbltransreservation.DateReserveTo', '=', Input::get('DateTo'))
				->where('tbltransreservation.TimeReserveTo', '=', Input::get('TimeTo'))
				->where('tbltransreservation.TimeReserveFrom', '=', Input::get('TimeFrom'))
	 		 	->update(array(
	 		 	'ReserveStatus'=> 'Released'
	 		 ));

 		$issue= DB::table('tbltransissueheader')
 				->get();
 		}

 	return Response::json(array('$issue'=>$issue));
 		
 	}

//*************************************************END***************************************************************//

 	public function getInventory()
 	{
 		$ItemInventory= DB::table('tblitemdetails')
						->where('ItemStatus','=','Good')
		 				->where('ReserveStatus','=','Available')
		 				->where('ItemTypeID', '=', Input::get('itemTypeID'))
		 				->orderBy('tblitemdetails.ItemTypeID', 'asc')
		 				->orderBy('tblitemdetails.ItemID', 'asc')
		 				->get();

		 return Response::json(array('inventory'=> $ItemInventory));
 	}

//******************************************save to ISSUE DETAILS***************************************************************//
 	public function addIssueItemsDetails()
 	{ 
	 	  $issueID= DB::table('tbltransissueheader')
			->orderBy('ItemIssueID', 'desc')
			->take(1)
			->get();

		
				DB::table('tbltransissuedetails')
					->insert(array(
						'ItemIssueID' => $issueID[0]->ItemIssueID,
						'ITypeID' => Input::get('ItemTypeID'),
						'ItemID' => Input::get('ItemID'),
						));

				DB::table('tblitemdetails')
					->where('ItemTypeID', '=', Input::get('ItemTypeID'))
					->where('ItemID', '=', Input::get('ItemID'))
					->update(array(
						'ReserveStatus'=> 'Issued',
						));
 	}
 	//****************************************END****************************************//

 	//*********************************save to ISSUE TYPES**********************************//

 	public function addIssue()
 	{ 
 	  $issueID= DB::table('tbltransissueheader')
 	  		->orderBy('ItemIssueID', 'desc')
			->take(1)
			->get();



 		 DB::table('tbltransissuetype')
 		 	->insert(array(
 		 	'ItemIssueID' =>  $issueID[0]->ItemIssueID,
 		 	'ItemTypeID' => Input::get('ItemTypeID'),
 		 ));

 		
 		
 	}
 	 	//****************************************END****************************************//



 	public function RefAdd()
 	{
 		$itype = DB::table('tbltransitemtype')
 			->where('ReservationID', '=', Input::get('reserID'))
 			->join('tblitemtype', 'tbltransitemtype.ItemTypeID', '=', 'tblitemtype.ItemTypeID')
 			->get();

 		$person = DB::table('tbltransreservation')
 			->where('ReservationID', '=', Input::get('reserID'))
 			->get();

 		$previousPayment = DB::table('tblpayment')
 			->where('RequestID', '=', Input::get('reserID'))
 			->take(1)
 			->get();

 		return Response::json(array('type' => $itype, 'reqType' => $person, 'pptype' => $previousPayment));
 	}

 	public function RefAddPayment()
 	{
 		$paymentID = DB::table('tblpayment')
 			->orderBy('PaymentID', 'desc')
 			->take(1)
 			->get();

 		$pID = ($paymentID[0]->PaymentID)+1;


 		if(Input::get('finalStat') == "Additional")
 		{

 			if(Input::get('paymentType') == "Ordinary")
 			{
 				DB::table('tblpayment')
 					->insert(array(
 						'PaymentID' => $pID,
 						'RequestID' => Input::get('reserveID'),
 						'TransacName' => 'Item',
 						'PaidBy' => Input::get('paidBy'),
 						'PaidAmount' => Input::get('totalAmt'),
 						'TotalAmount' => Input::get('totalAmt'),
 						'OriginalPrice' => Input::get('totalAmt'),
 						'PaymentType' => 'Ordinary',
 						'PaymentOfficialID' => Input::get('offID'),
 					));
 			}
 			else if(Input::get('paymentType') == "Discount")
 			{
 				DB::table('tblpayment')
 					->insert(array(
 						'PaymentID' => $pID,
 						'RequestID' => Input::get('reserveID'),
 						'TransacName' => 'Item',
 						'PaidAmount' => Input::get('discounted'),
 						'TotalAmount' => Input::get('discounted'),
 						'OriginalPrice' => Input::get('totalAmt'),
 						'PaymentType' => 'Discount',
 						'PaidBy' => Input::get('paidBy'),
 						'PaymentOfficialID' => Input::get('offID'),

 					));
 			}
 			else if(Input::get('paymentType') == "Waived")
 			{
 				DB::table('tblpayment')
 					->insert(array(
 						'PaymentID' => $pID,
 						'RequestID' => Input::get('reserveID'),
 						'TransacName' => 'Item',
 						'PaidAmount' => '0.00',
 						'TotalAmount' => Input::get('totalAmt'),
 						'OriginalPrice' => Input::get('totalAmt'),
 						'PaymentOfficialID' => Input::get('offID'),
 						'PaidBy' => Input::get('paidBy'),
 						'PaymentType' => 'Waived',
 					));
 			}
 		}
 		else if(Input::get('finalStat') == "Refund")
 		{
 				DB::table('tblpayment')
 					->insert(array(
 						'PaymentID' => $pID,
 						'RequestID' => Input::get('reserveID'),
 						'TransacName' => 'Item',
 						'PaidAmount' => Input::get('refundAmount')*-1,
 						'TotalAmount' => Input::get('refundAmount')*-1,
 						'PaymentOfficialID' => Input::get('offID'),
 						'PaidBy' => Input::get('paidBy'),
 						'OriginalPrice' => '0.00',
 						'PaymentType' => 'Refund',
 						'PaymentOfficialID' => Input::get('offID'),

 					));

 		}
 	}
	
}