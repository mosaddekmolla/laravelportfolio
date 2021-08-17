@extends('layouts.admin_layouts')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">List of Services</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">List of Services</li>
            </ol>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($service) > 0)
                        @foreach ($service as $serve)
                            <tr>
                                <th scope="row">{{$serve->id}}</th>
                                <td>{{$serve->icon}}</td>
                                <td>{{$serve->title}}</td>
                                <td>{{Str::limit(strip_tags($serve->description),40)}}</td>
                                <td >
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <a href="{{route('admin.services.edit', $serve->id)}}" class="btn btn-primary">Edit</a>
                                        </div>
                                    
                                        <div class="col-sm-5">
                                            <form action="{{route('admin.services.destroy', $serve->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                                            </form>
                                        </div>  
                                    </div>
                                </td>                              
                            </tr>
                        @endforeach
                        
                    @endif
                  
                </tbody>
              </table>
    </main>
@endsection