<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Donasi\DonasiCollection;
use App\Http\Resources\Donasi\DonasiResource;
use App\Models\Donasi;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = $request->per_page ?? 8; // Jumlah data per halaman (default 5)
        $data = Donasi::with(['user'])
            ->orderBy('created_at', 'desc') // Urutkan berdasarkan created_at secara descending
            ->paginate($perPage);
        return new DonasiCollection($data);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'nama_donatur' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
            'email' => 'required|string',
            'no_telp' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 400);
        } else {
            $response = request()->user()->donaturs()->create($data);
            return response()->json([
                'message' => 'Data has been created',
                'data' => $response
            ], 201);
        }
    }

    public function show(string $id)
    {
        $data = Donasi::find($id);

        if (is_null($data)) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        } else {
            return new DonasiResource($data);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = Donasi::findOrFail($id);

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
            $data = Donasi::findOrFail($id);

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
