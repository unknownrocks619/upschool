<?php
$projects = App\Models\Corcel\Post::where('post_type', 'charity-projects')->where('post_status', 'publish')->get();
?>
<!-- Start project -->
<div class="row step-third-row bg-white h-100">
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
            <div class="searchable-container" style="max-height: 500px; overflow:hidden;overflow-y:scroll;">
                <div class="row mt-4 me-5">
                    @foreach ($projects as $project)

                    <div class="col-md-4 items">
                        <div class="card my-3">
                            <div class="card-body">
                                @if($project->thumbnail)
                                <img src="{{ $project->thumbnail }}" class="img-fluid" style="max-height:88px !important" />
                                @else
                                <img src="https://upschool.co/wp-content/uploads/elementor/thumbs/Upschool-Charity-Projects-psgju87nr5soudwzo1zqs6lm5o8vksc0dcewgbufmo.png" class="img-fluid" />
                                @endif
                                <h1 class="mt-3 px-3 text-center" style="font-size:18px;">
                                    <a href="" style="color:#242254;line-height:1.3em;text-decoration:none;font-family:'Inter'">
                                        {{ $project->post_title }}
                                    </a>
                                </h1>
                                <div class="mt-1 px-3 text-center" style="font-size:16px; color:#242254;font-family:'Inter'">
                                    {{ $project->meta()->where('meta_key','charity_name')->first()->meta_value }}
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit">Select This project</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row mt-4 pt-4 text-right me-5">
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

    $(".loading").fadeOut('fast', function() {
        $(this).addClass('d-none')
    })
</script>