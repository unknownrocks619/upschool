<x-dashboard>
    <div class="row">
        <div class="col-12">
            <x-flash></x-flash>
            @foreach ($books->where('status',"draft") as $book_upload)
            <div class="alert alert-info">
                <h5>
                    Continue Your Book Upload...
                </h5>
                <p>
                    <code>`{{ $book_upload->book->original_filename }}`</code> has not been uploaded yet. You can continue your upload.
                </p>
                <div class="row text-end">
                    <div class="col-md-12 border text-end">
                        <form onsubmit="return confirm('Are you sure? This action cannot be undone')" class="d-inline" action="{{ route('frontend.auth_user.books.book.destroy',[$book_upload->id]) }}" method="post">
                            @csrf
                            @method("DELETE")

                            <button type="submit" class="text-left me-4 text-danger btn btn-link">
                                <i class="fas fa-trash"></i>
                                Remove File</button>
                        </form>
                        <a href="{{ route('frontend.auth_user.books.book.meta',[$book_upload->id]) }}"><i class='fas fa-pencil-alt'></i>Continue Edit</a>
                    </div>
                </div>
            </div>
            @endforeach
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Uploaded Date</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $books as $book)
                    <tr>
                        <td>
                            {{ $book->book_title }}
                        </td>
                        <td>
                            {{ date("Y-m-d", strtotime($book->created_at)) }}
                        </td>
                        <td>
                            {{ ucwords($book->status) }}
                        </td>
                        <td>
                            <a href="">Preview</a>

                            @if($book->status == "approved")
                            | <a href="">Certificate</a>
                            @endif

                            @if($book->status == "draft")
                            <form onsubmit="return confirm('Are you sure? This action cannot be undone')" class="d-inline" action="{{ route('frontend.auth_user.books.book.destroy',$book->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn text-danger btn-link"><i class="fas fa-trash"></i>Delete</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    @push("custom_scripts")

    @endpush
</x-dashboard>