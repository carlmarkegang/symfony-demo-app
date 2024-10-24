<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManagerInterface;

class WebpageTextRepository extends EntityRepository
{
    public function findAll()
    {
        return $this->findBy(array(), array('name' => 'ASC'));
        //return $this->findAll();
    }

    public function findByName($name)
    {
        return $this->findBy(array('name' => $name), array('name' => 'ASC'));
        //return $this->findAll();
    }

    public function saveWebpageText($WebpageText, $name, $text)
    {
        $WebpageText->setName($name);
        $WebpageText->setText($text);
        $this->_em->persist($WebpageText);
        $this->_em->flush();
    }

    public function updateWebpageText($WebpageText, $name, $text)
    {
        $WebpageText->setName($name);
        $WebpageText->setText($text);
        $this->_em->persist($WebpageText);
        $this->_em->flush();
    }


    
}