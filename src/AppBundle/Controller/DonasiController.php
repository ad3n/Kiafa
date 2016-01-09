<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfonian\Indonesia\AdminBundle\Annotation\Schema\Crud;
use Symfonian\Indonesia\AdminBundle\Annotation\Schema\Grid;
use Symfonian\Indonesia\AdminBundle\Annotation\Schema\Page;
use Symfonian\Indonesia\AdminBundle\Annotation\Schema\Util\DatePicker;
use Symfonian\Indonesia\AdminBundle\Controller\CrudController;

/**
 * @Route("/donasi")
 * @Security("has_role('ROLE_BENDAHARA')")
 *
 * @Page("page.donasi.title", description="page.donasi.description")
 * @Crud("AppBundle\Entity\Transaksi", form="AppBundle\Form\DonasiType", showFields={"transaction_date", "donatur", "amount", "note"})
 * @Grid({"transaction_date", "donatur", "amount"}, filter={"transaction_date"})
 * @DatePicker()
 */
class DonasiController extends CrudController
{
}
