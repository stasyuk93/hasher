<?php

namespace App\Services\Hasher;

use Illuminate\Support\Facades\Facade;

/**
 * Class HasherFacade
 * @package App\Services\Hasher
 * @method generateHash(string $string, string $algorithm):string
 * @method getHashAlgorithmList():array
 */
class HasherFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'hasher';
    }
}