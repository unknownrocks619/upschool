<div class="col-lg-{{ $side_layout }} col-sm-12 m-0 p-0">
    @foreach (to_object($widget->widgets) as $widget)
    @If( $loop->first)
    <!-- first loop -->
    <div class="row p-0 m-0">
        <div class="col-lg-6 col-sm-6 col-6 p-0 m-0">
            <img src="{{ asset($widget->gallery->path) }}" class="img-fluid p-0" alt="">
        </div>
        <div class="col-lg-6 col-sm-6 col-6 p-0 m-0 box-img">
            <div>

            </div>
        </div>
    </div>
    @else
    <!-- /end first loop -->
    @if ($loop->index == 1)
    <!-- second iteration -->
    <div class="row p-0 m-0">
        @endif

        <div class="col-lg-6 col-sm-6 col-6 p-0 m-0">
            <img src="{{ $widget->gallery->path }}" width="100%" height="82%" alt="" style="object-fit: cover;">
        </div>

        @if($loop->last)
    </div>
    @endif
    @endif
    @endforeach
</div>

@if($side_grid)
</div>
</section>
@endif