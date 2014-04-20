<?php

namespace DrupalProjectsStatistics\Repository;

use Doctrine\DBAL\Connection;
use DrupalProjectsStatistics\Entity\Statistic;

/**
 * Project Repository
 */

Class StatisticRepository {

  /**
   * @var \Doctrine\DBAL\Connection
   */
  protected $db;

  public function __construct(Connection $db)
  {
    $this->db = $db;
  }

  /**
   * Returns a project matching the supplied id.
   *
   * @param integer $id
   *
   * @return \DrupalProjectsStatistics\Entity\Statistic|false An entity object if found, false otherwise.
   */
  public function find($id)
  {
    $statisticData = $this->db->fetchAssoc('SELECT * FROM statistics WHERE id = ? ORDER BY created DESC LIMIT 0, 1', array($id));
    return $statisticData ? $this->buildStatistic($statisticData) : FALSE;
  }

  /**
   * Returns a collection of projects, sorted by name.
   *
   * @param integer $limit
   * The number of projects to return.
   * @param integer $offset
   * The number of projects to skip.
   * @param array $orderBy
   * Optionally, the order by info, in the $column => $direction format.
   *
   * @return array A collection of projects, keyed by project id.
   */
  public function findAll($ids = array(), $conditions = array(), $limit= 20, $offset = 0, $orderBy = array())
  {
    // Provide a default orderBy.
    if (!$orderBy) {
      $orderBy = array('created' => 'ASC');
    }

    $queryBuilder = $this->db->createQueryBuilder();
    $queryBuilder
      ->select('s.*')
      ->from('statistics', 's');


    if ($ids) {
      $queryBuilder
        ->where('s.id IN (' . implode(',', $ids) . ')');
    }

    if (!empty($conditions)) {
      foreach($conditions as $key => $value) {
        $queryBuilder
          ->andWhere("{$key} = {$value}");

      }
    }

    $queryBuilder
      ->setMaxResults($limit)
      ->setFirstResult($offset)
      ->orderBy('s.' . key($orderBy), current($orderBy));

    $statement = $queryBuilder->execute();
    $statisticsData = $statement->fetchAll();

    $statistics = array();
    foreach ($statisticsData  as $statisticData) {
      $statisticId = $statisticData['id'];
      $statistics[$statisticId] = $this->buildStatistic($statisticData);
    }
    return $statistics;
  }

  /**
   * Returns a collection of projects, sorted by name.
   *
   * @param integer $limit
   * The number of projects to return.
   * @param integer $offset
   * The number of projects to skip.
   * @param array $orderBy
   * Optionally, the order by info, in the $column => $direction format.
   *
   * @return array A collection of projects, keyed by project id.
   */
  public function findAllByProjectId($project_ids = array(), $conditions = array(), $limit= 20, $offset = 0, $orderBy = array())
  {
    // Provide a default orderBy.
    if (!$orderBy) {
      $orderBy = array('created' => 'ASC');
    }

    $queryBuilder = $this->db->createQueryBuilder();
    $queryBuilder
      ->select('s.*')
      ->from('statistics', 's')
      ->setMaxResults($limit)
      ->setFirstResult($offset)
      ->orderBy('s.' . key($orderBy), current($orderBy));

    if ($project_ids) {
      $queryBuilder
        ->where('s.project_id IN (' . implode(',', $project_ids) . ')');
    }

    $parameters = array();
    foreach ($conditions as $key => $value) {
      $parameters[':' . $key] = $value;
      $where = $queryBuilder->expr()->eq('s.' . $key, ':' . $key);
      $queryBuilder->andWhere($where);
    }

    $queryBuilder->setParameters($parameters);

    $statement = $queryBuilder->execute();
    $statisticsData = $statement->fetchAll();

    $statistics = array();
    foreach ($statisticsData  as $statisticData) {
      $statisticId = $statisticData['project_id'];
      $statistics[$statisticId] = $this->buildStatistic($statisticData);
    }
    return $statistics;
  }

  /**
   * Instantiates a statistic entity and sets its properties using db data.
   *
   * @param array $statisticData
   * The array of db data.
   *
   * @return \DrupalProjectsStatistics\Entity\Statistic
   *
   */
  protected function buildStatistic($statisticData)
  {
    $statistic = new Statistic();
    $statistic->setId($statisticData['id']);
    $statistic->setProjectId($statisticData['project_id']);
    $statistic->setOpenedBugs($statisticData['opened_bugs']);
    $statistic->setOpenedIssues($statisticData['opened_issues']);
    $statistic->setTotalBugs($statisticData['total_bugs']);
    $statistic->setTotalIssues($statisticData['total_issues']);
    $statistic->setDownloads($statisticData['downloads']);
    $statistic->setInstalls($statisticData['installs']);
    $statistic->setCreated($statisticData['created']);
    return $statistic;
  }
}