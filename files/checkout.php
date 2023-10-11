<div class="scroll-y">
  <div class="check-container">
    <div>
      <form action="">
        <h2 style="text-align: center; padding:8px 0; color:green;">Complete your order!</h2>
        <div class="payable-header">
          <div style="font-size:17px;">Delivery Charge: <span style="color:green;">Free</span></div>
          <div class="payable">
            <span style="font-weight:bolder;">Total Amount Payable:</span>
            <span style="color:red; font-weight:bolder;">UGX 10000</span>
          </div>
        </div>
        <div class="ctrl-f">
          <div class="ctrl">
            <label for="">First Name:</label>
            <input type="text" placeholder="Name">
          </div>
          <div class="ctrl">
            <div class="input-p">
              <label for="">Last Name:</label>
              <input type="text" placeholder="Last Name">
            </div>
          </div>
        </div>
        <div class="ctrl-f">
          <div class="ctrl">
            <label for="">Email:</label>
            <input type="email" placeholder="Email">
          </div>
          <div class="ctrl">
            <div class="input-p">
              <label for="">phone:</label>
              <input type="tel">
            </div>
          </div>
        </div>
        <div class="ctrl-f">
        <div class="ctrl text-area">
          <label for="">Address:</label>
          <textarea name="address"  rows="3" placeholder="Enter your address"></textarea>
        </div>
        <div class="ctrl select">
          <div class="input-p">
            <p>Select Payment Mode</p>
            <select name="pmode" id="">
              <option value="">-- select payment --</option>
              <option value="cod">Cash on Delivery</option>
              <option value="netbanking">Net Banking</option>
              <option value="card">Debit/credit Card</option>
            </select>
          </div>
        </div>
        </div>

        <div class="place">
          <input type="submit" value="Place Order">
        </div>

      </form>
    </div>
  </div>
</div>