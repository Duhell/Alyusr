<div>
    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Application Form</span>
                        <h1 class="text-capitalize mb-5 text-lg">Application Form</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-md-8 offset-md-2">
                    <form wire:submit="SaveApplication" enctype="multipart/form-data">
                        @if (session('success'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success contact__msg" role="alert">
                                    {{ session('success') }}
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-4 mt-2">
                                <label data-original="First Name / الاسم الأول" class="language-label">First Name</label>
                                <input wire:model="FirstName" type="text" class="form-control">
                            </div>
                            <div class="col-4 mt-2">
                                <label data-original="Middle Name / الاسم الأوسط" class="language-label">Middle Name</label>
                                <input wire:model="MiddleName" type="text" class="form-control" >
                            </div>
                            <div class="col-4 mt-2">
                                <label data-original="Last Name / الاسم الأخير" class="language-label">Last Name</label>
                                <input wire:model="LastName" type="text" class="form-control" >
                            </div>
                            <div class="col-12 mt-2">
                                <label data-original="Job Title / المسمى الوظيفي" class="language-label">Job Title</label>
                                <select class="form-control" wire:model.lazy="AppliedJob">
                                    <option selected>List of Jobs</option>
                                    @forelse ($jobsAvail as $job )
                                        <option value="{{ $job->job_position }}">{{ $job->job_position }}</option>
                                    @empty
                                        <option>No job available</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-6 mt-2">
                                <label data-original="Contact No. / رقم الهاتف" class="language-label">Contact No.</label>
                                <input wire:model="PhoneNumber" type="text" class="form-control" >
                            </div>
                            <div class="col-6 mt-2">
                                <label data-original="Email / البريد الإلكتروني" class="language-label">Email</label>
                                <input wire:model="Email" type="email" class="form-control" >
                            </div>
                            <div class="col-12 mt-2">
                                <label data-original="Upload Resume / تحميل السيرة الذاتية" class="language-label">Upload Resume </label>
                                <input type="file" class="form-control" wire:model="FileResume" id="resume">
                                <div wire:loading wire:target="FileResume">Uploading...</div>
                            </div>
                            <div class="col-12 mt-2">
                                <label data-original="Cover Letter / رسالة التغطية" class="language-label">Cover Letter</label>
                                <textarea class="form-control" rows="10" wire:model="CoverLetter" ></textarea>
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary w-100" wire:loading.attr="disabled">
                                    <span wire:loading.remove>Submit Application</span>
                                    <span wire:loading>Loading...</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
</div>
