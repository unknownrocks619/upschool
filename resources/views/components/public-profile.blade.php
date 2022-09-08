 <!--left sidebar-->
 <div class="col-md-3 pr-md-4">
     <div class="sidebar-left">
         <!--sidebar menu-->
         <ul class="list-unstyled sidebar-menu pl-md-2 pr-md-0">
             <li class="text-center">
                 <div class="sidebar-user">
                     @if(auth()->user()->avatar)
                     <img src="{{ asset (auth()->user()->avatar->path) }}" class="img-fluid rounded-circle mb-2 img-circle w-75" />
                     @else

                     <img src="{{ settings('logo') }}" class="img-fluid  mb-2 img-thumbnail w-50" />
                     @endif
                     <div class="fw-bold">{{ auth()->user()->full_name() }}</div>
                     <small>{{-- auth()->user()->user_type->role_name --}}</small>
                 </div>
             </li>
             <li>
                 <a class="sidebar-item @if(Route::currentRouteName() == 'frontend.dashboard') active @endif d-flex justify-content-between align-items-center" href="{{ route('frontend.dashboard') }}">
                     Dashboard
                     <span class="fas fa-tachometer-alt"></span>
                 </a>
             </li>
             @if(auth()->user()->role == 2)
             <li>
                 <a href="{{ route('frontend.manage.teacher') }}" class="sidebar-item {{ active_route(['frontend.manage.teacher','frontend.manage.resources']) }} d-flex justify-content-between align-items-center">
                     Teachers
                     <span class="fas fa-users"></span>
                 </a>
             </li>
             @endif
             @if(auth()->user()->role == 2 || auth()->user()->role == 3)
             <li>
                 <a href="{{ route('frontend.manage.student') }}" class="sidebar-item {{ active_route(['frontend.manage.student','frontend.manage.resources']) }} d-flex justify-content-between align-items-center">
                     Students
                     <span class="fas fa-users"></span>
                 </a>
             </li>
             @endif
             <li>
                 <a href="{{ route('frontend.auth_user.profile') }}" class="sidebar-item {{ active_route(['edit_user_profile']) }} d-flex justify-content-between align-items-center">
                     Profile
                     <span class="fas fa-user"></span>
                 </a>
             </li>
             <li>
                 <a class="sidebar-item  {{ active_route(['frontend.course.index']) }} d-flex justify-content-between align-items-center" href="{{ route('frontend.course.index') }}">
                     Courses
                     <span class="fas fa-copy"></span>
                 </a>
             </li>
             <li>
                 <a class="sidebar-item {{ active_route(['user_notification_list']) }} d-flex justify-content-between align-items-center" href="{{-- route('user_notification_list') --}}">
                     Notifications
                     <span class="side-notif">
                         1
                     </span>
                     <span class="fas fa-comment"></span>
                 </a>
             </li>
             <li>
                 <a class="sidebar-item {{active_route(['user_messages'])}} d-flex justify-content-between align-items-center" href="{{-- route('user_messages') --}}">
                     Messages
                     <span class="side-notif" title="0 new messages">0</span>
                     <span class="fas fa-envelope"></span>
                 </a>
             </li>
             <li>
                 <a class="sidebar-item d-flex justify-content-between align-items-center" href="{{ route('frontend.auth_user.password') }}">
                     Setting
                     <span class="fas fa-cog"></span>
                 </a>
             </li>
             <li>
                 <a class="sidebar-item d-flex justify-content-between align-items-center" href="{{ route('frontend.auth_user.books.book.list') }}">
                     My Books
                     <span class="fas fa-file"></span>
                 </a>
             </li>
             <li>
                 <form action="{{ route('logout') }}" method="post">
                     @csrf
                     <button type="submit" class="d-flex justify-content-between align-items-center btn btn-danger w-100 text-center">
                         Sign out
                     </button>
                 </form>

             </li>
         </ul>
     </div>
 </div>