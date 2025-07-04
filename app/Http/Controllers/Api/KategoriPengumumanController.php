<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KategoriPengumuman;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriPengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = KategoriPengumuman::all();
        return response()->json([
            'message' => 'Data Kategori Pengumuman',
            'data' => $data,
            'jummlah' => $data->count()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'nama' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 400);
        } else {
            //TODO: lalu data di create/insert ke database by user yang sedang login
            $response = KategoriPengumuman::create($data);
            return response()->json([
                'message' => 'Data has been created',
                'data' => $response
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = KategoriPengumuman::find($id);
        if (is_null($data)) {
            return response()->json([
                'message' => 'Data not found',
            ], 404);
        } else {
            return response()->json([
                'message' => 'Data found',
                'data' => $data
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = KategoriPengumuman::findOrFail($id);

            $data->update($request->all());
            return response()->json([
                'message' => 'Data has been updated',
                'data' => $data
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Data not found',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = KategoriPengumuman::findOrFail($id);
            $data->delete();
            return response()->json([
                'message' => 'Data has been deleted',
                'data' => $data
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Data not found',
            ], 404);
        }
    }
}
