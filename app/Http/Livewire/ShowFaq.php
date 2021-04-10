<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Faq;
use Redirect;

class ShowFaq extends Component
{
    public $vraag; 
    public $antwoord;

    protected $rules = [
        'vraag' => 'required',
        'antwoord' => 'required'
    ];

    public function remove(Faq $faq)
    {
        $faq->delete();
    }

    public function render()
    {
        return view('livewire.show-faq', [
            'faqs' => Faq::all()
        ]);
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


    public function updateFaq(Faq $faq) 
    {
        $this->validate();

        $faq->vraag = $this->vraag;
        $faq->antwoord = $this->antwoord;
        $faq->save();

        $this->emit('saved');
        return Redirect::back();
    }
}
