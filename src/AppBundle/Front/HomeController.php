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
        $date = new \DateTime();

        $reportQuery = $this->get('app.report.report_query');

        return $this->render('AppBundle:Front:index.html.twig', array(
            'mingguan' => $reportQuery->getTransaksiMinggu($date),
            'bulanan' => $reportQuery->getTransaksiBulanan($date),
            'tahunan' => $reportQuery->getTransaksiTahunan(),
            'detail' => $reportQuery->getDetailPerBulan($date),
        ));
    }
}