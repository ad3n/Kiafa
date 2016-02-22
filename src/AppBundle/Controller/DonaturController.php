<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfonian\Indonesia\AdminBundle\Annotation\Crud;
use Symfonian\Indonesia\AdminBundle\Annotation\Grid;
use Symfonian\Indonesia\AdminBundle\Annotation\Page;
use Symfonian\Indonesia\AdminBundle\Controller\CrudController;

/**
 * @Route("/donatur")
 * @Security("has_role('ROLE_BENDAHARA')")
 *
 * @Page("page.donatur.title", description="page.donatur.description")
 * @Crud("AppBundle\Entity\Donatur", form="AppBundle\Form\DonaturType", showFields={"full_name", "address", "email", "phone_number", "hamba_allah"})
 * @Grid({"full_name", "phone_number", "hamba_allah"}, filters={"full_name", "phone_number"}, formatNumber=false)
 */
class DonaturController extends CrudController
{
    protected function getClassName()
    {
        return __CLASS__;
    }
}
