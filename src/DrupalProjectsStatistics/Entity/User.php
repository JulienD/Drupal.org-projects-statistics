<?php

namespace DrupalProjectsStatistics\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
  /**
   * User id.
   *
   * @var integer
   */
  protected $id;

  /**
   * Username.
   *
   * @var string
   */
  protected $username;

  /**
   * Salt.
   *
   * @var string
   */
  protected $salt;

  /**
   * Password.
   *
   * @var integer
   */
  protected $password;

  /**
   * Email.
   *
   * @var string
   */
  protected $mail;

  /**
   * Role.
   *
   * ROLE_USER or ROLE_ADMIN.
   *
   * @var string
   */
  protected $role;

  /**
   * The filename of the main artist image.
   *
   * @var string
   */
  protected $image;

  /**
   * When the artist entity was created.
   *
   * @var DateTime
   */
  protected $createdAt;

  /**
   * The temporary uploaded file.
   *
   * $this->image stores the filename after the file gets moved to "images/".
   *
   * @var \Symfony\Component\HttpFoundation\File\UploadedFile
   */
  protected $file;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  /**
   * @inheritDoc
   */
  public function getUsername()
  {
    return $this->username;
  }

  public function setUsername($username)
  {
    $this->username = $username;
  }

  /**
   * @inheritDoc
   */
  public function getSalt()
  {
    return $this->salt;
  }

  public function setSalt($salt)
  {
    $this->salt = $salt;
  }

  /**
   * @inheritDoc
   */
  public function getPassword()
  {
    return $this->password;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function getMail()
  {
    return $this->mail;
  }

  public function setMail($mail)
  {
    $this->mail = $mail;
  }

  public function getCreatedAt()
  {
    return $this->createdAt;
  }

  public function setCreatedAt(\DateTime $createdAt)
  {
    $this->createdAt = $createdAt;
  }

  /**
   * @inheritDoc
   */
  public function getRoles()
  {
    return array($this->getRole());
  }

  public function getRole()
  {
    return $this->role;
  }

  public function setRole($role) {
    $this->role = $role;
  }

  /**
   * @inheritDoc
   */
  public function eraseCredentials()
  {
  }

}