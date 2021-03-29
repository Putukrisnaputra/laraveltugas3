<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $title="Data Mahasiswa";
        $data['mahasiswa']=array(
            'nim'=>'1905021009',
            'nama'=>'I Gusti Putu Aditya Permadi',
            'alamat'=>'Jalan Bukit Patas',
            'nohp'=>'085965900427',
            'email'=>'aditya.permadi@undiksha.ac.id'
        );
        return view('admin.beranda', compact('title','data'));
    }
    public function dashboard(){
        $title="Data Dashboard";

        return view('admin.dashboard', compact('title'));
    }
}
