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
        return request()->user();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = $request->per_page ?? 8; // Jumlah data per halaman (default 5)
        $data = Kegiatan::with(['user', 'kategoriKegiatan'])
            ->orderBy('created_at', 'desc') // Urutkan berdasarkan created_at secara descending
            ->paginate($perPage);
        return new KegiatanCollection($data);
    }

    public function store(Request $request)
    {
        $data = $request->all();

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
            $response = request()->user()->kegiatans()->create($data);
            return response()->json([
                'message' => 'Data has been created',
                'data' => $response
            ], 201);
        }
    }

    public function show(string $id)
    {
        $data = Kegiatan::find($id);

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
        try {
            $data = Kegiatan::findOrFail($id);

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
