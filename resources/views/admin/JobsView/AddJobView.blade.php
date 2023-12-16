@extends('admin.layout.AdminLayout')
@section('contents')
<div style="height: 600px;overflow-y:auto;padding:2em;" class="col">
    <div class="mt-4">
        <a href="{{ route('jobs') }}">Go back</a>
        <h1 class="display-4">Jobs</h1>
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
        <form action="{{ route('save_job') }}" method="post">
            @csrf
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

            <div>
                <button class="btn btn-primary" type="submit" >Save Job</button>
                <button  class="btn btn-success" type="button"  onclick="addDescription()">Add Description</button>
                <button  id="removeDescriptionBTN" class="btn d-none btn-danger" type="button" onclick="removeDescription()">Remove Description</button>
            </div>
        </form>
    </div>
</div>
<script>
    let descriptionIndex = 0;

    function addDescription() {
        descriptionIndex++;

        const container = document.getElementById('descriptionContainer');
        const newDescriptionGroup = document.querySelector('.descriptionGroup').cloneNode(true);

        newDescriptionGroup.querySelector('input').name = `DescriptionTitle[${descriptionIndex}][name]`;
        newDescriptionGroup.querySelector('textarea').name = `DescriptionRequirements[${descriptionIndex}][name]`;

        container.appendChild(newDescriptionGroup);

        document.getElementById('removeDescriptionBTN').classList.remove('d-none');
    }

    function removeDescription() {
        const container = document.getElementById('descriptionContainer');
        const descriptionGroups = container.getElementsByClassName('descriptionGroup');

        if (descriptionGroups.length > 1) {
            container.removeChild(descriptionGroups[descriptionGroups.length - 1]);
            descriptionIndex--;

            if (descriptionGroups.length === 2) {
                document.getElementById('removeDescriptionBTN').classList.add('d-none');
            }
        }
    }
</script>


@endsection

