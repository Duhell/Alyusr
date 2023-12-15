@extends('admin.layout.AdminLayout')
@section('contents')

<div style="height: 600px;overflow-y:auto;padding:2em;" class="col">
    <div class="mt-4">
        <h1>Applicants</h1>
        @if (session('success'))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success contact__msg" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        </div>
        @endif
        <br>
        <table class="table mt-4">
            <thead >
              <tr>
                <th class="text-light" style="background: #23272e;" scope="col">#</th>
                <th class="text-light" style="background: #23272e;"  scope="col">Full Name</th>
                <th class="text-light" style="background: #23272e;" scope="col">Email</th>
                <th class="text-light" style="background: #23272e;" scope="col">Applied Date</th>
                <th class="text-light" style="background: #23272e;" scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @forelse ( $applicants as $applicant )
                <tr style="background:red!important;">
                    <th style="background:#ececec;" scope="row">{{ $loop->iteration}}</th>
                    <td style="background:#ececec;">
                        {{ $applicant->FirstName." ".$applicant->MiddleName." ".$applicant->LastName }}
                    </td>
                    <td style="background:#ececec;">{{ $applicant->Email }}</td>
                    <td style="background:#ececec;">{{ date('F d, Y', strtotime($applicant->created_at)) }}</td>
                    <td style="background:#ececec;">
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

