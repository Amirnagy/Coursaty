<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Beinstractor extends Component
{

    public $user;
    public $occupation;
    public $education;
    public $certifications;
    public $experience;
    public $skills;

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
        $infoInstractor = $this->user->InfoInstractor();
        $infoInstractor->occupation = '$this->occupation';
        $infoInstractor->education = $this->education;
        $infoInstractor->certifications = $this->certifications;
        $infoInstractor->experience = $this->experience;
        $infoInstractor->skills = $this->skills;
        $infoInstractor->save();
    }
}
