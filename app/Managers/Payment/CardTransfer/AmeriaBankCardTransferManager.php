<?php

namespace App\Managers\Payment\CardTransfer;

use App\Managers\Payment\PaymentManagersInterface;
use Illuminate\Http\Request;

class AmeriaBankCardTransferManager implements PaymentManagersInterface
{
    public function createSubscription(string $subscriptionId): string
    {
        // TODO: Implement createSubscription() method.
    }

    public function handleWebhook(Request $request): bool
    {
        // TODO: Implement handleWebhook() method.
    }
}
