<div class="row">
    @foreach ($widget->fields as $module)
    <div class="col-md-12 text-center">
        <h1>
            {{ $module->title }}
        </h1>
        <img src="{{ asset($module->image->path) }}" alt="{{ $module->title }}" srcset="{{ asset($module->image->path) }}" class="img-fluid">
    </div>

    @endforeach
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <div id="map_7028"></div>
    </div>
</div>