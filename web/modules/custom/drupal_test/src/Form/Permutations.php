<?php

namespace Drupal\drupal_test\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class Permutations extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'drupal_test.config_permutations',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'drupal_test_config_permutations';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    // Get configs of the module.
    $config = $this->config('drupal_test.config_permutations');

    // Show the 'keyword' field with the saved value.
    $form['keyword'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Keyword'),
      '#maxlength' => 6,
      '#default_value' => $config->get('keyword'), // 'HEY', // $config->get('checkbox_' . $record->field),
      '#description' => t('<a href="@permutations" target="_blank">Learn more about permutations</a>', array(
        '@permutations' => 'https://www.geeksforgeeks.org/php-program-for-write-a-program-to-print-all-permutations-of-a-given-string/'
      )),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    // Retrieve the configuration and set the submitted settings.
    $this->configFactory->getEditable('drupal_test.config_permutations')
      ->set('keyword', $form_state->getValue('keyword'))
      ->save();

    parent::submitForm($form, $form_state);
  }
}