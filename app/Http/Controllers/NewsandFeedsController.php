<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsandFeedsController extends Controller
{
    public function index(){
        return view('admin.newsandfeeds');
    }
}
