<?php

class TransItemInventoryController extends BaseController {

	public function showRecords()
	{
		$itemDetails = DB::table('tblitemdetails')
			->join('tblitemtype', 'tblitemdetails.ItemTypeID', '=', 'tblitemtype.ItemTypeID')
			->select('tblitemdetails.ItemID', 'tblitemtype.ItemName', 'tblitemtype.ItemCode', 'tblitemdetails.ItemStatus', 'tblitemdetails.DateTime', 'tblitemdetails.ItemTypeID')
			//->orderBy('tblitemdetails.DateTime', 'asc')
			->orderBy('tblitemdetails.itemTypeID', 'asc')
			->orderBy('tblitemdetails.ItemID', 'asc')
			->get();

		$itemType = DB::table('tblitemtype')
			->where('status', '=', 'active')
			->get();

		return View::make('transItem.item_inventory')
			->with('iDetails', $itemDetails)
			->with('iType', $itemType);
	}

	public function addRecord()
	{
		if(Request::ajax()){

			$result = DB::table('tblitemdetails')
				->where('ItemTypeID', '=', Input::get('iType'))
				->count();
			

			if($result == 0)
			{
				$ctr = 0;

				for($ctr = 1; $ctr <= Input::get('quan'); $ctr++)
				{
					DB::table('tblitemdetails')
						->insert(array(
								'ItemID' => $ctr,
								'ItemTypeID' => Input::get('iType'),
								'ItemStatus' => 'Good'

							));
				}

				$itemType = DB::table('tblitemtype')
					->where('ItemTypeID', '=', Input::get('iType'))
					->get();


				$iDetails = DB::table('tblitemdetails')
					->join('tblitemtype', 'tblitemdetails.ItemTypeID', '=', 'tblitemtype.ItemTypeID')
					->select('tblitemdetails.ItemID', 'tblitemtype.ItemName', 'tblitemtype.ItemCode', 'tblitemdetails.ItemStatus', 'tblitemdetails.DateTime')
					//->orderBy('tblitemdetails.DateTime', 'asc')
					->orderBy('tblitemdetails.itemTypeID', 'asc')
					->orderBy('tblitemdetails.ItemID', 'asc')
					->get();

				return Response::json(array('it' => $itemType, 'ctr' => 0, 'iDetails' => $iDetails));
			}
			else
			{
				$typeExists = DB::table('tblitemdetails')
					->where('ItemTypeID', '=', Input::get('iType'))
					->orderBy('ItemID', 'desc')
					->take(1)
					->get();


				$i = $typeExists[0]->ItemID + Input::get('quan');

				for($ctr = $typeExists[0]->ItemID + 1; $ctr <= $i; $ctr++)
				{
					DB::table('tblitemdetails')
						->insert(array(
								'ItemID' => $ctr,
								'ItemTypeID' => Input::get('iType'),
								'ItemStatus'=> 'Good'

							));
				}

				$itemType = DB::table('tblitemtype')
					->where('ItemTypeID', '=', Input::get('iType'))
					->get();

				$iDetails = DB::table('tblitemdetails')
					->join('tblitemtype', 'tblitemdetails.ItemTypeID', '=', 'tblitemtype.ItemTypeID')
					->select('tblitemdetails.ItemID', 'tblitemtype.ItemName', 'tblitemtype.ItemCode', 'tblitemdetails.ItemStatus', 'tblitemdetails.DateTime')
					//->orderBy('tblitemdetails.DateTime', 'asc')
					->orderBy('tblitemdetails.itemTypeID', 'asc')
					->orderBy('tblitemdetails.ItemID', 'asc')
					->get();

				return Response::json(array('it' => $itemType, 'ctr' => 1, 'te' => $typeExists, 'iDetails' => $iDetails));

			}


		}
	}

	public function getInfo()
	{
		if(Request::ajax())
		{
			$itemInfo = DB::table('tblitemdetails')
				->join('tblitemtype', 'tblitemdetails.ItemTypeID', '=', 'tblitemtype.ItemTypeID')
				->select('tblitemdetails.ItemID', 'tblitemtype.ItemName', 'tblitemtype.ItemCode', 'tblitemdetails.ItemStatus', 'tblitemdetails.DateTime', 'tblitemtype.ItemTypeID')
				->where('tblitemdetails.ItemID', '=', Input::get('x'))
				->where('tblitemtype.ItemTypeID', '=', Input::get('y'))
				->get();

			return Response::json(array('iInfo' => $itemInfo));
		}
	}


	public function updateRecord()
	{
		if(Request::ajax())
		{
			DB::table('tblitemdetails')
				->where('ItemID',  '=', Input::get('origID'))
				->where('ItemTypeID', '=', Input::get('tID'))
				->update(array(
						'ItemID' => Input::get('itemID'),
						'ItemStatus' => Input::get('itemStatus')
					));

			$uDetails = DB::table('tblitemdetails')
					->join('tblitemtype', 'tblitemdetails.ItemTypeID', '=', 'tblitemtype.ItemTypeID')
					->select('tblitemdetails.ItemID', 'tblitemtype.ItemName', 'tblitemtype.ItemCode', 'tblitemdetails.ItemStatus', 'tblitemdetails.DateTime')
					//->orderBy('tblitemdetails.DateTime', 'asc')
					->orderBy('tblitemdetails.itemTypeID', 'asc')
					->orderBy('tblitemdetails.ItemID', 'asc')
					->get();

			return Respons::json(array('uDetails' => $uDetails));
		}
	}
	

	public function deleteRecord()
	{
		if(Request::ajax())
		{
			DB::table('tblitemdetails')
				->where('ItemID',  '=', Input::get('origID'))
				->where('ItemTypeID', '=', Input::get('tID'))
				->delete();

		}
	}
	

}
