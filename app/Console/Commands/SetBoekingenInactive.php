<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Boeking;

class SetBoekingenInactive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set:boekingenInactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
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
