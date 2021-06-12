<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Faq;
use Redirect;

class AddFaq extends Component
{
    public $vraag; 
    public $antwoord;

    protected $rules = [
        'vraag' => 'required',
        'antwoord' => 'required'
    ];

    public function render()
    {
        return view('livewire.add-faq');
    }

    public function addFaq() 
    {
        $this->validate();

        Faq::create([
            'vraag' => $this->vraag,
            'antwoord' => $this->antwoord
        ]);

        $this->emit('saved');
        return Redirect::back();
    }
}
