<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('frontend.welcome');
    }

    public function aboutMe()
    {
        return view('frontend.aboutme');
    }

    public function tos()
    {
        return view('frontend.tos');
    }

    public function privacy()
    {
        return view('frontend.privacy');
    }

    public function faq()
    {
        return view('frontend.faq');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function balletpointe()
    {
        return view('frontend.balletpointe');
    }
    public function balletpointe_des()
    {
        return view('frontend.balletpointe_des');
    }

    public function search_1()
    {
        return view('frontend.search_1');
    }

    public function search_2()
    {
        return view('frontend.search_2');
    }

    public function infor_setting()
    {
        return view('frontend.infor_setting');
    }

    public function my_infor()
    {
        return view('frontend.my_infor');
    }

    public function pointe_shoes()
    {
        return view('frontend.pointes');
    }

    public function log_in()
    {
        return view('frontend.log_in');
    }
}
