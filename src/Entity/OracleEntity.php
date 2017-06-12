<?php

namespace Drupal\oracle_provider\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Oracle Connection entity.
 *
 * @ConfigEntityType(
 *   id = "oracle_conn",
 *   label = @Translation("Oracle Connections"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\oracle_provider\OracleEntityListBuilder",
 *     "form" = {
 *       "add" = "Drupal\oracle_provider\Form\OracleEntityForm",
 *       "edit" = "Drupal\oracle_provider\Form\OracleEntityForm",
 *       "delete" = "Drupal\oracle_provider\Form\OracleEntityDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\oracle_provider\OracleEntityHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "oracle_conn",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/oracle_conn/{oracle_conn}",
 *     "add-form" = "/admin/structure/oracle_conn/add",
 *     "edit-form" = "/admin/structure/oracle_conn/{oracle_conn}/edit",
 *     "delete-form" = "/admin/structure/oracle_conn/{oracle_conn}/delete",
 *     "collection" = "/admin/structure/oracle_conn"
 *   }
 * )
 */
class OracleEntity extends ConfigEntityBase implements OracleEntityInterface {

  /**
   * The Oracle Connection ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Oracle Connection label.
   *
   * @var string
   */
  protected $label;

  /**
   * The Oracle Connection user.
   *
   * @var string
   */
  protected $user;

  /**
   * The Oracle Connection password.
   *
   * @var string
   */
  protected $password;

  /**
   * The Oracle Connection database type.
   *
   * @var string
   */
  protected $type;

  /**
   * The Oracle Connection SID.
   *
   * @var string
   */
  protected $sid;

  public function getUser() {
    return $this->get('user');
  }

  public function setUser($user) {
    $user = trim($user);
    $this->set('user', $user);
    return $this;
  }

  public function getPassword() {
    return $this->get('password');
  }

  public function getSid() {
    return $this->get('sid');
  }

  public function setSid($sid) {
    $sid = trim($sid);
    $this->set('sid', $sid);
    return $this;
  }

  public function getType() {
    return $this->get('type');
  }
}
