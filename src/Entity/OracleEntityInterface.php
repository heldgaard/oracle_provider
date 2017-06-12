<?php

namespace Drupal\oracle_provider\Entity;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides an interface for defining Oracle Connection Entity entities.
 */
interface OracleEntityInterface extends ConfigEntityInterface {

  public function getUser();
  public function setUser($user);

  public function getPassword();

  public function getSID();
  public function setSID($sid);

  public function getType();
}
