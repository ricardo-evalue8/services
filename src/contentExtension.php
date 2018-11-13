<?php

namespace Bolt\Extension\evalue8\services;

use Bolt\Extension\SimpleExtension;
use Bolt\Asset\Snippet\Snippet;
use Bolt\Asset\File\Stylesheet;
use Bolt\Controller\Zone;
use Bolt\Asset\Target;

use Bolt\Asset\Widget\Widget;

/**
 * An extremely basic (thus far) login wallpaper extension.
 *
 * Spice up your /bolt/login screen by pulling images from Unsplash
 * and displaying them as the login background.
 *
 */
 
class contentExtension extends SimpleExtension
{
	protected function registerAssets()
    {
		
        $widgetObj = new \Bolt\Asset\Widget\Widget();
        $widgetObj
            ->setZone('frontend')
            ->setLocation('..')
            ->setCallback([$this, 'functionName'])
            ->setCallbackArguments([])
            ->setDefer(true)
        ;

        return [ $widgetObj ];
    }
	
	public function widgetCallback($widget)
    {
        $app = $this->getContainer();

        // Data to pass into the widget
        $data = [
            'record'  => $record,
            'widget'  => $widget,
            'content' => $widget['content'],
        ];

        // Grab the current Twig globals, and prepare to pass them back in. 
        $data = array_merge($data, $app['twig']->getGlobals());

        return $this->renderTemplate($widget['template'], $data);
    } 
}