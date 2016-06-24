<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SymfonyId\AdminBundle\Model\ModelInterface;

/**
 * @ORM\Table(name="rekening")
 * @ORM\Entity
 */
class Rekening implements ModelInterface
{
    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="account_name", type="string", length=77)
     */
    protected $accountName;

    /**
     * @ORM\Column(name="account_number", type="string", length=27)
     */
    protected $accountNumber;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAccountName()
    {
        return $this->accountName;
    }

    /**
     * @param string $accountName
     */
    public function setAccountName($accountName)
    {
        $this->accountName = $accountName;
    }

    /**
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @param string $accountNumber
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }

    public function __toString()
    {
        return $this->getAccountName().': '.$this->getAccountNumber();
    }
}
