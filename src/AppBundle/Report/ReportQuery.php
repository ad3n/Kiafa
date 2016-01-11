<?php

namespace AppBundle\Report;


use Doctrine\ORM\EntityManager;

class ReportQuery
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getPosisiKas()
    {
        $queryBuilder = $this->entityManager->getRepository('AppBundle:Transaksi')->createQueryBuilder('t');
        $queryBuilder->select('SUM(t.amount) AS transaksi');

        return $queryBuilder->getQuery()->getSingleScalarResult();
    }

    public function getDetailPerBulan(\DateTime $dateTime)
    {
        $queryBuilder = $this->entityManager->getRepository('AppBundle:Transaksi')->createQueryBuilder('t');
        $queryBuilder->select('t.transactionDate AS tanggal, t.transactionType AS tipe, t.amount AS transaksi, t.note AS keterangan');
        $queryBuilder->andWhere('MONTH(t.transactionDate) = :bulan');
        $queryBuilder->setParameter('bulan', $dateTime->format('n'));

        return $queryBuilder->getQuery()->getResult();
    }

    public function getTransaksiTahunan()
    {
        $queryBuilder = $this->entityManager->getRepository('AppBundle:Transaksi')->createQueryBuilder('t');
        $queryBuilder->select('YEAR(t.transactionDate) AS tahun, t.transactionType AS tipe, SUM(t.amount) AS total, t.note AS keterangan');
        $queryBuilder->addGroupBy('tahun');
        $queryBuilder->addGroupBy('tipe');

        return $queryBuilder->getQuery()->getResult();
    }

    public function getTransaksiBulanan(\DateTime $dateTime)
    {
        $queryBuilder = $this->entityManager->getRepository('AppBundle:Transaksi')->createQueryBuilder('t');
        $queryBuilder->select('MONTH(t.transactionDate) AS bulan, t.transactionType AS tipe, SUM(t.amount) AS total, t.note AS keterangan');
        $queryBuilder->andWhere('YEAR(t.transactionDate) = :tahun');
        $queryBuilder->setParameter('tahun', $dateTime->format('Y'));
        $queryBuilder->addGroupBy('bulan');
        $queryBuilder->addGroupBy('tipe');

        return $queryBuilder->getQuery()->getResult();
    }

    public function getTransaksiMinggu(\DateTime $dateTime)
    {
        $queryBuilder = $this->entityManager->getRepository('AppBundle:Transaksi')->createQueryBuilder('t');
        $queryBuilder->select('WEEK(t.transactionDate, 1) AS minggu, t.transactionType AS tipe, SUM(t.amount) AS total, t.note AS keterangan');
        $queryBuilder->andWhere('MONTH(t.transactionDate) = :bulan');
        $queryBuilder->setParameter('bulan', $dateTime->format('n'));
        $queryBuilder->addGroupBy('minggu');
        $queryBuilder->addGroupBy('tipe');

        return $queryBuilder->getQuery()->getResult();
    }
}