@extends('layouts.admin_layouts')


@section('content')


    <main>
    
        
        <div class="container-fluid">
            <h1 class="mt-4">Portfolio</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Portfolio</li>
            </ol>
        
        <form action="{{route('admin.portfolio.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}

            <div class="row">
                
                <div class="form-group col-md-3 ">
                    <h3>Big Image</h3>
                    <img style="height: 30vh" src="{{url($portfolios->big_image)}}" class="img-thumbnail">
                    <input class="mt-3" type="file" id="big_img" name="big_image">
                </div>
                <div class="form-group col-md-5 mt-3">
                    <h3>Small Image</h3>
                    <img style="height: 20vh" src=" {{url($portfolios->small_image)}}" class="img-thumbnail" >
                    <input class="mt-3" type="file" name="small_img">
                </div>

                <div class="form-group col-md-4">
                    <div class="mb-3">
                        <label for="title"><h4>Title</h4></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$portfolios->title}}">
                    </div>
                    <div class="mb-4">
                        <label for="sub_title"><h4>Sub Title</h4></label>
                        <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{$portfolios->sub_title}}">
                    </div>

                    <div class="mb-6">
                        <label for="description" class="form-control"><h4>Description</h4></label>
                        <textarea name="description" id="description" rows="5">{{$portfolios->description}}</textarea>
                    </div>


                    <div class="mb-2">
                        <label for="client"><h4>Project Name</h4></label>
                        <input type="text" class="form-control" id="client" name="client" value="{{$portfolios->client}}">
                    </div>


                    <div class="mb-2">
                        <label for="client"><h4>Project Sub-Title</h4></label>
                        <input type="text" class="form-control" id="client" name="client" value="{{$portfolios->client}}">
                    </div>

                    <div class="mb-2">
                        <label for="client"><h4>Client</h4></label>
                        <input type="text" class="form-control" id="client" name="client" value="{{$portfolios->client}}">
                    </div>

                    <div class="mb-2">
                        <label for="category"><h4>Category</h4></label>
                        <input type="text" class="form-control" id="category" name="category" value="{{$portfolios->category}}">
                    </div>

            <input type="submit" name="submit" class="btn btn-primary">
                    
                </div>
            </div>

        </div>

    </form>


        
    </main>
@endsection