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

use Bolt\Asset\Widget\Widget;

/**
 * An extremely basic (thus far) login wallpaper extension.
 *
 * Spice up your /bolt/login screen by pulling images from Unsplash
 * and displaying them as the login background.
 *
 */
class servicesExtension extends SimpleExtension
{
	protected function registerAssets()
    {

		$widget = new \Bolt\Asset\Widget\Widget();
        $widget
            ->setZone('frontend')
            ->setLocation('main')
            ->setCallback([$this, 'frontendButton'])
        ;
		
        return [ $widget ];
    }
	
	public function frontendButton()
    {

        return $this->renderTemplate('services.twig');
    }
}
