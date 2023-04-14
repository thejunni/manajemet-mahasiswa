<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\KampusRepository;
use Illuminate\Http\Request;

class KampusController extends Controller
{
    protected $kampusRepository;

    public function __construct(KampusRepository $kampusRepository){
       $this->kampusRepository= $kampusRepository; 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kampus = $this->kampusRepository->getAll();
        return response()->json([
            'success' => true,
            'data' => $kampus
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

        $kampus = $this->kampusRepository->create($data);
        return response()->json([
            'success' => true,
            'data' => $kampus
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kampus = $this->kampusRepository->getById($id);

        if(!$kampus){
            return response()->json([
                'success' => false,
                'massage' => "data kampus tidak ditemukan!"
            ], 404);
        }
        return response()->json([
            'success' => true,
            'data' => $kampus
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

        $kampus = $this->kampusRepository->update($id, $data);

        if(!$kampus){
            return response()->json([
                'success' => false,
                'message' => "Kampus tidak ditemukan"
            ], 400);
        }
        return response()->json([
            'success' => true,
            'data' => $kampus
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
        $kampus = $this->kampusRepository->delete($id);

        if(!$kampus){
            return response()->json([
                'success' => false,
                'data' => $kampus
            ],404);
        }
        return response()->json([
            'success' => true,
            'data' => $kampus
        ]);
    }
}
