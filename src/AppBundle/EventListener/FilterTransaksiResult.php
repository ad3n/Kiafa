<?php

namespace AppBundle\EventListener;

use AppBundle\Controller\DonasiController;
use AppBundle\Controller\PengeluaranController;
use AppBundle\Entity\Transaksi;
use SymfonyId\AdminBundle\Event\FilterQueryEvent;
use SymfonyId\AdminBundle\Event\FilterModelEvent;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class FilterTransaksiResult implements ContainerAwareInterface
{
    private $controller;

    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

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

    public function onFilterEntity(FilterModelEvent $event)
    {
        /** @var Transaksi $entity */
        $entity = $event->getModel();

        if ($this->controller instanceof PengeluaranController) {
            $posisiKas = $this->container->get('app.report.report_query')->getPosisiKas();

            if ($posisiKas < $entity->getAmount()) {
                throw new \InvalidArgumentException(sprintf('Kas tidak mencukupi'));
            }

            if (!$entity->getId()) {
                $entity->setAmount(-1 * $entity->getAmount());
                $event->setModel($entity);
            }
        }
    }
}