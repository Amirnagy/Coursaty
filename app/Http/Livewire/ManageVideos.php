<?php

namespace App\Http\Livewire;

use App\Models\Videos;
use App\Models\Courses;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ManageVideos extends Component
{
    use WithFileUploads;

    public $idCourse;
    public $videoID;
    public $videosOfCourse;
    public $oldVideoPath;
    public $video;
    public $descrption;


    protected $rules = [
        'video' => 'required|mimetypes:video/mp4,video/quicktime,video/x-msvideo',
        'descrption' => 'required'
    ];


    public function resetFields(){
        $this->video = '';
        $this->descrption = '';
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
    }

    public function deleteVideo($id)
    {
        $video = Videos::find($id);
        try{
            Storage::disk('s3')->delete($video->video);
            $video->delete();
        }catch(\Exception $ex){
            session()->flash('error','Something goes wrong!!');
        };
        // try{
        //     session()->flash('success',"Post Deleted Successfully!!");
        // }catch(\Exception $e){
        //     session()->flash('error',"Something goes wrong!!");
        // }
    }

    public function editVideo($id)
    {
        try {
            $video = Videos::findOrFail($id);
            if( !$video) {
                session()->flash('error','video not found');
            } else {
                $this->videoID = $video->id;
                $this->descrption = $video->descrption;
                $this->video = "https://courasty.s3.us-west-1.amazonaws.com/$video->video";

                $this->oldVideoPath = $this->video;

            }
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }

    public function updateVideo()
    {
        $this->validate();
        try{
            Storage::disk('s3')->delete($this->oldVideoPath);
        }catch(\Exception $ex){
            session()->flash('error','Something goes wrong!!');
        };

        $video = $this->video;
        $videoName = time().'.'.$video->getClientOriginalExtension();
        $videoPath = $video->storeAS('videos',$videoName,'s3',[
            'visibility' => 'public',
        ]);

        $videoRecord = Videos::find($this->videoID);
        $videoRecord->video = $videoPath;
        $videoRecord->descrption = $this->descrption;
        $videoRecord->save();
        $this->resetFields();
    }


    public function videos()
    {
        $videos = Videos::select('id','video','descrption')->where('course_id','=', $this->idCourse)->get();
        return $this->videosOfCourse = $videos;
    }


    public function render()
    {
        $this->videos();
        return view('livewire.manage-videos');
    }
}
