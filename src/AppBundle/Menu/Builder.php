<?php
namespace AppBundle\Menu;

/**
 * Author: Muhammad Surya Ihsanuddin<surya.kejawen@gmail.com>
 * Url: http://blog.khodam.org
 */

use Knp\Menu\FactoryInterface;
use Symfonian\Indonesia\AdminBundle\Extractor\ClassExtractor;
use Symfonian\Indonesia\AdminBundle\Menu\Builder as BaseMenu;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\Translation\TranslatorInterface;

class Builder extends BaseMenu
{
    public function __construct(Kernel $kernel, Router $router, ClassExtractor $extractor, TranslatorInterface $translator, AuthorizationChecker $authorizationChecker, $translationDomain)
    {
        parent::__construct($kernel, $router, $extractor, $translator, $authorizationChecker, $translationDomain);
    }

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $this->createRootMenu($factory, $options);
        $this->addDashboardMenu($menu);
        if ($this->isGranted('ROLE_SUPER_ADMIN')) {
            $this->addUserMenu($menu);
        }
        if ($this->isGranted('ROLE_BENDAHARA')) {
            $this->generateMenu($menu);
        }

        return $menu;
    }
}
