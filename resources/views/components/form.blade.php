<form action="{{$action}}" method="post" enctype="multipart/form-data">
    @if(isset($method) )
    @method($method)
    @endif
    @csrf
    {{ $slot }}
    <button type="submit" class="btn btn-primary me-2 w-75">Submit</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
</form>