<div class="col-xl-2 content-nav-wrapper">
    <ul class="nav content-nav d-flex flex-column">
        <li class="nav-item">
            <a href="{{ route('admin.course.permission',$course->id) }}" class="nav-link">Permission</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.course.resource',$course->id) }}" class="nav-link">Resources</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.course.chapters',$course->id) }}" class="nav-link">Chapters / Lession</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.course.widget',$course->id) }}" class="nav-link">Widgets</a>
        </li>
        <li class="nav-item">
            <a href="#changing-seperator" class="nav-link">Report</a>
        </li>
    </ul>
</div>