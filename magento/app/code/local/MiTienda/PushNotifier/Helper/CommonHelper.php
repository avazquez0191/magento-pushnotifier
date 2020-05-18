<?php
class MiTienda_PushNotifier_Helper_CommonHelper extends Mage_Core_Helper_Abstract
{
  public function isCustomerLoggedIn()
  {
    if (Mage::app()->isInstalled() && Mage::getSingleton('customer/session')->isLoggedIn()) {
      return true;
    }
    return false;
  }

  public function getCustomerId()
  {
    if ($this->isCustomerLoggedIn()) {
      return Mage::getSingleton('customer/session')->getCustomer()->getId();
    }
    return false;
  }
}
