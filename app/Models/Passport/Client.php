<?php

namespace App\Models\Passport;

use Laravel\Passport\Client as BaseClient;

class Client extends BaseClient
{
    /**
     * Determine if the client should skip the authorization prompt.
     *
     * @return bool
     */
    public function skipsAuthorization(): bool
    {
        // В v11+ колонка confidential в таблице oauth_clients — это boolean
        // Используем прямой доступ к атрибуту через getRawOriginal или attribute
        return $this->getRawOriginal('confidential') === false;
        // Или просто:
        // return $this->attributes['confidential'] === false;
    }
}
