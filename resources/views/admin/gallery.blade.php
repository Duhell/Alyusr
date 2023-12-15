@extends('admin.layout.AdminLayout')
@section('contents')

    <div style="height: 600px;overflow-y:auto;" class="col py-3">
        <h1>Gallery</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Upload Photo</label>
                <input class="form-control" name="photo" type="file">
            </div>

            <div class="mb-3">
                <label class="form-label">Tag</label>
                <select name="tag" class="form-select" aria-label="Default select">
                    <option selected>Choose tag</option>
                    <option value="achievements">Achievements</option>
                    <option value="events">Events</option>
                    <option value="staff">Staff</option>
                    <option value="office">Office</option>
                    <option value="activities">Activities</option>
                    <option value="others">Others</option>
                </select>
            </div>

            <button class="btn btn-primary" type="submit">Upload</button>
        </form>

        <div class="mt-4">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Uploaded</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ( $images as $image )
                    <tr>
                        <th scope="row">{{ $loop->iteration}}</th>
                        <td>
                            <img src="{{ Storage::url($image->imagePath) }}" alt="" style="width: 100px; height: 100px;">
                        </td>
                        <td>{{ $image->tag }}</td>
                        <td>{{ date('F d, Y', strtotime($image->created_at)) }}</td>
                        <td><a class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{ "/dashboard/gallery/photo=".$image->id }}">Delete</a></td>
                    </tr>
                    @empty
                    <tr>
                        <th>No Photos</th>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
