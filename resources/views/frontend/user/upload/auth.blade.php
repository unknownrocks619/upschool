@extends("themes.frontend.master")

@section("page_title")
:: Upload
@endsection

@section("content")
<div class="container mb-11 mt-8">
    <div class="row gx-0 m-3 my-4 ">
        <div class="col-md-8 col-xl-7 mx-auto border my-4">
            <a href="{{ route('register') }}"><img src="https://upschool.co/wp-content/uploads/2022/06/Drawing-Class-Banner-1024x512.png" alt="upload book" srcset="https://upschool.co/wp-content/uploads/2022/06/Drawing-Class-Banner-1024x512.png" class="img-fluid"></a>
        </div>
    </div>
</div>
@endsection