@if( $errors->any())
<div class="alert alert-danger alert-dismissible mb-2" role="alert">
    <button type="button" class="close text-info" data-dismiss="alert" aria-label="close">
        x
    </button>
    @foreach ($errors->all() as $error)
    <div class='d-flex align-items-center'>
        <!-- <i class="bx bx-error"></i> -->
        <span>{{ $error }}</span>
    </div>
    @endforeach
</div>
@endif

@if(Session::has('info'))
<div class="alert alert-info alert-dismissible mb-2" role="alert">
    <button type="button" class="close text-info" data-dismiss="alert" aria-label="close">
        x
    </button>
    <div class='d-flex align-items-center'>
        <i class="bx bx-check"></i>
        <span>{{ Session::get('info') }}</span>
    </div>
</div>

@endif

@if(Session::has('warning'))
<div class="alert alert-warning alert-dismissible mb-2" role="alert">
    <button type="button" class="close text-info" data-dismiss="alert" aria-label="close">
        x
    </button>
    <div class='d-flex align-items-center'>
        <i class="bx bx-check"></i>
        <span>{{ Session::get('warning') }}</span>
    </div>
</div>

@endif
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible mb-2" role="alert">
    <div class='d-flex align-items-center'>
        <i class="bx bx-check"></i>
        <span>{{ Session::get('success') }}</span>
    </div>
</div>

@endif
@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible mb-2" role="alert">
    <div class='d-flex align-items-center'>
        <i class="bx bx-check"></i>
        <span>{{ Session::get('error') }}</span>
    </div>
</div>

@endif