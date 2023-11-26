<?php
include "./includes/db.inc.php";
class Cart extends DB {
  public $cartArray;
  public function __construct()
  {
    $this->cartArray = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
  }
  public function addProduct($product){ 
    $cartArray = $this->cartArray; //shortening the array syntax
    if(!is_array($product)) return $cartArray;
    //First, we need to check if this item exists
    $existingItem = null;
    foreach($cartArray as $key => $item){
      if($item["productId"] == $product['productId']){
        //product has been found. Let's update the qty

        $existingItem = $item;
        $cartArray[$key] = array(
          "productId" => $item['productId'],
          "productName" => $item["productName"],
          "image" => $item['image'],
          "qty" => $item['qty'] + $product['qty'],
          "productDesc" => $item['productDesc'],
          "productImage" => $item['productImage'],
          "sellingPrice" => $item['sellingPrice']
        );
        $_SESSION['cart'] = $cartArray;
        break; //break the loop right here.
        //return;
        //stop this function from proceeding.
        //If we don't stop this function, we shall have a duplicate. And we don't want that
      }
    }
    if(!$existingItem){
      $cartArray[] = array(
        "productId" => $product['productId'],
        "productName" => $product['productName'],
        "image" => $product['image'],
        "qty" => $product['qty'], //notice how we used $product instead of $item? It's because we want to accept the quantity submitted by the user
        "productDesc" => $product['productDesc'],
        "productImage" => $product['productImage'],
        "sellingPrice" => $product['sellingPrice']
      );
      $_SESSION['cart'] = $cartArray;
    }
    return $cartArray;
  }
  public function removeProduct($productId){
    foreach($this->cartArray as $key => $item){
      if($item["productId"] == $productId){
        unset($this->cartArray[$key]);//$Remove the item from the cart
        $_SESSION['cart'] = $this->cartArray; //Update the session
        return true;
      }
    }
    return false; //Return false if the item was not found
  }

  public function cartItems() {
    $total = 0;
    $this->cartArray = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    foreach($this->cartArray as $item) $total += $item['qty'];
    return $total;
  }
  // public function grandTotal(){
  //   $grandtotal = 0;
  //   foreach($this->cartArray as $item){
  //     $grandtotal += $item['qty'];
  //   }
  //   return $grandtotal;
  // }
}
$cart = new Cart; //initialize the Cart class that will be used in the global scope.
