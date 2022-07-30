        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
                    <img class="img-fluid w-75" src="{{ asset(settings()->where('name','logo')->first()->value) }}" />
                </a>
                <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="sidebar-body">
                <ul class="nav">
                    <li class="nav-item nav-category">Main</li>
                    <li class="nav-item">
                        <a href="dashboard.html" class="nav-link">
                            <i class="link-icon" data-feather="box"></i>
                            <span class="link-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Settings</li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_route(['admin.web.setting.list']) }}" href="{{ route('admin.web.setting.list') }}">
                            <i class="link-icon" data-feather="mail"></i>
                            <span class="link-title">Website</span>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="pages/apps/chat.html" class="nav-link">
                            <i class="link-icon" data-feather="message-square"></i>
                            <span class="link-title">Interaction</span>
                        </a>
                    </li> -->
                    <li class="nav-item nav-category">Components</li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_route(['admin.web.category.index']) }}" href="{{ route('admin.web.category.index')  }}">
                            <i class="link-icon" data-feather="feather"></i>
                            <span class="link-title">Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_route(['admin.page.page.index','admin.page.page.create']) }}" href="{{ route('admin.page.page.index')  }}">
                            <i class="link-icon" data-feather="file"></i>
                            <span class="link-title">Page</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
                            <i class="link-icon" data-feather="anchor"></i>
                            <span class="link-title">Menus</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="advancedUI">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('admin.menu.menu.index') }}" class="nav-link">All Items</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">Add New Menu</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#forms" role="button" aria-expanded="false" aria-controls="forms">
                            <i class="link-icon" data-feather="inbox"></i>
                            <span class="link-title">Posts</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="forms">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="#" onclick="alert('core feature disabled. Access using wordpress')" class="nav-link">List</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" onclick="alert('Core feature disabled. Access using wordpress')" class="nav-link">Add new Post</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#charts" role="button" aria-expanded="false" aria-controls="charts">
                            <i class="link-icon" data-feather="pie-chart"></i>
                            <span class="link-title">Blog</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="#" onclick="alert('Module Not available')" class="nav-link">List</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" onclick="alert('Module not available')" class="nav-link">Add new Blog</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ active_route(['admin.web.widget.index','admin.web.widget.create']) }}">
                        <a class="nav-link" data-bs-toggle="collapse" href="#widgets" role="button" aria-expanded="false" aria-controls="widgets">
                            <i class="link-icon" data-feather="layout"></i>
                            <span class="link-title">Widgets</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse {{ active_route(['admin.web.widget.index','admin.web.widget.create'],'show') }}" id="widgets">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('admin.web.widget.index') }}" class="nav-link {{ active_route(['admin.web.widget.index']) }}">All Widgets</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.web.widget.index') }}" class="nav-link {{ active_route(['admin.web.widget.create']) }}">Add Widget</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#icons" role="button" aria-expanded="false" aria-controls="icons">
                            <i class="link-icon" data-feather="smile"></i>
                            <span class="link-title">Projects</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="pages/icons/feather-icons.html" class="nav-link">Feather Icons</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/icons/flag-icons.html" class="nav-link">Flag Icons</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/icons/mdi-icons.html" class="nav-link">Mdi Icons</a>
                                </li>
                            </ul>
                        </div>
                    </li> -->
                    <li class="nav-item nav-category">Plugins</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.org.org.index') }}">
                            <i class="link-icon" data-feather="book"></i>
                            <span class="link-title">Organisation</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#courses" role="button" aria-expanded="false" aria-controls="courses">
                            <i class="link-icon" data-feather="book"></i>
                            <span class="link-title">Courses</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="courses">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('admin.course.course.index') }}" class="nav-link {{ active_route(['admin.course.course.index']) }}">List</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.course.course.create') }}" class="nav-link ">Add Course</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.chapter.chapter.index') }}" class="nav-link {{ active_route(['admin.chapter.chapter.index'])  }}">Chapters</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="pages/general/profile.html" class="nav-link">Lession</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/general/pricing.html" class="nav-link">Resources</a>
                                </li> -->
                            </ul>
                        </div>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" role="button" aria-expanded="false" aria-controls="general-pages">
                            <i class="link-icon" data-feather="book"></i>
                            <span class="link-title">Lessions</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="general-pages">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="pages/general/blank-page.html" class="nav-link">Blank page</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/general/faq.html" class="nav-link">Faq</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/general/invoice.html" class="nav-link">Invoice</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/general/profile.html" class="nav-link">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/general/pricing.html" class="nav-link">Pricing</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/general/timeline.html" class="nav-link">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" role="button" aria-expanded="false" aria-controls="general-pages">
                            <i class="link-icon" data-feather="book"></i>
                            <span class="link-title">Resources</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="general-pages">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="pages/general/blank-page.html" class="nav-link">Blank page</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/general/faq.html" class="nav-link">Faq</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/general/invoice.html" class="nav-link">Invoice</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/general/profile.html" class="nav-link">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/general/pricing.html" class="nav-link">Pricing</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/general/timeline.html" class="nav-link">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </li> -->

                    <li class="nav-item nav-category">Users</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.user.index') }}">
                            <i class="link-icon" data-feather="unlock"></i>
                            <span class="link-title">All Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.canva.list') }}">
                            <i class="link-icon" data-feather="clipboard"></i>
                            <span class="link-title">Canva Signup</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>