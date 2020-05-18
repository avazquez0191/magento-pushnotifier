<?php

class MiTienda_PushNotifier_Block_PushNotifier extends Mage_Core_Block_Template
{

  public $_baseUrl;
  public $_helper;
  public $_doCustomerHasToken;

  public function _construct()
  {
    $this->_baseUrl = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB);
    $this->_helper = Mage::helper('mitienda_pushnotifier/commonhelper');
    $this->_doCustomerHasToken = $this->doCustomerHasToken();
  }

  private function doCustomerHasToken()
  {
    if ($this->_helper->isCustomerLoggedIn()) {
      $firebase_tokens = Mage::getModel('mitienda_pushnotifier/firebasetoken')
        ->getCollection()
        ->addFieldToFilter('customer_id', $this->_helper->getCustomerId());

      if ($firebase_tokens->getSize()) {
        return true;
      }
    }
    return false;
  }
}
