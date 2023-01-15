@extends("themes.frontend.learning-sequence-master")

@section("page_title")
:: Course
@endsection

@push("custom_css")
<link rel="stylesheet" href="{{ asset('upschool/frontend/css/moon.css') }}" />
<link rel="stylesheet" href="{{ asset('upschool/frontend/css/learning-sequence.css') }}" />
@endpush

@section("content")
<div class="container-fluid bg-white">
    <div class="row">

        <div class="col-md-12" id="videoContent">

            <div class="row ContentHeader subheading py-4 border-top">
                <div class="col-md-12 d-flex justify-content-between align-items-center">
                    <div>
                        Go to Course Home
                        <i class="icon fas fa-home"></i>
                    </div>
                    <div>Learning Sequence 3</div>
                    <div>Complete Lession</div>
                </div>
            </div>

            <div class="container">
                <div class="row bg-light p-10">
                    <div class="col-md-12 accordian">
                        <div class="accordion accordion-flush bg-light" id="accordionFlushExample">
                            <div class="accordion-item bg-light">
                                <button class="accordion-button collapsed bg-light py-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Accordion Item #1
                                </button>
                                <h2 class="accordion-header bg-primary" id="flush-headingOne py-3">
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                                </div>
                            </div>
                            <div class="accordion-item bg-light">
                                <button class="accordion-button collapsed bg-light py-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Accordion Item #2
                                </button>
                                <h2 class="accordion-header bg-light" id="flush-headingTwo">
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <h4 style="color: #592277 mb-4">
                            Getting Your Canva Pro Account Through Upschool - For Free
                        </h4>
                        <p class="mt-4">
                            Important: Canva is an essential tool for this course. You will need to register for a canva account (instructions below) at least 24 hours prior to starting any designing in canva. We need this time to activate your canva pro account.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('custom_css')
<style type="text/css">
    :root {
        --theme-background: #eaf4f6;
        --sidbear-color: #757783;
        --incomplete-lession-check: #b91241;
        --sidebar-subheading: #1e3050 !important;
        --default-color: #fff;
    }

    .sidebar {
        background: var(--theme-background);
        color: var(--default-color);
    }

    .heading {
        background-color: var(--incomplete-lession-check);
        text-align: center;
        color: var(--default-color) !important;
    }

    .subheading {
        background-color: var(--sidebar-subheading);
        color: var(--default-color);
    }

    .navigation {
        color: var(--sidebar-subheading);
        padding: 30px 0px;

    }
</style>
@endpush

@push('custom_scripts')
<script>
    $(function() {

        // $(document).ready(function() {
        //     let navHeight = $("nav");
        //     let headerHeight = $('header');
        //     let divHeight = 0;
        //     if ($(navHeight).is(':visible')) {
        //         divHeight += $(navHeight).height();
        //     }

        //     if ($(headerHeight).is(":visible")) {
        //         divHeight += $(navHeight).height();
        //     }
        //     let bodyHeight = $('body').height();
        //     $(".sidebar").css('min-height', divHeight + "vh");
        // });
    })
</script>
@endpush