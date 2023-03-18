<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemoController extends Controller
{

    public function HomeMain(){
        return view('frontend.index');
    }


    public function index(){
        return view('about');
    }


    public function ContactController(){
        return view('contact');
    }



}
