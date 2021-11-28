<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
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
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'namakategori' => 'required|unique:kategori,namakategori,',
            'deskripsikategori' => 'required'
        ]);
        $kategori = new Kategori;
        $kategori->namakategori = $validatedData["namakategori"];
        $kategori->deskripsikategori = $validatedData["deskripsikategori"];
        $kategori->save();
        $kategories = Kategori::all();
        return redirect('admin/kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        //
        $kategori->namakategori = $request->namakategori;
        $kategori->deskripsikategori = $request->deskripsikategori;
        $kategori->save();
    }

    public function delete($id){
        $kategori = Kategori::find($id);
        // dd($kategori);
        $kategori->delete();
        return redirect('admin/kategori');
    }

    public function cekUpdate(Request $request, $id){
        $validatedData = $request->validate([
            'namakategori' => 'required|unique:kategori,namakategori,'.$id,
            'deskripsikategori' => 'required'
        ]);
        $kategori = Kategori::where('id',$id)->first();
        $kategori->namakategori = $request->namakategori;
        $kategori->deskripsikategori = $request->deskripsikategori;
        $kategori->save();
        $kategories = Kategori::all();
        return redirect('admin/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}
