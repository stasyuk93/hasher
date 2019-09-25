<?php

namespace App\Services\File;
use Illuminate\Support\Facades\Storage;

abstract class FileManager implements File
{
    /**
     * @var string
     */
    protected $path;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $format;

    protected $content;

    /**
     * FileManager constructor.
     * @param $path
     * @param $name
     * @param $format
     */
    public function __construct($path, $name, $format)
    {
        $this->path = $path;
        $this->name = $name;
        $this->format = $format;
    }

    public function getFullPath()
    {
        return $this->path.'/'.$this->name.'.'.$this->format;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return FileManager
     */
    public function setPath(string $path): self
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return FileManager
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;

    }

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @param string $format
     * @return FileManager
     */
    public function setFormat(string $format): self
    {
        $this->format = $format;
        return $this;

    }

    /**
     * @return mixed
     */
    public function append($data)
    {
        Storage::append($this->getFullPath(), $data);
        return $this;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }



    public function save()
    {
        Storage::put($this->getFullPath(), $this->content);
    }

}