<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfonian\Indonesia\AdminBundle\Annotation\Schema\Crud;
use Symfonian\Indonesia\AdminBundle\Annotation\Schema\Grid;
use Symfonian\Indonesia\AdminBundle\Annotation\Schema\Page;
use Symfonian\Indonesia\AdminBundle\Controller\CrudController;

/**
 * @Route("/donatur")
 *
 * @Page("page.donatur.title", description="page.donatur.description")
 * @Crud("AppBundle\Entity\Donatur", showFields={"full_name", "address", "email", "phone_number", "hamba_allah"})
 * @Grid({"full_name", "phone_number", "hamba_allah"}, filter={"full_name", "phone_number"}, formatNumber=false)
 */
class DonaturController extends CrudController
{
}
