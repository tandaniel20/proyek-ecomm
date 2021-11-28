<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Buku_Kategori;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        // dump($id);
        // dump($request);
        $assocRequest = $request->all();
        // dump($assocRequest);
        // if (array_key_exists("katid".(4), $assocRequest)){
        //     dump($assocRequest["katid".(4)]);
        // }

        $deletedRows = Buku_Kategori::where('id_buku',$id)->delete();
        $kategories = Kategori::all();
        foreach ($kategories as $k) {
            # code...
            if (array_key_exists("katid".($k["id"]),$assocRequest)){
                $linkBaru = new Buku_Kategori;
                $linkBaru->id_buku = $id;
                $linkBaru->id_kategori = $k["id"];
                $linkBaru->save();
            }
        }
        return view('admin.buku',[
            "title" => "Buku",
            "buku" => Buku::all(),
        ]);
        // $assocRequest = json_decode(json_encode())
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku_Kategori  $buku_Kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Buku_Kategori $buku_Kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku_Kategori  $buku_Kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku_Kategori $buku_Kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku_Kategori  $buku_Kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku_Kategori $buku_Kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku_Kategori  $buku_Kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku_Kategori $buku_Kategori)
    {
        //
    }
}
