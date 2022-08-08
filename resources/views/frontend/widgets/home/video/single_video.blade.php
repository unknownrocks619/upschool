<div class="row bg-light">
    @foreach ($widget->fields as $module)

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12 text-center">
                <p @if(isset($widget->settings->title_color)) style="color:{{ $widget->settings->title_color }} !important" @endif>
                    {{ $module->title }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 text-center mx-auto">
                <div class="display-2">
                    {!! $module->content !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 mx-auto">
                <iframe width="100%" height="415" src="https://www.youtube.com/embed/{{ $module->video->id }}" title="{{ $module->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    @endforeach
</div>