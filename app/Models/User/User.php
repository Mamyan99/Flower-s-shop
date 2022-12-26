<?php

namespace App\Models\User;

use App\Models\Helpers\Uuid;
use App\Services\User\Dto\CreateUserDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property string $username
 * @property string|null $display_name
 * @property string $password
 */
class User extends Authenticatable implements HasMedia
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use Uuid;
    use InteractsWithMedia;

    protected $fillable = [
        'display_name',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function findForPassport($username)
    {
        return $this->where('username', $username)->first();
    }

    public static function staticCreate(CreateUserDto $dto): User
    {
        $user = new static();

        $user->setUserId();
        $user->setDisplayName($dto->displayName);
        $user->setUsername($dto->username);
        $user->setPassword($dto->password);

        return $user;
    }

    public function setUserId(): string
    {
        return Uuid::generate();
    }

    public function setDisplayName(string|null $displayName): void
    {
        $this->display_name = $displayName;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function setPassword(string $password): void
    {
        $this->password = bcrypt($password);
    }
}
