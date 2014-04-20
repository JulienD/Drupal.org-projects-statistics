<?php

namespace DrupalProjectsStatistics\Repository;

use Doctrine\DBAL\Connection;
use DrupalProjectsStatistics\Entity\Flag;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Project Repository
 */
Class FlagRepository implements RepositoryInterface
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
   * Saves the flag to the database.
   *
   * @param \DrupalProjectsStatistics\Entity\Flag $flag
   */
  public function save($flag) {
    $flagData = array(
      'flag_type' => $flag->getType(),
      'entity_type' => $flag->getEntityType(),
      'entity_id' => $flag->getEntityId(),
    );

    if ($flag->getId()) {
      // Updates the project.
      $this->db->update('projects', $flagData, array('flag_id' => $flag->getId()));
    }
    else {

      $flagData['created'] = time();

      // Saves the project.
      $this->db->insert('flags', $flagData);
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
  public function delete($flag)
  {
    return $this->db->delete('flags', array('flag_id' => $flag->getId()));
  }

  /**
   * Returns the total number of projects.
   *
   * @return integer The total number of projects.
   */
  public function getCount() {
    return $this->getFlagCount();
  }

  /**
   * Returns the total number of projects given condition.
   *
   * @param array $conditions
   *
   * @return integer The total number of projects.
   */
  public function getFlagCount(array $conditions = array()) {

    $queryBuilder = $this->db->createQueryBuilder();
    $queryBuilder
      ->select('COUNT(f.flag_id) AS count')
      ->from('flags', 'f');

    $parameters = array();
    foreach ($conditions as $key => $value) {
      $parameters[':' . $key] = $value;
      $where = $queryBuilder->expr()->eq('f.' . $key, ':' . $key);
      $queryBuilder->andWhere($where);
    }

    $queryBuilder->setParameters($parameters);
    $statement = $queryBuilder->execute();
    $flagsData = $statement->fetch();

    return $flagsData['count'];
  }

  /**
   * Returns a flag matching the supplied id.
   *
   * @param integer $id
   *
   * @return \DrupalProjectsStatistics\Entity\Flag $id
   */
  public function find($id)
  {
    $flagData = $this->db->fetchAssoc('SELECT * FROM flag WHERE flag_id = ?', array($id));
    return $flagData ? $this->buildflag($flagData) : FALSE;
  }


  public function flag($project, $type)   {

    if ($project && $type) {
      $flag = $this->getFlags(array('entity_id' => $project->getId(), 'flag_type' => $type), 1, 0);

      if ($flag) {
        // Deletes the flag associated to this entity id and type.
        return $this->delete(reset($flag));
      }
      else {
        $flag = new Flag();
        $flag->setType($type);
        $flag->setEntityId($project->getId());
        $flag->setEntityType('project');
        // Creates the flag for this entity id and type.
        $this->save($flag);
        print_r($flag); die();
      }
    }
  }


  /**
   * Returns a collection of entities.
   *
   * @param integer $limit
   * The number of entities to return.
   * @param integer $offset
   * The number of entities to skip.
   * @param array $orderBy
   * Optionally, the order by info, in the $column => $direction format.
   *
   * @return array A collection of entity objects.
   */
  public function findAll($limit, $offset = 0, $orderBy = array()) {
    return $this->getFlags(array(), $limit, $offset, $orderBy);
  }


  /**
   * Returns a collection of flags for the given conditions.
   *
   * @param integer $limit
   * The number of likes to return.
   * @param integer $offset
   * The number of likes to skip.
   * @param $orderBy
   * Optionally, the order by info, in the $column => $direction format.
   *
   * @return array A collection of likes, keyed by like id.
   */
  public function getFlags(array $conditions, $limit, $offset, $orderBy = array())
  {
    // Provide a default orderBy.
    if (!$orderBy) {
      $orderBy = array('created' => 'DESC');
    }

    $queryBuilder = $this->db->createQueryBuilder();
    $queryBuilder
      ->select('f.*')
      ->from('flags', 'f')
      ->setMaxResults($limit)
      ->setFirstResult($offset)
      ->orderBy('f.' . key($orderBy), current($orderBy));

    $parameters = array();
    foreach ($conditions as $key => $value) {
      $parameters[':' . $key] = $value;
      $where = $queryBuilder->expr()->eq('f.' . $key, ':' . $key);
      $queryBuilder->andWhere($where);
    }

    $queryBuilder->setParameters($parameters);
    $statement = $queryBuilder->execute();
    $flagsData = $statement->fetchAll();

    $flags = array();
    foreach ($flagsData as $flagData) {
      $flagId = $flagData['flag_id'];
      $flags[$flagId] = $this->buildFlag($flagData);
    }

    return $flags;
  }

  /**
   * Instantiates a flag entity and sets its properties using db data.
   *
   * @param array $flagData
   *   The array of db data.
   *
   * @return \DrupalProjectsStatistics\Entity\Flag
   */
  protected function buildFlag($flagData)
  {
    $flag = new Flag();
    $flag->setId($flagData['flag_id']);
    $flag->setType($flagData['flag_type']);
    $flag->setEntityId($flagData['entity_id']);
    $flag->setEntityType($flagData['entity_type']);
    $createdAt = new \DateTime('@' . $flagData['created']);
    $flag->setCreated($createdAt);
    return $flag;
  }
}


/**
 * Flag Type Repository
 */
Class FlagTypeRepository implements RepositoryInterface
{

  /**
   * @var \Doctrine\DBAL\Connection
   */
  protected $db;

  /**
   * @var \DrupalProjectsStatistics\Repository\UserRepository
   */
  protected $userRepository;

  public function __construct(Connection $db, $userRepository)
  {
    $this->db = $db;
    $this->userRepository = $userRepository;
  }


  /**
   * Saves the flag to the database.
   *
   * @param \DrupalProjectsStatistics\Entity\Flag $flag
   */
  public function save($flag_type) {
    $flagTypeData = array(
      'flag_type_id' => $flag_type->getId(),
      'type' => $flag_type->getType(),
      'title' => $flag_type->getTitle(),
      'uid' => $flag_type->getUser(),
    );

    if ($flag_type->getId()) {
      // Updates the project.
      $this->db->update('flag_type', $flagTypeData, array('flag_type_id' => $flag_type->getId()));
    }
    else {
      $flagTypeData['created'] = time();
      // Saves the project.
      $this->db->insert('flag_type', $flagTypeData);
      // Get the id of the newly created artist and set it on the entity.
      $id = $this->db->lastInsertId();
      $flag_type->setId($id);
    }
  }

  /**
   * Deletes the project.
   *
   * @param \DrupalProjectsStatistics\Entity\Flag_type $flag_type
   */
  public function delete($flag_type)
  {
    return $this->db->delete('flag_type', array('flag_type_id' => $flag_type->getId()));
  }

  /**
   * Returns the total number of flag type.
   *
   * @return integer The total number of flag type.
   */
  public function getCount() {
    return $this->db->fetchColumn('SELECT COUNT(flag_type_id) FROM flag_type');
  }

  /**
   * Returns a flag matching the supplied id.
   *
   * @param integer $id
   *
   * @return \DrupalProjectsStatistics\Entity\Flag $id
   */
  public function find($id)
  {
    $flagTypeData = $this->db->fetchAssoc('SELECT * FROM flag_type WHERE flag_type_id = ?', array($id));
    return $flagTypeData ? $this->buildFlagTyep($flagTypeData) : FALSE;
  }

  /**
   * Returns a collection of entities.
   *
   * @param integer $limit
   * The number of entities to return.
   * @param integer $offset
   * The number of entities to skip.
   * @param array $orderBy
   * Optionally, the order by info, in the $column => $direction format.
   *
   * @return array A collection of entity objects.
   */
  public function findAll($limit, $offset = 0, $orderBy = array()) {
    // Provide a default orderBy.
    if (!$orderBy) {
      $orderBy = array('created' => 'ASC');
    }

    $queryBuilder = $this->db->createQueryBuilder();
    $queryBuilder
      ->select('ft.*')
      ->from('flag_type', 'ft')
      ->setMaxResults($limit)
      ->setFirstResult($offset)
      ->orderBy('ft.' . key($orderBy), current($orderBy));

    $statement = $queryBuilder->execute();
    $flagTypesData = $statement->fetchAll();

    $flagTypes = array();
    foreach ($flagTypesData as $flagTypeData) {
      $flagTypeId = $flagTypeData['id'];
      $flagTypes[$flagTypeId] = $this->buildProject($flagTypeData);
    }
    return $flagTypes;
  }

  /**
   * Instantiates a flag type entity and sets its properties using db data.
   *
   * @param array $flagTypeData
   *   The array of db data.
   *
   * @return \DrupalProjectsStatistics\Entity\FlagType
   */
  protected function buildFlag($flagTypeData)
  {
    $flagType = new FlagType();
    $flagType->setId($flagTypeData['flag_type_id']);
    $flagType->setType($flagTypeData['type']);
    $flagType->setTitle($flagTypeData['title']);
    $flagType->setUser($flagTypeData['user']);

    $user = $this->userRepository->find($flagTypeData['user_id']);


    $createdAt = new \DateTime('@' . $flagTypeData['created']);
    $flagType->setCreated($createdAt);
    return $flagType;
  }
}