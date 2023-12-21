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

        <div class="mt-4 w-100">
            <table class="table">
                <thead>
                  <tr>
                    <th class="text-light" style="background: #23272e;" scope="col">#</th>
                    <th class="text-light" style="background: #23272e;"  scope="col">IP Address</th>
                    <th class="text-light" style="background: #23272e;" scope="col">Country</th>
                    <th class="text-light" style="background: #23272e;" scope="col">Visited Date</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ( $Visitors as $visitor )
                    <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>{{ $visitor->ip_address }}</td>
                        <td>{{ $visitor->country }}</td>
                        <td>{{ date('F d, Y', strtotime($visitor->created_at)) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <th style="text-align: center; color:#333;font-size:14px;" colspan="12">No Visitors</th>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $Visitors->links('pagination::bootstrap-5') }}
        </div>

    </div>
</div>
@endsection
