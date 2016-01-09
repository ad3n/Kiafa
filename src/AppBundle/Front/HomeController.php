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

    protected function getKasTahunan()
    {
        $queryBuilder = $this->get('doctrine.orm.entity_manager')->getRepository('AppBundle:Transaksi')->createQueryBuilder('t');
        $queryBuilder->select('YEAR(t.transactionDate) AS tahun, SUM(t.amount) AS kas');
    }

    protected function getKasBulanan(\DateTime $dateTime)
    {

    }
}