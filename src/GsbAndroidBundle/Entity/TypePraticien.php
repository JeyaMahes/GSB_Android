<?php

namespace GsbAndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypePraticien
 *
 * @ORM\Table(name="Type_Praticien")
 * @ORM\Entity(repositoryClass="GsbAndroidBundle\Repository\TypePraticienRepository")
 */
class TypePraticien implements \JsonSerializable
{
    /**
     * @var string
     *
     * @ORM\Column(name="type_code", type="string", length=6, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $typeCode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="type_libelle", type="string", length=50, nullable=true)
     */
    private $typeLibelle;

    /**
     * @var string
     *
     * @ORM\Column(name="type_lieu", type="string", length=70, nullable=true)
     */
    private $typeLieu;

    public function jsonSerialize() {}

}

