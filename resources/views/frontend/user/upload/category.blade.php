@extends("themes.frontend.master")

@section("page_title")
:: Upload
@endsection

@section("content")
<div class="container mb-11 mt-8">
    <div class="row gx-0 m-3 my-4 ">
        <div class="col-md-8 col-xl-7 mx-auto border my-4 rounded rounded-2">
            <img src="https://upschool.co/wp-content/uploads/2022/07/Upschool-Shopping-Cart-1440-%C3%97-300-px-6-1024x213.png" alt="Upload Book - Upschool" srcset="https://upschool.co/wp-content/uploads/2022/07/Upschool-Shopping-Cart-1440-%C3%97-300-px-6-1024x213.png" class="img-fluid  rounded rounded-2" />
        </div>
        <div class="col-md-8 col-xl-7 mx-auto text-center my-4 rounded rounded-2">
            <h3 class="sample-text mb-3">
                Upload Your Book !
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card border-none" style="border: 3px solid #D9D9D9">
                <div class="card-body">
                    <h4 class="card-title text-center fs-5" style="color:#242254;">
                        Your Book Details
                    </h4>
                    <div class="row">
                        <div class="col-md-1">
                            <i class="fas fa-solid fa-arrow-left text-white" style="background-color:#CA265F;border-radius:50%;padding:3.5px;"></i>
                        </div>
                        <div class="col-md-10 ms-2">
                            <?php
                            $menu = menus()->where('menu_type', 'upload-book-form')->first();
                            if ($menu == null) {
                                $menu = \App\Models\Menu::select('slug')->where('menu_type', 'book-upload-form')->first();
                            }
                            ?>
                            <a href="@if($menu) {{ route('frontend.view',[$menu->slug,$book->id]) }} @endif">Back to Book Upload Page</a>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-1">
                            <i class="fas fa-solid fa-arrow-left text-white" style="background-color:#CA265F;border-radius:50%;padding:3.5px;"></i>
                        </div>
                        <div class="col-md-10 ms-2">
                            <a href="{{ route('frontend.auth_user.books.book.meta',$book->id) }}">Back to Book Information</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 text-center">
            <form onsubmit="return onconfirm('You are about to submit your book, You cannot edit after the content after upload. Are you sure to continue ?')" action="{{ route('frontend.auth_user.books.book.category.store', $book->id) }}" method="post">
                @csrf
                <div class="card" style="min-height: 60%">
                    <div class="card-body" style="border: none !important">
                        <h4 class="mb-4">
                            Please select upto 5 categories
                        </h4>
                        <div class="row">
                            <div class="col-md-12">
                                <x-flash></x-flash>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="search" class="form-control" id="search" placeholder="Type to filter category..">
                                </div>
                            </div>

                            <!-- Category Display Area -->
                            <div class="searchable-container">
                                <div class="row">
                                    @foreach ($categories as $category)
                                    <div class="items mb-3 col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="info-block block-info clearfix">
                                            <div class="square-box pull-left">
                                                <span class="glyphicon glyphicon-tags glyphicon-lg"></span>
                                            </div>
                                            <div data-toggle="buttons" class="btn-group bizmoduleselect">
                                                <label class="btn btn-default">
                                                    <div class="bizcontent">
                                                        <input type="checkbox" name="cat_id[{{ $category->id }}]" @if(old('cat_id.'.$category->id) == $category->id) checked @endif autocomplete="off" value="{{ $category->id }}">
                                                        <span class="glyphicon glyphicon-ok glyphicon-lg"></span>
                                                        <h5>{{ $category->category_name }}</h5>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- / Category Display Area  -->
                        </div>
                    </div>
                    <div class="card-body mt-2" style="border: none !important">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    Next Step
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-3">
            <div class="card border-none" style="border: 3px solid #D9D9D9">
                <div class="card-body">
                    <h4 class="card-title text-center fs-5" style="color:#242254;">
                        Upload your book in three simple steps
                    </h4>
                    <div class="row ms-1 bg-primary p-2 pt-2 mb-2" style="background:#242254 !important;color:#fff">
                        <div class="col-md-1">
                            <i class="fas fa-solid fa-check text-white" style="background-color:#99B83C;border-radius:50%;padding:3.5px;"></i>
                        </div>
                        <div class="col-md-10">
                            <h5 class="mb-0 px-2">Step 01</h5>
                            <small class="mt-0 px-2">
                                Upload Your Book
                            </small>
                        </div>
                    </div>
                    <div class="row ms-1 bg-primary p-2 mb-2" style="background:#242254 !important;color:#fff">
                        <div class="col-md-1">
                            <i class="fas fa-solid fa-check text-white" style="background-color:#99B83C;border-radius:50%;padding:3.5px;"></i>
                        </div>
                        <div class="col-md-10">
                            <h5 class="mb-0 px-2">Step 02</h5>
                            <small class="mt-0 px-2">
                                Write details about your book
                            </small>
                        </div>
                    </div>
                    <div class="row ms-1 bg-primary p-2 mb-2" style="background:#242254 !important;color:#fff">
                        <div class="col-md-1">
                            <i class="fas fa-solid fa-check text-white" style="background-color:#99B83C;border-radius:50%;padding:3.5px;"></i>
                        </div>
                        <div class="col-md-10">
                            <h5 class="mb-0 px-2">Step 03</h5>
                            <small class="mt-0 px-2">
                                Your book category
                            </small>
                        </div>
                    </div>
                    <div class="row ms-1 bg-primary p-2" style="background:#242254 !important;color:#fff">
                        <div class="col-md-1">
                            <i class="fas fa-solid fa-check text-white" style="background-color:#A6A6A6;border-radius:50%;padding:3.5px;"></i>
                        </div>
                        <div class="col-md-10">
                            <h5 class="mb-0 px-2">Step 04</h5>
                            <small class="mt-0 px-2">
                                Your book preview and summary
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push("custom_css")
<style type="text/css">
    .searchable-container {
        margin: 20px 0 0 0
    }

    .searchable-container label.btn-default.active {
        background-color: #007ba7;
        color: #FFF
    }

    .searchable-container label.btn-default {
        width: 90%;
        border: 1px solid #efefef;
        margin: 5px;
        box-shadow: 5px 8px 8px 0 #ccc;
    }

    .searchable-container label .bizcontent {
        width: 100%;
    }

    .searchable-container .btn-group {
        width: 90%
    }

    .searchable-container .btn span.glyphicon {
        opacity: 0;
    }

    .searchable-container .btn.active span.glyphicon {
        opacity: 1;
    }
</style>
@endpush

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
    });
</script>
@endpush