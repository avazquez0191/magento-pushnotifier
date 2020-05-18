<?php
/* Our class name should follow the directory structure of our Observer.php model, starting from the namespace, replacing directory separators with underscores. The directory of ousr Observer.php is following:
 app/code/local/MiTienda/PushNotifier/Model/Observer.php */
class MiTienda_PushNotifier_Model_Observer
{
  // Magento passes a Varien_Event_Observer object as the first parameter of dispatched events.
  public function notifyStatusChange(Varien_Event_Observer $observer)
  {
    // Retrieve the order being updated from the event observer
    $order = $observer->getEvent()->getOrder();
    $customerId = $order->getCustomerId();
    $orderStatus = $order->getStatus();

    if ($orderStatus) {
      $url = 'https://fcm.googleapis.com/fcm/send';
      $apiKey = 'AAAAKUBwikc:APA91bFd6QDphH1wqcYjh9-6u8T55_urXWZulyq7b8aKVTMidBQORhbrBiDx7GSih4TYx5R-oBd24pqTvLLzR2EuOeQwuFbKjAJDCNvNPt7YyfIipjlGyXp6SREqQWbidCbXdVS44z9R';
      $header = array(
        'Content-Type: application/json',
        'Authorization: key=' . $apiKey
      );

      $firebase_tokens = Mage::getModel('mitienda_pushnotifier/firebasetoken')
        ->getCollection()
        ->addFieldToFilter('customer_id', $customerId);
        
      foreach ($firebase_tokens as $firebase_token) {
        $curlParams = array(
          'to' => $firebase_token->getTokenId(),
          'notification' => array(
            'title'    => 'Push Notifier',
            'body'   => "Uno de sus pedidos ha cambiado de estado a ({$orderStatus}).",
            'icon'  => Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB) . 'logo-pn.png',
            'click_action'      => Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB),
          )
        );

        // Push Notify
        $curl = new Varien_Http_Adapter_Curl;
        $curl->setConfig(array('timeout' => 15));
        $curl->write(Zend_Http_Client::POST, $url, '1.1', $header, json_encode($curlParams));
        $curl->read();
        $curl->close();
      }
    }
  }
}
