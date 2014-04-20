<?php

namespace DrupalProjectsStatistics\Entity;


class Project
{
  /**
   * Project id.
   *
   * @var integer
   */
  protected $id;

  /**
   * Project name.
   *
   * @var string
   */
  protected $name;

  /**
   * Project title.
   *
   * @var string
   */
  protected $title;

  /**
   * Project url.
   *
   * @var string
   */
  protected $url;

  /**
   * Project git url.
   *
   * @var string
   */
  protected $gitUrl;

  /**
   * Project last commit.
   *
   * @var string
   */
  protected $lastCommit;

  /**
   * Project type.
   *
   * @var string
   */
  protected $type;

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

  /**
   * When the project entity was updated.
   *
   * @var DateTime
   */
  protected $updated;


  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    return $this->id = $id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function setTitle($title)
  {
    $this->title = $title;
  }

  public function getUrl()
  {
    return $this->url;
  }

  public function setUrl($url)
  {
    $this->url = $url;
  }

  public function getGitUrl()
  {
    return $this->gitUrl;
  }

  public function setGitUrl($gitUrl)
  {
    $this->gitUrl = $gitUrl;
  }

  public function getLastCommit()
  {
    return $this->lastCommit;
  }

  public function setLastCommit($lastCommit)
  {
    $this->lastCommit = $lastCommit;
  }

  public function getType()
  {
    return $this->type;
  }

  public function setType($type)
  {
    $this->type = $type;
  }

  public function getCreated()
  {
    return $this->created;
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

  public function setInstall($installs)
  {
    $this->installs = $installs;
  }

  public function getInstall()
  {
    return $this->installs;
  }

  public function setCreated($created)
  {
    $this->created = $created;
  }

  public function getUpdated()
  {
    return $this->updated;
  }

  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
}