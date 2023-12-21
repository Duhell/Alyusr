@extends('admin.layout.AdminLayout')
@section('contents')
<div style="height: 600px;overflow-y:auto; padding:2em;" class="col">
    <h2>Dashboard</h2>
    <h6>Welcome {{ Auth::user()->name }}</h6>
    <div class="container mt-5 d-flex flex-wrap gap-3 align-items-center">
        <div class="card shadow" style="width: 15rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $totalApplicants }}</h5>
                <p class="card-text" id="applicants">Total Applicants </p>
            </div>
        </div>

        <div class="card shadow" style="width: 15rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $totalInquiries }}</h5>
                <p class="card-text" id="inquiries">Total Inquiries</p>
            </div>
        </div>

        <div class="card shadow" style="width: 15rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $totalJobs }}</h5>
                <p class="card-text" id="jobs">Total Jobs</p>
            </div>
        </div>

        <div class="card shadow" style="width: 15rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $totalUsers }}</h5>
                <p class="card-text" id="jobs">Total Users</p>
            </div>
        </div>

        <div class="card shadow" style="width: 15rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $totalVisitors }}</h5>
                <p class="card-text" id="jobs">Number of Visitors</p>
            </div>
        </div>
    </div>
</div>
@endsection
