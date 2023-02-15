<?php

namespace App\Http\Livewire;

use App\Models\Courses;
use Livewire\Component;
use Livewire\WithFileUploads;

class Course extends Component
{
    use WithFileUploads;

    public $user;
    public $name;
    public $description;
    public $images;
    public $category;
    public $categoryCourse;
    public $priority_date;
    public $success = 'none';

    public function mount($user,$category)
    {
        $this->user = $user;
        $this->category = $category;
    }

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:8048',
        'categoryCourse' => 'required',
        'priority_date' => 'required'
    ];


    public function uploadeCourse()
    {
        $this->validate();
        $image = $this->images;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        // $path = $image->storePublicly($imageName, 's3');
        $path = $image->storeAS('images',$imageName ,'s3',[
            'visibility' => 'public',
        ]);

        $course = Courses::create([
            'descrption' => $this->description,
            'name' => $this->name,
            'user_id' =>$this->user->id,
            'category_id' => $this->categoryCourse,
            'image' => $path
        ]);

        if($course)
        {
            return $this->success = 'block';
        }

        // dd($ok); ===> images/1676314432.jpg

    }























    public function render()
    {
        return view('livewire.course');
    }

}

