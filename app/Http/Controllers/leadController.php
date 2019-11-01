<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Services\cacheService;
use App\Http\Resources\Leads;
use Carbon\Carbon;

class leadController extends Controller
{
    
	/**
	 * @api {create} /tasks/:id Remove a task
	 * @apiGroup Tasks
	 * @apiParam {id} id Task id
	 * @apiSuccessExample {json} Success
	 *    HTTP/1.1 204 No Content
	 * @apiErrorExample {json} Delete error
	 *    HTTP/1.1 500 Internal Server Error
	 */

    public function create(Request $request)
    {
        $index = cacheService::newKeyIndex();
    	Cache::store('file')->put(

    		$index,[
                'index' => $index,
                'First_Name'=> $request->First_Name,
                'Last_Name'=> $request->Last_Name,
                'Email' => $request->Email,
                'Company' => $request->Company ?? null,
                'Post_Code' => $request->Post_Code ?? null,
                'Accept_Terms' => $request->Accept_Terms,
                'Date_created' => Carbon::now()
            ]

    	);
        return response()->json(new Leads(Cache::store('file')->get($index)),201);
    }


    /**
	 * @api {update} /tasks/:id Remove a task
	 * @apiGroup Tasks
	 * @apiParam {id} id Task id
	 * @apiSuccessExample {json} Success
	 *    HTTP/1.1 204 No Content
	 * @apiErrorExample {json} Delete error
	 *    HTTP/1.1 500 Internal Server Error
	 */

    public function update(Request $request)
    {   
        $index = $request->index;
    	Cache::store('file')->put(

    		$index,['index' => $index,
                'First_Name'=> $request->First_Name,
                'Last_Name'=> $request->Last_Name,
                'Email' => $request->Email,
                'Company' => $request->Company ?? null,
                'Post_Code' => $request->Post_Code ?? null,
                'Accept_Terms' => $request->Accept_Terms,
                'Date_created' => Carbon::now()
            ]

    	);

    	return response()->json(new Leads(Cache::store('file')->get($index)),200);
    }


     /**
	 * @api {read} /tasks/:id Remove a task
	 * @apiGroup Tasks
	 * @apiParam {id} id Task id
	 * @apiSuccessExample {json} Success
	 *    HTTP/1.1 204 No Content
     * @apiSuccessExample {json} Success
     *    HTTP/1.1 200 OK
	 * @apiErrorExample {json} Delete error
	 *    HTTP/1.1 500 Internal Server Error
	 */

    public function read()
    {   
        $data = cacheService::allValues();
        return !empty($data) ? response()->json($data,200) : response()->json($data,204);
    }

     /**
	 * @api {delete} /tasks/:id Remove a task
	 * @apiGroup Tasks
	 * @apiParam {id} id Task id
	 * @apiSuccessExample {json} Success
	 *    HTTP/1.1 204 No Content
	 * @apiErrorExample {json} Delete error
	 *    HTTP/1.1 500 Internal Server Error
	 */

    public function delete(Request $request)
    {
        $index = $request->index;
        Cache::forget($index);
        cacheService::remove($index);
        return response(['data'=>'deleted'],200);
    }
}
