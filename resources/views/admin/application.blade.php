@extends('admin.layout.AdminLayout')
@section('contents')

<div class="col py-3">
    <div class="mt-4">
        <h1>Applicants</h1>
        @if (session('success'))
        <div class="alert alert-info" role="alert">
            {{ session('success') }}
          </div>
        @endif
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
                        <a  class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{ route('details_applicant',$applicant->id) }}">View</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <th style="text-align: center; color:#333;font-size:14px;" colspan="12">No Applicants</th>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

