<?php
class MiTienda_PushNotifier_Model_Resource_FirebaseToken extends Mage_Core_Model_Resource_Db_Abstract
{
  protected function _construct()
  {
    $this->_init('mitienda_pushnotifier/firebasetoken', 'id');
  }
}
