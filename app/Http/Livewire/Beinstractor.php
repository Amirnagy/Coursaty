<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\infoInstractors;

class Beinstractor extends Component
{

    public $user;
    public $occupation;
    public $education;
    public $certifications;
    public $experience;
    public $skills;
    public $success = 'none';

    public function mount($user)
    {
        $this->user = $user;
    }

    protected $rules = [
        'occupation' => 'required',
        'education' => 'required',
        'certifications' => 'required',
        'experience' => 'required',
        'skills' => 'required'

    ];
    public function render()
    {
        return view('livewire.beinstractor',
        ['user' => $this->user]);
    }


    public function beInstractor()
    {
        $this->validate();
        // dd($this->user);
        $this->user->roles = 1;
        $infoInstractor = $this->user->infoInstractor ?: new infoInstractors;
        // dd($infoInstractor);


        /**
        * $infoInstractor = $this->user->InfoInstractor()->firstOrCreate([
        *'user_id' => $this->user->id
        *]);
        */
        $infoInstractor->user_id = $this->user->id;
        $infoInstractor->occupation = $this->occupation;
        $infoInstractor->education = $this->education;
        $infoInstractor->certifications = $this->certifications;
        $infoInstractor->experience = $this->experience;
        $infoInstractor->skills = $this->skills;

        if($infoInstractor->save() && $this->user->save())
        {
            return $this->success = 'block';
        }
    }
}
