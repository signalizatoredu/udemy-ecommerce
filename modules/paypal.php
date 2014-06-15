<?php

require_once('../includes/autolad.php');

// tokens
$token2 = Session::getSession('token2');
$objForm = new Form();
$token1 = $objForm->getPost('token');

if ($token2 == Login::string2hash($token1)){
    
    // create order
    
    $objOrder = new Order();
    if ($objOrder->createOrder()){
        
        // populate order details
        $order = $objOrder->getOrder();
        $items = $objOrder->getOrderItems();
    }
    
    
}

