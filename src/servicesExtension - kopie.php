<?php

namespace Bolt\Extension\evalue8\services;

use Bolt\Extension\SimpleExtension;
use Bolt\Asset\Snippet\Snippet;
use Bolt\Asset\File\Stylesheet;
use Bolt\Controller\Zone;
use Bolt\Asset\Target;

use Bolt\Menu\MenuEntry;
use Bolt\Menu\AdminMenuBuilder;
use Silex\Application;
use Silex\ControllerCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * An extremely basic (thus far) login wallpaper extension.
 *
 * Spice up your /bolt/login screen by pulling images from Unsplash
 * and displaying them as the login background.
 *
 */
class servicesExtension extends SimpleExtension
{
	
	protected function registerMenuEntries()
	{
		$menu = MenuEntry::create('services-menu', 'theme')
			->setLabel('Social services')
			->setIcon('fa:share-alt')
			->setPermission('settings')
			->setRoute('select-theme')
		;
		
		$submenuItemOne = MenuEntry::create('theme-submenu-one', '../../theme-picker')
			->setLabel('Select theme')
			->setIcon('fa:paint-brush')
		;

		$submenuItemTwo = MenuEntry::create('theme-submenu-two', '../../theme-upload')
			->setLabel('Upload theme')
			->setIcon('fa:upload')
		;

		$menu->add($submenuItemOne);
		$menu->add($submenuItemTwo);

		return [
			$menu,
		];
	}

    protected function registerBackendRoutes(ControllerCollection $collection)
    {
        // GET requests on the /bolt/theme-picker route
        $collection->get('/services', [$this, 'callbackBoltPicker']);

        // POST requests on the /bolt/theme-picker route
        $collection->post('/services', [$this, 'callbackBoltPicker']);
    }


    public function callbackBoltPicker(Application $app, Request $request)
    {
        return $this->renderTemplate('services.twig');
    }
	
	
	protected function registerAssets()
    {
		
        // Add some web assets from the web/ directory
        return [
            new Stylesheet('services.css'),
        ];
    }
	
}
