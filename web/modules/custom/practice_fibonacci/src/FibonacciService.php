<?php

namespace Drupal\practice_fibonacci;

/**
 * A service that lets us generate Fibonacci sequences.
 */
class FibonacciService {

  protected $fibonacciSequence = [0, 1];

  /**
   * Generates certain amount of Fibonacci numbers.
   */
  public function calcSomeFibos($numberOfNumbers) {

    if (count($this->fibonacciSequence) == $numberOfNumbers) {
      return $this->fibonacciSequence;
    } else {
      $this->fibonacciSequence = $this->getPreceding(1) + $this->getPreceding(2);
      return $this->calcSomeFibos($numberOfNumbers);
    }
  }

  /**
   * Getting the preceding number.
   */
  private function getPreceding($preceding = 1) {
    return $this->fibonacciSequence[count($this->fibonacciSequence) - $preceding];
  }
}