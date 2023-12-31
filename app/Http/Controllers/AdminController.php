<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Visit;
use App\Models\Gallery;
use App\Models\Inquire;
use App\Models\JobTitle;
use App\Models\Application;
use App\Models\JobDescription;
use App\Http\Requests\JobRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\GalleryRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{

    // ============ Account Feature ========================== //
    public function loginView()
    {
        return view('admin.login');
    }
    public function signupView()
    {
        return view('admin.signup');
    }

    public function registerAccount()
    {
        try {
            $validated = request()->validate([
                'fullname' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password'
            ]);
            $new_user = new User;
            $new_user->name = $validated['fullname'];
            $new_user->email = $validated['email'];
            $new_user->password = $validated['password'];
            $new_user->save();
            return redirect()->route('login')->with(['success' => 'You are now registered!']);
        }catch(ValidationException $err){
            return redirect()->route('signup')->withErrors($err->errors())->withInput();
        }catch (Exception $err) {
            Log::error($err->getMessage(), [
                'line' => $err->getLine(),
                'file' => $err->getFile()
            ]);
        }
    }

    public function login(LoginRequest $req)
    {
        $credentials = $req->validated();
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            switch ($user->role) {
                case (0):
                    $page = "landing";
                    break;
                case (1):
                    $page = "dashboard";
                    break;
                default:
                    Log::error('error on login function from AdminController, line 63');
            }
            return redirect()->route($page);
        }

        return back()->withErrors([
            'error' => "Wrong email or password"
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    // ============ End Account Feature ========================== //


    // ============ Dashboard ========================== //

    public function dashboard()
    {
        return view('admin.dashboard')->with([
            'totalApplicants' => Application::count(),
            'totalInquiries' => Inquire::count(),
            'totalJobs' => JobTitle::count(),
            'totalUsers' => User::where('role', 0)->count(),
            'Visitors'=> Visit::paginate(5)
        ]);
    }
    // ============ End Dashboard ========================== //


    // ============ Gallery Features ========================== //

    public function gallery()
    {
        return view('admin.gallery')->with(['images' => Gallery::paginate(5)]);
    }

    public function upload(GalleryRequest $request)
    {
        try {
            if (!$request->hasFile('photo')) {
                throw new Exception('Please insert an image first.');
            }
            $photos = $request->file('photo');
            $tag = $request->tag;
            $uploadedBy = Auth::user()->name;
            $baseDirectory = public_path('storage/gallery/'.$tag);

            // If not exist, create and set permisision
            File::makeDirectory($baseDirectory,0755,true,true);

            foreach ($photos as $photo) {

                $filename = time() . "_" . uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs('public/gallery/' . $tag, $filename);
                $imagePath = $baseDirectory. '/' .$filename;
                chmod($imagePath,0755);

                Gallery::create([
                    'imagePath' => 'gallery/' . $tag . '/' . $filename,
                    'tag' => $tag,
                    'uploadedBy'=> $uploadedBy
                ]);
            }

            return redirect()->back()->with('success', 'Upload Success');
        } catch (Exception $err) {
            Log::error($err->getMessage(), [
                'line' => $err->getLine(),
                'file' => $err->getFile()
            ]);
            return redirect()->back()->withErrors([
                'msg'=>$err->getMessage(),
            ]);
        }
    }

    public function deleteImage(int $id)
    {

        try {
            $image = Gallery::find($id);

            if ($image) {
                if (Storage::exists('public/' . $image->imagePath)) {
                    Storage::delete('public/' . $image->imagePath);
                }

                $image->delete();

                return redirect()->back()->with(['success' => "Image deleted successfully"]);
            } else {
                return redirect()->back()->with(['error' => "Image not found!"]);
            }
        } catch (Exception $err) {
            Log::error($err->getMessage(), [
                'line' => $err->getLine(),
                'file' => $err->getFile()
            ]);
        }
    }

    // ============ End Gallery Features ========================== //


    // ============ Application Features ========================== //
    public function application()
    {
        return view('admin.application')->with([
            'applicants' => Application::paginate(10)
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
        $this->deleteApplicantFiles($applicant_id);
        $applicant_id->delete();
        return redirect()->route('application')->with([
            'success' => "Delete Success"
        ]);;
    }

    protected function deleteApplicantFiles(Application $applicant){
        $folderPath = 'public/' . dirname($applicant->FileResume);

        if (Storage::exists($folderPath)) {
            // Delete the entire folder and its contents
            Storage::deleteDirectory($folderPath);
        }
    }

    // ============ End Application Features ========================== //


    // ============ Inquire Features ========================== //

    public function inquiry()
    {
        return view('admin.inquire')->with([
            'inquiries' => Inquire::paginate(10)
        ]);
    }
    public function show_details_inquire(Inquire $inquire_id)
    {
        return view('admin.ShowView.InquireDetails')->with([
            'data' => $inquire_id
        ]);
    }

    public function delete_inquiry_details(Inquire $inquire_id)
    {
        $this->deleteInquiryFiles($inquire_id);
        $inquire_id->delete();
        return redirect()->route('inquiry')->with([
            'success' => "Delete Success"
        ]);
    }

    protected function deleteInquiryFiles(Inquire $inquiry)
    {
        $folderPath = 'public/UploadedInquiryDocuments/' . str_replace(' ','',$inquiry->fullName) . '_' . date('F-d-Y');
        if (Storage::exists($folderPath)) {
            // Delete the directory and its contents
            Storage::deleteDirectory($folderPath);
        }
    }

    // ============ End Inquire Feature ========================== //


    // ============ Job Posts Features ========================== //
    public function addjob()
    {
        return view('admin.JobsView.AddJobView');
    }

    public function jobs()
    {
        return view('admin.job')->with([
            'Jobs' => JobTitle::paginate(10)
        ]);
    }

    public function saveJob(JobRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $job = new JobTitle;
            $job->postedBy = Auth::user()->name;

            if(request()->hasFile('job_image') && $validatedData['job_image'] !== null){
                $sanitizedJobPosition = $sanitizedJobPosition = str_replace('/', '_', $validatedData['job_position']);
                $image_name = 'photo' . '_' . $sanitizedJobPosition . "_" . date('F-d-Y').'.' . $validatedData['job_image']->getClientOriginalExtension();
                $image_path = $validatedData['job_image']->storeAs('public/JobPost/' . $image_name);

                // Set permission
                $image_full_path = storage_path('app/public/JobPost/'. $image_name);
                chmod($image_full_path,0755);

                $job->job_image = $image_path;
            }

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
        } catch (Exception $err) {
            Log::error($err->getMessage(), [
                'line' => $err->getLine(),
                'file' => $err->getFile()
            ]);
        }
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

    public function edit_job(JobTitle $job_id)
    {
        return view('admin.JobsView.EditJobDetails', compact('job_id'));
    }

    public function update_job(JobRequest $request, JobTitle $job_id)
    {
        try {
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

            if ($request->hasFile('upload_new_image')) {
                $oldImagePath = $job_id->job_image;

                if ($oldImagePath) {
                    // Delete the previous image file
                    if (Storage::exists('public/' . $oldImagePath)) {
                        Storage::delete('public/' . $oldImagePath);
                    }
                }
                $sanitizedJobPosition = str_replace('/', '_', $request->job_position);

                // Create a new folder if it doesn't exist
                $FolderName = 'JobPost/' . $sanitizedJobPosition . '_' . date('F-d-Y');
                $folderPath = storage_path('app/public/' . $FolderName);

                if (!File::exists($folderPath)) {
                    File::makeDirectory($folderPath, 0755, true, true);
                }
                // Upload and set permissions for the new image
                $image_name = 'photo' . '_' . $sanitizedJobPosition . "_" . date('F-d-Y') . '.' . $request->upload_new_image->getClientOriginalExtension();
                //dd($image_name );
                $newImagePath = $request->upload_new_image->storeAs($FolderName, $image_name, 'public');

                // Set the permission for the uploaded image
                $imageFullPath = storage_path('app/public/' . $FolderName . '/' . $image_name);
                chmod($imageFullPath, 0755);

                // Update the job record with the new image path
                $job_id->update(['job_image' => $newImagePath]);
            }

            return redirect()->back()->with('success', 'Job updated successfully');
        }catch(Exception $err){
            Log::error($err->getMessage(), [
                'line' => $err->getLine(),
                'file' => $err->getFile()
            ]);
        }
    }

    public function delete_job(JobTitle $job_id)
    {
        $this->deleteJobImage($job_id);
        $job_id->delete();
        return redirect()->route('jobs')->with([
            'success' => 'Successfully deleted.'
        ]);
    }

    protected function deleteJobImage(JobTitle $job_id)
    {
        $imagePath = $job_id->job_image;

        if($imagePath){
            if(Storage::exists('public/'. $imagePath)){
                Storage::delete('public/' . $imagePath);
            }
        }
    }

    // ============ End Job Posts Features ========================== //

}
