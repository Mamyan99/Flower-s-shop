<?php

namespace App\Managers\Payment;

use Illuminate\Http\Request;

interface PaymentManagersInterface
{
    public function createSubscription(string $subscriptionId): string;
    public function handleWebhook(Request $request): bool;
}
