<?php

namespace App\Http\Livewire;

use App\Models\Videos;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManageVideos extends Component
{
    use WithFileUploads;

    public $idCourse;

    public $videosOfCourse;




    public $video;
    public $descrption;

    public $showAdd = false;
    public $showUpdate   = false;

    protected $rules = [
        'video' => 'required|mimetypes:video/mp4,video/quicktime,video/x-msvideo',
        'descrption' => 'required'
    ];



    public function resetFields(){
        $this->video = '';
        $this->descrption = '';
    }

    public function cancelVideo()
    {
        $this->showAdd = false;
        $this->showUpdate = false;
        $this->resetFields();
    }

    public function addVideo()
    {
        $this->resetFields();
        $this->showAdd = true;
        $this->showUpdate = false;
    }


    public function storeVideo()
    {
        $this->validate();
        $video = $this->video;
        $videoName = time().'.'.$video->getClientOriginalExtension();

        $videoPath = $video->storeAS('videos',$videoName,'s3',[
            'visibility' => 'public',
        ]);
        Videos::create([
            'course_id' => $this->idCourse,
            'video' => $videoPath,
            'descrption' => $this->descrption,
        ]);
        $this->resetFields();
        $this->showAdd = false;
    }

    public function deleteVideo($id)
    {

    }

    public function editVideo($id){

    }

    public function updateVideo()
    {
        $this->validate();

    }


    public function videos()
    {
        $videos = Videos::select('video','descrption')->where('course_id','=', $this->idCourse)->get();
        return $this->videosOfCourse = $videos;
    }


    public function render()
    {
        $this->videos();
        return view('livewire.manage-videos');
    }
}
