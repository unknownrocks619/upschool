<div class="row step-zero-row main">
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
            <div class="col-md-12 bar mt-2 ps-0 mx-3 mt-4">
                <div class="row d-flex justicy-content-between my-2">
                    <div class="col-md-6 text-start">
                        <i class="icon fa fa-solid fa-file-pdf"></i>
                        {{ $book->book->original_filename }}
                    </div>
                    <div class="col-md-6 text-end">
                        <span class="border px-2">
                            <?php
                            $book_info = (array) $book->book;
                            ?>
                            {{ formatBytes($book_info[0]->size) }}
                        </span>
                    </div>
                </div>
                <div class="progress w-100" style="background-color: #fff;">
                    <div class="progress-bar" style="width: 100%;" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>

            <div class="col-md-12 mt-4 pt-2">
                <h5 class="mt-4" style="color:#242254;font-family:'Roboto';font-size:19px;">
                    Checking your book for the following:

                </h5>
            </div>

            <div class="row mb-2 mt-5 text-right me-5">
                <div class="col-md-12 mt-5 text-right d-flex justify-content-end">
                    <button class="btn next py-3 px-5 step-back" data-step="1">
                        Next
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>


    </div>
</div>