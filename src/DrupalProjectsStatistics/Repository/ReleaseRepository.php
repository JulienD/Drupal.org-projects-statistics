<?php

namespace DrupalProjectsStatistics\Repository;

use Doctrine\DBAL\Connection;
use DrupalProjectsStatistics\Entity\Release;

/**
 * Project Repository
 */

Class ReleaseRepository {

  /**
   * @var \Doctrine\DBAL\Connection
   */
  protected $db;

  public function __construct(Connection $db)
  {
    $this->db = $db;
  }

  /**
   * Returns a Release matching the supplied id.
   *
   * @param integer $id
   *
   * @return \DrupalProjectsStatistics\Entity\Release|false An entity object if found, false otherwise.
   */
  public function find($id)
  {
    $statisticData = $this->db->fetchAssoc('SELECT * FROM releases WHERE id = ? ORDER BY date DESC LIMIT 0, 1', array($id));
    return $statisticData ? $this->buildStatistic($statisticData) : FALSE;
  }

  /**
   * Returns a collection of Release, sorted by name.
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
      $orderBy = array('date' => 'ASC');
    }

    $queryBuilder = $this->db->createQueryBuilder();
    $queryBuilder
      ->select('r.*')
      ->from('releases', 'r');

    if (!empty($conditions)) {
      foreach($conditions as $key => $value) {
        $queryBuilder
          ->where('r.' . $key . ' = ' . $value);
      }
    }

    $queryBuilder
      ->setMaxResults($limit)
      ->setFirstResult($offset)
      ->orderBy('r.' . key($orderBy), current($orderBy));

    $statement = $queryBuilder->execute();
    $releasesData = $statement->fetchAll();

    $releases = array();
    foreach ($releasesData as $releaseData) {
      $releaseId = $releaseData['id'];
      $releases[$releaseId] = $this->buildRelease($releaseData);
    }
    return $releases;
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
  protected function buildRelease($releaseData)
  {
    $release = new Release();
    $release->setId($releaseData['id']);
    $release->setProjectId($releaseData['project_id']);
    $release->setName($releaseData['name']);
    $release->setVersion($releaseData['version']);
    $release->setTag($releaseData['tag']);
    $release->setDate($releaseData['date']);
    $release->setVersionMajor($releaseData['version_major']);
    $release->setVersionPatch($releaseData['version_patch']);
    $release->setVersionExtra($releaseData['version_extra']);
    return $release;
  }
}