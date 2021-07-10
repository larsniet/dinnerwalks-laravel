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
use App\Models\Booking;
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
        $booking = Booking::where('id', $this->webhookCall->payload['data']['object']['client_reference_id'])->first();
        $payment_status = $this->webhookCall->payload['data']['object']['payment_status'];

        if ($payment_status === "paid") {

            // Payment success
            $booking->status = "Betaald";
            $booking->save();

            $walk = Walk::where('id', $booking->walk_id)->first();
            $walk->revenue += $booking->price;
            $walk->amount_booked = $walk->amount_booked + 1;
            $walk->save();

            $locationName = $walk->location->name;
            $url = env("FRONTEND_APP_URL", "https://beta.dinnerwalks.nl")."/walks/$locationName?code=$booking->unique_code";
            
            Mail::to($booking->customer->email)->send(new sendBoekingDetails($booking->customer->name, $booking->customer->email, $booking->date, $booking->discount_code, $booking->amount_persons, $booking->price, $url, $walk->location->name));

        } else {
            
            // Payment failed
            $booking->status = "Afgebroken";
            $booking->save();

        }
    }
}
