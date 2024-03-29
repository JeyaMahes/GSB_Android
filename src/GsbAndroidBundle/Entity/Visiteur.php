<?php

namespace GsbAndroidBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visiteur
 *
 * @ORM\Table(name="Visiteur")
 * @ORM\Entity(repositoryClass="GsbAndroidBundle\Repository\VisiteurRepository")
 */
class Visiteur implements \JsonSerializable
{
    /**
     * @var string
     *
     * @ORM\Column(name="vis_matricule", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $visMatricule = '';

    /**
     * @var string
     *
     * @ORM\Column(name="vis_nom", type="string", length=50, nullable=true)
     */
    private $visNom;

    /**
     * @var string
     *
     * @ORM\Column(name="vis_prenom", type="string", length=100, nullable=true)
     */
    private $visPrenom;

    /**
     * @var string
     *
     * @ORM\Column(name="vis_adresse", type="string", length=100, nullable=true)
     */
    private $visAdresse;

    /**
     * @var string
     *
     * @ORM\Column(name="vis_cp", type="string", length=10, nullable=true)
     */
    private $visCp;

    /**
     * @var string
     *
     * @ORM\Column(name="vis_ville", type="string", length=60, nullable=true)
     */
    private $visVille;

    /**
     * @var string
     *
     * @ORM\Column(name="vis_login", type="string", length=25, nullable=true)
     */
    private $visLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="vis_mdp", type="string", length=50, nullable=true)
     */
    private $visMdp;


    public function jsonSerialize() {
    
        return array('visMatricule' => $this-> visMatricule,'visNom' => $this->visNom,'visPrenom' => $this->visPrenom);
    }
}

