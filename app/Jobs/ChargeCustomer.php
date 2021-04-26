<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\WebhookClient\Models\WebhookCall;
use Illuminate\Support\Facades\Log;
use App\Mail\sendBoekingDetails;
use App\Models\Boeking;
use App\Models\Walk;
use Mail;


class ChargeCustomer implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /** @var \Spatie\WebhookClient\Models\WebhookCall */
    public $webhookCall;

    public function __construct(WebhookCall $webhookCall)
    {
        $this->webhookCall = $webhookCall;
    }

    public function handle()
    {
        // Get boeking en status van payment
        $boeking = Boeking::where('id', $this->webhookCall->payload['data']['object']['client_reference_id'])->first();
        $payment_status = $this->webhookCall->payload['data']['object']['payment_status'];

        if ($payment_status === "paid") {

            // Payment success
            $boeking->status = "Betaald";
            $boeking->save();

            $walk = Walk::where('id', $boeking->walk_id)->first();
            $walk->omzet += $boeking->prijs_boeking;
            $walk->aantal_geboekt = $walk->aantal_geboekt + 1;
            $walk->save();

            $url = "http://localhost:3000/walks/$walk->locatie?code=$boeking->unieke_code";

            Mail::to($boeking->customer->email)->send(new sendBoekingDetails($boeking->customer->naam, $boeking->customer->email, $boeking->datum, $boeking->kortingscode, $boeking->personen, $boeking->prijs, $url));

        } else {
            
            // Payment failed
            $boeking->status = "Afgebroken";
            $boeking->save();

        }
    }
}
