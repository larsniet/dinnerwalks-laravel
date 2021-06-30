<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DiscountCode;
use Redirect;

class ShowCodes extends Component
{
    public $discountCode;

    protected $rules = [
        'discountCode' => 'required',
    ];

    public function remove(DiscountCode $discountCode)
    {
        $discountCode->delete();
    }

    public function render()
    {
        return view('livewire.show-codes', [
            'discountCodes' => DiscountCode::where('id', '!=', null)->orderBy("code")->paginate(30)
        ]);
    }

    public function addCode() 
    {
        $this->validate();

        DiscountCode::create([
            'code' => $this->discountCode,
        ]);

        $this->emit('saved');
        return Redirect::back();
    }
}
