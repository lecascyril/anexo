<?php

namespace Anaxago\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userfav
 *
 * @ORM\Table(name="Userfav")
 * @ORM\Entity(repositoryClass="Anaxago\CoreBundle\Repository\ProjectRepository")
 */
class Userfav{
	
	/**
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="userfav")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
	 * @ORM\Id
	 */
	private $user;

	/**
	 * @ORM\ManyToOne(targetEntity="Project", inversedBy="userfav")
	 * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
	 * @ORM\Id
	 */
	private $project;

	/**
	 * @var int
	 *
	 * @ORM\Column(name="moneyput", type="integer")
	 */
	private $moneyput;




    /**
     * Set moneyput
     *
     * @param integer $moneyput
     *
     * @return Userfav
     */
    public function setMoneyput($moneyput)
    {
        $this->moneyput = $moneyput;

        return $this;
    }

    /**
     * Get moneyput
     *
     * @return integer
     */
    public function getMoneyput()
    {
        return $this->moneyput;
    }

    /**
     * Set user
     *
     * @param \Anaxago\CoreBundle\Entity\User $user
     *
     * @return Userfav
     */
    public function setUser(\Anaxago\CoreBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Anaxago\CoreBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set project
     *
     * @param \Anaxago\CoreBundle\Entity\Project $project
     *
     * @return Userfav
     */
    public function setProject(\Anaxago\CoreBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \Anaxago\CoreBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }
}
