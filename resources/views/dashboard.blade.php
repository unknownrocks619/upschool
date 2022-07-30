<x-dashboard>
    <div class="row">
    </div>
    <div class="row">
        <div class="col-12">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <a class="member-item" href="{{-- route('user_enrolled_list') --}}">
                                <div class="card mb-2 mb-md-5 py-3">
                                    <div class="content">

                                        <div class="row">
                                            <div class="col-6 d-flex justify-content-center align-items-center">
                                                <div class="icon-big text-warning text-center">
                                                    <i class="fas fa-copy"></i>
                                                </div>
                                            </div>
                                            <div class="col-6 d-flex justify-content-center align-items-center">
                                                <div class="numbers px-2">
                                                    <p>Enrolled Courses</p>
                                                    {{ (auth()->user()->courses->count()) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <a class="member-item" href="{{-- route('user_notification_list') --}}">
                                <div class="card mb-2 mb-md-5 py-3">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-6 d-flex justify-content-center align-items-center">
                                                <div class="icon-big text-info text-center" title="1 new comment">
                                                    <div class="notif">0</div>
                                                    <i class="fas fa-comment"></i>
                                                </div>
                                            </div>
                                            <div class="col-6 d-flex justify-content-center align-items-center">
                                                <div class="numbers">
                                                    <p>Notifications</p>
                                                    0
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <a class="member-item" href="{{-- route('user_messages') --}}">
                                <div class="card mb-2 mb-md-5 py-3">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-6 d-flex justify-content-center align-items-center">
                                                <div class="icon-big text-danger text-center">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                            <div class="col-6 d-flex justify-content-center align-items-center">
                                                <div class="numbers">
                                                    <p>Messages</p>
                                                    0
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard>