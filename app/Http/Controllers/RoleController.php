<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Symfony\Component\HttpFoundation\Response;
use Exception;
use ModelNotFoundException;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::latest()->paginate($request->get('paginate')?? 5);
        return view('role.index', compact('roles'));
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
    public function store(Request $request) {   
        try {
            Role::create([
                'role_name'        => $request->roleName,
                'role_description' => $request->description
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
            Role::where('id',$id)->update([
                'role_name'        => $request->roleName,
                'role_description' => $request->description
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
            Role::findOrFail($id)->delete();
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
