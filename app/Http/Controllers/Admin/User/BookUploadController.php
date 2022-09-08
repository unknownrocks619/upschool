<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\UserBookUpload;
use Illuminate\Http\Request;

class BookUploadController extends Controller
{
    //
    public function index()
    {
        $books = UserBookUpload::with(['author'])->where('status', '!=', 'draft')->latest()->get();
        return view('admin.book.index', compact("books"));
    }

    public function show(UserBookUpload $book)
    {
        return view('admin.book.detail', compact("book"));
    }

    public function convert()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
