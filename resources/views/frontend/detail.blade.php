@extends('themes.frontend.master')

@section("page_title")
@if($pages)
:: {{ $pages->pages[0]->page_name }}
@endif

@endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if($pages)
            @foreach ($pages->pages as $value)
            <h2 class="text-center">
                {{ $value->page_name }}
            </h2>
            {!! $value->description !!}
            @endforeach

            @endif
        </div>
    </div>
</div>
@endsection