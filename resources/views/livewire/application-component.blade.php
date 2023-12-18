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
                                <label class="language-label">First Name / الاسم الأول</label>
                                <input wire:model="FirstName" type="text" class="form-control">
                            </div>
                            <div class="col-4 mt-2">
                                <label class="language-label">Middle Name / الاسم الأوسط</label>
                                <input wire:model="MiddleName" type="text" class="form-control" >
                            </div>
                            <div class="col-4 mt-2">
                                <label class="language-label">Last Name / الاسم الأخير</label>
                                <input wire:model="LastName" type="text" class="form-control" >
                            </div>
                            <div class="col-12 mt-2">
                                <label class="language-label">Job Title / المسمى الوظيفي</label>
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
                                <label class="language-label">Contact No. / رقم الهاتف</label>
                                <input wire:model="PhoneNumber" type="text" class="form-control" >
                            </div>
                            <div class="col-6 mt-2">
                                <label class="language-label">Email / البريد الإلكتروني</label>
                                <input wire:model="Email" type="email" class="form-control" >
                            </div>
                            <div class="col-12 mt-2">
                                <label class="language-label">Upload Resume / تحميل السيرة الذاتية</label>
                                <input type="file" class="form-control" wire:model="FileResume" id="resume">
                                <div wire:loading wire:target="FileResume">Uploading...</div>
                            </div>
                            <div class="col-12 mt-2">
                                <label class="language-label">Cover Letter / رسالة التغطية</label>
                                <textarea class="form-control" rows="10" wire:model="CoverLetter" ></textarea>
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
</div>
