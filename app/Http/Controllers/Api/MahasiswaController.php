<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\MahasiswaRepository;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    protected $mahasiswaRepository;

    public function __construct(MahasiswaRepository $mahasiswaRepository){
        $this->mahasiswaRepository = $mahasiswaRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = $this->mahasiswaRepository->getAll();

        return response()->json([
            'success' => true,
            'data' => $mahasiswa
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $mahasiswa = $this->mahasiswaRepository->create($data);

        return response()->json([
            'success' => true,
            'data' => $mahasiswa
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = $this->mahasiswaRepository->getById($id);

        if(!$mahasiswa){
            return response()->json([
                'success' => false,
                'message' => 'Mahasiswa Tidak Ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $mahasiswa
        ]);
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
        $data = $request->all();

        $mahasiswa = $this->mahasiswaRepository->update($id, $data);
        if (!$mahasiswa) {
            return response()->json([
                'success' => false,
                'message' => 'Mahasiswa Tidak Ada'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $mahasiswa
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = $this->mahasiswaRepository->delete($id);

        if (!$mahasiswa) {
            return response()->json([
                'success' => false,
                'message' => 'Mahasiswa Tidak Ada'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $mahasiswa
        ]);
    }
}
