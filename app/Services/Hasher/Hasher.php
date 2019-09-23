<?php

namespace App\Services\Hasher;


class Hasher implements Hash
{
    /**
     * @var string
     */
    protected $string;

    /**
     * @var string
     */
    protected $algorithm;

    /**
     * @var string
     */
    protected $hash;


    /**
     * @param string $string
     * @return Hasher
     */
    public function setString(string $string): self
    {
        $this->string = $string;
        return $this;
    }

    /**
     * @param string $algorithm
     * @return Hasher
     */
    public function setAlgorithm(string $algorithm): self
    {
        $this->algorithm = $algorithm;
        return $this;

    }

    /**
     * @param string $hash
     * @return Hasher
     */
    public function setHash(string $hash): self
    {
        $this->hash = $hash;
        return $this;
    }



    /**
     * @return string
     */
    public function getString(): string
    {
        return $this->string;
    }

    /**
     * @return string
     */
    public function getAlgorithm(): string
    {
        return $this->algorithm;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }


    /**
     * @param string $string
     * @param string $algorithm
     * @return string
     * @throws \Exception
     */
    public function generateHash(string $string, string $algorithm):string
    {
        $obj = new self($string, $algorithm);
        if($obj->isAlgorithm($algorithm)){
            return $obj->setString($string)->setAlgorithm($algorithm)->generate()->getHash();
        } else {
            throw new \Exception("The algorithm: $algorithm is not supported");
        }
    }

    /**
     * @return Hasher
     * @throws \Exception
     */
    protected function generate(): self
    {
        if(empty($this->string) || empty($this->algorithm)) {
            throw new \Exception("Hasher::string || Hasher::algorithm is empty");
        }
        $this->hash = hash($this->algorithm, $this->string);

        return $this;
    }

    /**
     * @return array
     */
    public function getHashAlgorithmList(): array
    {
        return hash_algos();
    }

    /**
     * @param string $name
     * @return bool
     */
    public function isAlgorithm(string $name): bool
    {
        return in_array($name, $this->getHashAlgorithmList());
    }


}