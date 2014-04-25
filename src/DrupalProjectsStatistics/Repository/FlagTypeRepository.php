<?php

namespace DrupalProjectsStatistics\Repository;

use Doctrine\DBAL\Connection;
use DrupalProjectsStatistics\Entity\FlagType;
use Symfony\Component\Validator\Constraints\DateTime;

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
   * @param \DrupalProjectsStatistics\Entity\FlagType $flag
   */
  public function save($flag_type_type) {
    $flagTypeData = array(
      'type' => $flag_type_type->getType(),
      'title' => $flag_type_type->getTitle(),
      'user_id' => $flag_type_type->getUser(),
    );

    if ($flag_type_type->getId()) {
      // Updates the project.
      $this->db->update('flag_type', $flagTypeData, array('flag_type_id' => $flag_type_type->getId()));
    }
    else {
      $flagTypeData['created'] = time();
      // Saves the project.
      $this->db->insert('flag_type', $flagTypeData);
      // Get the id of the newly created artist and set it on the entity.
      $id = $this->db->lastInsertId();
      $flag_type_type->setId($id);
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
    return $flagTypeData ? $this->buildFlagType($flagTypeData) : FALSE;
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
      $flagTypes[$flagTypeId] = $this->buildFlagType($flagTypeData);
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
  //protected function buildFlag($flagTypeData)
  public function buildFlagType($flagTypeData)
  {
    $flagType = new FlagType();
    $flagType->setId($flagTypeData['flag_type_id']);
    $flagType->setType($flagTypeData['type']);
    $flagType->setTitle($flagTypeData['title']);
    $flagType->setUser($flagTypeData['user_id']);

    $user = $this->userRepository->find($flagTypeData['user_id']);


    //$createdAt = new \DateTime('@' . $flagTypeData['created']);
    //$flagType->setCreated($createdAt);
    return $flagType;
  }
}