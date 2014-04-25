<?php

// Include the prod configuration
require __DIR__ . '/prod.php';

// Enable the debug mode
$app['debug'] = true;

// Doctrine (db)
/*$app['db.options'] = array(
  'driver'    => 'pdo_mysql',
  'host'      => 'localhost',
  'dbname'    => 'drupal_projects',
  'user'      => 'root',
  'password'  => 'password',
  'charset'   => 'utf8',
);*/

$app['dbs.options'] = array (
  'mysql_read' => array(
    'driver'    => 'pdo_mysql',
    'host'      => 'localhost',
    'dbname'    => 'drupal_projects',
    'user'      => 'root',
    'password'  => 'password',
    'charset'   => 'utf8',
  ),
  'mysql_write' => array(
    'driver'    => 'pdo_mysql',
    'host'      => 'localhost',
    'dbname'    => 'test',
    'user'      => 'root',
    'password'  => 'password',
    'charset'   => 'utf8',
  ),
);