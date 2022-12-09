<!-- Start project -->
<div class="row step-third-row">
    <div class="col-md-12 mt-4">
        <div class="bg-white pt-3 ps-5 dynamic-padding" style="height:100%">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-0" style="color: #03014C !important;font-weight:700;line-height:42px;font-size:34px;">
                        Select Your Project
                    </h4>
                </div>
            </div>
            <div class="row mt-4 me-5">
                <div class="col-md-12">
                    <input type="text" name="search_project" id="search" placeholder="Search your project" class="form-control py-3 fs-5" style="border: 0.8px solid rgb(3 1 76 / 12%);border-radius:8.3px;">
                </div>
            </div>
            <div class="searchable-container">
                <div class="row mt-4 me-5">
                    @foreach ($projects as $project)
                    <div class="col-md-4 items">
                        <div class="card">
                            @if($project->image)
                            <igm src="{{ asset($project->image->path) }}" class="img-fluid" />
                            @else
                            <img src="https://upschool.co/wp-content/uploads/elementor/thumbs/Upschool-Charity-Projects-psgju87nr5soudwzo1zqs6lm5o8vksc0dcewgbufmo.png" class="img-fluid" />
                            @endif
                            <h1 class="mt-3 px-3 text-cemter" style="font-size:16px;">
                                <a href="" style="color:#242254;line-height:1.3em;text-decoration:none">{{ $project->title }}</a>
                            </h1>
                            <div class="mt-1  text-center" style="font-size:16px; color:#242254">
                                {{ $project->organisation->name }}
                            </div>
                            <div class="card-footer bg-white mt-3 border-0">
                                <form class="book_project_ajax_form" action="{{ route('frontend.auth_user.books.book.project.store', $book->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="project" value="{{ $project->getKey() }}">
                                    <button type="submit" class="w-100 btn btn-primary rounded-3 py-3" style="background:#b81242" data-url="{{ route('frontend.book.edit.upload',[$book->id,'overview']) }}" data-step="1" data-step-attribute="overview">Continue With this project</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 items">
                        <div class="card">
                            @if($project->image)
                            <igm src="{{ asset($project->image->path) }}" class="img-fluid" />
                            @else
                            <img src="https://upschool.co/wp-content/uploads/elementor/thumbs/Upschool-Charity-Projects-psgju87nr5soudwzo1zqs6lm5o8vksc0dcewgbufmo.png" class="img-fluid" />
                            @endif
                            <h1 class="mt-3 px-3 text-cemter" style="font-size:16px;">
                                <a href="#" style="color:#242254;line-height:1.3em;text-decoration:none">
                                    Binod Giri is the name for the title
                                </a>
                            </h1>
                            <div class="mt-1  text-center" style="font-size:16px; color:#242254">
                                {{ $project->organisation->name }}
                            </div>
                            <div class="card-footer bg-white mt-3 border-0">
                                <form class="book_project_ajax_form" action="{{ route('frontend.auth_user.books.book.project.store', $book->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="project" value="{{ $project->getKey() }}">
                                    <button type="submit" class="w-100 btn btn-primary rounded-3 py-3" style="background:#b81242" data-url="{{ route('frontend.book.edit.upload',[$book->id,'overview']) }}" data-step="1" data-step-attribute="overview">Continue With this project</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row mt-4 pt-4 text-right me-5">
                <div class="col text-start pt-3">
                    <button class="step-back btn bnt-link mt-2 pt-1" data-url="{{ route('frontend.book.edit.upload',[$book->id,'category']) }}" data-step="1" data-step-attribute="category" style="color:#242254;font-weight:400;text-decoration:underline;font-size:18px;line-height:25.42px;font-family:'Inter'">
                        <i class=" fas fa-arrow-left"></i>
                        Go back
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /End project -->
<script type="text/javascript">
    $("form.book_project_ajax_form").submit(function(event) {
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
</script>
<script>
    highlightProcess("{{ $instances['step'] }}", "{{ $instances['progressBar'] }}", "{{ $instances['percentage'] }}");

    $(function() {
        $('#search').on('keyup', function() {
            var pattern = $(this).val();
            $('.searchable-container .items').hide();
            $('.searchable-container .items').filter(function() {
                return $(this).text().match(new RegExp(pattern, 'i'));
            }).show();
        });
    });
    $("html, body").animate({
        scrollTop: 0
    }, "fast");
</script>