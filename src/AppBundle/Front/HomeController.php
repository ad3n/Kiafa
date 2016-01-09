<?php

namespace AppBundle\Front;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Front:index.html.twig');
    }

    protected function getThisWeekReport()
    {

    }

    protected function getPreviousWeekReport()
    {

    }

    protected function getDetailPerBulan(\DateTime $dateTime)
    {
        $queryBuilder = $this->get('doctrine.orm.entity_manager')->getRepository('AppBundle:Transaksi')->createQueryBuilder('t');
        $queryBuilder->select('t.transactionDate AS tanggal, t.amount AS transaksi');
        $queryBuilder->andWhere('MONTH(t.transactionDate) = :bulan');
        $queryBuilder->setParameter('bulan', $dateTime->format('n'));

        return $queryBuilder->getQuery()->getResult();
    }

    protected function getTransaksiTahunan()
    {
        $queryBuilder = $this->get('doctrine.orm.entity_manager')->getRepository('AppBundle:Transaksi')->createQueryBuilder('t');
        $queryBuilder->select('YEAR(t.transactionDate) AS tahun, (t.transactionType) AS tipe, SUM(t.amount) AS total');
        $queryBuilder->addGroupBy('tahun');
        $queryBuilder->addGroupBy('tipe');

        return $queryBuilder->getQuery()->getResult();
    }

    protected function getTransaksiBulanan(\DateTime $dateTime)
    {
        $queryBuilder = $this->get('doctrine.orm.entity_manager')->getRepository('AppBundle:Transaksi')->createQueryBuilder('t');
        $queryBuilder->select('MONTH(t.transactionDate) AS bulan, (t.transactionType) AS tipe, SUM(t.amount) AS total');
        $queryBuilder->andWhere('YEAR(t.transactionDate) = :tahun');
        $queryBuilder->setParameter('tahun', $dateTime->format('Y'));
        $queryBuilder->addGroupBy('bulan');
        $queryBuilder->addGroupBy('tipe');

        return $queryBuilder->getQuery()->getResult();
    }
}