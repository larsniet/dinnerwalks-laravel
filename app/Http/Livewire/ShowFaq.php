<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Faq;
use Redirect;

class ShowFaq extends Component
{
    public $editedFaqIndex = null;
    public $faqs = [];

    protected $rules = [
        'faqs.*.vraag' => 'required',
        'faqs.*.antwoord' => 'required'
    ];

    public function render()
    {
        $this->faqs = Faq::all()->toArray();
        return view('livewire.show-faq', [
            'faqs' => $this->faqs
        ]);
    }

    public function removeFaq($faqIndex)
    {
        $faq = $this->faqs[$faqIndex] ?? NULL;
        if (!is_null($faq)) {
            $editedFaq = Faq::find($faq['id']);
            if ($editedFaq) {
                $editedFaq->delete($faq);
            }
        }
        $this->editedFaqIndex = null;
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


    public function editFaq($faqIndex) 
    {
        $this->editedFaqIndex = $faqIndex;
    }

    public function saveFaq($faqIndex) 
    {
        $this->validate();
        $faq = $this->faqs[$faqIndex] ?? NULL;
        if (!is_null($faq)) {
            $editedFaq = Faq::find($faq['id']);
            if ($editedFaq) {
                $editedFaq->update($faq);
            }
        }
        $this->editedFaqIndex = null;
    }
}
