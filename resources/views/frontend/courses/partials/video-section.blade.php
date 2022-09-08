<section class="second">
    <div class="row">
        <div class="col-md-4">
            <a href="#" class="sub_menu">Go to Course Home <i class="fa-solid fa-house"></i></a>
        </div>
        <div class="col-md-4 align_center">
            <a href="" class="sub_menu align_center">
                @if(isset($lession) )
                {{ $lession->lession_name }}
                @else
                Learning Sequence 1
                @endif
            </a>
        </div>
        <div class="col-md-4 align_right">
            <a href="" class="com_button">Complete Lesson</a>
        </div>
    </div>
</section>

<section class="second bg-light">
    <div class="row bg-secondary pt-3 pb-3">
        <div class="col-md-12">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button p-1" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Teacher Resource
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body p-3">
                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed p-1" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            Student Resource
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body p-3">
                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <h2 style="color:#592277;font-size:2.2rem;line-height:1.3em;font-weight:600">
                Getting Your Canva Pro Account Through Upschool - For Free
                </h3>
                <img src="https://upschool.co/wp-content/uploads/2022/06/Banner-Ad-Horzontal-16-1024x373.png" class="img-fluid" />
                <p class="mt-3" style="color:#592277">
                    Important: Canva is an essential tool for this course. You will need to register for a canva account (instructions below) at least 24 hours prior to starting any designing in canva. We need this time to activate your canva pro account.
                </p>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <h2>{{ $lession->lession_name }}</h2>
            <div>
                {!! $lession->lession_description !!}
            </div>
        </div>
        <div class="col-md-6">
            <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/{{ $lession->video->id }}?h=e0b2b751ad" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div>
            <script src="https://player.vimeo.com/api/player.js"></script>
        </div>
    </div>
</section>