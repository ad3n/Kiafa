<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfonian\Indonesia\AdminBundle\Annotation\Crud;
use Symfonian\Indonesia\AdminBundle\Annotation\Grid;
use Symfonian\Indonesia\AdminBundle\Annotation\Page;
use Symfonian\Indonesia\AdminBundle\Annotation\Util;
use Symfonian\Indonesia\AdminBundle\Controller\CrudController;

/**
 * @Route("/donasi")
 * @Security("has_role('ROLE_BENDAHARA')")
 *
 * @Page("page.donasi.title", description="page.donasi.description")
 * @Crud("AppBundle\Entity\Transaksi", form="AppBundle\Form\DonasiType", showFields={"transaction_date", "donatur", "amount", "note"})
 * @Grid({"transaction_date", "donatur", "amount"}, filters={"transaction_date"})
 * @Util(datePicker=true)
 */
class DonasiController extends CrudController
{
    protected function getClassName()
    {
        return __CLASS__;
    }
}
