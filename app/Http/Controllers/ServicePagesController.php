<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ServicePagesController extends Controller
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
        $service = Services::first();
        return view('pages.services.create', compact('service'));
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
            'title' => 'string|required',
            'description' => 'string|required',
        ]);

        $service =new Services;
        
        $service->title = $request->title;
        $service->description = $request->description;

        if ($request->file('icon')) {
            $icon_file = $request->file('icon');
            $icon_file->storeAs('public/icon/', 'icon.' . $icon_file->getClientOriginalExtension());
            $service->icon = 'storage/icon/icon.' . $icon_file->getClientOriginalExtension();
        }

        if ($request->file('bg_image')) {
            $img_file = $request->file('bg_image');
            $img_file->storeAs('public/img/', 'bg_image.' . $img_file->getClientOriginalExtension());
            $service->bg_img = 'storage/img/img_file.' . $img_file->getClientOriginalExtension();
        }

        $service->save();

        return redirect()->route('admin.services.create')->with('Success', "Services data has been added Successfully");
    }

    public function list()
    {
        $service = Services::all();
        return view('pages.services.list', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $service = Services::find($id);
    //     return view('pages.services.edit', compact('service'));
    // }

    public function edit($id)
    {
        $service = Services::find($id);
        return view('pages.services.list', compact('service'));
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $service = Services::find($id);
        $service->delete();

        return redirect()->route('admin.services.list')->with('Success', "Services data has been Deleted Successfully");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
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
}