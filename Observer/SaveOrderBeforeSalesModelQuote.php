<?php

namespace Web30india\CheckoutField\Observer;

use Magento\Framework\Event\ObserverInterface;
 
class SaveOrderBeforeSalesModelQuote implements ObserverInterface
{
  protected $cookieManager;
  
  public function __construct(
    \Magento\Framework\Stdlib\CookieManagerInterface $cookieManager
  ) {
    $this->cookieManager = $cookieManager;
  }

  public function execute(\Magento\Framework\Event\Observer $observer)
  {
    $order = $observer->getData('order');
    $quote = $observer->getData('quote');

    $quote->setAlternatePhone($this->getCookie('alternate_phone'));
    $quote->setDelhiveryType($this->getCookie('delhivery_type'));
    $quote->setDelhiveryDate($this->getCookie('delhivery_date'));
    $quote->setGender($this->getCookie('gender'));
    $quote->setDelhiveryNote($this->getCookie('delhivery_note'));
    $quote->save();

    $order->setAlternatePhone($this->getCookie('alternate_phone'));
    $order->setDelhiveryType($this->getCookie('delhivery_type'));
    $order->setDelhiveryDate($this->getCookie('delhivery_date'));
    $order->setGender($this->getCookie('gender'));
    $order->setDelhiveryNote($this->getCookie('delhivery_note'));
    $order->save();
  }

  public function getCookie($name)
  {
    return $this->cookieManager->getCookie($name);
  }
}