<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfonian\Indonesia\AdminBundle\Annotation\Schema\Crud;
use Symfonian\Indonesia\AdminBundle\Annotation\Schema\Grid;
use Symfonian\Indonesia\AdminBundle\Annotation\Schema\Page;
use Symfonian\Indonesia\AdminBundle\Controller\CrudController;

/**
 * @Route("/rekening")
 *
 * @Page("page.rekening.title", description="page.rekening.description")
 * @Crud("AppBundle\Entity\Rekening", showFields={"account_name", "account_number"})
 * @Grid({"account_name", "account_number"}, filter={"account_name", "account_number"}, formatNumber=false)
 */
class RekeningController extends CrudController
{
}
