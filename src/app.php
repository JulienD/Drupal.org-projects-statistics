<?php

use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\View\TwitterBootstrapView;



// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());

/*
$app->register(new Silex\Provider\SecurityServiceProvider(), array(
  'security.firewalls' => array(
    'login' => array(
      'pattern' => '^/login$',
    ),
    'secured' => array(
      'pattern' => '^.*$',
      'form' => array('login_path' => '/login', 'check_path' => '/admin/login_check'),
      'logout' => array('logout_path' => '/logout'),
      'users' => $app->share(function ($app) {
          return new DrupalProjectsStatistics\Repository\UserRepository($app['db'], $app['security.encoder.digest']);
        })
    ),
  ),
  'security.role_hierarchy' => array(
    'ROLE_ADMIN' => array('ROLE_USER'),
  ),
  'security.access_rules' => array(
    array("^/private", "ROLE_USER"),
//    array('^/login$', ''),
    array('^.*$', 'ROLE_USER'),
  )
));*/


$app->register(new Silex\Provider\SecurityServiceProvider(), array(
  'security.firewalls' => array(
    'login' => array(
      'pattern' => '^/login$',
      'anonymous' => true,
    ),
    'secured' => array(
      'pattern' => '^/',
      'form'    => array(
        'login_path' => '/login',
        'check_path' => '/admin/login_check',
        'username_parameter' => 'form[username]',
        'password_parameter' => 'form[password]',
      ),
      'logout' => true,
      'users' => $app->share(function ($app) {
          return new DrupalProjectsStatistics\Repository\UserRepository($app['db'], $app['security.encoder.digest']);
      })
    )
  ),
  'security.role_hierarchy' => array(
    'ROLE_ADMIN' => array('ROLE_USER'),
  ),
));




$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.options' => array(
    'cache' => isset($app['twig.options.cache']) ? $app['twig.options.cache'] : false,
    'strict_variables' => true,
  ),
  'twig.form.templates' => array('form_div_layout.html.twig', 'common/form_div_layout.html.twig'),
  'twig.path' => array(__DIR__ . '/../app/views')
));


// Register repositories.
$app['repository.project'] = $app->share(function ($app) {
  return new DrupalProjectsStatistics\Repository\ProjectRepository($app['db']);
});

$app['repository.flag'] = $app->share(function ($app) {
  return new DrupalProjectsStatistics\Repository\FlagRepository($app['db']);
});

$app['repository.flagType'] = $app->share(function ($app) {
  return new DrupalProjectsStatistics\Repository\FlagTypeRepository($app['db'], $app['repository.user']);
});

$app['repository.projectDrupalCommerce'] = $app->share(function ($app) {
  return new DrupalProjectsStatistics\Repository\ProjectDrupalCommerceRepository($app['db']);
});

$app['repository.projectCommerceGuys'] = $app->share(function ($app) {
  return new DrupalProjectsStatistics\Repository\ProjectCommerceGuysRepository($app['db']);
});

$app['repository.statistic'] = $app->share(function ($app) {
  return new DrupalProjectsStatistics\Repository\StatisticRepository($app['db']);
});

$app['repository.release'] = $app->share(function ($app) {
  return new DrupalProjectsStatistics\Repository\ReleaseRepository($app['db']);
});

$app['repository.user'] = $app->share(function ($app) {
  return new DrupalProjectsStatistics\Repository\UserRepository($app['db'], $app['security.encoder.digest']);
});



// Protect admin urls.
$app->before(function (Request $request) use ($app) {
  $protected = array(
    '/admin/' => 'ROLE_ADMIN',
    '/me' => 'ROLE_USER',
  );
  $path = $request->getPathInfo();
  foreach ($protected as $protectedPath => $role) {
    if (strpos($path, $protectedPath) !== FALSE && !$app['security']->isGranted($role)) {
      throw new AccessDeniedException();
    }
  }
});


// Register the error handler.
$app->error(function (\Exception $e, $code) use ($app) {
  if ($app['debug']) {
    return;
  }

  switch ($code) {
    case 404:
      $message = 'The requested page could not be found.';
      break;
    default:
      $message = 'We are sorry, but something went terribly wrong.';
  }

  return new Response($message, $code);
});


//$app->register(new FranMoreno\Silex\Provider\PagerfantaServiceProvider());
//
//$app['pagerfanta.view.options'] = array(
//  'next_message'  => ' next &raquo;',
//  'previous_message'  => '&laquo; previous ',
//);


//$app['twig']->addExtension(new FranMoreno\Silex\Twig\PagerfantaExtension($app));