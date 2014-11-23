<?php
namespace Goros6\Purchases\Controllers\Api;
use Controller;
use Goros6\Purchases\Models\PurchaseStatus;
use Input;
use Response;
use Validator;


class PurchaseStatusController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		return [
			'PurchaseStatuses' => PurchaseStatus::all()->toArray()
		];
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$input = Input::all();
		var_dump($input);

		$val =  Validator::make($input,  array(
			'name' => 'required|unique:purchaseStatuses,name'));
		if ($val->fails())
		{
			var_dump($val->messages()->toArray());
			return $val->messages()->toArray();
		}

		$purSt = new PurchaseStatus();
		$purSt->name = $input['name'];
		$purSt->save();

		return $this->show($purSt->id);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$purSt = PurchaseStatus::findOrFail((int)$id); // Добвил преобразование в инт, чтобы ввод символьный ошибок не вызвал
		return [
			'PurchaseStatus' => $purSt->toArray()
		];
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
