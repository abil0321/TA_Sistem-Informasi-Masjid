<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return new UserCollection($data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::find($id);
        if (is_null($data)) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        } else {
            return new UserResource($data);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = User::findOrFail($id);
            $data->update($request->all());
            return response()->json([
                'message' => 'Data has been updated',
                'data' => $data
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = User::findOrFail($id);
            $data->delete();
            return response()->json([
                'message' => 'Data has been deleted'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }
    }

}
