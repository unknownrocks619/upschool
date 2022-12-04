<!-- Start Caegory -->
<div class="row step-two-row d-none main bg-light">
    <div class="col-md-12 mt-4">
        <div class="bg-white pt-3 ps-5 dynamic-padding" style="height:100%">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-0" style="color: #03014C !important;font-weight:700;line-height:42px;font-size:34px;">
                        Please select up to 5 categories
                    </h4>
                </div>
            </div>

            <div class="row mt-4 me-5">
                @foreach ($categories as $category)
                <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12 mb-3 d-block">
                    <div class="d-flex">
                        <div>
                            <input type="checkbox" value="1" name="personal_detail" class="checkmark" id="personal_detail" style="width:24px; height:24px;" />

                        </div>
                        <div class="ms-2">
                            {{ $category->category_name }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row mt-4 pt-4 text-right me-5">
                <div class="col text-start pt-3">
                    <button class="step-back btn bnt-link mt-2 pt-1" data-step="1" style="color:#242254;font-weight:400;text-decoration:underline;font-size:18px;line-height:25.42px;font-family:'Inter'">
                        <i class=" fas fa-arrow-left"></i>
                        Go back
                    </button>
                </div>
                <div class="col mt-3 text-right d-flex justify-content-end mb-5">
                    <button type="submit" class="btn btn-primary next py-3 px-5 step-back" data-step="3">
                        Next
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /End Categoy -->