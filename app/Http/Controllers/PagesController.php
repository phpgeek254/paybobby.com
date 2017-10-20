<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
	{


		return view('pages.home');
	}
    public function about(){
    	return view('pages.about');
    }

    public function contact(){
    	return view('pages.contact');
    }

    public function working(){
    	return view('pages.working');
    }

    public function achievement()
    {
    	return view('pages.achievement');
    }

    public function faqs()
    {
        return view('pages.faqs');
    }
}
