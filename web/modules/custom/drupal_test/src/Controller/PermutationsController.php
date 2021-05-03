<?php

namespace Drupal\drupal_test\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Render\Markup;

/**
 * Provides route responses for the Drupal Test module.
 */
class PermutationsController extends ControllerBase {
  /**
   * Returns a custom permutations page.
   *
   * @return array
   *   A renderable array.
   */
  public function permutationsPage() {

    // Gets the current user.
    $current_user = \Drupal::currentUser()->getAccountName();

    // Gets the permutation keyword from the configs of the module.
    $config = $this->config('drupal_test.config_permutations');
    $permutation_keyword = $config->get('keyword');
    $permutation_key_length = strlen($permutation_keyword);

    // Save permutations.
    $permutations = '';
    $this->permute($permutation_keyword, 0, $permutation_key_length - 1, $permutations);

    $markup = '<p>' . 'Hello, ' . $current_user . '</p>';
    $markup .= '<p>Value provided in the back-office is: ' . $permutation_keyword . '</p><br/>';
    $markup .= 'Here are all permutations:';

    $element = [
      '#markup' => Markup::create($markup),
      'field_permutations' => [
        '#type' => 'textarea',
        '#rows' => '15',
        '#attributes' => ['class' => ['textarea-half-width']],
        '#value' => $permutations,
      ]
    ];

    return $element;
  }

  private function permute($str, $l, $r, &$p) {

    if ($l == $r) {
      $p .= $str . "\n";
    } else {
      for ($i = $l; $i <= $r; $i++) {
        $str = $this->swap($str, $l, $i);
        $this->permute($str, $l + 1, $r, $p);
        $str = $this->swap($str, $l, $i);
      }
    }
  }

  private function swap($a, $i, $j) {

    $charArray = str_split($a);
    $temp = $charArray[$i] ;
    $charArray[$i] = $charArray[$j];
    $charArray[$j] = $temp;

    return implode($charArray);
  }
}