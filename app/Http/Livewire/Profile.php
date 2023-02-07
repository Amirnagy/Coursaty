<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Profile extends Component
{

    use WithFileUploads;

    public $newPhoto;
    public $oldPhoto;
    public $photosucess = 'none';
    public $user,$name ,$email, $old_pass , $active ='none' ;
    public $error ='none';
    public $password;
    public $password_confirmation;
    // any event??? equel to any function ????
    protected $listeners = [
        'updateprofile'=>'updateprofile'
    ];

    // protected $rules = [
    //     'name' => 'required',
    //     'email' => 'required|email'
    // ];

    public function mount($user)
    {
        $this->user = $user;
    }

    public function updateprofile()
    {
        $user = Auth::user();
        if($this->name == '')
        {
            $this->name = $user->name;
        }
        if ($this->email == '')
        {
            $this->email = $user->email;
        }
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();

        if($this->old_pass)
        {
            $this->resetPasswordView();
        }

        if($this->password)
        {
            $this->NewPassword();
        }

        if($this->newPhoto)
        {
            $this->save();
        }
        // $user->update($this->all());

        // another way for update
        // ==========================

    }

    public function resetPasswordView()
    {
        if(Hash::check($this->old_pass,Auth::user()->password)){
            $this->error = 'none';
            return $this->active = 'block';
        }
        $this->error = 'block';
        $this->active = 'none';
    }

    public function NewPassword()
    {
        $this->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        if($this->password == $this->password_confirmation)
        {
            $user = Auth::user();
            $user->password = Hash::make($this->password);
            $user->save();
        }
    }


    public function save()
    {

        $this->validate([
            'newPhoto' => 'image',
        ]);


        if ($this->newPhoto) {

            // delete the photo path from public based on databases if it have value ...
            if($this->user->profile_photo_path){
                Storage::disk('avatar')->delete($this->user->profile_photo_path);
            }


        $path = $this->newPhoto->store('', ['disk' => 'avatar']);
        $this->user->profile_photo_path = $path;
        $this->user->save();
        return $this->photosucess = 'block';
    }
    }

    public function render()
    {
        return view('livewire.profile', [
        'user' => $this->user
        ]);
    }
}
