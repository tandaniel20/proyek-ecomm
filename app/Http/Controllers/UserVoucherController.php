<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\PointHistory;
use App\Models\User;
use App\Models\UserVoucher;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserVoucherController extends Controller
{

    public function cekVoucher(Request $req){
        $voucher = Voucher::where('kode',$req->kodeVoucher)->first();
        if ($voucher!=null){
            if ($voucher->batas != 0){
                $cekPernah = UserVoucher::where('id_user', Auth::user()->id)->where('id_voucher',$voucher->id)->first();
                if ($cekPernah == null){
                    //kurangi batas voucher
                    $voucher->batas = $voucher->batas-1;
                    $voucher->save();

                    //tambah saldo point
                    $dataUser = User::where('id',Auth::user()->id)->first();
                    $dataUser->point = $dataUser->point + $voucher->jumlahpoint;
                    $dataUser->save();

                    //tambah ke user_voucher biar tidak bisa dipakai lagi
                    $dataUserVoucher = new UserVoucher;
                    $dataUserVoucher->id_user = Auth::user()->id;
                    $dataUserVoucher->id_voucher = $voucher->id;
                    $dataUserVoucher->save();

                    //tambah ke history voucher
                    $dataHistory = new PointHistory;
                    $dataHistory->id_user = Auth::user()->id;
                    $dataHistory->kredit = $voucher->jumlahpoint;
                    $dataHistory->debit = 0;
                    $dataHistory->keterangan = 'Redeem Kode Voucher '.$voucher->judul;
                    $dataHistory->save();

                    //return back
                    return redirect()->back();
                }else return redirect()->back()->withErrors(['msg' => 'Anda sudah pernah menggunakan kode voucher ini!']);
            }else return redirect()->back()->withErrors(['msg' => 'Batas kode voucher sudah habis!']);
        }else return redirect()->back()->withErrors(['msg' => 'Kode Voucher tidak ditemukan!']);
    }

    public function detailPoint(){
        return view('user.point',[
            'history' => PointHistory::where('id_user',Auth::user()->id)->get(),
            'kategori' => Kategori::all(),
        ]);
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
     * @param  \App\Models\UserVoucher  $userVoucher
     * @return \Illuminate\Http\Response
     */
    public function show(UserVoucher $userVoucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserVoucher  $userVoucher
     * @return \Illuminate\Http\Response
     */
    public function edit(UserVoucher $userVoucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserVoucher  $userVoucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserVoucher $userVoucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserVoucher  $userVoucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserVoucher $userVoucher)
    {
        //
    }
}
