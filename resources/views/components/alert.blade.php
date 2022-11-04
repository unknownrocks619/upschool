@if( $errors->any())
<div class="alert alert-danger alert-dismissible mb-2" role="alert">
    @foreach ($errors->all() as $error)
    <div class='d-flex align-items-center' style="font-family: 'Inter' !important;">
        <i class="icon fas fa-exclamation"></i> &nbsp;
        <span>{{ $error }}</span>
    </div>
    @endforeach
</div>
@endif

@if(Session::has('info'))
<div class="alert alert-info alert-dismissible mb-2" role="alert">
    <div class='d-flex align-items-center' style="font-family: 'Inter' !important;">
        <i class="icon fas fa-exclamation"></i> &nbsp;
        <span> {{ Session::get('info') }}</span>
    </div>
</div>

@endif

@if(Session::has('warning'))
<div class="alert alert-warning alert-dismissible mb-2" role="alert">
    <div class='d-flex align-items-center' style="font-family: 'Inter' !important;">
        <i class="icon fas fa-exclamation"></i> &nbsp;
        <span> {{ Session::get('warning') }}</span>
    </div>
</div>

@endif