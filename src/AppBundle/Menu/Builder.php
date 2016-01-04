<?php
namespace AppBundle\Menu;

/**
 * Author: Muhammad Surya Ihsanuddin<surya.kejawen@gmail.com>
 * Url: http://blog.khodam.org
 */

use Knp\Menu\FactoryInterface;
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

        return $menu;
    }
}
