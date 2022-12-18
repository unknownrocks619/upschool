<style>
    div,
    span {
        font-family: "Roboto" !important
    }
</style>
<div class="row bg-white">
    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">
                <div class="bg-white pt-4 mt-3 pb-3 ps-5 dynamic-padding" style="height:100%">
                    <div class="row me-5 social-login-row">
                        <h4 class="mb-0" style="color: #03014C !important;font-weight:700;line-height:42px;font-size:33.34px">
                            Upload Your Book!
                        </h4>
                    </div>
                </div>
            </div>
        </div>


        <div class="row dynamic-padding pe-5 mt-3">
            <div class="col-md-10 bar mt-2 ps-0 mx-3 mt-4">
                <div class="row d-flex justicy-content-between my-2">
                    <div class="col-md-6 text-start" style="color:#242634;font-size:18px;">
                        <i class="icon fa fa-solid fa-file-pdf"></i>
                        {{ $book->book->original_filename }}
                    </div>
                    <div class="col-md-6 text-end">
                        <form action="{{ route('frontend.auth_user.books.book.destroy',[$book->id,'source'=>'upload']) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-link" style="color:#242254;font-size:17px;font-weight:400;text-decoration:none;font-family:'Inter'">
                                <i class='icon fas fal fa-minus-circle'></i>
                                Remove
                            </button>
                        </form>
                    </div>
                </div>
                <div class="progress w-100" style="background-color: #fff;">
                    <div class="progress-bar" style="width: 100%;" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>

            <div class="col-md-12 mt-4 pt-2">
                <h5 class="mt-4" style="color:#242254 !important;font-family:'Roboto' !important;font-size:19px; !important">
                    Checking your book for the following:
                </h5>
            </div>

            <div class="col-md-12 mt-4 pt-2">
                <div class="row">
                    <div style="font-size:24px;" class="col-md-10 {{ ($instances['book']['secondPageEmpty']) ? 'text-success' : 'text-danger' }}">
                        <table class="border-none">
                            <tr style="font-size: 17px !important">
                                <td>
                                    <i class="icon far fal {{ $instances['book']['secondPageEmpty'] ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                </td>
                                <td class="ps-3">
                                    Book has a blank page after the front cover and another before the back cover.
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-4 pt-2">
                <div class="row">
                    <div style="font-size:24px;" class="col-md-10 {{ ! ($instances['book']['totalPage'] % 2) ? 'text-success' : 'text-danger' }}">
                        <table class="border-none">
                            <tr style="font-size: 17px !important">
                                <td>
                                    <i class="icon far fal {{ !($instances['book']['totalPage'] % 2) ?  'fa-check-circle' : 'fa-times-circle' }}"></i>
                                </td>
                                <td class="ps-3" style="font-size: 17px !important">
                                    The total number of pages in my book is an even number. (12, 14, 16, 18, 20, ...)

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-4 pt-2">
                <div class="row">
                    <div style="font-size:24px;" class="col-md-10 text-success">
                        <table class="border-none">
                            <tr style="font-size: 17px !important">
                                <td>
                                    <i class="icon far fal fa-check-circle" style="width:22px;height:22px;"></i>
                                </td>
                                <td class="ps-3" style="padding-left: 0.8rem !important">My text is in the Safe Zone and not near the edges of the page</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-12 mt-4 pt-2">
                <div class="row">
                    <div style="font-size:24px;" class="col-md-10 {{-- ($instances['book']['totalPage']>=40)?'text-success':'text-danger' --}}">
                        <i class="icon far fal {{-- ($instances['book']['totalPage']>=40)?'fa-check-circle':'fa-times-circle' --}}" style="width:22px;height:22px;"></i>
                        <span class="ps-3">
                            My Book has minimum of 40 Page
                        </span>
                    </div>
                </div>
            </div> -->
            <div class="col-md-12 mt-4 pt-2">
                <div class="row">
                    <div style="font-size:24px;" class="col-md-10 text-success">
                        <table class="border-none">
                            <tr style="font-size: 17px !important">
                                <td>
                                    <span class="loading" id="loading">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgb(255, 255, 255); display: block; shape-rendering: auto;" width="22px" height="22px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                            <path d="M10 50A40 40 0 0 0 90 50A40 42 0 0 1 10 50" fill="#242254" stroke="none">
                                                <animateTransform attributeName="transform" type="rotate" dur="1s" repeatCount="indefinite" keyTimes="0;1" values="0 50 51;360 50 51"></animateTransform>
                                            </path>
                                        </svg>
                                    </span>
                                    <span id="postLoadingSuccess" class="d-none">
                                        <i class="icon far fal fa-check-circle "></i>
                                    </span>
                                    <span id="postLoadingFail" class="d-none text-danger">
                                        <i class="icon far fal fa-times-circle "></i>
                                    </span>
                                    <!-- <i class="icon far fal {{-- !($instances['book']['totalPage']%2)?'fa-check-circle':'fa-times-circle' --}}"></i> -->
                                </td>
                                <td class="ps-3" style="font-size: 17px !important">
                                    My book is A4 size (270mm x 297mm)

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            @if($instances['book']['secondPageEmpty'] && !($instances['book']['totalPage'] % 2) )
            <div class="col-md-12 mt-4 pt-2">
                <h5 class="mt-4" style="color:#242254;font-family:'Roboto';font-size:23px;">
                    Congratulations! Your book is initially approved for upload.
                </h5>
                <p class="pt-4" style="font-size:17px;color:#242254">
                    Our team will now do a final check of your book before publishing it on the<br /> Upschool Library. We will email you as soon as this check is completed. Thank you.
                </p>
            </div>

            <div class="row mb-2 text-right me-5 allowNext d-none">
                <div class="col-md-12 mt-5 text-right d-flex justify-content-end mb-4 pb-4">
                    <button class="btn next py-3 px-5 step-back" data-url="{{ route('frontend.book.edit.upload',[$book->id,'tab' => 'about-book']) }}" data-step="1" data-step-attribute="about-book">
                        Next
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            @else
            <div class="col-md-12 mt-4 pt-2 alreadyErrorUpload">
                <h5 class="mt-4" style="color:#D61A5F !important;font-family:'Roboto';font-size:23px;">
                    Oh oh!

                </h5>
                <p class="pt-4" style="font-size:17px;color:#242254">
                    It looks like your book needs some changes before it can be uploaded to the <br />
                    Upschool Library. Please refer to the checklist here and make sure your book meets <br />
                    all of the requirements, then try again.

                </p>
            </div>
            <div class="row mb-4 text-right me-5">
                <div class="col-md-12 mt-5 text-right d-flex justify-content-end mb-4 pb-4">
                    <form action="{{ route('frontend.auth_user.books.book.destroy',[$book->id,'source'=>'upload']) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn next py-3 px-5" data-url="{{ route('frontend.book.edit.upload',[$book->id,'about-book']) }}" data-step="1" data-step-attribute="about-book">
                            Re-upload
                        </button>
                    </form>
                </div>
            </div>
            @endif
            <div class="row mb-4 text-right me-5 allowReupload d-none">
                <div class="col-md-12 mt-5 text-right d-flex justify-content-end mb-4 pb-4">
                    <form action="{{ route('frontend.auth_user.books.book.destroy',[$book->id,'source'=>'upload']) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn next py-3 px-5" data-url="{{ route('frontend.book.edit.upload',[$book->id,'about-book']) }}" data-step="1" data-step-attribute="about-book">
                            Re-upload
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.1.81/pdf.min.js"></script>
<script>
    var pdfData = "{{ asset($book->book->path) }}";

    var pdfJs = window['pdfjs-dist/build/pdf'];

    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.1.81/pdf.worker.min.js';

    var loadingTask = pdfjsLib.getDocument(pdfData);

    loadingTask.promise.then(function(pdf) {
        console.log('Pdf Loaded. ');
        // get first page 
        var pageNumber = 1;
        var scale = 1.78;

        pdf.getPage(pageNumber).then(function(page) {
            var viewPort = page.getViewport({
                scale: scale
            });
            // page.getTextContent().then(data => {});
            if ((viewPort.height >= 1440 && viewPort.height <= 1443) && viewPort.width >= 2560 && viewPort.width <= 2565) {
                $("#loading").fadeOut('medium', function() {
                    $("#postLoadingSuccess").removeClass('d-none');
                    $('.allowNext').removeClass('d-none')
                });
            } else {
                $("#loading").fadeOut('medium', function() {
                    $("#postLoadingFail").removeClass('d-none').addClass('text-danger');
                    $(this).closest('tr').children('td:last').addClass('text-danger');
                    if (!$(".alreadyErrorUpload").length) {
                        $('.allowReupload').removeClass('d-none')
                    }
                })
            }
        })


    });
</script>