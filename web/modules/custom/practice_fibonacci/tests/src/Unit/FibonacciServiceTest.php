<?php

namespace Drupal\Tests\practice_fibonacci\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\practice_fibonacci\FibonacciService;

/**
 * Our main test class for the fibonacci service.
 */
class FibonacciServiceTest extends UnitTestCase {
  
  public function testSixthFibonacciNumber() {
    $fibonacciService = new FibonacciService();
    $fibonacciSequence = $fibonacciService->calcSomeFibos(6);
    $this->assertEquals($fibonacciSequence[5], 5);
  }
}