<?php

namespace DrupalProjectsStatistics\Entity;


class Release
{
  /**
   * Statistic id.
   *
   * @var integer
   */
  protected $id;

  /**
   * Project id.
   *
   * @var integer
   */
  protected $projectId;

  /**
   * Release name.
   *
   * @var string
   */
  protected $name;

  /**
   * Release version.
   *
   * @var string
   */
  protected $version;

  /**
   * Release tag.
   *
   * @var string
   */
  protected $tag;

  /**
   * Release date.
   *
   * @var string
   */
  protected $date;

  /**
   * Release version major.
   *
   * @var string
   */
  protected $versionMajor;

  /**
   * Release version patch.
   *
   * @var string
   */
  protected $versionPatch;

  /**
   * Release version extra.
   *
   * @var string
   */
  protected $versionExtra;


  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    return $this->id = $id;
  }

  public function getProjectId()
  {
    return $this->projectId;
  }

  public function setProjectId($projectID)
  {
    $this->projectId = $projectID;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getVersion()
  {
    return $this->version;
  }

  public function setVersion($version)
  {
    $this->version = $version;
  }

  public function getTag()
  {
    return $this->tag;
  }

  public function setTag($tag)
  {
    $this->tag = $tag;
  }

  public function getDate()
  {
    return $this->date;
  }

  public function setDate($date)
  {
    $this->date = $date;
  }

  public function getVersionMajor()
  {
    return $this->versionMajor;
  }

  public function setVersionMajor($versionMajor)
  {
    $this->versionMajor = $versionMajor;
  }

  public function getVersionPatch()
  {
    return $this->versionPatch;
  }

  public function setVersionPatch($versionPatch)
  {
    $this->versionPatch = $versionPatch;
  }

  public function getVersionExtra()
  {
    return $this->versionExtra;
  }

  public function setVersionExtra($versionExtra)
  {
    $this->versionExtra = $versionExtra;
  }

}