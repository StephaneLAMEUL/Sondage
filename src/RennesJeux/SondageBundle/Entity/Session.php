<?php

namespace RennesJeux\SondageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use RennesJeux\SondageBundle\Entity\Jeux;
use RennesJeux\SondageBundle\Entity\User;

/**
 * Session
 *
 * @ORM\Table(name="session")
 * @ORM\Entity(repositoryClass="RennesJeux\SondageBundle\Repository\SessionRepository")
 */
class Session
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetimetz")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="RennesJeux\SondageBundle\Entity\Jeux")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jeu;
    
    /**
     * @ORM\ManyToMany(targetEntity="RennesJeux\SondageBundle\Entity\User")
     */
    private $joueurs;

    /**
    * @ORM\Column(name="nb_participants", type="integer")
    */
    private $nbParticipants;
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Session
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set jeu
     *
     * @param \RennesJeux\SondageBundle\Entity\Jeux $jeu
     *
     * @return Session
     */
    public function setJeu(Jeux $jeu)
    {
        $this->jeu = $jeu;

        return $this;
    }

    /**
     * Get jeu
     *
     * @return \RennesJeux\SondageBundle\Entity\Jeux
     */
    public function getJeu()
    {
        return $this->jeu;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->joueurs = new ArrayCollection();
    }

    /**
     * Add joueur
     *
     * @param \RennesJeux\SondageBundle\Entity\User $joueur
     *
     * @return Session
     */
    public function addJoueur(User $joueur)
    {
        $this->joueurs[] = $joueur;

        return $this;
    }

    /**
     * Remove joueur
     *
     * @param \RennesJeux\SondageBundle\Entity\User $joueur
     */
    public function removeJoueur(User $joueur)
    {
        $this->joueurs->removeElement($joueur);
    }

    /**
     * Get joueurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJoueurs()
    {
        return $this->joueurs;
    }

    public function increaseParticipants()
    {
        $this->nbParticipants++;
    }

    public function decreaseParticipants()
    {
        $this->nbParticipants--;
    }

    /**
     * Set nbParticipants
     *
     * @param integer $nbParticipants
     *
     * @return Session
     */
    public function setNbParticipants($nbParticipants)
    {
        $this->nbParticipants = $nbParticipants;

        return $this;
    }

    /**
     * Get nbParticipants
     *
     * @return integer
     */
    public function getNbParticipants()
    {
        return $this->nbParticipants;
    }
}
