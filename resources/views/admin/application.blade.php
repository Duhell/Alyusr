@extends('admin.layout.AdminLayout')
@section('contents')

<div style="height: 600px;overflow-y:auto;padding:2em;" class="col">
    <div class="mt-4">
        <h1>Applicants</h1>
        @if (session('success'))
        <div id="notif" class="row">
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
                <th class="text-light" style="background: #23272e;" scope="col">Applied Job</th>
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
                    <td style="background:#ececec;">{{ $applicant->AppliedJob }}</td>
                    <td style="background:#ececec;">{{ date('F d, Y', strtotime($applicant->created_at)) }}</td>
                    <td style="background:#ececec;">
                        <a  class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{ route('details_applicant',$applicant->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                            <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8m0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5"/>
                          </svg>
                        </a>
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

