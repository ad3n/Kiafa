<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use SymfonyId\AdminBundle\Annotation\Crud;
use SymfonyId\AdminBundle\Annotation\Grid;
use SymfonyId\AdminBundle\Annotation\Page;
use SymfonyId\AdminBundle\Annotation\Filter;
use SymfonyId\AdminBundle\Annotation\Column;
use SymfonyId\AdminBundle\Controller\CrudController;

/**
 * @Route("/rekening")
 * @Security("has_role('ROLE_BENDAHARA')")
 *
 * @Page("page.rekening.title", description="page.rekening.description")
 * @Crud("AppBundle\Entity\Rekening", form="AppBundle\Form\RekeningType", showFields={"accountName", "accountNumber"})
 * @Grid(column=@Column({"accountName", "accountNumber"}), filter=@Filter({"accountName", "accountNumber"}), formatNumber=false)
 */
class RekeningController extends CrudController
{
    protected function getClassName()
    {
        return __CLASS__;
    }
}
