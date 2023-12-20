@extends('admin.layout.AdminLayout')
@section('contents')

    <div style="height: 600px;overflow-y:auto;padding:2em;" class="col">
        <h1>Gallery</h1>
        @if (session('success'))
        <div id="notif" class="row">
            <div class="col-12">
                <div class="alert alert-success contact__msg" role="alert">
                    {{ session('success') }}
                </div>
            </div>
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
                <input class="form-control" accept="image/*" multiple name="photo[]" type="file">
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="tag" class="form-select" aria-label="Default select">
                    <option selected value="achievements">Achievements</option>
                    <option value="events">Events</option>
                    <option value="staff">Staff</option>
                    <option value="office">Office</option>
                    <option value="activities">Activities</option>
                    <option value="others">Others</option>
                </select>
            </div>

            <button style="background-color: #23272e;border:0;" class="py-2 px-4 rounded text-light d-flex align-items-center gap-2 " type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
                <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0z"/>
              </svg><span>Upload</span></button>
        </form>

        <div class="mt-4">
            <table class="table">
                <thead>
                  <tr>
                    <th class="text-light" style="background: #23272e;" scope="col">#</th>
                    <th class="text-light" style="background: #23272e;"  scope="col">Photo</th>
                    <th class="text-light" style="background: #23272e;" scope="col">Tag</th>
                    <th class="text-light" style="background: #23272e;" scope="col">Uploaded Date</th>
                    <th class="text-light" style="background: #23272e;" scope="col">Action</th>
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
                        <td><a class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{ "/dashboard/gallery/photo=".$image->id }}">Delete</a></td>
                    </tr>
                    @empty
                    <tr>
                        <th style="text-align: center; color:#333;font-size:14px;" colspan="12">No uploaded photos</th>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
