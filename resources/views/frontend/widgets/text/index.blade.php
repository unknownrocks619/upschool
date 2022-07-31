@foreach(to_object($widget->widgets) as $widget)
<section class="body-title-section mt-5">
    <h1 class="text-center heading-title">{{ $widget->title }}</h1>
    <div class="heading-title-cover" style="width:70%">
        {!! $widget->content !!}
        <p class="text-center" id="heading-title-part-1">Register and begin.</p>
        <p class="text-center" id="heading-title-part-1">This FREE program is strictly limited to 10 schools a term! Act Fast.</p>
    </div>
</section>
@endforeach