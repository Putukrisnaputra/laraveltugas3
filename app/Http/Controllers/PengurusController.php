<?php

namespace App\Http\Controllers;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\storage;


class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengurus=Pengurus::all();
        $title="Daftar Pengurus";
        return view('admin.berandapengurus',compact('title','pengurus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Input Penguyus";
        return view('admin.inputpengurus',compact('title'));
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
                'spesialis'=>'required',
                'gambar'=>'required|mimes:jpg,bmp,png|max:512'
            ],$message);
            $path = $request->file('gambar')->store('gambars1');
            $validasi['user_id']=Auth::id();
            $validasi['gambar']=$path;
            Pengurus::create($validasi);
            return redirect('pengurus')->with('success','Data Berhasil Tersimpan');
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
        $pengurus=Pengurus::find($id);
        $title="Edit pengurus";
        return view('admin.inputpengurus',compact('title','pengurus'));
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
                'spesialis'=>'required',
                'gambar'=>'required|mimes:jpg,bmp,png|max:512'
            ],$message);
            if($request->hasFile('gambar')){
                $fileName=time().$request->file('gambar')->getClientOriginalName();
                $path = $request->file('gambar')->storeAs('gambars1',$fileName);
                    $validasi['gambar']=$path;
                    $pengurus=Pengurus::find($id);
                    Storage::delete($pengurus->gambar);
                }
                $validasi['user_id']=Auth::id();
                Pengurus::where('id',$id)->update($validasi);
                return redirect('pengurus')->with('success','Data Berhasil Terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengurus=Pengurus::find($id);
        if($pengurus != null){
            Storage::delete($pengurus->gambar);
            $pengurus=Pengurus::find($pengurus->id);
            Pengurus::where('id',$id)->delete();
        }
        return redirect('pengurus')->with('sucess','Data berhasil terhapus');
    }
}
