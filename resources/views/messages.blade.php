@if(Session::has('error-message'))
<div class="container-fluid">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session::get('error-message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif

@if(Session::has('success-message'))
<div class="container-fluid">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('success-message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif