@extends('layout')
@section('content')
    <div class="register-req col-sm-12">
        <p style="text-align: center">Please fill Up the form for checkout</p>
    </div><!--/register-req-->
    <div class="shopper-informations">
        <div class="row">
            <div class="col-sm-12">
                <h2>Shipping Details</h2>
                <div class="form-one">
                    <form action="{{route('save_shipping_details')}}" method="post">
                        {{csrf_field()}}
                        <input type="text" placeholder="Name" name="name" required="">
                        <select name="city" required="">
                            <option value="">Select your zone</option>
                            <option value="Motijhil">Motijheel</option>
                            <option value="Uttara">Uttara</option>
                            <option value="Banani">Banani</option>
                            <option value="Gulshan">Gulshan</option>
                            <option value="Mirpur">Mirpur</option>
                            <option value="Gulisthan">Gulisthan</option>
                            <option value="Jatrabari">Jatrabari</option>
                            <option value="Mohakhali">Mohakhali</option>
                        </select>
                        <input type="text" placeholder="Address" name="address" required="">
                        <input type="number" placeholder="Mobile Number" name="mobile_number" required="">
                        <div class="review-payment">
                            <h2>Payment Details</h2>
                        </div>
                        <br>
                        <br>
                        <?php
                        $total = floatval(str_replace('.', ',', str_replace(',', '', Cart::total())));
                        $charge = (int)($total * 1.5/100);
                        ?>
                        <div class="payment-options">
                            <h4>Your total Payment : {{Cart::total()}} Tk.</h4>
                            <h5>[ If you want to use bkash you have to pay {{$charge}} Tk. extra]</h5>
                            <span><label><input type="radio" name="payment_method" id="handcash" onclick="myFunction()"
                                                value="Hand Cash" checked>Hand Cash</label></span>
                            <span><label><input type="radio" name="payment_method" id="bkash" onclick="myFunction()"
                                                value="Bkash">Bkash</label></span>
                            <span><label><input class="form-control" type="text" name="tID" id="tID"
                                                style="display: none;" placeholder="Transaction ID"></label></span>
                            <div><p>[ Our Bkash numbers: <b>01681471764, 01719957699</b>]</p></div>
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
            if (radio2.checked == true) {
                radio1.checked = false;
                text.style.display = "block";
                text.setAttribute("required", "");
            } else {
                text.style.display = "none";
            }
            if (radio1.checked == true) {
                radio2.checked = false;
            }
        }
    </script>
@endsection
