<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfonian\Indonesia\CoreBundle\Toolkit\DoctrineManager\Model\EntityInterface;
use Symfonian\Indonesia\CoreBundle\Toolkit\DoctrineManager\Model\TimestampableInterface;

/**
 * @ORM\Table(name="transaksi")
 * @ORM\Entity
 */
class Transaksi implements TimestampableInterface, EntityInterface
{
    const CREDIT = 'k';

    const DEBET = 'd';

    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="transaction_date", type="date")
     */
    protected $transactionDate;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Donatur", cascade={"persist"})
     * @ORM\JoinColumn(name="donatur_id", referencedColumnName="id")
     */
    protected $donatur;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Rekening", cascade={"persist"})
     * @ORM\JoinColumn(name="rekening_id", referencedColumnName="id")
     */
    protected $rekening;

    /**
     * @ORM\Column(name="transaction_type", type="string", length=1)
     */
    protected $transactionType;

    /**
     * @ORM\Column(name="amount", type="decimal", scale=2, precision=11)
     */
    protected $amount;

    /**
     * @ORM\Column(name="note", type="string", length=255)
     */
    protected $note;

    /**
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="created_by", type="string", length=100, nullable=false)
     */
    protected $createdBy;

    /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected $updatedAt;

    /**
     * @ORM\Column(name="updated_by", type="string", length=100, nullable=true)
     */
    protected $updatedBy;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return DateTime
     */
    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    /**
     * @param DateTime $transactionDate
     */
    public function setTransactionDate(DateTime $transactionDate)
    {
        $this->transactionDate = $transactionDate;
    }

    /**
     * @return Donatur
     */
    public function getDonatur()
    {
        return $this->donatur;
    }

    /**
     * @param Donatur $donatur
     */
    public function setDonatur(Donatur $donatur)
    {
        $this->donatur = $donatur;
    }

    /**
     * @return Rekening
     */
    public function getRekening()
    {
        return $this->rekening;
    }

    /**
     * @param Rekening $rekening
     */
    public function setRekening(Rekening $rekening)
    {
        $this->rekening = $rekening;
    }

    /**
     * @return string
     */
    public function getTransactionType()
    {
        return $this->transactionType;
    }

    /**
     * @param string $transactionType
     */
    public function setTransactionType($transactionType = self::DEBET)
    {
        if (!in_array($transactionType, array(self::DEBET, self::CREDIT))) {
            throw new \InvalidArgumentException('Transaction type is not valid.');
        }

        $this->transactionType = $transactionType;
    }

    /**
     * @return double
     */
    public function getAmout()
    {
        return $this->amout;
    }

    /**
     * @param double $amout
     */
    public function setAmout($amout)
    {
        $this->amout = (double) $amout;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @param DateTime $date
     */
    public function setCreatedAt(DateTime $date)
    {
        $this->createdAt = $date;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $date
     */
    public function setUpdatedAt(DateTime $date)
    {
        $this->updatedAt = $date;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param string $username
     */
    public function setCreatedBy($username)
    {
        $this->createdBy = $username;
    }

    /**
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param string $username
     */
    public function setUpdatedBy($username)
    {
        $this->updatedBy = $username;
    }

    /**
     * @return string
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }
}
