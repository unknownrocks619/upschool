   <!-- About Your Book Section -->
<style>
    .next {
            background: #242254;
            color: #fff;
        }

        .next:hover {
            background: #242254 !important;
            color: #fff !important;

        }
        .next:visited {
            background: #242254 !important;
        }
        .next:active {
            background: #242254 !important;
        }
        .next:disabled {
            background: #242254 !important;
        }
        .next:focus {
            background: #242254 !important;
            outline:0px !important;
        }
        button:focus {
            outline:0px !important;
        }
</style>
   <div class="row step-one-row bg-white py-3">
       <form action="{{ route('frontend.auth_user.books.book.meta.store', $book->id) }}" class="about-book-ajax-form" method="post">
           @csrf
           <div class="col-md-12">
               <div class="bg-white pt-3 mt-4 ps-5 dynamic-padding" style="height:100%">
                   <h4 class="mb-0" style="color: #03014C !important;font-weight:700;line-height:42px;font-size:28px;">
                       About Your Book
                   </h4>
                   <div class="row mt-5 pe-5 me-1">
                       <div class="col-md-12">
                           <input value="{{ $book->book_title }}" type="text" name="book_title" id="book_title" placeholder="Book Title" class="form-control py-3 fs-5" style="border: 0.8px solid rgb(3 1 76 / 12%);border-radius:8.3px;">
                           <div class="text-danger input-error" id="book_title_error"></div>
                       </div>
                       <div class="col-md-12 mt-4">
                           <textarea name="book_description" id="book_description" cols="30" rows="6" class="form-control py-3 fs-5" placeholder="Book Description" style="border: 0.8px solid rgb(3 1 76 / 12%);border-radius: 8.3px;resize:none">{{ $book->full_description }}</textarea>
                           <div class="text-danger input-error" id="book_description_error"></div>
                       </div>
                       <div class="col-md-12 mt-4">
                           <input value="{{ $book->canva_link }}" type="text" name="canva_book" id="canva_book" placeholder="Canva Book Link" class="form-control py-3 fs-5" style="border: 0.8px solid rgb(3 1 76 / 12%);border-radius:8.3px;">
                           <div class="text-danger input-error" id="canva_book_error"></div>
                       </div>
                       <div class="col-md-12 my-2 ps-4 mt-2">
                           <a href="#" data-bs-toggle='modal' data-bs-target='#canvaTarget' style="color:#03014C;font-style:normal;text-decoration: underline;font-size:18.34px;">View how to get the link from Canva</a>
                       </div>
                       <div class="col-md-12 mt-3">
                           <input type="email" value="{{ $book->parent_email }}" name="parent_email" id="parent_email" placeholder="Parent/Guardian/Teacher email address" class="form-control py-3 fs-5" style="border: 0.8px solid rgb(3 1 76 / 12%);border-radius:8.3px;">
                           <div class="text-danger input-error" id="parent_email_error"></div>
                       </div>
                   </div>
                   <div class="row mt-4 pt-4 text-right me-5">
                       <div class="col text-start pt-4 mt-3">
                           <button data-url="{{ route('frontend.book.edit.upload',[$book->id,'upload-progress-bar']) }}" data-step="1" data-step-attribute="upload-progress-bar" class="step-back btn btn-link mt-2 pt-1" style="color:#242254;font-weight:400;text-decoration:underline;font-size:18px;line-height:25.42px;font-family:'Inter'">
                               <i class=" fas fa-arrow-left"></i>
                               Go back
                           </button>
                       </div>
                       <div class="col mt-3 text-right d-flex justify-content-end pt-4">
                           <button type="submit" class="btn btn-primary next py-3 px-5" data-url="{{ route('frontend.book.edit.upload',[$book->id,'category']) }}" data-step="1" data-step-attribute="category">
                               Next
                               <i class="fas fa-arrow-right"></i>
                           </button>
                       </div>
                   </div>
               </div>
           </div>
       </form>
   </div>
   <!-- / End About your book -->

    <x-modal modal='canvaTarget'>
        <div style='position:relative'>
            <button type="button" class="p-2 py-0" style="background:#b81242;position: absolute;right: -7px;border: none;top: -13px;border-radius: 50%;" data-bs-dismiss="modal" aria-label="Close">
                <span class="fs-4 p-0 mt-0  text-white">
    <i class="fas fa-times text-white" aria-hidden="true" style="
    color: #fff !important;
"></i></span>

            </button>

            <img src='https://upschool.co/wp-content/plugins/pdf_upload_and_sales1//asset/css/images/sharing_your_canva_link_with_upschool.png' class="img-fluid" />
        </div>
    </x-modal>
   <script type="text/javascript">
       highlightProcess("{{ $instances['step'] }}", "{{ $instances['progressBar'] }}", "{{ $instances['percentage'] }}");

       $("form.about-book-ajax-form").submit(function(event) {
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
                   $(".loading").fadeOut('fast', function() {
                       $(this).addClass('d-none')
                   })
                   console.log('this is done, lets move forward with next tab to begin with.');
                   loadAjax(buttonElem);
               },
               error: function(response) {
                   $(".loading").fadeOut('fast', function() {
                       $(this).addClass('d-none')
                   })
                   if (response.status == 422) {
                       return handleError(response.responseJSON.errors);
                   }
               },
               beforeSend: function() {
                   $(".loading").removeClass('d-none')
               },
               complete: function() {
                   $(".loading").fadeOut('fast', function() {
                       $(this).addClass('d-none')
                   })
               }
           })
       });


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
