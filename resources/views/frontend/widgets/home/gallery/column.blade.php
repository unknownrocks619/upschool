<div class="row">
    @foreach ($widget->fields as $module)
    <div class="col-md-5 mx-auto">
        <div class="">
            <div class="card-header" style="background:#fdcf60;color:#181739">
                <h2 class="card-title display-4">{{ $module->title }}</h2>
            </div>
            <div class="card-body">
                <img src="{{ asset($module->image->path) }}" class="img-fluid w-100" />
                {!! $module->content !!}
            </div>
        </div>
    </div>
    @endforeach
</div>