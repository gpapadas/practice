<?php

namespace Drupal\drupal_test\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class Permutations extends ConfigFormBase {

  protected function getEditableConfigNames() {
    return [
      'drupal_test.config_permutations',
    ];
  }

  public function getFormId() {
    return 'drupal_test_config_permutations';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {

    $config = $this->config('drupal_test.config_permutations');

    $form['fields'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Keyword'),
      '#maxlength' => 6,
      '#default_value' => 'HEY',
      '#description' => t('<a href="@permutations" target="_blank">Learn more about permutations</a>', array(
        '@permutations' => 'https://www.geeksforgeeks.org/php-program-for-write-a-program-to-print-all-permutations-of-a-given-string/'
      )),
    ];

    return parent::buildForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {

    parent::submitForm($form, $form_state);
  }
}