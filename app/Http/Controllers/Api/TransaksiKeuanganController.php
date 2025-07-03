<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Transaksi\TransaksiCollection;
use App\Http\Resources\Transaksi\TransaksiResource;
use App\Models\TransaksiKeuangan;
use Illuminate\Http\Request;

class TransaksiKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TransaksiKeuangan::all();
        return new TransaksiCollection($data);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = TransaksiKeuangan::find($id);
        if (is_null($data)) {
            return response()->json([
                'message' => 'Data not found',
            ], 404);
        } else {
            return new TransaksiResource($data);
        }
    }

}
