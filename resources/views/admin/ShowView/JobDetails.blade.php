@extends('admin.layout.AdminLayout')
@section('contents')
<div style="overflow-y: auto; height:80vh;" class="container rounded bg-white mt-5 mb-5">

    <div style="padding-left:2em;" class="row ">
        <div class="col-md-8 border-right">
            <div class="px-3">
                <a wire:navigate href="{{ route('jobs') }}">Go Back</a>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Job Details</h4>
                    <div>
                        <a style="background: #79dfc1;" class="px-3 py-2 rounded text-dark" href="{{ route('edit_job',$jobDetails['job_title']->id) }}">Edit</a>
                        <a class="bg-danger px-3 py-2 rounded text-light" href="{{ route('delete_job',$jobDetails['job_title']->id) }}">Delete</a>
                    </div>
                </div>

                <div class="row">
                    <!-- Left side (Image) -->
                    @if ($jobDetails['job_title']->job_image)
                    <div style="padding:0px;" class="col-md-3">
                        <img style="object-fit: cover;" src="{{ Storage::url($jobDetails['job_title']->job_image) }}" class="img-fluid border w-100 h-100 rounded" alt="...">
                    </div>
                    @else
                    <div style="padding:0px;" class="col-md-3">
                        <img style="object-fit: cover;" src="https://www.thensg.gov.za/wp-content/uploads/2020/07/No_Image-3-scaled-1.jpg" class="img-fluid border w-100 h-100 rounded" alt="...">
                    </div>
                    @endif

                    <!-- Right side (Position, Posted By, and Posted On) -->
                    <div class="col-md-9">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Position</label>
                                <input disabled type="text" class="form-control" value="{{ $jobDetails['job_title']->job_position }}">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels">Job posted by</label>
                                <input disabled type="text" class="form-control" value="{{ $jobDetails['job_title']->postedBy }}">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">
                                    {{ $jobDetails['job_title']->created_at != $jobDetails['job_title']->updated_at ? "Edited on":"Posted on"  }}
                                </label>
                                <input disabled type="text" class="form-control" value="{{ date('F d, Y',strtotime($jobDetails['job_title']->updated_at)) }}" >
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <h3>Job Description</h3>
                @foreach ($jobDetails['job_descriptions'] as $description)
                    <div class="mt-3">
                        <strong>{{ $description->job_requirement }}</strong>
                        <p style="font-size: 14px;">{{ $description->job_description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
