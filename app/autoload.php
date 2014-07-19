<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';
$loader->add('Stof', __DIR__.'/../vendor/bundles');
$loader->add('Gedmo', __DIR__.'/../vendor/gedmo-doctrine-extensions/lib');

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
