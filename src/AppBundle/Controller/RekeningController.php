<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfonian\Indonesia\AdminBundle\Annotation\Crud;
use Symfonian\Indonesia\AdminBundle\Annotation\Grid;
use Symfonian\Indonesia\AdminBundle\Annotation\Page;
use Symfonian\Indonesia\AdminBundle\Controller\CrudController;

/**
 * @Route("/rekening")
 * @Security("has_role('ROLE_BENDAHARA')")
 *
 * @Page("page.rekening.title", description="page.rekening.description")
 * @Crud("AppBundle\Entity\Rekening", form="AppBundle\Form\RekeningType", showFields={"account_name", "account_number"})
 * @Grid({"account_name", "account_number"}, filters={"account_name", "account_number"}, formatNumber=false)
 */
class RekeningController extends CrudController
{
}
