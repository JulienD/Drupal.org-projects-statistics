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
$app['db.options'] = array(
  'driver'    => 'pdo_mysql',
  'host'      => 'tools2.c--g.net',
  'dbname'    => 'drupal_mod_jd',
  'user'      => 'drupal_mod_jd',
  'password'  => 'px1vDXWF4C0nGj9dWJds',
  'charset'   => 'utf8',
);
