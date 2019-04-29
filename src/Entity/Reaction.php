<?php
/**
 * Maks Fedorov
 * https://maksfedorov.ru
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReactionRepository")
 */
class Reaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Company")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     * })
     */
    private $company;

    /**
     * @ORM\OneToOne(targetEntity="Rezume")
     * @ORM\JoinColumn(name="rezume_id", referencedColumnName="id")
     */
    private $rezume;

    /**
     * @ORM\Column(type="datetime")
     */
    private $sendTime;

    /**
     * @ORM\Column(type="datetime")
     */
    private $reaction;


    public function __construct(){
        $this->sendTime = new \DateTime();
        $this->reaction = new \DateTime();
    }



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function getRezume()
    {
        return $this->rezume;
    }

    /**
     * @param mixed $rezume
     */
    public function setRezume($rezume)
    {
        $this->rezume = $rezume;
    }

    /**
     * @return mixed
     */
    public function getSendTime()
    {
        return $this->sendTime;
    }

    /**
     * @param mixed $sendTime
     */
    public function setSendTime($sendTime)
    {
        $this->sendTime = $sendTime;
    }

    /**
     * @return mixed
     */
    public function getReaction()
    {
        return $this->reaction;
    }

    /**
     * @param mixed $reaction
     */
    public function setReaction($reaction)
    {
        $this->reaction = $reaction;
    }

}
