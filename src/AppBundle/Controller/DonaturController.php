<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use SymfonyId\AdminBundle\Annotation\Crud;
use SymfonyId\AdminBundle\Annotation\Grid;
use SymfonyId\AdminBundle\Annotation\Page;
use SymfonyId\AdminBundle\Annotation\Column;
use SymfonyId\AdminBundle\Annotation\Filter;
use SymfonyId\AdminBundle\Controller\CrudController;

/**
 * @Route("/donatur")
 * @Security("has_role('ROLE_BENDAHARA')")
 *
 * @Page("page.donatur.title", description="page.donatur.description")
 * @Crud("AppBundle\Entity\Donatur", form="AppBundle\Form\DonaturType", showFields={"fullName", "address", "email", "phoneNumber", "isHambaAllah"})
 * @Grid(column=@Column({"fullName", "phoneNumber", "isHambaAllah"}), filter=@Filter({"fullName", "phoneNumber"}), formatNumber=false)
 */
class DonaturController extends CrudController
{
    protected function getClassName()
    {
        return __CLASS__;
    }
}
