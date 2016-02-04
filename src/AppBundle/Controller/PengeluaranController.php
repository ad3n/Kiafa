<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfonian\Indonesia\AdminBundle\Annotation\Crud;
use Symfonian\Indonesia\AdminBundle\Annotation\Grid;
use Symfonian\Indonesia\AdminBundle\Annotation\Page;
use Symfonian\Indonesia\AdminBundle\Annotation\Util;
use Symfonian\Indonesia\AdminBundle\Annotation\Util\DatePicker;
use Symfonian\Indonesia\AdminBundle\Controller\CrudController;

/**
 * @Route("/pengeluaran")
 * @Security("has_role('ROLE_BENDAHARA')")
 *
 * @Page("page.pengeluaran.title", description="page.pengeluaran.description")
 * @Crud(
 *     "AppBundle\Entity\Transaksi",
 *     form="AppBundle\Form\PengeluaranType",
 *     showFields={"transaction_date", "rekening", "amount", "note"},
 *     list="AppBundle:Pengeluaran:list.html.twig"
 * )
 * @Grid({"transaction_date", "rekening", "amount"}, filters={"transaction_date"})
 * @Util(datePicker=true)
 */
class PengeluaranController extends CrudController
{
    protected function getClassName()
    {
        return __CLASS__;
    }
}
