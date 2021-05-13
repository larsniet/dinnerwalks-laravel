<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Boeking;

class SetBoekingenInactive implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->boeking = $boeking;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Haal alle boekingen op van afgelopen 2 dagen
        $boekingen = Boeking::whereBetween('datum', 
            [
                date('Y-m-d', strtotime("-2 days")),
                date('Y-m-d')
            ])->get();

        foreach ($boekingen as $boeking) {
            $boeking->status = "Verlopen";
            $boeking->save();
        }
    }
}
