<?php
namespace AppBundle\Menu;

/**
 * Author: Muhammad Surya Ihsanuddin<surya.kejawen@gmail.com>
 * Url: http://blog.khodam.org
 */

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Routing\Router;
use Symfonian\Indonesia\AdminBundle\Menu\Builder as BaseMenu;
use Knp\Menu\MenuItem;

class Builder extends BaseMenu
{
    public function __construct(Router $router, ContainerInterface $container)
    {
        parent::__construct($router, $container);
    }

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = parent::mainMenu($factory, $options);
        $this->addDonaturMenu($menu);
        $this->addRekeningMenu($menu);
        $this->addDonasiMenu($menu);
        $this->addPengeluaranMenu($menu);

        return $menu;
    }

    public function addDonaturMenu(ItemInterface $menu)
    {
        $menu->addChild('Donatur', array(
            'uri' => '#',
            'label' => sprintf('<i class="fa fa-users"></i> <span>%s</span><i class="fa fa-angle-double-left pull-right"></i></a>', $this->translator->trans('menu.donatur.title', array(), $this->translationDomain)),
            'extras' => array('safe_label' => true),
            'attributes' => array(
                'class' => 'treeview',
            ),
        ));

        $menu['Donatur']->setChildrenAttribute('class', 'treeview-menu');

        $menu['Donatur']->addChild('Add', array(
            'label' => $this->translator->trans('menu.donatur.add', array(), $this->translationDomain),
            'route' => 'app_donatur_new',
            'attributes' => array(
                'class' => 'treeview',
            ),
        ));

        $menu['Donatur']->addChild('List', array(
            'label' => $this->translator->trans('menu.donatur.list', array(), $this->translationDomain),
            'route' => 'app_donatur_list',
            'attributes' => array(
                'class' => 'treeview',
            ),
        ));
    }

    public function addRekeningMenu(ItemInterface $menu)
    {
        $menu->addChild('Rekening', array(
            'uri' => '#',
            'label' => sprintf('<i class="fa fa-bank"></i> <span>%s</span><i class="fa fa-angle-double-left pull-right"></i></a>', $this->translator->trans('menu.rekening.title', array(), $this->translationDomain)),
            'extras' => array('safe_label' => true),
            'attributes' => array(
                'class' => 'treeview',
            ),
        ));

        $menu['Rekening']->setChildrenAttribute('class', 'treeview-menu');

        $menu['Rekening']->addChild('Add', array(
            'label' => $this->translator->trans('menu.rekening.add', array(), $this->translationDomain),
            'route' => 'app_rekening_new',
            'attributes' => array(
                'class' => 'treeview',
            ),
        ));

        $menu['Rekening']->addChild('List', array(
            'label' => $this->translator->trans('menu.rekening.list', array(), $this->translationDomain),
            'route' => 'app_rekening_list',
            'attributes' => array(
                'class' => 'treeview',
            ),
        ));
    }

    public function addDonasiMenu(ItemInterface $menu)
    {
        $menu->addChild('Donasi', array(
            'uri' => '#',
            'label' => sprintf('<i class="fa fa-envelope"></i> <span>%s</span><i class="fa fa-angle-double-left pull-right"></i></a>', $this->translator->trans('menu.donasi.title', array(), $this->translationDomain)),
            'extras' => array('safe_label' => true),
            'attributes' => array(
                'class' => 'treeview',
            ),
        ));

        $menu['Donasi']->setChildrenAttribute('class', 'treeview-menu');

        $menu['Donasi']->addChild('Add', array(
            'label' => $this->translator->trans('menu.donasi.add', array(), $this->translationDomain),
            'route' => 'app_donasi_new',
            'attributes' => array(
                'class' => 'treeview',
            ),
        ));

        $menu['Donasi']->addChild('List', array(
            'label' => $this->translator->trans('menu.donasi.list', array(), $this->translationDomain),
            'route' => 'app_donasi_list',
            'attributes' => array(
                'class' => 'treeview',
            ),
        ));
    }

    public function addPengeluaranMenu(ItemInterface $menu)
    {
        $menu->addChild('Pengeluaran', array(
            'uri' => '#',
            'label' => sprintf('<i class="fa fa-credit-card"></i> <span>%s</span><i class="fa fa-angle-double-left pull-right"></i></a>', $this->translator->trans('menu.pengeluaran.title', array(), $this->translationDomain)),
            'extras' => array('safe_label' => true),
            'attributes' => array(
                'class' => 'treeview',
            ),
        ));

        $menu['Pengeluaran']->setChildrenAttribute('class', 'treeview-menu');

        $menu['Pengeluaran']->addChild('Add', array(
            'label' => $this->translator->trans('menu.pengeluaran.add', array(), $this->translationDomain),
            'route' => 'app_pengeluaran_new',
            'attributes' => array(
                'class' => 'treeview',
            ),
        ));

        $menu['Pengeluaran']->addChild('List', array(
            'label' => $this->translator->trans('menu.pengeluaran.list', array(), $this->translationDomain),
            'route' => 'app_pengeluaran_list',
            'attributes' => array(
                'class' => 'treeview',
            ),
        ));
    }
}
