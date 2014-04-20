<?php

namespace DrupalProjectsStatistics\Repository;

use Doctrine\DBAL\Connection;
use DrupalProjectsStatistics\Entity\Project;

/**
 * Project Commerce Guys Repository
 */

Class ProjectCommerceGuysRepository extends ProjectRepository {
  /**
   * Returns the total number of projects.
   *
   * @return integer The total number of projects.
   */
  public function getCount() {
    return 12; //return $this->db->fetchColumn('SELECT COUNT(id) FROM projects WHERE commerce_guys = TRUE');
  }


  /**
   * Returns a collection of projects, sorted by name.
   *
   * @param $ids
   * An array of projects IDs, or FALSE to load all projects.
   * @param array $conditions
   * An associative array of conditions on the table, where the keys are the
   * database fields and the values are the values those fields must have.
   * @param integer $limit
   * The number of projects to return.
   * @param integer $offset
   * The number of projects to skip.
   * @param array $orderBy
   * Optionally, the order by info, in the $column => $direction format.
   *
   * @return array A collection of projects, keyed by project id.
   */
  public function findAll($ids = array(), $conditions = array(), $limit = 20, $offset = 0, $orderBy = array()) {

    $conditions += array('commerce_guys' => TRUE);
    return parent::findAll($ids, $conditions, $limit, $offset, $orderBy);
  }

}