<div class="row">
    @foreach ($widget->fields as $module)
    <div class="col-md-6 text-center">
        <div class="card-body">
            <h2 style="color:#B81242">
                {{ $module->title }}
            </h2>

            {!! $module->content !!}
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $module->video->id }}" title="{{ $module->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
    @endforeach
</div>