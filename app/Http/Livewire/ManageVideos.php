<?php

namespace App\Http\Livewire;

use App\Models\Courses;
use Livewire\Component;
use App\Models\Categorys;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ManageVideos extends Component
{
    use WithFileUploads;
    public $updatecourses = false;
    public $name ;
    public $idcourse ;
    public $descrption ;
    public $categoryCourse ;
    public $images;
    public $priority_date;
    public $success ='none';


    protected $rules = [
        'name' => 'required',
        'descrption' => 'required',
        'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:8048',
        'categoryCourse' => 'required',
        'priority_date' => 'required'
    ];


    public function updateCourse($id)
    {
        $course = Courses::find($id);
        $this->idcourse = $course->id;
        $this->name = $course->name;
        $this->descrption = $course->descrption ;
        $images =$course->image;
        $this->images = Storage::disk('s3')->get($images);
        // dd($this->images);
        $this->updatecourses = true;
    }


    public function deleteCourse($id)
    {
            Courses::find($id)->delete();
    }

    public function uploadeCourse($id)
    {
        $this->validate();
        $image = $this->images;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $path = $image->storeAS('images',$imageName ,'s3');


        $course = Courses::find($id);
        $course->descrption = $this->descrption;
        $course->name = $this->name;
        $course->category_id = $this->categoryCourse;
        $course->image = $path;
        if($course->update())
        {
            $this->success = 'block';
            return $this-> updatecourses = false;
        }
    }



    public function render()
    {
        // dd($this);
        $user = Auth::user();
        // $courses = Courses::all();
        $courses = $user->courses;
        $category = Categorys::all();
        return view('livewire.manage-videos',compact('courses','user','category'));
    }



}
