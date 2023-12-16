@extends('admin.layout.AdminLayout')
@section('contents')
<div style="overflow-y: auto; height:80vh;" class="container rounded bg-white mt-5 mb-5">

    <div style="padding-left:2em;" class="row ">
        <div class="col-md-8 border-right">
            <div class="px-3">
                <a wire:navigate href="{{ route('jobs') }}">Go Back</a>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Job Details</h4>
                    <a class="bg-danger px-3 py-2 rounded text-light" href="">Delete</a>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="labels">Position</label>
                        <input disabled type="text" class="form-control" value="{{ $jobDetails['job_title']->job_position }}">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Job posted by</label><input disabled type="text" class="form-control" value="{{ $jobDetails['job_title']->postedBy }}"></div>
                    <div class="col-md-6"><label class="labels">Posted on</label><input disabled type="text" class="form-control" value="{{ date('F d, Y',strtotime($jobDetails['job_title']->created_at)) }}" ></div>
                </div>
                <br>
                {{-- <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="form-label">Cover Letter</label>
                        <textarea class=" form-control" disabled rows="3"></textarea>
                    </div>
                </div> --}}
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
