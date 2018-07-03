@extends('layout')
@section('content')
    <div class="register-req col-sm-12">
        <p style="text-align: center">Please fill Up the form for checkout</p>
    </div><!--/register-req-->

    <div class="shopper-informations">
        <div class="row">
            <div class="col-sm-12">
                <div>
                    <h2>Bill To</h2>
                    <div class="form-one">
                        <form>
                            <input type="text" placeholder="Name" name="name">
                            <input type="text" placeholder="City" name="city">
                            <input type="text" placeholder="Address" name="address">
                            <input type="text" placeholder="Mobile Number" name="mobile_number">
                            <input class="btn btn-default" type="submit" value="Checkout">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="review-payment">
        <h2>Review & Payment</h2>
    </div>

    <div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
        <span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
        <span>
						<label><input type="checkbox"> Paypal</label>
					</span>
    </div>


@endsection