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
$app->match('/project/{project}/flag/{type}', 'DrupalProjectsStatistics\Controller\ProjectController::flagAction')
  ->bind('project_flag');


$app->get('/drupal-commerce', 'DrupalProjectsStatistics\Controller\ProjectController::drupalCommerceIndexAction')
  ->bind('drupal_commerce');

$app->get('/commerce-guys', 'DrupalProjectsStatistics\Controller\ProjectController::commerceGuysIndexAction')
  ->bind('commerce_guys');

$app->get('/search', 'DrupalProjectsStatistics\Controller\ProjectController::searchAction')
  ->bind('search');

///**
// * Display the Drupal Commerce projects list.
// */
//$app->get('projects/drupal-commerce', function (Request $request) use ($app) {
//
//  $sql = "SELECT p.id, p.name, p.title, p.url, p.drupal_commerce, p.commerce_guys, (ROUND(TIMESTAMPDIFF(MINUTE, last_commit, NOW())/60/24)) as last_commit, s.opened_issues, s.total_issues, s.opened_bugs, s.total_bugs, s.downloads, s.installs
//          FROM projects p
//          LEFT JOIN statistics s ON s.project_id = p.id AND s.created > '2013-12-01 00:00:00'
//          WHERE p.drupal_commerce = 1
//          GROUP BY title ASC
//          ";
//
//  $result = $app['dbs']['mysql']->query($sql);
//  $results = array();
//  while ($row = $result->fetch()) {
//    $results[] = $row;
//  }
//
//  $adapter = new ArrayAdapter($results);
//  $pagerfanta = new Pagerfanta($adapter);
//  $pagerfanta->setMaxPerPage(50);
//  $pagerfanta->setCurrentPage($request->query->get('page', 1));
//
//  return $app['twig']->render('projects.html.twig', array(
//    'pager' => $pagerfanta,
//    'title' => 'Drupal Commerce Projects',
//    'total_projects' => count($results),
//  ));
//
//})->bind('drupal-commerce');
//
//
///**
// * Display the Commerce Guys projects list.
// */
//$app->get('projects/commerce-guys', function (Request $request) use ($app) {
//
//  $sql = "SELECT p.id, p.name, p.title, p.url, p.drupal_commerce, p.commerce_guys, (ROUND(TIMESTAMPDIFF(MINUTE, last_commit, NOW())/60/24)) as last_commit, s.opened_issues, s.total_issues, s.opened_bugs, s.total_bugs, s.downloads, s.installs
//          FROM projects p
//          LEFT JOIN statistics s ON s.project_id = p.id AND s.created > '2013-12-01 00:00:00'
//          WHERE p.commerce_guys = 1
//          GROUP BY title ASC
//          ";
//
//  $result = $app['dbs']['mysql']->query($sql);
//  $results = array();
//  while ($row = $result->fetch()) {
//    $results[] = $row;
//  }
//
//  $adapter = new ArrayAdapter($results);
//  $pagerfanta = new Pagerfanta($adapter);
//  $pagerfanta->setMaxPerPage(50);
//  $pagerfanta->setCurrentPage($request->query->get('page', 1));
//
//  return $app['twig']->render('projects.html.twig', array(
//    'pager' => $pagerfanta,
//    'title' => 'Commerce Guys Projects',
//    'total_projects' => count($results),
//  ));
//
//})->bind('commerce-guys');
//
//
///**
// * Display the Drupal projects list.
// */
//$app->get('search', function (Request $request) use ($app) {
//
//  $search = $request->query->get('q');
//
//  $sql = "SELECT p.id, p.name, p.title, p.url, p.drupal_commerce, p.commerce_guys, (ROUND(TIMESTAMPDIFF(MINUTE, last_commit, NOW())/60/24)) as last_commit, s.opened_issues, s.total_issues, s.opened_bugs, s.total_bugs, s.downloads, s.installs
//          FROM projects p
//          LEFT JOIN statistics s ON s.project_id = p.id AND s.created > '2013-12-01 00:00:00'
//          WHERE p.title LIKE '%{:search}%'
//          GROUP BY title ASC
//          ";
//
//  $result = $app['dbs']['mysql']->prepare($sql, array(':search' => $search));
//  $result  = $result->execute();
//
//
//  $projects = array();
//  while ($row = $result->fetch()) {
//    $projects[] = $row;
//  }
//
//  $adapter = new ArrayAdapter($projects);
//  $pagerfanta = new Pagerfanta($adapter);
//  $pagerfanta->setMaxPerPage(50);
//  $pagerfanta->setCurrentPage($request->query->get('page', 1));
//
//  return $app['twig']->render('layout.html.twig', array(
//    'pager' => $pagerfanta,
//    'title' => 'Search',
//    'total_projects' => count($projects),
//  ));
//
//})
//  ->bind('search');
//
//
//
///**
// * Ajax callback to tag or untag a module as Commerce Guys.
// */
//$app->get('/commerceguys-project/{id}', function ($id) use ($app) {
//  if (is_numeric($id)) {
//    $sql = "UPDATE projects SET commerce_guys = NOT commerce_guys WHERE id = {$id}";
//    $result = $app['dbs']['mysql']->query($sql);
//    $sql = "SELECT commerce_guys as status FROM projects WHERE id = {$id}";
//    $result = $app['dbs']['mysql']->query($sql)->fetch();
//    return $result['status'];
//  }
//})
//  ->bind('commerceguys-project');
//
///**
// * Ajax callback to tag or untag a module as Drupal Commerce.
// */
//$app->get('/drupalcommerce-project/{id}', function ($id) use ($app) {
//  if (is_numeric($id)) {
//    $sql = "UPDATE projects SET drupal_commerce = NOT drupal_commerce WHERE id = {$id}";
//    $result = $app['dbs']['mysql']->query($sql);
//    $sql = "SELECT drupal_commerce as status FROM projects WHERE id = {$id}";
//    $result = $app['dbs']['mysql']->query($sql)->fetch();
//    return  $result['status'];
//  }
//})
//  ->bind('drupalcommerce-project');
//
//
///**
// * Display the project page.
// */
//$app->get('/project/{name}', function ($name) use ($app) {
//
//  $name = $app->escape($name);
//
//  $sql = "SELECT p.id, p.name, p.title as title, p.url, p.type, p.drupal_commerce, p.commerce_guys, (ROUND(TIMESTAMPDIFF(MINUTE, last_commit, NOW())/60/24)) as last_commit, s.opened_issues, s.total_issues, s.opened_bugs, s.total_bugs, s.downloads, s.installs
//          FROM projects p
//          LEFT JOIN statistics s ON s.project_id = p.id
//          WHERE p.name = '{$name}'
//          GROUP BY s.created DESC
//          ";
//
//  $result = $app['dbs']['mysql']->query($sql);
//  $project = $result->fetch();
//
//
//  $sql = "SELECT version, version_extra as extra
//          FROM releases
//          WHERE project_id = {$project['id']}
//          GROUP BY version_major DESC, version_extra DESC";
//
//  $result = $app['dbs']['mysql']->query($sql);
//  $releases = $result->fetchall();
//
//  return $app['twig']->render('project.html.twig', array(
//    'title' => 'Projects',
//    'project' => $project,
//    'releases' => $releases,
//  ));
//
//  return TRUE;
//})
//  ->bind('project');
//
//$app->run();

