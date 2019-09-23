<?php

namespace App\Services\Hasher;


interface Hash
{
    public function generateHash(string $string, string $algorithm):string;

    public function getHashAlgorithmList():array;

    public function isAlgorithm(string $name):bool;
}