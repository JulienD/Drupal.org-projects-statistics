<?php

namespace DrupalProjectsStatistics\Entity;


class Statistic
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
   * Project opened issues.
   *
   * @var string
   */
  protected $openedIssues;

  /**
   * Project total issues.
   *
   * @var string
   */
  protected $totalIssues;

  /**
   * Project opened bugs.
   *
   * @var string
   */
  protected $openedBugs;

  /**
   * Project total bugs.
   *
   * @var string
   */
  protected $totalBugs;

  /**
   * Project downloads.
   *
   * @var string
   */
  protected $downloads;

  /**
   * Project installs.
   *
   * @var string
   */
  protected $installs;

  /**
   * When the project entity was created.
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

  public function setOpenedIssues($openedIssues)
  {
    $this->openedIssues = $openedIssues;
  }

  public function getOpenedIssues()
  {
    return $this->openedIssues;
  }

  public function setTotalIssues($totalIssues)
  {
    $this->totalIssues = $totalIssues;
  }

  public function getTotalIssues()
  {
    return $this->totalIssues;
  }

  public function setOpenedBugs($openedBugs)
  {
    $this->openedBugs = $openedBugs;
  }

  public function getOpenedBugs()
  {
    return $this->openedBugs;
  }

  public function setTotalBugs($totalBugs)
  {
    $this->totalBugs = $totalBugs;
  }

  public function getTotalBugs()
  {
    return $this->totalBugs;
  }

  public function setDownloads($downloads)
  {
    $this->downloads = $downloads;
  }

  public function getDownloads()
  {
    return $this->downloads;
  }

  public function setInstalls($installs)
  {
    $this->installs = $installs;
  }

  public function getInstalls()
  {
    return $this->installs;
  }

  public function setCreated($created)
  {
    $this->created = $created;
  }

  public function getCreated()
  {
    return $this->created;
  }

}