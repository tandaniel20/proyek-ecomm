<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlamatController extends Controller
{
    function prosesData(Request $request) {
        $rules = [

            'penerima' => 'required | max:255',
            'nohp' => 'required | numeric | digits_between:8,12',
            'provinsi' => 'required | max:255',
            'kota' => 'required | max:255',
            'kecamatan' => 'required | max:255',
            'kelurahan' => 'required | max:255',
            'kodepos' => 'required | numeric',
            'jalan' => 'required | max:255'
            //'email' => 'required | regex:/(.+)@(.+)\.(.+)/i' // format email @ .
            //'password' => 'required | min:8 | max:12 | regex:/^(?=.*[a-z])(?=.*[A-Z]).+$/ | confirmed'//sama ama confirm,harus ad huruf besar dan kecil
        ];

        $customError = [
            'required' => ':attribute harus diisi!',
            'numeric' => 'Mana ada :attribute ada hurufnya?',
        ];

        $this->validate($request,$rules,$customError);
        //mengambil isi cookie dan menampung pada variable users

        $penerima = $request->input('penerima');
        $nohp = $request->input('nohp');
        $provinsi = $request->input('provinsi');
        $kota = $request->input('kota');
        $kecamatan = $request->input('kecamatan');
        $kelurahan = $request->input('kelurahan');
        $kodepos = $request->input('kodepos');
        $jalan = $request->input('jalan');

        $data = new Alamat;

        $data->id_user = Auth::user()->id;
        $data->penerima = $penerima;
        $data->nohp = $nohp;
        $data->provinsi = $provinsi;
        $data->kota = $kota;
        $data->kecamatan = $kecamatan;
        $data->kelurahan = $kelurahan;
        $data->kodepos = $kodepos;
        $data->jalan = $jalan;
        $data->save();
        echo "<script>alert('Sukses Tambah Alamat')</script>";
        return redirect('alamat');
    }
    public function updatealamat(Request $request)
    {
        $rules = [
            'penerima' => 'required | max:255',
            'nohp' => 'required | numeric | digits_between:8,12',
            'provinsi' => 'required | max:255',
            'kota' => 'required | max:255',
            'kecamatan' => 'required | max:255',
            'kelurahan' => 'required | max:255',
            'kodepos' => 'required | numeric',
            'jalan' => 'required | max:255'
            //'email' => 'required | regex:/(.+)@(.+)\.(.+)/i' // format email @ .
            //'password' => 'required | min:8 | max:12 | regex:/^(?=.*[a-z])(?=.*[A-Z]).+$/ | confirmed'//sama ama confirm,harus ad huruf besar dan kecil
        ];

        //yang berisi dari rules yang ingin diganti pesannya
        $customError = [
            'required' => ':attribute harus diisi!',
            'numeric' => 'Mana ada :attribute ada hurufnya?',
        ];

        $this->validate($request,$rules,$customError);
        //mengambil isi cookie dan menampung pada variable users
        $id = $request->input('id');
        $penerima = $request->input('penerima');
        $nohp = $request->input('nohp');
        $provinsi = $request->input('provinsi');
        $kota = $request->input('kota');
        $kecamatan = $request->input('kecamatan');
        $kelurahan = $request->input('kelurahan');
        $kodepos = $request->input('kodepos');
        $jalan = $request->input('jalan');

        $data = Alamat::find($id);
        $data->penerima = $penerima;
        $data->nohp = $nohp;
        $data->provinsi = $provinsi;
        $data->kota = $kota;
        $data->kecamatan = $kecamatan;
        $data->kelurahan = $kelurahan;
        $data->kodepos = $kodepos;
        $data->jalan = $jalan;
        $data->save();
        echo "<script>alert('Sukses Update Alamat')</script>";
        return redirect('alamat');
    }
    public function deletealamat($id){
        $data = Alamat::find($id);
        $data->delete();
        echo "<script>alert('Sukses Delete Alamat')</script>";
        return redirect('alamat');
    }

    public function action(Request $request)
    {
        if($request->ajax())
        {
            if ($request->action == 'Edit')
            {
                $data = array(
                    'penerima' => $request->penerima,
                    'nohp' => $request->nohp,
                    'provinsi' => $request->provinsi,
                    'kota' => $request->kota,
                    'kecamatan' => $request->kecamatan,
                    'kelurahan' => $request->kelurahan,
                    'kodepos' => $request->kodepos,
                    'jalan' => $request->jalan
                );
                DB::table('alamat')
    				->where('id', $request->id)
    				->update($data);
                // Alamat::where('id',$request->id)
                // ->update($data);
            }
            if ($request->action == 'delete') {
                DB::table('alamat')
    				->where('id', $request->id)
    				->delete();

                // Alamat::where('id',$request->id)
                // ->delete();
            }
            return response()->json($request);
        }
    }
    public function alamat()
    {
        return view('user.alamat',[
            'title' => "Alamat",
            'alamat' => Alamat::all(),
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
        // $data = DB::table('alamat')->get();
    	// return view('user.addAlamat', compact('data'));
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
     * @param  \App\Models\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function show(Alamat $alamat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function edit(Alamat $alamat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alamat $alamat)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alamat $alamat)
    {
        //
    }
}
