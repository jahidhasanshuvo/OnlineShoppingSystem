@extends('layout')
@section('content')
    <div class="register-req col-sm-12">
        <p style="text-align: center">Please fill Up the form for checkout</p>
    </div><!--/register-req-->
    <div class="shopper-informations">
        <div class="row">
            <div class="col-sm-12">
                    <h2>Bill To</h2>
                    <div class="form-one">
                        <form action="{{route('save_shipping_details')}}" method="post">
                            {{csrf_field()}}
                            <input type="text" placeholder="Name" name="name">
                            <input type="text" placeholder="City" name="city">
                            <input type="text" placeholder="Address" name="address">
                            <input type="text" placeholder="Mobile Number" name="mobile_number">
                            <div class="review-payment">
                                <h2>Review & Payment</h2>
                            </div>
                            <br>
                            <br>
                            <div class="payment-options">
						    <span><label><input type="radio" name="payment_method" id="handcash" onclick="myFunction()" value="Hand Cash" checked>Hand Cash</label></span>
                            <span><label><input type="radio" name="payment_method" id="bkash" onclick="myFunction()" value="Bkash">Bkash</label></span>
                            <span><label><input class="form-control" type="text" name="tID" id="tID" style="display: none;" placeholder="Transaction ID"></label></span>
                            <br><input class="btn btn-success" type="submit" value="Checkout">
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            var radio1 = document.getElementById("handcash");
            var radio2 = document.getElementById("bkash");
            var text = document.getElementById("tID");
            if (radio2.checked == true){
                radio1.checked = false;
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
            if(radio1.checked==true){
                radio2.checked = false;
            }
        }
    </script>
@endsection
