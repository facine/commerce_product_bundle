<?php

namespace Drupal\commerce_product_bundle;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityAccessControlHandler as CoreEntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides an access control handler for product bundles.
 */
class ProductBundleAccessControlHandler extends CoreEntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    if ($operation == 'view' && $entity->isPublished()) {
      return AccessResult::allowed();
    }
    return AccessResult::neutral();
  }

}
