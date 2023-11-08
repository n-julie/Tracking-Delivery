<?php
function cartElement($productname,$productprice,$productDesc,$productimg,$productuniqueId){
  $element = "
  <div class=\"wd50\">
    <form action=\"?ref=dashboard&nav=cart\" method=\"post\">
      <div class=\"cart-flex\">
        <div class=\"d_flex\">
          <div class=\"cart-img\">
            <div>
              <img src=\"./files/uploads/$productimg\" alt=\"\">
            </div>
          </div>
          <div class=\"cname\">
            <h5>$productname</h5>
            <small>$productDesc</small>
            <h2 style=\"color:red; font-size:17px;\">UGX.$productprice</h2>
            <div class=\"cbtns\">
              <div>
                <a href=\"\" style=\"text-decoration:none; color:#333;font-size:15px;\">Quantity:</a>
                <a href=\"\" class=\"updatebtn\">
                  <button type = \"submit\">update</button>
                </a>
                <a href=\"?nav=components&actionId=$productuniqueId\" class=\"removebtn\">Remove</a>
              </div>
            </div>
          </div>
        </div>
        <div class=\"d_optn\">
        <h3>Choose delivery option</h3>
        </div>
      </div>
    </form>
  </div>
  ";
  echo $element;
}
?>