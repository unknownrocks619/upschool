<div class="page-content">
    <div class="row">
        <div class="col-md-12 main-content ps-xl-4 pe-xl-5">
            <h1 class="page-title"> {{ $heading }} </h1>
            @if($info)
            <p class="lead">
                {{ $info }}
            </p>
            @endif
        </div>
        {{ $slot }}
    </div>
</div>