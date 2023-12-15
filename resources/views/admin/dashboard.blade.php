@extends('admin.layout.AdminLayout')
@section('contents')
<div style="height: 600px;overflow-y:auto;" class="col py-3">
    <h2>Dashboard</h2>
    <div class="container d-flex gap-3 align-items-center">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $totalApplicants }}</h5>
                <p class="card-text" id="applicants">Total Applicants this year </p>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $totalInquiries }}</h5>
                <p class="card-text" id="inquiries">Total Inquiries this year</p>
            </div>
        </div>
    </div>
</div>
@endsection
