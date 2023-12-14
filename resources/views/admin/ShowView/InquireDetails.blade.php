@extends('admin.layout.AdminLayout')
@section('contents')
<div class="container rounded bg-white mt-5 mb-5">

    <div class="row">
        <div class="col-md-8 border-right">
            <div class="px-3">
                <a wire:navigate href="/dashboard/inquiry">Back</a>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Inquire Details</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Full Name</label><input disabled type="text" class="form-control" value="{{ $data->fullName }}"></div>
                    <div class="col-md-6"><label class="labels">Email</label><input disabled type="text" class="form-control" value="{{ $data->email }}"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input disabled type="text" class="form-control" value="{{ $data->contactNo }}"></div>
                    <div class="col-md-12"><label class="labels">Company Registration</label><input disabled type="text" class="form-control" value="{{ $data->companyRegistration }}"></div>
                </div>
                <div class="mt-3 row">
                    <label class="form-label">Message</label>
                    <textarea class=" form-control" disabled rows="3">{{ $data->message }}</textarea>
                </div>
                <div class="mt-5 text-center"><a class="btn btn-danger profile-button" >Delete</a></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
