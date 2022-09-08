@extends("themes.frontend.master")

@section("page_title")
:: Course
@endsection

@push("custom_css")
<link rel="stylesheet" href="{{ asset('upschool/frontend/css/moon.css') }}" />
<link rel="stylesheet" href="{{ asset('upschool/frontend/css/learning-sequence.css') }}" />
@endpush

@section("content")
<div class="course_sidebar">
    <a href="#" class="tutor_toggle"><i class="fas fa-chevron-circle-left"></i></a>

    <div class="course_heading_box">
        <span class="heading_icon"><i class="fas fa-book-open"></i></span>
        <div>Lesson List</div>
    </div>
    <div class="scrollbar_down">
        @foreach ($course->chapters as $chapter)
        <div class="topics_title">
            <div class="topics-title-left">
                <div>{{ $chapter->chapter_name }}</div>
            </div>
            <div class="topics-title-right">
                <div>
                    1 /{{ $chapter->lession->count() }}
                </div>
            </div>
        </div>
        <ul class="topics_ul">
            @foreach ($chapter->lession as $lession)
            <li class="topics_li">
                <a href="{{ route('frontend.course.lession',[$course->id,$lession->id]) }}" class="topic_a">
                    <div class="inner_box">
                        <div class="first_box">
                            <span class="book"><i class="fa fa-file" aria-hidden="true"></i></span>
                        </div>
                        <div class="left_box">
                            <span class="title_span">{{ $lession->lession_name }}</span>
                        </div>
                        <div class="right_box"><span class="check"><i class="fas fa-check-circle"></i></span></div>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
        @endforeach

    </div>
</div>

<div id="videoLoad">
    @include("frontend.courses.partials.video-section",[$course])
</div>

<div class="course_sidebar_mob">

    <a href="#" class="tutor_toggle"><i class="fas fa-chevron-circle-left"></i></a>

    <div class="course_heading_box">
        <span class="heading_icon"><i class="fas fa-book-open"></i></span>
        <div>Lesson List</div>
    </div>
    <div class="scrollbar_down">
        <div class="topics_title">
            <div class="topics-title-left">
                <div>Lesson Resources</div>
            </div>
            <div class="topics-title-right">
                <div>1/5</div>
            </div>
        </div>
        <ul class="topics_ul">
            <li class="topics_li">
                <a href="#" class="topic_a">
                    <div class="inner_box">
                        <div class="first_box">
                            <span class="book"><i class="fa fa-file" aria-hidden="true"></i></span>
                        </div>
                        <div class="left_box">
                            <span class="title_span">Learning Sequence 1</span>
                        </div>
                        <div class="right_box"><span class="check"><i class="fas fa-check-circle"></i></span></div>
                    </div>
                </a>
            </li>
            <li class="topics_li">
                <a href="#" class="topic_a">
                    <div class="inner_box">
                        <div class="first_box">
                            <span class="book"><i class="fa fa-file" aria-hidden="true"></i></span>
                        </div>
                        <div class="left_box">
                            <span class="title_span">Learning Sequence 2</span>
                        </div>
                        <div class="right_box"><span class="check"><i class="fas fa-check-circle"></i></span></div>
                    </div>
                </a>
            </li>
            <li class="topics_li">
                <a href="#" class="topic_a">
                    <div class="inner_box">
                        <div class="first_box">
                            <span class="book"><i class="fa fa-file" aria-hidden="true"></i></span>
                        </div>
                        <div class="left_box">
                            <span class="title_span">Learning Sequence 3</span>
                        </div>
                        <div class="right_box"><span class="check"><i class="fas fa-check-circle"></i></span></div>
                    </div>
                </a>
            </li>
            <li class="topics_li">
                <a href="#" class="topic_a">
                    <div class="inner_box">
                        <div class="first_box">
                            <span class="book"><i class="fa fa-file" aria-hidden="true"></i></span>
                        </div>
                        <div class="left_box">
                            <span class="title_span">Learning Sequence 4</span>
                        </div>
                        <div class="right_box"><span class="check"><i class="fas fa-check-circle"></i></span></div>
                    </div>
                </a>
            </li>
            <li class="topics_li">
                <a href="#" class="topic_a">
                    <div class="inner_box">
                        <div class="first_box">
                            <span class="book"><i class="fa fa-file" aria-hidden="true"></i></span>
                        </div>
                        <div class="left_box">
                            <span class="title_span">Learning Sequence 5</span>
                        </div>
                        <div class="right_box"><span class="check"><i class="fas fa-check-circle"></i></span></div>
                    </div>
                </a>
            </li>
            <li class="topics_li">
                <a href="#" class="topic_a">
                    <div class="inner_box">
                        <div class="first_box">
                            <span class="book"><i class="fa fa-file" aria-hidden="true"></i></span>
                        </div>
                        <div class="left_box">
                            <span class="title_span">Learning Sequence 6</span>
                        </div>
                        <div class="right_box"><span class="check"><i class="fas fa-check-circle"></i></span></div>
                    </div>
                </a>
            </li>
        </ul>
        <div class="topics_title">
            <div class="topics-title-left">
                <div>Teacher Resources</div>
            </div>
            <div class="topics-title-right">
                <div>0/5</div>
            </div>
        </div>
        <ul class="topics_ul">
            <li class="topics_li">
                <a href="#" class="topic_a">
                    <div class="inner_box">
                        <div class="first_box">
                            <span class="book"><i class="fa fa-file" aria-hidden="true"></i></span>
                        </div>
                        <div class="left_box">
                            <span class="title_span">Teacher Resources</span>
                        </div>
                        <div class="right_box"><span class="check"><i class="fas fa-check-circle"></i></span></div>
                    </div>
                </a>
            </li>
            <li class="topics_li">
                <a href="#" class="topic_a">
                    <div class="inner_box">
                        <div class="first_box">
                            <span class="book"><i class="fa fa-file" aria-hidden="true"></i></span>
                        </div>
                        <div class="left_box">
                            <span class="title_span">Using This Course With Younger Children</span>
                        </div>
                        <div class="right_box"><span class="check"><i class="fas fa-check-circle"></i></span></div>
                    </div>
                </a>
            </li>
            <li class="topics_li">
                <a href="#" class="topic_a">
                    <div class="inner_box">
                        <div class="first_box">
                            <span class="book"><i class="fa fa-file" aria-hidden="true"></i></span>
                        </div>
                        <div class="left_box">
                            <span class="title_span">Resources for Schools to Share With Parents</span>
                        </div>
                        <div class="right_box"><span class="check"><i class="fas fa-check-circle"></i></span></div>
                    </div>
                </a>
            </li>
            <li class="topics_li">
                <a href="#" class="topic_a">
                    <div class="inner_box">
                        <div class="first_box">
                            <span class="book"><i class="fa fa-file" aria-hidden="true"></i></span>
                        </div>
                        <div class="left_box">
                            <span class="title_span">Are These Your Glasses (Digital Version)</span>
                        </div>
                        <div class="right_box"><span class="check"><i class="fas fa-check-circle"></i></span></div>
                    </div>
                </a>
            </li>
            <li class="topics_li">
                <a href="#" class="topic_a">
                    <div class="inner_box">
                        <div class="first_box">
                            <span class="book"><i class="fa fa-file" aria-hidden="true"></i></span>
                        </div>
                        <div class="left_box">
                            <span class="title_span">Feature Your Work and Inspire Others</span>
                        </div>
                        <div class="right_box"><span class="check"><i class="fas fa-check-circle"></i></span></div>
                    </div>
                </a>
            </li>
            <li class="topics_li">
                <a href="#" class="topic_a">
                    <div class="inner_box">
                        <div class="first_box">
                            <span class="book"><i class="fa fa-file" aria-hidden="true"></i></span>
                        </div>
                        <div class="left_box">
                            <span class="title_span">Using This Course With Younger Children</span>
                        </div>
                        <div class="right_box"><span class="check"><i class="fas fa-check-circle"></i></span></div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
