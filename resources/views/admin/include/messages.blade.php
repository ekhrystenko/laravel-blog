@if( session('created') )
    <div class="alert alert-success text-center" id="fade-out">
        {{ session('created') }}
    </div>
@endif
@if( session('updated') )
    <div class="alert alert-warning text-center" id="fade-out">
        {{ session('updated') }}
    </div>
@endif
@if( session('deleted') )
    <div class="alert alert-danger text-center" id="fade-out">
        {{ session('deleted') }}
    </div>
@endif
