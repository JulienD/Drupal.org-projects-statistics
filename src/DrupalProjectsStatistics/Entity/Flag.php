<?php

namespace DrupalProjectsStatistics\Entity;

class Flag {
  /**
   * Flag id.
   *
   * @var integer
   */
  protected $id;

  /**
   * ID of the flag type.
   *
   * @var string
   */
  protected $flagTypeId;

  /**
   * Flagged entity id.
   *
   * @var integer
   */
  protected $entityId;

  /**
   * Flagged entity type.
   *
   * @var string
   */
  protected $entityType;

  /**
   * When the flagged entity was created.
   *
   * @var DateTime
   */
  protected $created;


  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getFlagTypeId()
  {
    return $this->flagTypeId;
  }

  public function setFlagTypeId($flag_type_id)
  {
    $this->flagTypeId = $flag_type_id;
  }

  public function getEntityId()
  {
    return $this->entityId;
  }

  public function setEntityId($entityId)
  {
    $this->entityId = $entityId;
  }

  public function getEntityType()
  {
    return $this->entityType;
  }

  public function setEntityType($entityType)
  {
    $this->entityType = $entityType;
  }

  public function getCreated()
  {
    return $this->created;
  }

  public function setCreated(\DateTime $created)
  {
    $this->created = $created;
  }

}