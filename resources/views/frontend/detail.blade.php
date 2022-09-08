@extends('themes.frontend.master')

@section("page_title")
@if($pages)
:: {{ $pages->pages[0]->page_name }}
@endif

@endsection
@section("content")

@if($pages)
@foreach ($pages->pages as $value)
@if($value->page_type == "course-single")
@include("frontend.pages.courses.course-single",$value)
@endif
@if($value->page_type == "course-list")
@include("frontend.pages.courses.course-list",$value)
@endif
@if($value->page_type == "terms")
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">
                {{ $value->page_name }}
            </h2>
            {!! $value->description !!}
        </div>
    </div>
</div> @endif
@endforeach

@endif


@if($courses)
@include("frontend.pages.courses.course-list")
@endif

@endsection