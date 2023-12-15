@extends('admin.layout.AdminLayout')
@section('contents')
    <div style="overflow-y: auto; height:80vh;" class="container rounded bg-white mt-5 mb-5">

        <div style="padding-left:2em;" class="row">
            <div class="col-md-8 border-right">
                <div class="px-3">
                    <a wire:navigate href="/dashboard/inquiry">Go back</a>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Inquire Details</h4>
                        <a class="bg-danger px-3 py-2 rounded text-light"
                            href="{{ route('delete_inquiry', $data->id) }}">Delete</a>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Full Name</label>
                            <input disabled type="text" class="form-control" value="{{ $data->fullName }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input disabled type="text" class="form-control" value="{{ $data->email }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Mobile Number</label>
                            <input disabled type="text" class="form-control" value="{{ $data->contactNo }}">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Company Registration</label>
                            <input disabled type="text" class="form-control" value="{{ $data->companyRegistration }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12" style="background-color: #e9ecef; padding: 10px;">
                            <label class="labels">Download Files</label>
                            @if ($data->inquireDocs)
                                <div>
                                    <a href="{{ asset($data->inquireDocs) }}" download>Inquire Document</a>
                                </div>
                            @endif

                            @if ($data->national_id)
                                <div>
                                    <a href="{{ asset($data->national_id) }}" download>National Identification</a>
                                </div>
                            @endif

                            @if ($data->company_registration)
                                <div>
                                    <a href="{{ asset($data->company_registration) }}" download>Company Registration </a>
                                </div>
                            @endif

                            @if ($data->otherDocs)
                                <div>
                                    <a href="{{ asset($data->otherDocs) }}" download>Other Document </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" disabled rows="3">{{ $data->message }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
