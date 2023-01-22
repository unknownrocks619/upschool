<div class="row my-4 border mb-4">
    <div class="col-md-5" style="background:url({{ $project->images->banner->fullPath}});background-position:center center; background-size:cover">
    </div>
    <div class="col-md-7 ps-3">
        @include('frontend.pages.charity.projects.project-title',compact('project'))
        <strong>
            Location:
        </strong>
        {{$project->country}}
        @include('frontend.pages.charity.projects.project-small-images',compact('project'))
        @include('frontend.pages.charity.projects.project-description', compact('project'))
        <div class="bn my-3">
            <a href="{{route('frontend.charity.project',[$project->slug])}}" class="href btn btn-danger btn-upschool-primary btn-float-animation">
                Learn More
            </a>
        </div>
    </div>
</div>
