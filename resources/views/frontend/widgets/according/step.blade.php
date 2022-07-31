<section>
    @foreach (to_object($widget->widgets) as $widget)
        @if($widget->according_title)
            <h1 class="work-title text-center mb-5">
                {{ $widget->according_title}}
            </h1>
        @endif
        @if( $loop->index)
            <div class="steps-section">
        @endif
        <div class="steps-divider">

        </div>
        <div class="step">
            <div class="step-details">
                {!! $widget->content !!}
            </div>
        </div>

        @if($loop->last)
            </div>
        @endif
    @endforeach