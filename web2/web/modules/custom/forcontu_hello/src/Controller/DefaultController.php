<?php

namespace Drupal\forcontu_hello\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Database\Driver\mysql\Connection;
use Drupal\Core\Session\AccountProxyInterface;

/**
 * Class DefaultController.
 */
class DefaultController extends ControllerBase {

  /**
   * Drupal\Core\Database\Driver\mysql\Connection definition.
   *
   * @var \Drupal\Core\Database\Driver\mysql\Connection
   */
  protected $database;
  /**
   * Drupal\Core\Session\AccountProxyInterface definition.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $currentUser;

  /**
   * Constructs a new DefaultController object.
   */
  public function __construct(Connection $database, AccountProxyInterface $current_user) {
    $this->database = $database;
    $this->currentUser = $current_user;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('database'),
      $container->get('current_user')
    );
  }

  /**
   * Simple.
   *
   * @return string
   *   Return Hello string.
   */
  public function simple() {

      dpm($this->currentUser, "Current User");
      
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: simple')
    ];
  }
  /**
   * Calculator.
   *
   * @return string
   *   Return Hello string.
   */
  public function calculator() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: calculator')
    ];
  }

}
