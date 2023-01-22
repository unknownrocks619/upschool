<!-- Start project -->
<?php
ini_set('max_execution_time', 90);
?>
<style>
    .searchable-container::-webkit-scrollbar {
        width: 0.3em;
    }

    .searchable-container::-webkit-scrollbar-track {
        /* box-shadow: inset 0 0 5px grey; */
    }

    .searchable-container::-webkit-scrollbar-thumb {
        background: #242254;
        border-radius: 10%;
    }

    .searchable-container::-webkit-scrollbar-thumb:hover {
        background: #b81242;
        border-radius: 30%;
    }
</style>
<div class="row step-third-row bg-white h-100">
    <div class="col-md-12 mt-4">
        <div class="bg-white pt-3 ps-5 dynamic-padding" style="height:100%">
            <div class="row mb-3">
                <div class="col-md-12 mb-2">
                    <h4 class="mb-0" style="color: #03014C !important;font-weight:700;line-height:42px;font-size:34px;">
                        Select Your Project
                    </h4>
                </div>
            </div>
            <div class="row mt-4 me-5 mb-2">
                <div class="col-md-12 mb-3">
                    <input type="text" name="search_project" id="search" placeholder="Search your project" class="form-control py-3 fs-5" style="border: 0.8px solid rgb(3 1 76 / 12%);border-radius:8.3px;">
                </div>
            </div>
            <div class="searchable-container" style="max-height: 500px;overflow:hidden;overflow-y:scroll;">
                <div class="row mt-4 me-5">
                    <?php
                    $projects = \App\Models\OrganisationProject::where('wp_post_id', '!=' , NULL)->with(['organisation'])->get();
                    ?>
                    @foreach ($projects as $project)
                    <div class="col-md-4 items">
                        <div class="card my-3" style="box-shadow: none">
                            @if($project->images && $project->images->banner->fullPath)
                            <img src="{{ $project->images->banner->fullPath }}" class="img-fluid responsive-img" />
                            @else
                            <img src="https://upschool.co/wp-content/uploads/elementor/thumbs/Upschool-Charity-Projects-psgju87nr5soudwzo1zqs6lm5o8vksc0dcewgbufmo.png" class="img-fluid" />
                            @endif
                            <h1 class="mt-3 px-3 text-cemter" style="max-height:40px; overflow:hidden ;font-size:16px;color:#242254;line-height:1.3em;text-decoration:none;font-family:'Inter';font-weight:600">
                                {{ substr($project->title,0,40) }}...
                            </h1>
                            <div class="mt-1  text-center" style="font-size:16px; color:#242254;font-family:'Inter'">
                                {{ $project->organisation->name ?? "" }}
                            </div>
                            <div class="card-footer bg-white mt-3 border-0">
                                <form class="book_project_ajax_form" action="{{ route('frontend.auth_user.books.book.project.store', $book->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="project" value="{{ $project->getKey() }}">
                                    <button type="submit" class="w-100 btn btn-primary rounded-3 py-2" style="background:#b81242;border:none !important" data-url="{{ route('frontend.book.edit.upload',[$book->id,'overview']) }}" data-step="1" data-step-attribute="overview">Select Project</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row pt-2 text-right me-5 mb-3">
                <div class="col text-start pt-1">
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
        $(formElem).find('button').prop('disabled',true);
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
