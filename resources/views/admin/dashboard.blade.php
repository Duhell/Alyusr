@extends('admin.layout.AdminLayout')
@section('contents')
<div style="height: 600px;overflow-y:auto; padding:2em;" class="col">
    <h2>Dashboard</h2>
    <h6>Welcome Admin</h6>
    <div class="container mt-5 d-flex gap-3 align-items-center">
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

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $totalJobs }}</h5>
                <p class="card-text" id="jobs">Total Jobs this year</p>
            </div>
        </div>
    </div>
</div>
@endsection
