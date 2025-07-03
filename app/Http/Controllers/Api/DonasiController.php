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
        //TODO: mengambil data (semuanya) dari database
        $data = Donasi::with(['user'])->get();

        //TODO: mengembalikan response status 200 (OK)
        return new DonasiCollection($data);
    }

    public function store(Request $request)
    {
        //TODO: Mengambil semua data dari request
        $data = $request->all();

         // Set default value jika status tidak ada atau kosong
        if (!isset($data['status']) || empty($data['status'])) {
            $data['status'] = 'DONE'; // atau nilai default lainnya
        }

        //TODO: validasi data yang masuk
        $validator = Validator::make($data, [
            'nama_donatur' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
            'email' => 'required|string',
            'no_telp' => 'required|string',
            'status' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 400);
        } else {
            //TODO: lalu data di create/insert ke database by user yang sedang login
            $response = request()->user()->donaturs()->create($data);
            return response()->json([
                'message' => 'Data has been created',
                'data' => $response
            ], 201);
        }
    }

    public function show(string $id)
    {
        //TODO: mengambil data berdasarkan id
        $data = Donasi::find($id);

        //TODO: validasi jika data tidak ditemukan
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
        //TODO: melakukan try catch jika data tidak ditemukan
        try {
            $data = Donasi::findOrFail($id);

            //TODO: mengambil semua data dari request lalu di update
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

            //TODO: lalu data di delete/hapus di database by user yang sedang login
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
