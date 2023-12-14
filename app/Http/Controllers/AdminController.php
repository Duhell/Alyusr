<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Gallery;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\GalleryRequest;
use App\Models\Application;
use App\Models\Inquire;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function loginView(){return view('admin.login');}

    public function login(LoginRequest $req){
        $credentials = $req->validated();

        if(Auth::attempt($credentials)){
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'error'=>"Wrong email or password"
        ]);
    }
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function gallery(){
        return view('admin.gallery')->with(['images'=>Gallery::all()]);
    }

    public function application(){
        return view('admin.application')->with([
            'applicants' => Application::all()
        ]);
    }

    public function show_details_applicant(int $applicant_id){
        return view('admin.ShowView.ApplicantDetails')->with([
            'data'=>Application::find($applicant_id)->first()
        ]);
    }
    public function show_details_inquire(int $inquire_id){
        return view('admin.ShowView.InquireDetails')->with([
            'data'=>Inquire::find($inquire_id)->first()
        ]);
    }
    public function inquiry(){
        return view('admin.inquire')->with([
            'inquiries' => Inquire::all()
        ]);
    }

    public function upload(GalleryRequest $request){
        try{

            if (!$request->hasFile('photo')) {
                throw new Exception('No file uploaded.');
            }

            $photo = $request->file('photo');
            $filename = time()."_". uniqid().'.'.$photo->getClientOriginalExtension();
            $photo->storeAs('public/gallery',$filename);

            Gallery::create([
                'imagePath'=>'gallery/'. $filename,
                'tag'=>$request->tag
            ]);

            return redirect()->back()->with('success','Upload Success');
        }catch(Exception $e){
            return redirect()->back()->withErrors([
                'upload_error'=>$e->getMessage()
            ]);
        }

    }

    public function deleteImage(int $id){

        try{
            $image = Gallery::find($id);

            if($image){
                Storage::delete($image->imagePath);
                $image->delete();

                return redirect()->back()->with(['success'=>"Image deleted successfully"]);
            }else{
                return redirect()->back()->with(['error'=>"Image not found!"]);
            }
        }catch(Exception $err){
            return redirect()->back()->withErrors(['error'=>$err->getMessage()]);

        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
