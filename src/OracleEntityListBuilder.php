<?php

namespace Drupal\oracle_provider;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;

/**
 * Provides a listing of Oracle Connection Entity entities.
 */
class OracleEntityListBuilder extends ConfigEntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['label'] = $this->t('Oracle Connection');
    $header['id'] = $this->t('Machine name');
    $header['user'] = $this->t('Username');
    $header['password'] = $this->t('Password');
    $header['sid'] = $this->t('SID');
    $header['type'] = $this->t('Type');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    $row['label'] = $entity->label();
    $row['id'] = $entity->id();
    $row['name'] = $entity->getUser();
    $row['password'] = $entity->getPassword();
    $row['sid'] = $entity->getSid();
    $row['type'] = $entity->getType();
    // You probably want a few more properties here...
    return $row + parent::buildRow($entity);
  }

}
