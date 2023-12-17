@extends('admin.layout.AdminLayout')
@section('contents')
<div style="height: 600px;overflow-y:auto;padding:2em;" class="col">
    <div class="mt-4">
        <h1 class="display-4">Inquiries</h1>
        @if (session('success'))
        <div id="notif"  class="row">
            <div class="col-12">
                <div class="alert alert-success contact__msg" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        </div>
        @endif
        <br>
        <table class="table table-striped table-hover mt-4">
            <thead class="thead-dark">
              <tr>
                <th class="text-light" style="background: #23272e;" scope="col">#</th>
                <th class="text-light" style="background: #23272e;" scope="col">Full Name</th>
                <th class="text-light" style="background: #23272e;" scope="col">Phone Number</th>
                <th class="text-light" style="background: #23272e;" scope="col">Inquire Date</th>
                <th class="text-light" style="background: #23272e;" scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @forelse ( $inquiries as $inquiry )
                <tr>
                    <th scope="row">{{ $loop->iteration}}</th>
                    <td>
                        {{ $inquiry->fullName }}
                    </td>
                    <td>{{ $inquiry->contactNo }}</td>
                    <td>{{ date('F d, Y', strtotime($inquiry->created_at)) }}</td>
                    <td>
                        <a  class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{ route('details_inquire',$inquiry->id) }}">View</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <th style="text-align: center; color:#333;font-size:14px;" colspan="12">No Inquiry</th>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
