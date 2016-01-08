<?php

namespace AppBundle\EventListener;

use AppBundle\Controller\DonasiController;
use AppBundle\Controller\PengeluaranController;
use AppBundle\Entity\Transaksi;
use Symfonian\Indonesia\AdminBundle\Event\FilterQueryEvent;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class FilterTransaksiResult
{
    private $controller;

    public function onKernelController(FilterControllerEvent $event)
    {
        $controller = $event->getController();

        if (!is_array($controller)) {
            return;
        }

        if ($controller[0] instanceof DonasiController || $controller[0] instanceof PengeluaranController) {
            $this->controller = $controller[0];
        }
    }

    public function onFilterQuery(FilterQueryEvent $event)
    {
        $queryBuilder = $event->getQueryBuilder();
        $alias = $event->getAlias();

        if ($this->controller instanceof DonasiController) {
            $queryBuilder->andWhere($alias.'.transactionType = :transactionType');
            $queryBuilder->setParameter('transactionType', Transaksi::DEBET);
        }

        if ($this->controller instanceof PengeluaranController) {
            $queryBuilder->andWhere($alias.'.transactionType = :transactionType');
            $queryBuilder->setParameter('transactionType', Transaksi::CREDIT);
        }
    }
}