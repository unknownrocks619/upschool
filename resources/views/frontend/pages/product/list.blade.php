@extends('themes.frontend.master')

@section("page_title")
{{ $menu->menu_name }}
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
    <div class="row mt-4 grey-background">
        <div class="col-md-8 mt-2">
            <div class="form-group">
                <input type="text" class="form-control transparent" style="border:none !important" id="search" placeholder="Search a book by title, Category, Author..">
            </div>
        </div>
        <div class="col-md-4 mt-2">
            <div class="form-group">
                <select name="categoryFilter" class="form-control transparent" id="categoryFilter">
                    <option value="">Filter By Category</option>
                    @foreach (categories()->where('category_type',"book_upload_category") as $category)
                    <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="searchable-container">
            <div class="row">
                @foreach ($products as $product)
                <div class="items mb-3 col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="card-body p-0">
                            <img src="{{ asset($product->featured_image->path) }}" class="img-fluid" />
                            <div class="content" style="padding:1rem 1rem">
                                <div class="author">
                                    {{ $product->author->first_name }}
                                </div>
                                <h3>{{ $product->product_name }}</h3>
                                <div class="country">
                                    {{ $product->author->country }}
                                </div>
                                <p>
                                    {!! $product->short_description !!}
                                </p>
                                <div class="category">
                                    @foreach ($product->categories as $category)
                                    <small class="btn btn-xs fs-8 btn-outline-primary me-1 mb-1">
                                        {{ $category->category_name }}
                                    </small>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('frontend.book.show',$product->slug) }}" class="btn btn-danger">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@push("custom_scripts")
<script type="text/javascript">
    $(function() {
        $('#search').on('keyup', function() {
            var pattern = $(this).val();
            $('.searchable-container .items').hide();
            $('.searchable-container .items').filter(function() {
                return $(this).text().match(new RegExp(pattern, 'i'));
            }).show();
        });

        $("#categoryFilter").on("change", function() {
            var pattern = $(this).val();
            $('.searchable-container .items').hide();
            $('.searchable-container .items').filter(function() {
                return $(this).text().match(new RegExp(pattern, 'i'));
            }).show();

        })
    });
</script>
@endpush