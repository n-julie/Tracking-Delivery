<?php
function cartElement($productname,$productprice,$productDesc,$productimg,$productuniqueId){
  $element = "
  <div class=\"wd50\">
    <form action=\"\" method=\"post\">
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
                <a href=\"?ref2=components&actionId=$productuniqueId\" class=\"removebtn\">Remove</a>
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

function categories($cimage,$cname,$cprice,$cid){
  $element2 = "
    <div class=\"wd js-product\">
      <div class=\"hgt\">
        <form action=\"\" method=\"post\">
          <a href=\"\" style=\"color:unset; text-decoration:none;\" >
            <div class=\"profile\">
              <img src=\"./files/uploads/$cimage\" alt=\"\">
            </div>
          </a>
          <div class=\"p-name js-productName\">$cname</div>
          <div class=\"price\">UGX.$cprice</div>
          <div class=\"product-qty\">
            <select name=\"\" id=\"\">
              <option value=\"1\" selected>1</option>
              <option value=\"2\">2</option>
              <option value=\"3\">3</option>
              <option value=\"4\">4</option>
              <option value=\"5\">5</option>
              <option value=\"6\">6</option>
              <option value=\"7\">7</option>
              <option value=\"8\">8</option>
              <option value=\"9\">9</option>
              <option value=\"10\">10</option>
            </select>
          </div>
          <input type=\"hidden\" name=\"productId\" value=\"$cid\">
          <button type=\"submit\" name=\"add\" class=\"add-to-cart button-p\">
            <div class=\"links\">
              <div class=\"icons-flex\" style=\"font-size: 15px; display:flex;align-items:center; margin:0 auto;\">
                Add to cart
                <span class=\"ics-flex\"><?php include \"./svgs/cart.svg\" ?></span>
              </div>
            </div>
          </button>
        </form>
      </div>
    </div>
  ";
  echo $element2;
}
?>