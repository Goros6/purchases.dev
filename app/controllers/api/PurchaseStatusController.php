<?php
namespace Goros6\Purchases\Controllers\Api;
use Controller;
use Goros6\Purchases\Models\PurchaseStatus;
use Input;
use Response;
use Exception;


class PurchaseStatusController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		try{
			$statusCode = 200;
			$response = [
				'PurchaseStatuses'  => []
			];

			$purSt = PurchaseStatus::all();

			foreach($purSt as $pS){

				$response['PurchaseStatuses'][] = [
					'id' => $pS->id,
					'name' => $pS->name
				];
			}

		}catch (Exception $e){
			$statusCode = 400;
		}finally{
			var_dump($response);
			return Response::json($response, $statusCode);
		}

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
		$purSt = new PurchaseStatus();
		$purSt->name = $input['name'];
		$purSt->save();
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
		try{
			$purSt = PurchaseStatus::find($id);
			$statusCode = 200;
			$response = [
				'PurchaseStatuses'  => ['id' => $purSt->id,
				                        'name' => $purSt->name
			]];
		}catch (Exception $e){
			$statusCode = 400;
			$response = [
				"error" => "Status doesn`t exists"
			];
		}finally{
			var_dump($response);
			return Response::json($response, $statusCode);
		}
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
