<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    public function index()
    {
        try {
            $karyawans = Karyawan::all();

            return response()->json([
                'success' => true,
                'data' => $karyawans
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve karyawans',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Custom validation logic
        $validator = Validator::make($request->all(), [
            'nama_karyawan' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'gaji' => 'required|numeric',
            'tanggal_masuk' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 400);
        }

        try {
            $karyawan = Karyawan::create($validator->validated());

            return response()->json([
                'success' => true,
                'message' => 'Karyawan created successfully',
                'data' => $karyawan
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create karyawan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $karyawan = Karyawan::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $karyawan
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Karyawan not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve karyawan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_karyawan' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'gaji' => 'required|numeric',
            'tanggal_masuk' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 400);
        }

        try {
            $karyawan = Karyawan::findOrFail($id);
            $karyawan->update($validator->validated());

            return response()->json([
                'success' => true,
                'message' => 'Karyawan updated successfully',
                'data' => $karyawan
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Karyawan not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update karyawan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $karyawan = Karyawan::findOrFail($id);
            $karyawan->delete();

            return response()->json([
                'success' => true,
                'message' => 'Karyawan deleted successfully'
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Karyawan not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete karyawan',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}