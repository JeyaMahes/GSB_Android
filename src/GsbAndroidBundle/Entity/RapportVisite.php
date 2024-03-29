<?php

namespace GsbAndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RapportVisite
 *
 * @ORM\Table(name="Rapport_Visite", indexes={@ORM\Index(name="FK_RV_Praticien", columns={"pra_num"}), @ORM\Index(name="IDX_1B1F3C9F7BFA9247", columns={"vis_matricule"})})
 * @ORM\Entity(repositoryClass="GsbAndroidBundle\Repository\RapportVisiteRepository")
 */
class RapportVisite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rap_num", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $rapNum = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="rap_bilan", type="string", length=510, nullable=true)
     */
    private $rapBilan = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rap_dateVisite", type="date", nullable=true)
     */
    private $rapDatevisite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rap_dateRapport", type="date", nullable=true)
     */
    private $rapDaterapport;

    /**
     * @var \Praticien
     *
     * @ORM\ManyToOne(targetEntity="Praticien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pra_num", referencedColumnName="pra_num")
     * })
     */
    private $praNum;

    /**
     * @var \Visiteur
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Visiteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vis_matricule", referencedColumnName="vis_matricule")
     * })
     */
    private $visMatricule;


    public function jsonSerialize() {
    }
}

