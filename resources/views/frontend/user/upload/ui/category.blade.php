<!-- Start Caegory -->
<div class="row step-two-row bg-white h-100">
    <div class="col-md-12 mt-4">
        <form class="book_category_ajax_form" action="{{ route('frontend.auth_user.books.book.category.store', $book->id) }}" method="post">
            @csrf
            <div class="bg-white pt-3 ps-5 dynamic-padding" style="height:100%">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-0" style="color: #03014C !important;font-weight:700;line-height:42px;font-size:34px;">
                            Please select up to 5 categories
                        </h4>
                    </div>
                </div>

                <div id="cat_id_error" class="text-danger input-error"></div>
                <div class="row mt-4 me-5 pt-4">
                    @foreach ($categories as $category)
                    <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12 mb-3 d-block">
                        <div class="d-flex">
                            <div>
                                <input type="checkbox" @if ($book->categories && array_key_exists($category->id,$book->categories)) checked @endif value="{{ $category->id  }}" name="cat_id[{{$category->id}}]" class="checkmark" id="personal_detail" style="width:24px; height:24px;" />
                            </div>
                            <div class="ms-2" style="font-family: 'Inter';font-weight:400">
                                {{ $category->category_name }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row mt-4 pt-4 text-right me-5">
                    <div class="col text-start pt-3">
                        <button class="step-back btn bnt-link mt-2 pt-1" data-url="{{ route('frontend.book.edit.upload',[$book->id,'about-book']) }}" data-step="1" data-step-attribute="about-book" style="color:#242254;font-weight:400;text-decoration:underline;font-size:18px;line-height:25.42px;font-family:'Inter'">
                            <i class=" fas fa-arrow-left"></i>
                            Go back
                        </button>
                    </div>
                    <div class="col mt-3 text-right d-flex justify-content-end mb-5">
                        <button type="submit" class="btn btn-primary next py-3 px-5 " data-url="{{ route('frontend.book.edit.upload',[$book->id,'project']) }}" data-step="1" data-step-attribute="project">
                            Next
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /End Categoy -->
<script type="text/javascript">
    highlightProcess("{{ $instances['step'] }}", "{{ $instances['progressBar'] }}", "{{ $instances['percentage'] }}");
    $("form.book_category_ajax_form").submit(function(event) {
        event.preventDefault();
        clearAllErrors();
        $(this).prop('disabled', true);
        let formElem = $(this);
        let buttonElem = $(formElem).find('button[type="submit"]')[0];
        $.ajax({
            method: "POST",
            url: $(this).attr('action'),
            data: $(this).serializeArray(),
            headers: {
                'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")
            },
            success: function(response) {
                loadAjax(buttonElem);
            },
            error: function(response) {
                if (response.status == 422) {
                    return handleError(response.responseJSON.errors);
                }
            }
        })
    })


    function clearAllErrors() {
        let allElements = $(".input-error");
        allElements.each(function(index, element) {
            $(element).empty();
        })
    }

    $("html, body").animate({
        scrollTop: 0
    }, "fast");
</script>