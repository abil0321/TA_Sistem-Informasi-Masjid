<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Kegiatan\KegiatanCollection;
use App\Http\Resources\Kegiatan\KegiatanResource;
use App\Models\Kegiatan;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KegiatanController extends Controller
{
    public function cek_token()
    {
        //TODO: cek yang memiliki token siapa aja
        return request()->user();

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //TODO: mengambil data (semuanya) dari database
        $data = Kegiatan::with(['user'])->get();

        //TODO: mengembalikan response status 200 (OK)
        return new KegiatanCollection($data);
    }

    public function store(Request $request)
    {
        //TODO: Mengambil semua data dari request
        $data = $request->all();

        //TODO: validasi data yang masuk
        $validator = Validator::make($data, [
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'required|string|min:5',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 400);
        } else {
            //TODO: lalu data di create/insert ke database by user yang sedang login
            $response = request()->user()->kegiatans()->create($data);
            return response()->json([
                'message' => 'Data has been created',
                'data' => $response
            ], 201);
        }
    }

    public function show(string $id)
    {
        //TODO: mengambil data berdasarkan id
        $data = Kegiatan::find($id);

        //TODO: validasi jika data tidak ditemukan
        if (is_null($data)) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        } else {
            return new KegiatanResource($data);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //TODO: melakukan try catch jika data tidak ditemukan
        try {
            $data = Kegiatan::findOrFail($id);

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
            $data = Kegiatan::findOrFail($id);

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
