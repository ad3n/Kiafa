<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfonian\Indonesia\AdminBundle\Annotation\Schema\Crud;
use Symfonian\Indonesia\AdminBundle\Annotation\Schema\Grid;
use Symfonian\Indonesia\AdminBundle\Annotation\Schema\Page;
use Symfonian\Indonesia\AdminBundle\Annotation\Schema\Util\DatePicker;
use Symfonian\Indonesia\AdminBundle\Controller\CrudController;

/**
 * @Route("/pengeluaran")
 *
 * @Page("page.pengeluaran.title", description="page.pengeluaran.description")
 * @Crud("AppBundle\Entity\Transaksi", form="AppBundle\Form\PengeluaranType", showFields={"transaction_date", "donatur", "amout", "note"})
 * @Grid({"transaction_date", "donatur", "amout"}, filter={"transaction_date"})
 * @DatePicker()
 */
class PengeluaranController extends CrudController
{
}
