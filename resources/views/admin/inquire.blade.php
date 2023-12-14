@extends('admin.layout.AdminLayout')
@section('contents')
<div class="col py-3">
    <div class="mt-4">
        <h1>Inquiries</h1>
        <br>
        <table class="table mt-4">
            <thead>
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
                        <a  class="btn btn-success" href="{{ route('details_inquire',$inquiry->id) }}">View</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <th>No inquiry</th>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

