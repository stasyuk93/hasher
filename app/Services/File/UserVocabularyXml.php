<?php

namespace App\Services\File;

use App\User;

class UserVocabularyXml
{
    /**
     * @var Xml
     */
    protected $xml;

    public function __construct()
    {
        $this->xml = new Xml('public','users');
    }

    public function generate()
    {
        $users = User::with('hashwords','hashwords.word', 'hashwords.hash')->get();

        foreach ($users as $user) {
            $this->xml->getXmlWriter()->startElement('users');
                $this->xml->getXmlWriter()->startElement('user');
                    $this->xml->getXmlWriter()->startElement('info');
                        $this->xml->getXmlWriter()->writeElement('email', $user->email);
                    $this->xml->getXmlWriter()->endElement();

                    $this->xml->getXmlWriter()->startElement('vocabulary');

                    foreach ($user->hashwords as $hashword) {
                        $this->xml->getXmlWriter()->startElement('word');
                            $this->xml
                                ->setAttr('value',$hashword->word->word)
                                ->setAttr('hash', $hashword->hash)
                                ->setAttr('algorithm', $hashword->getRelation('hash')->name);
                        $this->xml->getXmlWriter()->endElement();
                    }

                    $this->xml->getXmlWriter()->endElement();
                $this->xml->getXmlWriter()->endElement();
            $this->xml->getXmlWriter()->endElement();
        }
        $this->xml->setContent($this->xml->getXmlWriter()->flush(true));
        $this->xml->save();
    }
}