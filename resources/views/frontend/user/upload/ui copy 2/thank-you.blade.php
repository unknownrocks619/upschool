<style type="text/css">
    .upschool-color {
        color: #242254 !important;
        font-family: 'Roboto' !important;
        font-size: 19px !important;
        line-height: 26px !important;

    }
</style>
<!-- Start project -->
<div class="row step-four-row">
    <div class="col-md-12 mt-4">
        <div class="bg-white pt-3 ps-5 dynamic-padding" style="height:100%">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <h4 class="mb-0" style="color: #03014C !important;font-weight:700;line-height:42px;font-size:28px;font-family: 'Lexend' !important">
                        Your Book is Already Uploaded!
                    </h4>
                </div>
            </div>
            <div class="row mt-4 pt-4 me-5 mb-3 pb-2">
                <div class="col-md-12 upschool-color" style="font-family: 'Roboto' !important;font-size:19px;">
                    Thank you so much for uploading your book to the Upschool Library. Your book has now been submitted for review and will appear in the Upschool Library Shortly.
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4 " style="background-color: #F4F4F4 !important;">
    <div class="col-md-12 d-flex justify-content-center">
        <a href="{{ route('frontend.dashboard') }}" class="btn text-white py-3 px-5 mx-3" style="background-color: #D61A5F !important;font-family:'Inter';font-size: 21px;">
            Go To Dashboard
        </a>
        <a href="{{ route('frontend.book.upload') }}" class="btn text-white py-3 px-5 mx-3" style="background-color: #D61A5F !important;font-family:'Inter';font-size: 21px;">
            Upload a New Book
        </a>
    </div>
</div>

<script type="text/javascript">
    $(".container").removeClass('bg-white').addClass('pt-5 mb-5 pb-5');
    $(".step-parent-row").addClass('mt-5 pt-3 mb-5 pb-5')
    $(".step-parent-column").removeClass('col-md-9').addClass('col-md-12 pb-5');
    $(".sidebar").remove();
    $("html, body").animate({
        scrollTop: 0
    }, "medium");
</script>
