<?php

namespace Drupal\oracle_provider\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class OracleEntityForm.
 *
 * @package Drupal\pcba_base\Form
 */
class OracleEntityForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $oracle_conn = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $oracle_conn->label(),
      '#description' => $this->t("Label for the Oracle Database Connection."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $oracle_conn->id(),
      '#machine_name' => [
        'exists' => '\Drupal\pcba_base\Entity\OracleEntity::load',
      ],
      '#disabled' => !$oracle_conn->isNew(),
    ];

    $form['user'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Username'),
      '#maxlength' => 255,
      '#default_value' => $oracle_conn->getUser(),
      '#description' => $this->t('Username for the connection.'),
      '#required' => TRUE,
    ];

    $form['password'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Password'),
      '#maxlength' => 255,
      '#default_value' => $oracle_conn->getPassword(),
      '#description' => $this->t('Password for the connection.'),
      '#required' => TRUE,
    ];

    $form['sid'] = [
      '#type' => 'textfield',
      '#title' => $this->t('SID'),
      '#maxlength' => 255,
      '#default_value' => $oracle_conn->getSid(),
      '#description' => $this->t('The database\'s Oracle System ID (SID).'),
      '#required' => TRUE,
    ];

    $form['type'] = [
      '#type' => 'radios',
      '#title' => 'Database type',
      '#options' => [
        'dev' => $this->t('Development'),
        'stage' => $this->t('Staging'),
        'prod' => $this->t('Production'),
      ],
      '#default_value' => $oracle_conn->getType(),
      '#description' => $this->t('The usage of the database (development, staging or production).'),
      '#required' => TRUE,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $oracle_conn = $this->entity;
    $oracle_conn->setUser($form_state->getValue('user'));
    $oracle_conn->setSid($form_state->getValue('sid'));
    $status = $oracle_conn->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Oracle Connection.', [
          '%label' => $oracle_conn->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Oracle Connection.', [
          '%label' => $oracle_conn->label(),
        ]));
    }
    $form_state->setRedirectUrl($oracle_conn->toUrl('collection'));
  }

}
