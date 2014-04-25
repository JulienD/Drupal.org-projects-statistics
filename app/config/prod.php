<?php

// Timezone.
date_default_timezone_set('Europe/Paris');

// Cache
$app['cache.path'] = __DIR__ . '/../cache';

// Twig cache
$app['twig.options.cache'] = $app['cache.path'] . '/twig';
$app['twig.path'] = array(__DIR__ . '/views');


// Emails.
$app['admin_email'] = 'noreply@example.com';
$app['site_email'] = 'noreply@example.com';

// Doctrine (db)
/*$app['db.options'] = array(
  'driver'    => 'pdo_mysql',
  'host'      => 'localhost',
  'dbname'    => 'drupal_projects',
  'user'      => 'root',
  'password'  => 'password',
  'charset'   => 'utf8',
);*/
