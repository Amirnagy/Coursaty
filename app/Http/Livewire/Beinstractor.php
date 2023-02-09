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
        $infoInstractor = $this->user->InfoInstractor()->first();
        if (!$infoInstractor) {
            $infoInstractor = new infoInstractors;
            $infoInstractor->user_id = $this->user->id;
        }
        // dd($infoInstractor);
        $infoInstractor->user_id = $this->user->id;
        $infoInstractor->occupation = $this->occupation;
        $infoInstractor->education = $this->education;
        $infoInstractor->certifications = $this->certifications;
        $infoInstractor->experience = $this->experience;
        $infoInstractor->skills = $this->skills;
        $infoInstractor->save();
    }
}
