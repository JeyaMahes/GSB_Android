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
    private $praNum = '0';

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



    /**
     * Get praNum
     *
     * @return integer
     */
    public function getPraNum()
    {
        return $this->praNum;
    }

    /**
     * Set praNom
     *
     * @param string $praNom
     *
     * @return Praticien
     */
    public function setPraNom($praNom)
    {
        $this->praNom = $praNom;

        return $this;
    }

    /**
     * Get praNom
     *
     * @return string
     */
    public function getPraNom()
    {
        return $this->praNom;
    }

    /**
     * Set praPrenom
     *
     * @param string $praPrenom
     *
     * @return Praticien
     */
    public function setPraPrenom($praPrenom)
    {
        $this->praPrenom = $praPrenom;

        return $this;
    }

    /**
     * Get praPrenom
     *
     * @return string
     */
    public function getPraPrenom()
    {
        return $this->praPrenom;
    }

    /**
     * Set praAdresse
     *
     * @param string $praAdresse
     *
     * @return Praticien
     */
    public function setPraAdresse($praAdresse)
    {
        $this->praAdresse = $praAdresse;

        return $this;
    }

    /**
     * Get praAdresse
     *
     * @return string
     */
    public function getPraAdresse()
    {
        return $this->praAdresse;
    }

    /**
     * Set praCp
     *
     * @param string $praCp
     *
     * @return Praticien
     */
    public function setPraCp($praCp)
    {
        $this->praCp = $praCp;

        return $this;
    }

    /**
     * Get praCp
     *
     * @return string
     */
    public function getPraCp()
    {
        return $this->praCp;
    }

    /**
     * Set praVille
     *
     * @param string $praVille
     *
     * @return Praticien
     */
    public function setPraVille($praVille)
    {
        $this->praVille = $praVille;

        return $this;
    }

    /**
     * Get praVille
     *
     * @return string
     */
    public function getPraVille()
    {
        return $this->praVille;
    }

    /**
     * Set praCoefnotoriete
     *
     * @param float $praCoefnotoriete
     *
     * @return Praticien
     */
    public function setPraCoefnotoriete($praCoefnotoriete)
    {
        $this->praCoefnotoriete = $praCoefnotoriete;

        return $this;
    }

    /**
     * Get praCoefnotoriete
     *
     * @return float
     */
    public function getPraCoefnotoriete()
    {
        return $this->praCoefnotoriete;
    }

    /**
     * Set praTypecode
     *
     * @param \GsbAndroidBundle\Entity\TypePraticien $praTypecode
     *
     * @return Praticien
     */
    public function setPraTypecode(\GsbAndroidBundle\Entity\TypePraticien $praTypecode = null)
    {
        $this->praTypecode = $praTypecode;

        return $this;
    }

    /**
     * Get praTypecode
     *
     * @return \GsbAndroidBundle\Entity\TypePraticien
     */
    public function getPraTypecode()
    {
        return $this->praTypecode;
    }

    /**
     * Set praVisiteur
     *
     * @param \GsbAndroidBundle\Entity\Visiteur $praVisiteur
     *
     * @return Praticien
     */
    public function setPraVisiteur(\GsbAndroidBundle\Entity\Visiteur $praVisiteur = null)
    {
        $this->praVisiteur = $praVisiteur;

        return $this;
    }

    /**
     * Get praVisiteur
     *
     * @return \GsbAndroidBundle\Entity\Visiteur
     */
    public function getPraVisiteur()
    {
        return $this->praVisiteur;
    }
     public function jsonSerialize() {
          return array('id' => $this->praNum,'Nom Praticien' => $this-> praNom,'Prenom Praticien' => $this->praPrenom);
     }
}
