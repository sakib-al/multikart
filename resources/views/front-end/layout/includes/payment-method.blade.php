{{-- COD MODAL --}}
<style>
    .modal-logo{
        height: 80px;
        margin-left: 15px;
    }
    .modal-header{
        /* border-bottom: none; */
        border: none;
        display: block;
        text-align: center;
    }
    .modal-body{
        border-top: 4px solid #E2136E;
    }
    .invoice-detail{margin-left: 10px;}
    .invoice-total{
        position: absolute;
        right: 41px;
    }
    .invoice-total p{
        font-size: 30px;
        color: #464C52;
        font-weight: 500;
    }
    .order-info{
        display: flex;
        padding-top: 10px;
    }
    .payment-instruction{
        background-color: #C94961;
        padding: 23px 40px 40px 40px;
    }
    .payment-instruction h6{
        text-align: center;
        color: #fff;
        font-size: 15px;
        font-weight: 600;
        padding-bottom: 10px;
    }
    .instruction-list{
        list-style: circle !important;
        display: block;
        color: #fff;
    }
    .instruction-list li {
    font-size: 14px;
    padding-bottom: 3px;
    }
    .modal-footer{
        background-color: #D1D3D4;
        text-align: center;
        display: block;
    }
    .modal-footer h6{
        font-size: 16px;
        color: #414047;
        font-weight: 600;
        text-transform: uppercase;
        cursor: pointer;
    }
    .instruction-list span {padding-right: 5px;}
</style>

<div class="modal fade" id="CoDModal" tabindex="-1" aria-labelledby="CoDModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                    <img class="modal-logo" src="{{ asset('front-end/assets/images/bkash_payment_logo.png') }}" alt="">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Order Info --}}
                <div class="order-info">
                    <img src="http://multikart.test/images/product/prod_01042021_606576fc51c2b.jpg" width="50" alt="">
                    <div class="invoice-detail">
                        <h4>Multikart</h4>
                        <p>Invoice ID: MLT1632145524154</p>
                    </div>
                    <div class="invoice-total">
                        <p>৳33.33</p>
                    </div>
                </div>
            </div>
            <div class="payment-instruction">
                <h6>Enter the transection ID of your bKash payment</h6>
                    <div class="form-group">
                        <input type="text" name="transection_id" class="form-control" id="transection_id" placeholder="Enter bKash Transection ID">
                    </div>
                <div class="instruction-detail">
                    <ul class="instruction-list">
                        <li><span>1.</span>Go to your bKash Mobile Menu by dialing *247#</li>
                        <li><span>2.</span>Choose "Send Money"</li>
                        <li><span>3.</span>Enter the bKash Account Number <span>01717637555</span></li>
                        <li><span>4.</span>Enter the amount <span>33.33</span></li>
                        <li><span>5.</span>Enter a reference: "Delivery Cost"</li>
                        <li><span>6.</span>Now Enter your bKash Mobile Menu PIN</li>
                        <li><span>7.</span>Done! You will receive a confirmation message from bKash</li>
                        <li><span>8.</span>Put the Transection ID in the upper box and press "Submit"</li>
                        <li></li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <h6 data-bs-dismiss="modal">Submit</h6>
            </div>
        </div>
    </div>
</div>


