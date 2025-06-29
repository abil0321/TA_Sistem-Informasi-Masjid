<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Pengumuman\PengumumanCollection;
use App\Http\Resources\Pengumuman\PengumumanResource;
use App\Models\Pengumuman;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = $request->per_page ?? 8; // Jumlah data per halaman (default 5)
        $data = Pengumuman::with(['user'])
                    ->orderBy('created_at', 'desc') // Urutkan berdasarkan created_at secara descending
                    ->paginate($perPage);
        return new PengumumanCollection($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_pengumuman_id' => 'required|integer',
            'referensi' => 'required|string',
            'tanggal' => 'required|date',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 400);
        } else {
            $response = request()->user()->pengumumans()->create($data);
            return response()->json([
                'message' => 'Data has been created',
                'data' => $response,
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pengumuman::with('user')->find($id);

        if (is_null($data)) {
            return response([
                'message' => 'Data not found',
            ], 404);
        } else {
            return new PengumumanResource($data);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = Pengumuman::findOrFail($id);
            $data->update($request->all());
            return response()->json([
                'message' => 'Data has been updated',
                'data' => $data,
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
            $data = Pengumuman::findOrFail($id);
            $data->delete();
            return response()->json([
                'message' => 'Data has been deleted',
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Data not found',
            ], 404);
        }
    }
}
