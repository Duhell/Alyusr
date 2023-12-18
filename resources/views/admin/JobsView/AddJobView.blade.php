@extends('admin.layout.AdminLayout')
@section('contents')
<div style="height: 600px;overflow-y:auto;padding:2em;" class="col">
    <div class="mt-4">
        <a href="{{ route('jobs') }}">Go back</a>
        <h1 class="display-4">Jobs</h1>
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
        <br>
        <form action="{{ route('save_job') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Add Image</label>
                <input type="file" accept="image/*" name="job_image" class="form-control" id="inputGroupFile01">
            </div>
            <div class="mb-3">
                <label style="width:100%" class="form-label">Job Title</label>
                <input class="form-control" required placeholder="ex. Waitress" name="job_position" type="text">
                <input class="form-control" required placeholder="Location" name="job_location" type="text">
            </div>

            <div class="mb-3 descriptions">
                <label style="width:100%" class="form-label">Job Description</label>

                {{-- add when clicked here --}}
                <div id="descriptionContainer">
                    <div class="descriptionGroup mt-4">
                        <input class="form-control" name="DescriptionTitle[0][name]" placeholder="ex. Requirement and Skills" type="text">
                        <textarea class="form-control" name="DescriptionRequirements[0][name]" placeholder="ex. List of requirements"   rows="5"></textarea>
                    </div>
                </div>
                {{-- End --}}
            </div>

            <div class="d-flex gap-2 flex-column flex-md-row justify-content-md-start align-items-md-center">
                <button style="background-color: #146c43;border:0;" class="py-2 px-4 rounded text-light d-flex align-items-center gap-2 " type="submit" >Save Changes</button>
                <button  style="background-color: #23272e;border:0;" class="py-2 px-4 rounded text-light d-flex align-items-center gap-2 " type="button"  onclick="addDescription()">Add Description</button>
                <button  id="removeDescriptionBTN" style="background-color: #842029;border:0;" class="py-2 invisible px-4 rounded text-light d-flex align-items-center gap-2 " type="button" onclick="removeDescription()">Remove Description</button>
            </div>
        </form>
    </div>
</div>
<script>
    let descriptionIndex = 0;
    const container = document.getElementById('descriptionContainer');
    const descriptionGroups = container.getElementsByClassName('descriptionGroup');
    const descriptionBTN = document.getElementById('removeDescriptionBTN')


    function addDescription() {
        descriptionIndex++;

        const newDescriptionGroup = document.querySelector('.descriptionGroup').cloneNode(true);

        newDescriptionGroup.querySelector('input').name = `DescriptionTitle[${descriptionIndex}][name]`;
        newDescriptionGroup.querySelector('textarea').name = `DescriptionRequirements[${descriptionIndex}][name]`;

        container.appendChild(newDescriptionGroup);
        if(descriptionGroups.length > 1) {
            descriptionBTN.classList.remove('invisible');


        }

    }

    function removeDescription() {
        const container = document.getElementById('descriptionContainer');

        if (descriptionGroups.length > 1) {
            container.removeChild(descriptionGroups[descriptionGroups.length - 1]);
            descriptionIndex--;

        }
        if(descriptionGroups.length <= 1) {
            descriptionBTN.classList.add('invisible');
        }
    }
</script>
@endsection

