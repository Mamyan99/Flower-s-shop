<?php

namespace App\Factories\Payment;

use App\Managers\Payment\CardTransfer\AmeriaBankCardTransferManager;
use App\Managers\Payment\PaymentManagersInterface;
use http\Exception\InvalidArgumentException;

class PaymentManagerFactory
{
    const CARD_TRANSFER = 'card_transfer';

    public function getPaymentManager(string $manager): PaymentManagersInterface
    {
        return match ($manager) {
            self::CARD_TRANSFER => resolve(AmeriaBankCardTransferManager::class),
            default => throw new InvalidArgumentException(),
        };
    }
}
