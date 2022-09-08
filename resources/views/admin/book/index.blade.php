@extends("themes.admin.master")

@section("title")
Category
@endsection

@section("content")
<x-layout heading="Books">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">
                Books By User
            </h6>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            Book Title
                        </th>
                        <th>
                            Author
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Uploaded Date
                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($books as $book)
                    <tr>
                        <td>
                            {{ $book->book_title }}
                        </td>
                        <td>
                            {{ $book->author->full_name() }}
                        </td>
                        <td>
                            {{ ucwords($book->status) }}
                        </td>
                        <td>
                            {{ $book->updated_at }}
                        </td>

                        <td>
                            <a href="{{ route('admin.users.books.show',$book->id) }}">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</x-layout>
@endsection