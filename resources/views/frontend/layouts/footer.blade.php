<div class="footer-new">
    <div class="d-flex justify-content-center mt-0 footer-top-img">
        <img src="{{ asset('upschool/frontend/images/home/upschool-14.png') }}" alt="" class="img-fluid" height="auto" width="30%" />
    </div>
    <p class="text-center text-white pb-0 footer-title" id="footer-section-title">
        Change Making Communities
    </p>
    <p class="text-white text-center container footer-details" id="footer-section-details">
        Underpinning everything we do at Upschool is a deep desire to empower
        students to find their voice, refine and develop their message and
        teach them how to collaborate with each other so that they can create
        the change they want to see in the world.
    </p>
    <div id="footer-divider" class="divider mt-4"></div>
    <div class="d-flex justify-content-center mt-4" id="footer-middle-img">
        <img src="{{ asset('upschool/frontend/images/home/indigenous.jpg') }}" alt="" height="auto" width="17%" />
    </div>
    <p class="text-center text-white mt-2 mb-4 acknowladgement">
        Acknowledgement of Country
    </p>
    <p class="details text-white container text-center footer-bottom-details" id="footer-bottom">
        Upschool would like to acknowledge that we live, work, learn and play
        on the lands of the Aboriginal and Torres Strait Islander people’s –
        who are the oldest continuing culture in human history and the
        traditional owners of the land we now call Australia. We acknowledge
        the wisdom and diversity of these people and seek to learn from and be
        inspired by their culture. We are grateful for the dignity they show
        us in allowing us to share this land with them. Our pledge is to
        continue to work to bring more awareness to topics that the elders
        past, present and emerging bring our attention to and take meaningful
        action to create positive change here in Australia and the wider
        world.
    </p>

    <div class="container pb-3">
        <div class="d-flex justify-content-between align-items-center m-0 p-0 footer-bottom">
            <div class="footer-logo">
                <img src="{{ asset('upschool/frontend/images/home/footer-logo.png') }}" alt="" height="35" />
            </div class="d-flex">
            <div class="d-flex p-0">
                @foreach (menus()->where("menu_position","footer_menu") as $menu)
                <a class='text-white mb-0 @if( ! $loop->last) pe-3 @endif footer-link' href="{{ route('frontend.view',$menu->slug) }}">
                    {{ $menu->menu_name }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
    <!-- <div class="overlay-image"></div> -->
</div>