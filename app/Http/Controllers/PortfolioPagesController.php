<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $portfolios = Portfolio::first();
        return view('pages.portfolios.create', compact('portfolios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'string|required',
            'sub_title' => 'string|required',
            'description' => 'string|required',
            'client' => 'string|required',
            'category' => 'string|required',

        ]);

        $portfolios = new Portfolio;
        $portfolios->title = $request->title;
        $portfolios->sub_title = $request->sub_title;

        

        // $big_file = $request->file('big_image');
        // Storage::putFile('public/img/', $big_file);
        // $portfolios->big_image = "storage/img/".$big_file->hashName();

        // $small_file = $request->file('small_image');
        // Storage::putFile('public/img/', $small_file);
        // $portfolios->small_image = "storage/img/".$small_file->hashName();

        

        if($request->file('big_image')){
            $big_img_file = $request->file('big_image');
            $big_img_file->storeAs('public/img/','big_image.' . $big_img_file->getClientOriginalExtension());
            $portfolios->big_image = 'storage/image/big_image.' . $big_img_file->getClientOriginalExtension();

        }

        if($request->file('small_image')){
            $img_file = $request->file('small_image');
            $img_file->storeAs('public/img/','small_image.' . $img_file->getClientOriginalExtension());
            $portfolios->small_image = 'storage/image/small_image.' . $img_file->getClientOriginalExtension();

        }

        $portfolios->description = $request->description;
        $portfolios->client = $request->client;
        $portfolios->category = $request->category;

        $portfolios->save();

        return redirect()->route('admin.portfolio.create')->with('Success');
        

    }

    public function list()
    {   
        $portfolios = Portfolio::all();
        return view('pages.portfolios.list', compact('portfolios'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
