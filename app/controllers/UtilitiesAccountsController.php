<?php

class UtilitiesAccountsController extends BaseController {

	public function showRecords()
	{
		$account = DB::table('tblofficialaccount')
				// ->join('tblofficialdetails', 'tblofficialdetails.OfficialID', '=', 'tblofficialaccount.OfficialID')
				// ->join('tblofficialposition', 'tblofficialdetails.OfficialPositionID', '=', 'tblofficialposition.OfficialPositionID')
				// ->join('')
				->get();

	return View::make('utilities.accounts')
			->with('account', $account);

	}

	


}