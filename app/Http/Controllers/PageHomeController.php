<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PageHomeController extends Controller
{
    public function index(){
        $indexRecords = DB::table('anasayfa')->get();
        return view('frontend.include.index',compact("indexRecords"));

    }

    public function index2(){
        $indexRecords = DB::table('anasayfa')->get();
        return view('frontend.include.index',compact("indexRecords"));

    }

}
