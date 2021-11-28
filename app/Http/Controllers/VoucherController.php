<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
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
            'judul' => 'required|unique:voucher,judul',
            'kode' => 'required | string | min:11 | max:11 | unique:voucher,kode',
            'batas' => 'required | numeric',
            'jumlahpoint' => 'required | numeric',
            'durasi' => 'required | numeric',
        ]);

        $voucher = new voucher;
        $voucher->judul = $request->judul;
        $voucher->kode = $request->kode;
        $voucher->batas = $request->batas;
        $voucher->jumlahpoint = $request->jumlahpoint;
        $voucher->durasi = $request->durasi;
        $voucher->save();
        return view('admin.voucher',[
            "title" => 'Voucher',
            'voucher' => voucher::all(),
            'current' => voucher::first(),
        ]);
    }

    public function cekUpdate(Request $request, $id){
        $validatedData = $request->validate([
            'judul' => 'required|unique:voucher,judul,'.$id,
            'kode' => 'required | string | min:11 | max:11 | unique:voucher,kode,'.$id,
            'batas' => 'required | numeric',
            'jumlahpoint' => 'required | numeric',
            'durasi' => 'required | numeric',
        ]);

        $voucher = Voucher::where('id',$id)->first();
        $voucher->judul = $request->judul;
        $voucher->kode = $request->kode;
        $voucher->batas = $request->batas;
        $voucher->jumlahpoint = $request->jumlahpoint;
        $voucher->durasi = $request->durasi;
        $voucher->save();
        return view('admin.voucher',[
            "title" => 'Voucher',
            'voucher' => voucher::all(),
            'current' => voucher::first(),
        ]);
    }

    public function delete($id){
        $voucher = Voucher::find($id);
        $voucher->delete();
        return view('admin.voucher',[
            'title' => "Manajemen Kode Voucher",
            'voucher' => Voucher::all(),
            'current' => Voucher::first(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, voucher $voucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(voucher $voucher)
    {
        //
    }
}
