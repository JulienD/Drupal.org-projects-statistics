<?php


// Register route converters.
// Each converter needs to check if the $id it received is actually a value,
// as a workaround for https://github.com/silexphp/Silex/pull/768.
$app['controllers']->convert('project', function ($id) use ($app) {
  if ($id) {
    return $app['repository.project']->find($id);
  }
});

$app['controllers']->convert('user', function ($id) use ($app) {
  if ($id) {
    return $app['repository.user']->find($id);
  }
});

$app['controllers']->convert('flagType', function ($id) use ($app) {
  if ($id) {
    return $app['repository.flagType']->find($id);
  }
});

// Register routes.
$app->get('/', 'DrupalProjectsStatistics\Controller\IndexController::indexAction')
  ->bind('homepage');

$app->get('/me', 'DrupalProjectsStatistics\Controller\UserController::meAction')
  ->bind('me');

$app->match('/login', 'DrupalProjectsStatistics\Controller\UserController::loginAction')
  ->bind('login');
$app->get('/logout', 'DrupalProjectsStatistics\Controller\UserController::logoutAction')
  ->bind('logout');


$app->get('/projects', 'DrupalProjectsStatistics\Controller\ProjectController::indexAction')
  ->bind('projects');

$app->match('/project/{project}', 'DrupalProjectsStatistics\Controller\ProjectController::viewAction')
  ->bind('project');
$app->match('/project/{project}/flag/{flagType}', 'DrupalProjectsStatistics\Controller\ProjectController::flagAction')
  ->bind('project_flag');


$app->get('/drupal-commerce', 'DrupalProjectsStatistics\Controller\ProjectController::drupalCommerceIndexAction')
  ->bind('drupal_commerce');

$app->get('/commerce-guys', 'DrupalProjectsStatistics\Controller\ProjectController::commerceGuysIndexAction')
  ->bind('commerce_guys');

$app->get('/search', 'DrupalProjectsStatistics\Controller\ProjectController::searchAction')
  ->bind('search');

