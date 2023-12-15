@extends('admin.layout.AdminLayout')
@section('contents')
<div class="col py-3">
    <div class="mt-4">
        <h1 class="display-4">Inquiries</h1>
        @if (session('success'))
        <div class="alert alert-info" role="alert">
            {{ session('success') }}
          </div>
        @endif
        <br>
        <table class="table table-striped table-hover mt-4">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Inquire Date</th>
                <th scope="col">Action</th>
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
