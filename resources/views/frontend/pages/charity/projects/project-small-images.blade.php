<div class="images d-flex justify-content-start my-4" style="column-gap: 30px;">
    @foreach ($project->images->images as $image_key => $image_value)
        @if($image_value->source)
        <img style="width: 70px ; height: 70px" src='{{ $image_value->source }}' />
        @endif
    @endforeach
</div>
