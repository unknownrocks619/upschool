@extends('themes.frontend.master')

@section("page_title")
{{ $product->product_name }}
@endsection
@push("custom_css")
<style type="text/css">
    .transparent {
        padding: 0px !important;
        border-radius: 0px !important;
        background: #f6f6f6;
        box-shadow: none;
        border: none;
        line-height: 50px;
    }

    .transparent:focus {
        box-shadow: none !important;
        background: #f6f6f6;
    }

    .grey-background {
        background: #F6F6F6 !important;
        padding: 10px 20px;
        border: 1px solid #A3A2B6 !important;
    }
</style>
@endpush

@section("content")
<div class="container">
    <div class="row mt-4">
        <div class="col-md-8 mt-2">
            {{ $product->author->first_name }}
        </div>
        <div class="col-md-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Books</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->product_name }}</li>

                </ol>
            </nav>
            {{ menu_by_type('book-list') }}
        </div>

    </div>

    <div class="row">
        <div class="col-md-10">
            <h3 class="pt-4">{{ $product->product_name }}</h3>
        </div>
        <div class="col-md-2 text-end pt-4">
            <span class="p-4 border">
                <img src='https://ipdata.co/flags/np.png' />
                {{ $product->author->country }}
            </span>
        </div>
    </div>

    <div class="row mt-4 bg-light">
        <div class="col-md-12" style="min-height: 300px;">

        </div>
    </div>

    <div class="row mt-3">
        {!! $product->full_description !!}
    </div>
</div>
@endsection