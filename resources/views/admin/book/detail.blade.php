@extends("themes.admin.master")

@section("title")
Books :: {{ $book->book_title }}
@endsection

@section("content")
<x-layout heading="">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="position-relative" style="min-height: 170px;background: linear-gradient(312deg, #6e3697, #72850e);">
                    <figure class="overflow-hidden mb-0 d-flex justify-content-center">
                        <!-- <img src="https://via.placeholder.com/1560x370" class="rounded-top" alt="profile cover"> -->
                    </figure>
                    <div class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
                        <div>
                            <img class="wd-70 rounded-circle" src="@if($book->author->avatar) {{ asset ($book->author->avatar->path) }} @elseif($book->author->gender == 'female') https://cdn-icons-png.flaticon.com/512/4003/4003937.png  @else https://cdn-icons-png.flaticon.com/512/236/236831.png @endif" alt="profile">
                            <span class="h4 ms-3 text-dark">{{ $book->author->full_name() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="card-title mb-0">About</h6>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="git-branch" class="icon-sm me-2"></i> <span class="">Update</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View all</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                        <p class="text-muted">{{ date("M d, Y",strtotime($book->author->created_at)) }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Country</label>
                        <p class="text-muted">{{ $book->author->country }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                        <p class="text-muted">{{ $book->author->email }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Date of Birth:</label>
                        <p class="text-muted">{{ $book->author->date_of_birth }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-6 middle-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card rounded">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="ms-2">
                                        <p class="fs-5">{{ $book->book_title }}</p>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg pb-3px" data-feather="more-horizontal"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="meh" class="icon-sm me-2"></i> <span class="">Unfollow</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="corner-right-up" class="icon-sm me-2"></i> <span class="">Go to post</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="share-2" class="icon-sm me-2"></i> <span class="">Share</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="copy" class="icon-sm me-2"></i> <span class="">Copy link</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="mb-3 tx-14">
                                {{ $book->full_description }}
                            </p>
                            <img class="img-fluid" src="https://upschool.co/wp-content/plugins/pdf_upload_and_sales1//asset/css/images/pdf_img.jpeg" alt="">

                            <div class="row">
                                <div class="col-md-12 border-info">
                                    <a href="{{ asset($book->book->path) }}" target="_blank">{{ asset($book->book->path) }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex post-actions">
                                <a href="javascript:;" class="d-flex align-items-center text-success me-4">
                                    <i class="icon-md" data-feather="heart"></i>
                                    <p class="d-none d-md-block ms-2">Accept</p>
                                </a>
                                <a href="javascript:;" class="d-flex align-items-center text-danger me-4">
                                    <i class="icon-md" data-feather="message-square"></i>
                                    <p class="d-none d-md-block ms-2">Reject</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->
        <!-- right wrapper start -->
        <div class="d-none d-xl-block col-xl-3">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card rounded">
                        <div class="card-body">
                            <h6 class="card-title">Selected Category</h6>
                            <div class="row ms-0 me-0">
                                <?php
                                $categories = \App\Models\Category::whereIn("id", $book->categories)->get();
                                foreach ($categories as $category) {
                                    echo "<div class='col-12 text-center border border-info my-1'>";
                                    echo $category->category_name;
                                    echo "</div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 grid-margin">
                    <div class="card rounded">
                        <div class="card-body">
                            <h6 class="card-title">Options</h6>
                            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                <div class="d-flex align-items-center hover-pointer">
                                    <div class="ms-2">
                                        <a href="{{ route('admin.commerce.book.convert.create',$book->id) }}" class="btn btn-outline-primary">
                                            Convert to Product
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 grid-margin">
                    <div class="card rounded">
                        <div class="card-body">
                            <h6 class="card-title">Selected Project</h6>
                            <div class="d-flex justify-content-between mb-2 pb-2 border border-primary">
                                <div class="d-flex align-items-center hover-pointer">
                                    <div class="ms-2">
                                        <a href="{{ route('admin.commerce.book.convert.create',$book->id) }}" class="">
                                            {{ $book->project->title }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- right wrapper end -->
    </div>
</x-layout>
@endsection