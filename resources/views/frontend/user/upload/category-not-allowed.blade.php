@extends("themes.frontend.master")

@section("page_title")
:: Upload
@endsection

@section("content")
<div class="container mb-11 mt-4">
    <div class="row mx-auto">
        <div class="col-md-6 text-center mx-auto">
            <form action="{{ route('frontend.auth_user.books.book.category.store', $book->id) }}" method="post">
                @csrf
                <div class="card" style="min-height: 60%">
                    <div class="card-body" style="border: none !important">
                        <h4 class="mb-4">
                            Book Already Uploaded !
                        </h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    Your book has already been uploaded to the server.
                                    You can no longer maintain this file. If you have any queries please <a href="">contact us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection