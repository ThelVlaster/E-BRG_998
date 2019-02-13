<?php

class MainItemTypeController extends BaseController {

	public function showRecords()
	{
		$itemType = DB::table('tblitemtype')
			->where('status', '=', 'active')
			->get();

		return View::make('mainItem.item_type')
			->with('iType', $itemType);
	}

	public function getInfo()
	{
		if(Request::ajax())
		{
			$itemType = DB::table('tblitemtype')
				->where('ItemTypeID', '=', Input::get('id'))
				->get();

			return Response::json(array('itemType' => $itemType));
		}
	}

	public function addRecord()
	{
				date_default_timezone_set('Asia/Manila');

		Validator::extend('alpha_spaces', function($attribute, $value)
		{
    		return preg_match('/[\pL\s]/u', $value);
		});
		$post = Input::all();
		$messages = array(
			'txtIName.required' => 'º Item Name is required.',
			'txtIName.alpha_spaces' => 'º Item Name: Invalid Characters.',
			'txtICode.required' => 'º Item Code is required.',
			'txtICode.alpha' => 'º Item Code accepts LETTERS only.',
			'txtIRFee.required' => 'º Please enter the Rental Fee for Residents.',
			'txtIRFee.numeric' => 'º Rental Fee for Residents accepts NUMBERS ONLY.',
			'txtINRFee.required' => 'º Please enter the Rental Fee for Non-residents.',
			'txtINRFee.numeric' => 'º Rental Fee for Non-Residents accepts NUMBERS ONLY.',
			'txtIImage.required' => 'º Please upload a picture.',
			'txtIImage.mimes' => 'º Image ERROR: please upload pictures with .jpeg, .jpg, .bmp, .png file extension.'
			);
		$v = Validator::make($post,
				[
					'txtIName'	=>'required|alpha_spaces',
					'txtICode'	=>'required|alpha',
					'txtIRFee'	=>'required|numeric',
					'txtINRFee' => 'required|numeric',
					'txtIImage'	=>'required|mimes:jpeg,jpg,bmp,png'
				],$messages);

		$itemType = DB::table('tblitemtype')
				->where('status', '=', 'active')
				->get();

			if($v->fails()){

				return  Response::json( array(	'itemType' => $itemType, 'messages' => $v->errors() ));

			}
			else{
		if(Request::ajax())
		{
			if(Input::hasFile('txtIImage'))
			{
				$newName = time().Input::file('txtIImage')->getClientOriginalName();

				Input::file('txtIImage')->move(public_path().'/bower_components/admin-lte/dist/images/', $newName);

				DB::table('tblitemtype')
					->insert(array(
							'ItemName' => Input::get('txtIName'),
							'ItemCode' => Input::get('txtICode'),
							'ItemRentalRes' => Input::get('txtIRFee'),
							'ItemRentalNRes' => Input::get('txtINRFee'),

							'ItemImage' => $newName

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
						'Type' => 'Item Details',
						'NewValue' => Input::get('txtIName'),
						'Date' => date('Y/m/d H:m:s')
					));
			}
			else
			{

				DB::table('tblitemtype')
					->insert(array(
							'ItemName' => Input::get('txtIName'),
							'ItemCode' => Input::get('txtICode'),
							'ItemRentalRes' => Input::get('txtIFee'),
							'ItemRentalNRes' => Input::get('txtINRFee')

						));

					DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Inserted',
						'Type' => 'Item Details',
						'NewValue' => Input::get('txtIName'),
						'Date' => date('Y/m/d H:m:s')
					));
			}


			$itemType = DB::table('tblitemtype')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('itemType' => $itemType));
		}
	}
}
	public function updateRecord()
	{
		Validator::extend('alpha_spaces', function($attribute, $value)
		{
    		return preg_match('/[\pL\s]/u', $value);
		});
		$post = Input::all();
		$messages = array(
			'etxtIName.required' => 'º Item Name is required.',
			'etxtIName.alpha_spaces' => 'º Item Name: Invalid Characters.',
			'etxtICode.required' => 'º Item Code is required.',
			'etxtICode.alpha' => 'º Item Code accepts LETTERS only.',
			'etxtIRFee.required' => 'º Please enter the Rental Fee for Residents.',
			'etxtIRFee.numeric' => 'º Rental Fee for Residents accepts NUMBERS ONLY.',
			'etxtINRFee.required' => 'º Please enter the Rental Fee for Non-residents.',
			'etxtINRFee.numeric' => 'º Rental Fee for Non-Residents accepts NUMBERS ONLY.',
			'etxtIImage.mimes' => 'º Image ERROR: please upload pictures with .jpeg, .jpg, .bmp, .png file extension.'
			);
		$v = Validator::make($post,
				[
					'etxtIName'	=>'required|alpha_spaces',
					'etxtICode'	=>'required|alpha',
					'etxtIRFee'	=>'required|numeric',
					'etxtINRFee' => 'required|numeric',
					'etxtIImage'	=>'mimes:jpeg,jpg,bmp,png'
				],$messages);

		$itemType = DB::table('tblitemtype')
				->where('status', '=', 'active')
				->get();

			if($v->fails()){

				return  Response::json( array(	'itemType' => $itemType, 'messages' => $v->errors() ));

			}
			else{
		if(Request::ajax())
		{
			if(Input::hasFile('etxtIImageChange'))
			{
				$newName = time().Input::file('etxtIImageChange')->getClientOriginalName();

				Input::file('etxtIImageChange')->move(public_path().'/bower_components/admin-lte/dist/images/', $newName);

				DB::table('tblitemtype')
					->where('ItemTypeID', '=', Input::get('etxtID'))
					->update(array(
							'ItemName' => Input::get('etxtIName'),
							'ItemCode' => Input::get('etxtICode'),
							'ItemRentalRes' => Input::get('etxtIRFee'),
							'ItemRentalNRes' => Input::get('etxtINRFee'),

							'ItemImage' => $newName

						));
			}
			else
			{

				DB::table('tblitemtype')
					->where('ItemTypeID', '=', Input::get('etxtID'))
					->update(array(
							'ItemName' => Input::get('etxtIName'),
							'ItemCode' => Input::get('etxtICode'),
							'ItemRentalRes' => Input::get('etxtIRFee'),
							'ItemRentalNRes' => Input::get('etxtINRFee')


						));
			}


			$itemType = DB::table('tblitemtype')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('itemType' => $itemType));
		}
	}
}
	public function deleteRecord()
	{
		if(Request::ajax())
		{
			DB::table('tblitemtype')
				->where('ItemTypeID', '=', Input::get('dtxtID'))
				->update(array(
						'status' => 'inactive'

					));

			 $fac = DB::table('tblitemtype')
				->where('ItemTypeID', '=', Input::get('dtxtID'))
				->get();
   			
   			Session::put('itemname', $fac[0]->ItemName);
   			Session::put('itemcode', $fac[0]->ItemCode);



   				DB::table('tblaudit')
				    ->insert(array(
						'OfficialID' => Session::get('ID'),
						'Action' => 'Deleted',
						'Type' => 'Item Details',
						'OldValue' => Session::get('itemname'),
						'Date' => date('Y/m/d H:m:s')
					));

			$itemType = DB::table('tblitemtype')
				->where('status', '=', 'active')
				->get();

			return Response::json(array('itemType' => $itemType));
		}
	}

}
