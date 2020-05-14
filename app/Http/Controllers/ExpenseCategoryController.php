<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;
use Symfony\Component\HttpFoundation\Response;
use Exception;
use ModelNotFoundException;
class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $categories = ExpenseCategory::latest()->paginate($request->get('paginate')?? 5);
        return view('expense-category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            ExpenseCategory::create([
                'category_name'        => $request->categoryName,
                'category_description' => $request->description,
                'user_id'              => $request->userId
            ]);
            return response()->json(['status' => Response::HTTP_OK]);
        } catch(ModelNotFoundException $mnfe) {
            return response()->json(['status' => RESPONSE::HTTP_UNPROCESSABLE_ENTITY, 
            'message' => $e->getMessage() ]);
        }catch(Exception $e) {
            if($e->errorInfo[1] == 1062) {
                return response()->json(['status' => RESPONSE::HTTP_UNPROCESSABLE_ENTITY, 
                'message' => $e->getMessage() ]);
            } 
            return response()->json(['status' => RESPONSE::HTTP_INTERNAL_SERVER_ERROR, 
                'message' => $e->getMessage() ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            ExpenseCategory::where('id',$id)->update([
                'category_name'        => $request->categoryName,
                'category_description' => $request->description,
            ]);
            return response()->json(['status' => Response::HTTP_OK]);
        } catch(ModelNotFoundException $mnfe) {
            return response()->json(['status' => RESPONSE::HTTP_UNPROCESSABLE_ENTITY, 
            'message' => $e->getMessage() ]);
        }catch(Exception $e) {
            return response()->json(['status' => RESPONSE::HTTP_INTERNAL_SERVER_ERROR, 
                'message' => $e->getMessage() ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            ExpenseCategory::findOrFail($id)->delete();
            return response()->json(['status' => Response::HTTP_OK]);
        } catch(ModelNotFoundException $mnfe) {
            return response()->json(['status' => RESPONSE::HTTP_UNPROCESSABLE_ENTITY, 
            'message' => $e->getMessage() ]);
        }catch(Exception $e) {
            return response()->json(['status' => RESPONSE::HTTP_INTERNAL_SERVER_ERROR, 
                'message' => $e->getMessage() ]);
        }
    }
}
