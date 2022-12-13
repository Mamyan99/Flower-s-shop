<?php

namespace App\Models\Order;

use App\Models\Helpers\Uuid;
use App\Models\Invoice\Invoice;
use App\Models\Product\Product;
use App\Services\Order\Dto\CreateOrderDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $costumer_uniq_key
 * @property string $total
 * @property string $status
 * @property string $first_name
 * @property string $last_name
 * @property string $country
 * @property string $region
 * @property string $city
 * @property string $street
 * @property string $apartment
 * @property string $phone
 */
class Order extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'id',
        'costumer_uniq_key',
        'status',
        'total',
        'first_name',
        'last_name',
        'country',
        'region',
        'city',
        'street',
        'apartment',
        'phone',
    ];

    public static function create(CreateOrderDto $dto): Order
    {
        $order = new static();

        $order->setCostumerUniqKey($dto->costumerUniqKey);
        $order->setFirstName($dto->firstName);
        $order->setLastName($dto->lastName);
        $order->setCountry($dto->country);
        $order->setRegion($dto->region);
        $order->setCity($dto->city);
        $order->setStreet($dto->street);
        $order->setApartment($dto->apartment);
        $order->setPhone($dto->phone);

        return $order;
    }

    public function setCostumerUniqKey(string $costumerUniqKey): void
    {
        $this->costumer_uniq_key = $costumerUniqKey;
    }

    public function setFirstName(string $firstName): void
    {
        $this->first_name = $firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this->last_name = $lastName;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    public function setRegion(string $region): void
    {
        $this->region = $region;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function setApartment(string $apartment): void
    {
        $this->apartment = $apartment;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function product(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'product_order',
            'order_id',
            'product_id'
        )->withPivot(['product_id', 'order_id']);
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
