<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DPromo;
use App\Models\HPromo;
use App\Models\HRetur;
use App\Models\HTrans;
use App\Models\Kategori;
use App\Models\Voucher;
use Illuminate\Http\Request;

class AdminViewController extends Controller
{
    //
    public function home(){
        return view('admin.home',[
            'title' => "Home"
        ]);
    }

    public function kategori(){
        $kategoris = Kategori::all();
        return view('admin.kategori',[
            'title' => "Kategori",
            'kategori' => $kategoris,
        ]);
    }

    public function addKategori(){
        return view('admin.addKategori',[
            'title' => "Kategori",
        ]);
    }

    public function updateKategori($id){
        $kategori = Kategori::where('id',$id)->first();
        // dd($kategori);
        return view('admin.updateKategori',[
            'title' => "Kategori",
            'kategori' => $kategori,
        ]);
    }

    public function buku(){
        return view('admin.buku',[
            'title' => "Buku",
            'buku' => Buku::all()
        ]);
    }

    public function addBuku(){
        return view('admin.addBuku',[
            'title' => "Buku",
        ]);
    }

    public function kategoriBuku($id){
        return view('admin.bukuKategori',[
            'bukuSelected' => Buku::where('id',$id)->first(),
            'kategori' => Kategori::all(),
            'title' => "Buku",
        ]);
    }

    public function updateBuku($id){
        $buku = Buku::where('id',$id)->first();
        return view('admin.updateBuku',[
            'title' => "Buku",
            'buku' => $buku,
        ]);
    }

    public function promo(){
        return view('admin.promo',[
            'title' => "Promo",
            'promo' => HPromo::all(),
            'current' => HPromo::first(),
        ]);
    }

    public function addPromo(){
        return view('admin.addPromo',[
            'title' => "Promo",
            'buku' => Buku::all(),
        ]);
    }

    public function selectPromo($id){
        return view('admin.promo',[
            'title' => "Promo",
            'promo' => HPromo::all(),
            'current' => HPromo::where('id',$id)->first(),
        ]);
    }

    public function updatePromo($id){
        $hpromo = HPromo::where('id',$id)->first();
        $dpromo = DPromo::where('id_promo',$id)->get();
        return view('admin.updatePromo', [
            'title' => "Promo",
            "hpromo" => $hpromo,
            "dpromo" => $dpromo,
            "buku" => Buku::all(),
        ]);
    }

    public function bukti_transfer(){
        $firstHeader = HTrans::where('status',1)->first();
        if ($firstHeader == null){
            return view('admin.bukti-transfer',[
                "pemesanan" => HTrans::where('status','>=',1)->get(),
                "current" => HTrans::where('status','>=',1)->first(),
                "title" => "Bukti Transfer",
            ]);
        }
        return redirect('admin/bukti-transfer/'.$firstHeader->id);
    }

    public function pengantaran(){
        $firstHeader = HTrans::where('status',2)->first();
        if ($firstHeader == null){
            return view('admin.pengantaran',[
                "pemesanan" => HTrans::where('status','>=',2)->get(),
                "current" => HTrans::where('status','>=',2)->first(),
                "title" => "Pengantaran",
            ]);
        }
        return redirect('admin/pengantaran/'.$firstHeader->id);
    }

    public function retur(){
        $firstHeader = HRetur::where('status',0)->first();
        if ($firstHeader == null){
            return view('admin.retur',[
                "pemesanan" => HRetur::where('status','>=',0)->get(),
                "current" => HRetur::where('status','>=',0)->first(),
                "title" => "Retur",
            ]);
        }
        return redirect('admin/retur/'.$firstHeader->id);
    }

    public function resend(){
        $firstHeader = HRetur::where('status',1)->first();
        if ($firstHeader == null){
            return view('admin.resend',[
                "pemesanan" => HRetur::where('status','>=',1)->where('status', '<', 99)->get(),
                "current" => HRetur::where('status','>=',1)->where('status', '<', 99)->first(),
                "title" => "Resend",
            ]);
        }
        return redirect('admin/resend/'.$firstHeader->id);
    }

    public function voucher(){
        return view('admin.voucher',[
            'title' => "Manajemen Kode Voucher",
            'voucher' => Voucher::all(),
            'current' => Voucher::first(),
        ]);
    }

    public function selectVoucher($id){
        return view('admin.voucher',[
            'title' => "Manajemen Kode Voucher",
            'voucher' => Voucher::all(),
            'current' => Voucher::where('id',$id)->first(),
        ]);
    }

    public function addVoucher(){
        return view('admin.addVoucher',[
            'title' => "Voucher",
        ]);
    }

    public function updateVoucher($id){
        $voucher = Voucher::where('id',$id)->first();
        return view('admin.updateVoucher',[
            'title' => "Voucher",
            'voucher' => $voucher,
        ]);
    }
}
