<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kortingscode;
use Redirect;

class ShowCodes extends Component
{
    public $kortingscode;

    protected $rules = [
        'kortingscode' => 'required',
    ];

    public function remove(Kortingscode $kortingscode)
    {
        $kortingscode->delete();
    }

    public function render()
    {
        return view('livewire.show-codes', [
            'kortingscodes' => Kortingscode::where('id', '!=', null)->orderBy("code")->paginate(30)
        ]);
    }

    public function addCode() 
    {
        $this->validate();

        Kortingscode::create([
            'code' => $this->kortingscode,
        ]);

        $this->emit('saved');
        return Redirect::back();
    }
}
