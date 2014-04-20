<?php

namespace DrupalProjectsStatistics\Repository;

use Doctrine\DBAL\Connection;
use DrupalProjectsStatistics\Entity\Project;
use DrupalProjectsStatistics\Entity\Statistic;

/**
 * Project Repository
 */

Class ProjectRepository implements RepositoryInterface
{

  /**
   * @var \Doctrine\DBAL\Connection
   */
  protected $db;

  public function __construct(Connection $db)
  {
    $this->db = $db;
  }

  /**
   * Saves the project to the database.
   *
   * @param \DrupalProjectsStatistics\Entity\Project $flag
   */
  public function save($flag)
  {
    $projectData = array(
      'name'         => $flag->getName(),
      'title'        => $flag->getTitle(),
      'url'          => $flag->getUrl(),
      'gitUrl'       => $flag->getGitUrl(),
      'lastCommit'   => $flag->getLastCommit(),
      'type'         => $flag->getType(),
      'created'      => $flag->getCreated(),
      'updated'      => $flag->getUpdated(),
    );

    if ($flag->getId()) {
      // Updates the project.
      $this->db->update('projects', $projectData, array('id' => $flag->getId()));
    }
    else {
      // Saves the project.
      $this->db->insert('projects', $projectData);
      // Get the id of the newly created artist and set it on the entity.
      $id = $this->db->lastInsertId();
      $flag->setId($id);
    }
  }

  /**
   * Deletes the project.
   *
   * @param \DrupalProjectsStatistics\Entity\Project $project
   */
  public function delete($project)
  {
    return $this->db->delete('projects', array('id' => $project->getId()));
  }

  /**
   * Returns the total number of projects.
   *
   * @return integer The total number of projects.
   */
  public function getCount() {
    return $this->db->fetchColumn('SELECT COUNT(id) FROM projects');
  }

  /**
   * Returns a project matching the supplied id.
   *
   * @param integer $id
   *
   * @return \DrupalProjectsStatistics\Entity\Project|false An entity object if found, false otherwise.
   */
  public function find($id)
  {
    $projectData = $this->db->fetchAssoc('SELECT * FROM projects WHERE id = ?', array($id));
    return $projectData ? $this->buildProject($projectData) : FALSE;
  }

  /**
   * Returns a project matching the supplied name.
   *
   * @param string $name
   *
   * @return \DrupalProjectsStatistics\Entity\Project|false An entity object if found, false otherwise.
   */
  public function findByName($name)
  {
    $projectData = $this->db->fetchAssoc('SELECT * FROM projects WHERE name = ?', array($name));
    return $projectData ? $this->buildProject($projectData) : FALSE;
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


    // Provide a default orderBy.
    if (!$orderBy) {
      $orderBy = array('name' => 'ASC');
    }

    $queryBuilder = $this->db->createQueryBuilder();
    $queryBuilder
      ->select('p.*')
      ->from('projects', 'p')
      ->setMaxResults($limit)
      ->setFirstResult($offset)
      ->orderBy('p.' . key($orderBy), current($orderBy));

    if ($ids) {
      $queryBuilder
        ->where('p.id IN (' . implode(',', $ids) . ')');
    }

    $parameters = array();
    foreach ($conditions as $key => $value) {
      $parameters[':' . $key] = $value;
      $where = $queryBuilder->expr()->eq('p.' . $key, ':' . $key);
      $queryBuilder->andWhere($where);
    }

    $queryBuilder->setParameters($parameters);

    $statement = $queryBuilder->execute();
    $projectsData = $statement->fetchAll();

    $projects = array();
    foreach ($projectsData as $projectData) {
      $projectId = $projectData['id'];
      $projects[$projectId] = $this->buildProject($projectData);
    }
    return $projects;
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
  public function findAllWithStatistics($limit, $offset = 0, $orderBy = array())
  {
    // Provide a default orderBy.
    if (!$orderBy) {
      $orderBy = array('p.title' => 'ASC');
    }

    $sql= "SELECT p.*, s1.*
          FROM statistics AS s1
          LEFT JOIN statistics AS s2 ON ( s1.project_id = s2.project_id
              AND s1.created > s2.created )
          INNER JOIN projects p ON p.id = s1.project_id
          GROUP by p.name
          ORDER BY %s %s
          LIMIT %d, %d";

    // TODO: Find a better way to give values to the query.
    $sql = sprintf($sql, key($orderBy), current($orderBy), $offset, $limit);

    $projectsData = $this->db->fetchAll($sql);

    $projects = array();
    foreach ($projectsData as $projectData) {
      $projectId = $projectData['id'];
      $projects[$projectId] = $this->buildProject($projectData);
    }

    return $projects;
  }

  /**
   * Returns a collection of projects, sorted by name.
   *
   * @param string $q
   * @param integer $limit
   * The number of projects to return.
   * @param integer $offset
   * The number of projects to skip.
   * @param array $orderBy
   * Optionally, the order by info, in the $column => $direction format.
   *
   * @return array A collection of projects, keyed by project id.
   */
  public function searchProjects($q, $limit = 20, $offset = 0, $orderBy = array())
  {
    // Provide a default orderBy.
    if (!$orderBy) {
      $orderBy = array('name' => 'ASC');
    }

    $queryBuilder = $this->db->createQueryBuilder();
    $queryBuilder
      ->select('p.*')
      ->from('projects', 'p')
      ->where("p.name LIKE :name OR p.title LIKE :title ")
      ->setParameter('name', "%$q%")
      ->setParameter('title', "%$q%")
      ->setMaxResults($limit)
      ->setFirstResult($offset)
      ->orderBy('p.' . key($orderBy), current($orderBy));
    $statement = $queryBuilder->execute();
    $projectsData = $statement->fetchAll();


    $queryBuilder = $this->db->createQueryBuilder();
    $queryBuilder
      ->select('COUNT(id) AS count')
      ->from('projects', 'p')
      ->where("p.name LIKE :name OR p.title LIKE :title ")
      ->setParameter('name', "%$q%")
      ->setParameter('title', "%$q%");

    $count = $queryBuilder->execute()->fetch();

    $projects = array();
    foreach ($projectsData as $projectData) {
      $projectId = $projectData['id'];
      $projects[$projectId] = $this->buildProject($projectData);
    }


    return array(
      'count' => $count['count'],
      'results' => $projects,
    );
  }

  /**
   * Instantiates a project entity and sets its properties using db data.
   *
   * @param array $projectData
   * The array of db data.
   *
   * @return \DrupalProjectsStatistics\Entity\Project
   *
   */
  protected function buildProject($projectData)
  {
    $project = new Project();
    $project->setId($projectData['id']);
    $project->setName($projectData['name']);
    $project->setTitle($projectData['title']);
    $project->setUrl($projectData['url']);
    $project->setGitUrl($projectData['git_url']);
    $project->setLastCommit($this->elapsedTime($projectData['last_commit']));
    $project->setType($projectData['type']);
    $project->setCreated($projectData['created']);
    $project->setUpdated($projectData['updated']);
    return $project;
  }


  private function elapsedTime($time) {

    $time = strtotime($time);

    $time = time() - $time; // to get the time since that moment

    $tokens = array (
      31536000 => 'year',
      2592000 => 'month',
      604800 => 'week',
      86400 => 'day',
      3600 => 'hour',
      60 => 'minute',
      1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
      if ($time < $unit) continue;
      $numberOfUnits = floor($time / $unit);
      return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');

    }
  }

  public function flag($project, $type)   {

    //$this->db->update('projects', array('id' => $project->getId(), $type => $project->getId()));

    //return $projectData ? $this->buildProject($projectData) : FALSE;
  }
}