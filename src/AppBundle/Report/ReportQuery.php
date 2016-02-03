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

    public function getTransaksiTerakhir()
    {
        $queryBuilder = $this->entityManager->getRepository('AppBundle:Transaksi')->createQueryBuilder('t');
        $queryBuilder->select('t.transactionDate AS tanggal, t.transactionType AS tipe, d.fullName AS donatur, d.isHambaAllah as hamba, r.accountName AS rekening, t.amount AS transaksi, t.note AS keterangan');
        $queryBuilder->leftJoin('t.donatur', 'd');
        $queryBuilder->leftJoin('t.rekening', 'r');
        $queryBuilder->addOrderBy('t.transactionDate', 'DESC');
        $queryBuilder->setMaxResults(9);

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
        $queryBuilder->select('MONTH(t.transactionDate) AS bulan, SUM(CASE WHEN t.amount > 0 THEN t.amount ELSE 0 END) AS total_d, SUM(CASE WHEN t.amount < 0 THEN t.amount ELSE 0 END) AS total_k');
        $queryBuilder->andWhere('YEAR(t.transactionDate) = :tahun');
        $queryBuilder->setParameter('tahun', $dateTime->format('Y'));
        $queryBuilder->addGroupBy('bulan');

        return $queryBuilder->getQuery()->getResult();
    }

    public function getTransaksiMinggu(\DateTime $dateTime)
    {
        $queryBuilder = $this->entityManager->getRepository('AppBundle:Transaksi')->createQueryBuilder('t');
        $queryBuilder->select('WEEK(t.transactionDate, 1) AS minggu, SUM(CASE WHEN t.amount > 0 THEN t.amount ELSE 0 END) AS total_d, SUM(CASE WHEN t.amount < 0 THEN t.amount ELSE 0 END) AS total_k');
        $queryBuilder->andWhere('MONTH(t.transactionDate) = :bulan');
        $queryBuilder->setParameter('bulan', $dateTime->format('n'));
        $queryBuilder->addGroupBy('minggu');

        return $queryBuilder->getQuery()->getResult();
    }
}