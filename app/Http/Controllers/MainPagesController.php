<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;

class MainPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $main = Main::first();
        //model
        return view('pages.main', compact('main'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $validated = $request->validate([
            'title' => 'string|required|max:255',
            'sub_title' => 'string|required',
        ]);

        $main = Main::first();
        $main->title = $request->title;
        $main->sub_title = $request->sub_title;

        if($request->file('logo')){
            $logo_file = $request->file('logo');
            $logo_file->storeAs('public/logo/','logo.' . $logo_file->getClientOriginalExtension());
            $main->logo = 'storage/logo/logo.' . $logo_file->getClientOriginalExtension();

        }

        if($request->file('bg_img')){
            $img_file = $request->file('bg_img');
            $img_file->storeAs('public/img/','bg_img.' . $img_file->getClientOriginalExtension());
            $main->bg_img = 'storage/img/bg_img.' . $img_file->getClientOriginalExtension();

        }

        if($request->file('resume')){
            $pdf_file = $request->file('resume');
            $pdf_file->storeAs('public/resume/','resume.' . $pdf_file->getClientOriginalExtension());
            $main->resume = 'storage/resume/resume.' . $pdf_file->getClientOriginalExtension();

        }

        $main->save();
        
        return redirect()->route('admin.main')->with('success', "Main Page data has been updated successfully");


    }

}
