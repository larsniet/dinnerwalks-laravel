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
        'faqs.*.question' => 'required',
        'faqs.*.answer' => 'required'
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
