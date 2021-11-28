<?php

namespace App\Http\Controllers;

use App\Models\HRetur;
use App\Models\HTrans;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HReturController extends Controller
{

    public function returPage(){
        return view('user.retur',[
            'kategori' => Kategori::all(),
            'retur' => HRetur::where('id_user', Auth::user()->id)->get(),
        ]);
    }

    public function ajuRetur(){
        $pemesanan = HTrans::where('id_user', Auth::user()->id)->where('status',3)->get();
        if (count($pemesanan) == 0){
            return redirect()->back()->withErrors(['msg' => 'Tidak ada pemesanan yang bisa diretur!']);
        }else{
            $first = HTrans::where('id_user', Auth::user()->id)->where('status',3)->first();
            return redirect('/retur/'.$first->id.'/form');
        }
    }

    public function ajuReturDetail($id){
        return view('user.returForm',[
            'kategori' => Kategori::all(),
            'currentPemesanan' => HTrans::where('id',$id)->first(),
            'pemesanan' => HTrans::where('id_user', Auth::user()->id)->where('status',3)->get(),
        ]);
    }

    public function getNew(Request $req){
        return redirect('/retur/'.$req->idPemesanan.'/form');
    }

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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HRetur  $hRetur
     * @return \Illuminate\Http\Response
     */
    public function show(HRetur $hRetur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HRetur  $hRetur
     * @return \Illuminate\Http\Response
     */
    public function edit(HRetur $hRetur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HRetur  $hRetur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HRetur $hRetur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HRetur  $hRetur
     * @return \Illuminate\Http\Response
     */
    public function destroy(HRetur $hRetur)
    {
        //
    }
}
