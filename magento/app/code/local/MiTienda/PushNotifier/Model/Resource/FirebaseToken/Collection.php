<?php
class MiTienda_PushNotifier_Model_Resource_FirebaseToken_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
  protected function _construct()
  {
    $this->_init('mitienda_pushnotifier/firebasetoken');
  }
}
