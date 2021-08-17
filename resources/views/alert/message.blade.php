@if($errors->any())
    <div class="alert alert-danger">
    
        @foreach ($errors->all() as $error)
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="fa fa-times"></i>
                </button>
                <strong>Error!! !</strong> {{$error}}
            </div>
        @endforeach  
    </div>
@endif

@if(session('error')))
    <div class="alert alert-danger">
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="fa fa-times"></i>
                </button>
                <strong>Error!! !</strong> {{$error}}
            </div>  
    </div>
@endif

@if(session('success')))
    <div class="alert alert-danger">
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="fa fa-times"></i>
                </button>
                <strong>Success!! Main Page data has been updated successfully!</strong> {{ $success ?? '' }}
            </div>  
    </div>
@endif