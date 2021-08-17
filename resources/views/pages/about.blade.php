@extends('layouts.admin_layouts')

@section('content')
    <div id="layoutSidenav_content">        
        <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Static Navigation</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Main</li>
                    </ol> 
                </div>           
                    
        </main>

    </div>    


@endsection