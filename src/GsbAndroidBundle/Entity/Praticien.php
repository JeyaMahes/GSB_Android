<?php

namespace GsbAndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Praticien
 *
 * @ORM\Table(name="Praticien", indexes={@ORM\Index(name="FK_Praticien_Type_Praticien", columns={"pra_typeCode"}), @ORM\Index(name="FK_Praticien_Visiteur", columns={"pra_visiteur"})})
 * @ORM\Entity(repositoryClass="GsbAndroidBundle\Repository\PraticienRepository")
 */
class Praticien implements \JsonSerializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pra_num", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $praNum;

    /**
     * @var string
     *
     * @ORM\Column(name="pra_nom", type="string", length=50, nullable=true)
     */
    private $praNom;

    /**
     * @var string
     *
     * @ORM\Column(name="pra_prenom", type="string", length=60, nullable=true)
     */
    private $praPrenom;

    /**
     * @var string
     *
     * @ORM\Column(name="pra_adresse", type="string", length=100, nullable=true)
     */
    private $praAdresse;

    /**
     * @var string
     *
     * @ORM\Column(name="pra_cp", type="string", length=10, nullable=true)
     */
    private $praCp;

    /**
     * @var string
     *
     * @ORM\Column(name="pra_ville", type="string", length=50, nullable=true)
     */
    private $praVille;

    /**
     * @var float
     *
     * @ORM\Column(name="pra_coefNotoriete", type="float", precision=10, scale=0, nullable=true)
     */
    private $praCoefnotoriete;

    /**
     * @var \TypePraticien
     *
     * @ORM\ManyToOne(targetEntity="TypePraticien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pra_typeCode", referencedColumnName="type_code")
     * })
     */
    private $praTypecode;

    /**
     * @var \Visiteur
     *
     * @ORM\ManyToOne(targetEntity="Visiteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pra_visiteur", referencedColumnName="vis_matricule")
     * })
     */
    private $praVisiteur;

     public function jsonSerialize() {
          return array('id' => $this->praNum,'Nom Praticien' => $this-> praNom,'Prenom Praticien' => $this->praPrenom);
     }

}

