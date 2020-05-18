<?php
class MiTienda_PushNotifier_FirebaseTokenController extends Mage_Core_Controller_Front_Action
{

  private $_helper;

  public function _construct()
  {
    $this->_helper = Mage::helper('mitienda_pushnotifier/commonhelper');
  }

  public function createAction()
  {
    $params = $this->getRequest()->getParams();

    $firebase_token = Mage::getModel('mitienda_pushnotifier/firebasetoken');
    if ($this->_helper->isCustomerLoggedIn()) {
      $firebase_token->setCustomerId($this->_helper->getCustomerId());
    }
    $firebase_token->setTokenId($params['tokenId']);
    $firebase_token->save();

    $json_data = [
      'status' => true,
      'data' => [
        'tokenId' => $firebase_token->getId()
      ]
    ];

    $this->getResponse()->clearHeaders()->setHeader('Content-type', 'application/json', true);
    $this->getResponse()->setBody(json_encode($json_data));
  }
}
