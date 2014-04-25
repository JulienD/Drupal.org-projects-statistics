<?php

namespace DrupalProjectsStatistics\Entity;


class FlagType {
  /**
   * Flag id.
   *
   * @var integer
   */
  protected $id;

  /**
   * Type of the flag.
   *
   * @var string
   */
  protected $type;

  /**
   * Title of the flag.
   *
   * @var string
   */
  protected $title;

  /**
   * User.
   *
   *  @var \DrupalProjectsStatistics\Entity\User
   */
  protected $user;

  /**
   * When the flag was created.
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

  public function getType()
  {
    return $this->type;
  }

  public function setType($type)
  {
    $this->type = $type;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function setTitle($title)
  {
    $this->title = $title;
  }

  public function getUser()
  {
    return $this->user;
  }

  public function setUser($user)
  {
    $this->user = $user;
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