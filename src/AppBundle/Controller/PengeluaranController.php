<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use SymfonyId\AdminBundle\Annotation\Crud;
use SymfonyId\AdminBundle\Annotation\Grid;
use SymfonyId\AdminBundle\Annotation\Page;
use SymfonyId\AdminBundle\Annotation\Util;
use SymfonyId\AdminBundle\Annotation\Column;
use SymfonyId\AdminBundle\Annotation\Filter;
use SymfonyId\AdminBundle\Annotation\DatePicker;
use SymfonyId\AdminBundle\Controller\CrudController;

/**
 * @Route("/pengeluaran")
 * @Security("has_role('ROLE_BENDAHARA')")
 *
 * @Page("page.pengeluaran.title", description="page.pengeluaran.description")
 * @Crud(
 *     "AppBundle\Entity\Transaksi",
 *     form="AppBundle\Form\PengeluaranType",
 *     showFields={"transactionDate", "rekening", "amount", "note"},
 *     list="AppBundle:Pengeluaran:list.html.twig"
 * )
 * @Grid(column=@Column({"transactionDate", "rekening", "amount"}), filter=@Filter({"transactionDate"}))
 * @Util(datePicker=@DatePicker())
 */
class PengeluaranController extends CrudController
{
    protected function getClassName()
    {
        return __CLASS__;
    }
}
