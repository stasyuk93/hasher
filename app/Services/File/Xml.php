<?php

namespace App\Services\File;


class Xml extends FileManager
{
    /**
     * @var \XMLWriter
     */
    protected $xmlWriter;

    public function __construct($path, $name, $encoding = 'UTF-8')
    {
        parent::__construct($path, $name, 'xml');
        $this->xmlWriter = new \XMLWriter();
        $this->xmlWriter->openMemory();
        $this->xmlWriter->startDocument('1.0', $encoding);
    }

    /**
     * @return \XMLWriter
     */
    public function getXmlWriter()
    {
        return $this->xmlWriter;
    }

    /**
     * @param string $name
     * @param string $value
     * @return Xml
     */
    public function setAttr(string $name, string $value): self
    {
        $this->xmlWriter->startAttribute($name);
        $this->xmlWriter->text($value);
        $this->xmlWriter->endAttribute();
        return $this;
    }

//    public function startElement($element)
//    {
//        return $this->xmlWriter->startElement($element);
//    }
//
//    public function endElement()
//    {
//        return $this->xmlWriter->endElement();
//    }
//
//    public function writeElement($element, $data)
//    {
//        return $this->xmlWriter->writeElement($element, $data);
//    }
}