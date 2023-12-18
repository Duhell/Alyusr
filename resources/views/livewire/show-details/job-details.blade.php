<div>
    <section class="jobdetails">

    @forelse ( $data as $job )
    <div class="container my-5">
    <a wire:navigate href="{{ route('listJobs') }}">Go back</a>

        <div class="row">
          <div class="col-md-6">
            <h1>Job Details</h1>
            @if ($job->job_image)
            <div class="w-50 h-50 mb-3">
                <img class="img-fluid" src="{{ Storage::url($job->job_image) }}" alt="Job Image">
            </div>
            @else
                {{-- No image --}}
            @endif
            <h3>Position: {{ $job->job_position }}</h3>
            <!-- <p>UUID: {{ $job->id }}</p> -->
            <p>Posted By: {{ $job->postedBy }}</p>
            <p>Posted On: {{ date('F d, Y',strtotime($job->created_at)) }}</p>
            <a wire:navigate href="{{ route('sendApplication') }}">
                <button class="btn btn-primary">Apply Now</button>
            </a>
          </div>
          <div class="col-md-6 desc-wrapper">
            <!-- Use v-html to render HTML content -->
            <p>Description:</p>
            @forelse ( $job->jobDescriptions as $description )
            <div class="mt-3">
                <strong>{{ $description->job_requirement }}</strong>
                <p>{!! nl2br(e($description->job_description)) !!}</p>
            </div>
            @empty
                <strong>No job description</strong>
            @endforelse
          </div>
        </div>
      </div>
    @empty
        <strong>No Details</strong>
    @endforelse
    </section>
  </div>