@endsection

@push("custom_scripts")
<script>
    $(document).ready(function() {
        $("a.tutor_toggle").click(function() {
            $(".course_sidebar").toggleClass("course_sidebar_left_actopn");
            $(".tutor_back").toggleClass("tutor_back_vanish");
            $("section.second").toggleClass("second_next");
            $(".strech_content").toggleClass("strech_content_next");
            $(".tutor_toggle").toggleClass("tutor_toggle_action");
        });
        $("a.tutor_back").click(function() {
            $("section.second").removeClass("second_next");
            $("#sidebar").removeClass("slide_right");
            $(".course_sidebar").removeClass("course_sidebar_left_actopn");
            $(".course_sidebar").addClass("course_sidebar_back_tab");
            $(".strech_content").removeClass("strech_content_next");
        });

    });
    $(document).ready(function() {
        $(".topics_title").click(function() {
            $(this).next(".topics_ul").slideToggle("slow");
        });
    });

    $(document).ready(function() {
        var trigger = $('.hamburger'),
            overlay = $('.overlay'),
            isClosed = false;

        trigger.click(function() {
            hamburger_cross();
        });

        function hamburger_cross() {

            if (isClosed == true) {
                overlay.hide();
                trigger.removeClass('is-open');
                trigger.addClass('is-closed');
                isClosed = false;
            } else {
                overlay.show();
                trigger.removeClass('is-closed');
                trigger.addClass('is-open');
                isClosed = true;
            }
        }

        $('[data-toggle="offcanvas"]').click(function() {
            $('#wrapper').toggleClass('toggled');
        });
    });
</script>
<script>
    $("a.topic_a").on('click', function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: $(this).attr("href"),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $("#videoLoad").html(response);
            }
        })
    })
</script>
@endpush