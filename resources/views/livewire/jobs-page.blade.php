<div>
    <section>
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-9">
                    <div class="bg-primary my-3 p-3">
                        <h1 class="text-white">Available Jobs</h1>
                    </div>
                    @forelse ( $jobs as $job )
                    <div  class="p-3 my-2 text-dark bg-white" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                        <a  href="{{ route('details_job_list',$job->id) }}"><h4 class="text-black">{{ $job->job_position }}</h4></a>
                        <div>
                            <span class="mr-5">Posted On: {{ date('F d, Y',strtotime($job->created_at)) }}</span><br>
                            <span class="mr-2">Posted By: {{ $job->postedBy }}</span>
                        </div>

                        <span class="mr-2">Country: {{ $job->job_location }}</span>
                    </div>
                    @empty
                        <p>No Jobs Available!</p>
                    @endforelse

                </div>
                <div class="col-md-3">
                    <div class=" bg-white" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                        <img class="img-fluid" src="{{ asset('images/alyusr-logo.png')  }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
