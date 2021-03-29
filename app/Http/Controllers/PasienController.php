<?php

namespace App\Http\Controllers;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\storage;



class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien=Pasien::all();
        $title="Daftar Pasien";
        return view('admin.berandapasien',compact('title','pasien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Input Pasien";
        return view('admin.inputpasien',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
            'required'=> 'Kolom :attribute Harus Lengkap',
            'date'=>'Kolom :attribute Harus Tanggal',
            'numeric'=>'Kolom :attribute Harus Angka',
            ];
            $validasi=$request->validate([
                'nama'=>'required',
                'waktu'=>'required',
                'jeniskelamin'=>'required',
                'penyakit'=>'required',
                'alamat'=>'required'       
            ],$message);
            $validasi['user_id']=Auth::id();
            Pasien::create($validasi);
            return redirect('pasien')->with('success','Data Berhasil Tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasien=Pasien::find($id);
        $title="Edit pasien";
        return view('admin.inputpasien',compact('title','pasien'));
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
        $message=[
            'required'=> 'Kolom :attribute Harus Lengkap',
            'date'=>'Kolom :attribute Harus Tanggal',
            'numeric'=>'Kolom :attribute Harus Angka',
            ];
            $validasi=$request->validate([
                'nama'=>'required',
                'waktu'=>'required',
                'jeniskelamin'=>'required',
                'penyakit'=>'required',
                'alamat'=>'required' 
            ],$message);
                $pasien=Pasien::find($id);
                Storage::delete($pasien->alamat);
            $validasi['user_id']=Auth::id();
            Pasien::where('id',$id)->update($validasi);
            return redirect('pasien')->with('success','Data Berhasil Terupdate');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien=Pasien::find($id);
        if($pasien != null){
            Storage::delete($pasien->alamat);
            $pasien=Pasien::find($pasien->id);
            Pasien::where('id',$id)->delete();
        }
        return redirect('pasien')->with('sucess','Data berhasil terhapus');
    }
}
