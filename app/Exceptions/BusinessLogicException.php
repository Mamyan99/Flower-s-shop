<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

abstract class BusinessLogicException extends Exception
{
    const SAVING_ERROR = 600;
    const USER_NOT_FOUND = 602;
    const DELETE_ERROR = 603;
    const CATEGORY_DOES_NOT_EXIST = 604;
    const OPTION_DOES_NOT_EXIST = 605;
    const PRODUCT_DOES_NOT_EXIST = 606;
    const IS_NOT_ADMIN = 607;
    const RATE_DOES_NOT_EXIST = 608;
    const SHOP_CART_DOES_NOT_EXIST = 609;
    const IS_NOT_ENOUGH_PRODUCTS_COUNT = 610;
    const Order_DOES_NOT_EXIST = 611;

    private int $httpStatusCode = Response::HTTP_BAD_REQUEST;

    abstract public function getStatus(): int;
    abstract public function getStatusMessage(): string;

    public function getHttpStatusCode(): int
    {
        return $this->httpStatusCode;
    }
}
