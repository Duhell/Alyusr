@extends('admin.layout.AdminLayout')
@section('contents')
<div style="height: 600px;overflow-y:auto;padding:2em;" class="col">
    <div class="mt-4">

        <h1 class="display-4">List of available jobs</h1>
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
        <a class="bg-dark text-light rounded px-3 py-2" href="{{ route('create_job') }}">Add Job</a>

        <table class="table table-striped table-hover mt-4">
            <thead class="thead-dark">
              <tr>
                <th class="text-light" style="background: #23272e;" scope="col">No.</th>
                <th class="text-light" style="background: #23272e;" scope="col">Job Title</th>
                <th class="text-light" style="background: #23272e;" scope="col">Owner</th>
                <th class="text-light" style="background: #23272e;" scope="col">Posted Date</th>
                <th class="text-light" style="background: #23272e;" scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @forelse ( $Jobs as $job)
                <tr>
                    <th scope="row">{{ $loop->iteration}}</th>
                    <td>
                        {{ $job->job_position }}
                    </td>
                    <td>{{ $job->postedBy }}</td>
                    <td>{{ date('F d, Y', strtotime($job->created_at)) }}</td>
                    <td>
                        <a  class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{ route('details_job',$job->id) }}">View</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <th style="text-align: center; color:#333;font-size:14px;" colspan="12">No Available jobs :(</th>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

