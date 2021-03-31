<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Contact;

class ConfirmDelete extends Component
{
    public $boeking;

    /**
     * Render the confirm-alert button
     * @return view
     * @author Rashid Ali <realrashid05@gmail.com>
     */
    public function render()
    {
        return view('livewire.confirm-delete');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($boeking)
    {
        Boeking::find($boeking)->delete();
    }
}
