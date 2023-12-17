<?php

namespace App\Http\Controllers;

use App\Models\JobTitle;
use Exception;
use App\Models\Gallery;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\GalleryRequest;
use App\Http\Requests\JobRequest;
use App\Models\Application;
use App\Models\Inquire;
use App\Models\JobDescription;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function loginView()
    {
        return view('admin.login');
    }

    public function login(LoginRequest $req)
    {
        $credentials = $req->validated();

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'error' => "Wrong email or password"
        ]);
    }
    public function dashboard()
    {
        return view('admin.dashboard')->with([
            'totalApplicants' => Application::whereYear('created_at', date('Y'))->count(),
            'totalInquiries' => Inquire::whereYear('created_at', date('Y'))->count(),
            'totalJobs' => JobTitle::whereYear('created_at', date('Y'))->count(),
        ]);
    }

    public function gallery()
    {
        return view('admin.gallery')->with(['images' => Gallery::all()]);
    }

    public function application()
    {
        return view('admin.application')->with([
            'applicants' => Application::all()
        ]);
    }

    public function show_details_applicant(int $applicant_id)
    {
        return view('admin.ShowView.ApplicantDetails')->with([
            'data' => Application::find($applicant_id)->first()
        ]);
    }

    public function delete_applicant_details(Application $applicant_id)
    {
        $applicant_id->delete();
        return redirect()->route('application')->with([
            'success' => "Delete Success"
        ]);;
    }

    public function delete_inquiry_details(Inquire $inquire_id)
    {
        $inquire_id->delete();
        return redirect()->route('inquiry')->with([
            'success' => "Delete Success"
        ]);
    }

    public function delete_job(JobTitle $job_id)
    {
        $job_id->delete();
        return redirect()->route('jobs')->with([
            'success' => 'Successfully deleted.'
        ]);
    }

    public function edit_job(JobTitle $job_id)
    {
        return view('admin.JobsView.EditJobDetails', compact('job_id'));
    }

    public function update_job(JobRequest $request, JobTitle $job_id)
    {
        // Get the IDs of all descriptions before the update
        $oldDescriptionIds = $job_id->JobDescriptions()->pluck('id');

        // Update existing job details
        $job_id->update($request->validated());

        // Update or create job descriptions
        $newDescriptionIds = [];
        foreach ($request->input('DescriptionTitle') as $index => $descriptionData) {
            $description = $job_id->JobDescriptions()->updateOrCreate(
                ['id' => $request->input('DescriptionTitle')[$index]],
                [
                    'job_requirement' => $descriptionData['name'],
                    'job_description' => $request->input('DescriptionRequirements')[$index]['name'],
                ]
            );
            $newDescriptionIds[] = $description->id;
        }

        // $oldDescriptionIds contains all the ids then
        // Get the ids that are not in the $newDescriptionIds
        // then remove the record in the db
        $removedDescriptions = $oldDescriptionIds->diff($newDescriptionIds);
        $job_id->JobDescriptions()->whereIn('id', $removedDescriptions)->delete();

        return redirect()->back()->with('success', 'Job updated successfully');
    }




    public function show_details_inquire(Inquire $inquire_id)
    {
        return view('admin.ShowView.InquireDetails')->with([
            'data' => $inquire_id
        ]);
    }

    public function show_details_job(JobTitle $job_id)
    {
        $job_id->load('jobDescriptions');

        $jobDetails = [
            'job_title' => $job_id,
            'job_descriptions' => $job_id->jobDescriptions,
        ];

        return view('admin.ShowView.JobDetails', compact('jobDetails'));
    }
    public function inquiry()
    {
        return view('admin.inquire')->with([
            'inquiries' => Inquire::all()
        ]);
    }

    public function jobs()
    {
        return view('admin.job')->with([
            'Jobs' => JobTitle::all()
        ]);
    }

    public function addjob()
    {
        return view('admin.JobsView.AddJobView');
    }

    public function saveJob(JobRequest $request)
    {
        $validatedData = $request->validated();
        $job = new JobTitle;
        $job->postedBy = Auth::user()->name;
        $job->job_position = $validatedData['job_position'];
        $job->job_location = $validatedData['job_location'];
        $job->save();

        $jobDescriptions = [];
        foreach ($validatedData['DescriptionTitle'] as $index => $descriptionTitle) {
            $jobDescriptions[] = new JobDescription([
                'job_requirement' => $descriptionTitle['name'],
                'job_description' => $validatedData['DescriptionRequirements'][$index]['name'],
            ]);
        }

        $job->jobDescriptions()->saveMany($jobDescriptions);

        return redirect()->back()->with('success', 'Successfully added a job!');
    }

    public function upload(GalleryRequest $request)
    {
        try {

            if (!$request->hasFile('photo')) {
                throw new Exception('Please insert an image first.');
            }

            $photos = $request->file('photo');
            $tag = $request->tag;

            foreach ($photos as $photo) {
                $filename = time() . "_" . uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs('public/gallery/' . $tag, $filename);

                Gallery::create([
                    'imagePath' => 'gallery/' . $tag . '/' . $filename,
                    'tag' => $tag
                ]);
            }

            return redirect()->back()->with('success', 'Upload Success');
        } catch (Exception $e) {
            return redirect()->back()->withErrors([
                'upload_error' => $e->getMessage()
            ]);
        }
    }

    public function deleteImage(int $id)
    {

        try {
            $image = Gallery::find($id);

            if ($image) {
                Storage::delete($image->imagePath);
                $image->delete();

                return redirect()->back()->with(['success' => "Image deleted successfully"]);
            } else {
                return redirect()->back()->with(['error' => "Image not found!"]);
            }
        } catch (Exception $err) {
            return redirect()->back()->withErrors(['error' => $err->getMessage()]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
