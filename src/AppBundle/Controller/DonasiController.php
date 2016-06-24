<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use SymfonyId\AdminBundle\Annotation\Crud;
use SymfonyId\AdminBundle\Annotation\Grid;
use SymfonyId\AdminBundle\Annotation\Page;
use SymfonyId\AdminBundle\Annotation\Column;
use SymfonyId\AdminBundle\Annotation\Filter;
use SymfonyId\AdminBundle\Annotation\Util;
use SymfonyId\AdminBundle\Annotation\DatePicker;
use SymfonyId\AdminBundle\Controller\CrudController;

/**
 * @Route("/donasi")
 * @Security("has_role('ROLE_BENDAHARA')")
 *
 * @Page("page.donasi.title", description="page.donasi.description")
 * @Crud("AppBundle\Entity\Transaksi", form="AppBundle\Form\DonasiType", showFields={"transactionDate", "donatur", "amount", "note"})
 * @Grid(column=@Column({"transactionDate", "donatur", "amount"}), filter=@Filter({"transactionDate"}))
 * @Util(datePicker=@DatePicker())
 */
class DonasiController extends CrudController
{
    protected function getClassName()
    {
        return __CLASS__;
    }
}
