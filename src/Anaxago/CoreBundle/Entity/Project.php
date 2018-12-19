<?php

namespace Anaxago\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="Anaxago\CoreBundle\Repository\ProjectRepository")
 */
class Project
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
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="getmoney", type="integer")
     */
    private $getmoney;

    /**
     *@var int
     *
     * @ORM\Column(name="moneygot", type="integer")
     */
    private $moneygot;

    /**
     *
     * @ORM\OneToMany(targetEntity="Userfav", mappedBy="project")
     */
    private $userfav;

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
     * Set slug
     *
     * @param string $slug
     *
     * @return Project
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Project
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set getmoney
     *
     * @param integer $getmoney
     *
     * @return Project
     */
    public function setGetMoney($getmoney)
    {
        $this->getmoney = $getmoney;

        return $this;
    }

    /**
     * Get getmoney
     *
     * @return integer
     */
    public function getGetMoney()
    {
        return $this->getmoney;
    }


    /**
     * Set moneygot
     *
     * @param integer $moneygot
     *
     * @return Project
     */
    public function setMoneyGot($moneygot)
    {
        $this->moneygot = $moneygot;

        return $this;
    }

    /**
     * Get moneygot
     *
     * @return integer
     */
    public function getMoneyGot()
    {
        return $this->moneygot;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }



    /**
     * Add userfav
     *
     * @param \Anaxago\CoreBundle\Entity\Userfav $userfav
     *
     * @return Project
     */
    public function addUserfav(\Anaxago\CoreBundle\Entity\Userfav $userfav)
    {
        $this->userfav[] = $userfav;

        return $this;
    }

    /**
     * Remove userfav
     *
     * @param \Anaxago\CoreBundle\Entity\Userfav $userfav
     */
    public function removeUserfav(\Anaxago\CoreBundle\Entity\Userfav $userfav)
    {
        $this->userfav->removeElement($userfav);
    }

    /**
     * Get userfav
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserfav()
    {
        return $this->userfav;
    }
}
