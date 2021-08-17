<?php

namespace App\Http\Controllers;

use App\Models\Main;
use App\Models\Portfolio;
use App\Models\Services;
use Illuminate\Http\Request;
use Facade\Ignition\DumpRecorder\Dump;

class PagesController extends Controller
{
    
    public function index(){

        $main = Main::first();
        $service = Services::all();
        $portfolios = Portfolio::first();
        return view('pages.index', compact('main', 'service', 'portfolios'));
    }

    public function dashboard(){
        return view('pages.dashboard');
    }

    public function main(){
        return view('pages.main');
    }

    public function services(){
        return view('pages.services');
    }

    public function portfolio(){
        return view('pages.portfolio');
    }

    public function contact(){
        return view('pages.contact');
    }

    public function about(){
        return view('pages.about');
    }

}
