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
                                <label>First Name</label>
                                <input wire:model="FirstName" type="text" class="form-control">
                            </div>
                            <div class="col-4 mt-2">
                                <label>Middle Name</label>
                                <input wire:model="MiddleName" type="text" class="form-control" >
                            </div>
                            <div class="col-4 mt-2">
                                <label>Last Name</label>
                                <input wire:model="LastName" type="text" class="form-control" >
                            </div>
                            {{-- <div class="col-12 mt-2">
                                <label>Job Title</label>
                                <select class="form-control" v-model="job_id">
                                    <option v-for="job in jobDetails" :key="job.uuid" :value="job.uuid">{{ job.title }}</option>
                                </select>
                            </div> --}}
                            <div class="col-6 mt-2">
                                <label>Contact No.</label>
                                <input wire:model="PhoneNumber" type="text" class="form-control" >
                            </div>
                            <div class="col-6 mt-2">
                                <label>Email</label>
                                <input wire:model="Email" type="email" class="form-control" >
                            </div>
                            <div class="col-12 mt-2">
                                <label>Upload Resume</label>
                                <input type="file" class="form-control" wire:model="FileResume" id="resume">
                                <div wire:loading wire:target="FileResume">Uploading...</div>
                            </div>
                            <div class="col-12 mt-2">
                                <label>Cover Letter</label>
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
