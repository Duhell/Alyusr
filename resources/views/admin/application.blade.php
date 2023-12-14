@extends('admin.layout.AdminLayout')
@section('contents')
<div class="col py-3">
    <div class="mt-4">
        <h1>Applicants</h1>
        <br>
        <table class="table mt-4">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Applied Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @forelse ( $applicants as $applicant )
                <tr>
                    <th scope="row">{{ $loop->iteration}}</th>
                    <td>
                        {{ $applicant->FirstName." ".$applicant->MiddleName." ".$applicant->LastName }}
                    </td>
                    <td>{{ $applicant->Email }}</td>
                    <td>{{ date('F d, Y', strtotime($applicant->created_at)) }}</td>
                    <td>
                        <a  class="btn btn-success" href="{{ route('details_applicant',$applicant->id) }}">View</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <th>No Applicants</th>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

