<?php

require_once 'App.php';
App::init();

// @todo: method-priority, images, titles, etc - the same - just apply new priority by filter. one common or several different

$requestDataProvider = new \Payments\JsonDataProvider($argv[1]);
$request = new \Payments\Request($requestDataProvider->getData());

$methodsDataProvider = new \Payments\JsonDataProvider($argv[2]);
$methodList = new \Payments\MethodList($methodsDataProvider);

$filtersDataProvider = new \Payments\JsonDataProvider($argv[3]);
$filterManager = new \Payments\FilterManager();

$availableMethods = $filterManager->processFilter($request, $filtersDataProvider, $methodList);

print_r($availableMethods->getMethods());



