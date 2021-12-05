<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DRetur;
use App\Models\DTrans;
use App\Models\HRetur;
use App\Models\HTrans;
use App\Models\Kategori;
use App\Models\PointHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HReturController extends Controller
{

    public function adminResend($id){
        return view('admin.resend',[
            'current' => HRetur::where('id',$id)->first(),
            'pemesanan' => HRetur::where('status', '>=', 1)->where('status', '<', 99)->get(),
            'title' => "Resend",
        ]);
    }

    public function adminResendReject($id){
        $header = HRetur::where('id',$id)->first();
        $header->status = 3;
        $header->save();

        // kembalikan uangnya dalam bentuk point

        $user = User::where('id', $header->id_user)->first();
        $user->point = $user->point + $header->total + 10000;
        $user->saldo_refund = $user->saldo_refund + $header->total + 10000;
        $user->save();

        $history = new PointHistory;
        $history->id_user = $header->id_user;
        $history->kredit = $header->total + 10000;
        $history->debit = 0;
        $history->status = 1;
        $history->keterangan = "Resend ".$header->kode_retur." dikembalikan dalam bentuk Point.";
        $history->save();

        return redirect('admin/resend');
    }

    public function adminResendAccept($id){
        $header = HRetur::where('id',$id)->first();

        //cek apakah buku mencukupi
        $lebih = false;
        foreach ($header->Detail as $hd) {
            if ($hd->qty > $hd->Buku->stock) $lebih = true;
        }

        if ($lebih){
            return redirect()->back()->withErrors(['msg' => 'Ada Buku yang lebih dari stock!']);
        }

        $header->status = 2;
        $header->save();

        //potong buku
        foreach ($header->Detail as $hd) {
            $getBuku = Buku::where('id',$hd->Buku->id)->first();
            $getBuku->stock = $getBuku->stock - $hd->qty;
            $getBuku->save();
        }

        return redirect('admin/resend');
    }

    public function returPage(){
        return view('user.retur',[
            'kategori' => Kategori::all(),
            'retur' => HRetur::where('id_user', Auth::user()->id)->get(),
        ]);
    }

    public function adminRetur($id){
        return view('admin.retur',[
            'current' => HRetur::where('id',$id)->first(),
            "pemesanan" => HRetur::where('status','>=',0)->get(),
            "title" => "Retur",
        ]);
    }

    public function adminReturAccept($id){
        $header = HRetur::where('id',$id)->first();
        $header->status = 1;
        $header->save();
        return redirect('admin/retur');
    }

    public function adminReturReject($id){
        $header = HRetur::where('id',$id)->first();
        $header->status = 99;
        $header->save();
        return redirect('admin/retur');
    }

    public function returDetail($id){
        $header = HRetur::where('id',$id)->first();
        $detail = DRetur::where('id_retur',$id)->get();
        return view('user.detailRetur',[
            'kategori' => Kategori::all(),
            'header' => $header,
            'detail' => $detail,
        ]);
    }

    public function doRetur(Request $req, $id){
        $adasatu = false;
        for ($i=0; $i < count($req->maxBuku); $i++) {
            if ($req->jumlahBuku[$i] > $req->maxBuku[$i] || $req->jumlahBuku[$i] < 0){
                return redirect()->back()->withErrors(['msg' => 'Input tidak valid!']);
            }
            if ($req->jumlahBuku[$i] != 0) $adasatu = true;
        }
        // dump($req);
        // dump($req->file);
        // dump($req->file('cobaGambar'));
        // dd($req->hasFile('cobaGambar'));

        if(!$req->hasFile('cobaGambar')){
            return redirect()->back()->withErrors(['msg' => 'Bukti tidak ditemukan!']);
        }

        if(!$adasatu){
            return redirect()->back()->withErrors(['msg' => 'Tidak ada barang yang ingin diretur!']);
        }

        $headerTrans = HTrans::where('id',$id)->first();
        $headerTrans->status = 4;
        $headerTrans->save();

        $newHeaderRetur = new HRetur;
        $newHeaderRetur->id_pemesanan_lama = $headerTrans->id_pemesanan;
        $newHeaderRetur->id_user = $headerTrans->id_user;
        $newHeaderRetur->id_alamat = $headerTrans->id_alamat;
        $newHeaderRetur->status = 0;
        $newHeaderRetur->keterangan = $req->keterangan;
        $newHeaderRetur->save();
        $newHeaderRetur->kode_retur = 'R'. str_pad($newHeaderRetur->id,4,"0",STR_PAD_LEFT);
        $newHeaderRetur->save();

        if($req->hasFile('cobaGambar')){
            Storage::putFileAs('/public/bukti-retur', $req->file('cobaGambar'), $newHeaderRetur->kode_retur.".png");
        }

        $totalRetur = 0;
        for ($i=0; $i < count($req->maxBuku); $i++) {
            $getDetail = DTrans::where('id',$req->idDetail[$i])->first();

            $newDetailRetur = new DRetur;
            $newDetailRetur->id_retur = $newHeaderRetur->id;
            $newDetailRetur->id_buku = $getDetail->id_buku;
            $newDetailRetur->harga = $getDetail->harga;
            $newDetailRetur->qty = $req->jumlahBuku[$i];
            $newDetailRetur->subtotal = $req->jumlahBuku[$i]*$getDetail->harga;
            $newDetailRetur->save();
            $totalRetur += $newDetailRetur->subtotal;
        }

        $newHeaderRetur->total = $totalRetur;
        $newHeaderRetur->save();

        return redirect('retur');
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
