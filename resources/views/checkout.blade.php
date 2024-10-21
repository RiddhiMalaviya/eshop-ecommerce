@extends('layouts.base')
@section('content')
    <section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Checkout</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('app.index')}}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Cart Section Start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <form class="needs-validation" method="POST" action="{{route('placeorder')}}">
                        @csrf      
                        <div id="billingAddress" class="row g-4">
                            <h3 class="mb-3 theme-color">Shipping address</h3>
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Full Name">
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Enter Phone Number">
                            </div>
                            <div class="col-md-6">
                                <label for="locality" class="form-label">Locality</label>
                                <input type="text" class="form-control" id="locality" name="locality"
                                    placeholder="Locality">
                            </div>
                            <div class="col-md-6">
                                <label for="landmark" class="form-label">Landmark</label>
                                <input type="text" class="form-control" id="landmark" name="landmark"
                                    placeholder="Landmark">
                            </div>

                            <div class="col-md-12">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address"></textarea>

                            </div>

                            <div class="col-md-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="City">

                            </div>

                            <div class="col-md-3">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select custome-form-select" id="country" name="country">
                                    <option>India</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="state" class="form-label">State</label>
                                <select class="form-select custome-form-select" id="state" name="state">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="West Bengal">West Bengal</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="zip" class="form-label">Zip</label>
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="123456">
                            </div>

                            <!-- <div class="col-md-12 form-check ps-0 mt-3 custome-form-check"
                                style="padding-left:15px !important;">
                                <input class="checkbox_animated check-it" type="checkbox" name="sameAsBilling"
                                    id="sameAsBilling">
                                <label class="form-check-label checkout-label" for="sameAsBilling">Shipping address is
                                    same as Billing Address</label>
                            </div> -->
                        </div>
                        
                        <hr class="my-lg-5 my-4">

                        <h3 class="mb-3">Payment</h3>

                        <div class="d-block my-3">
                            <div class="form-check custome-radio-box">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" checked="" id="cod">
                                <label class="form-check-label" for="cod">COD</label>
                            </div>
                            <div class="form-check custome-radio-box">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" checked="" id="debit">
                                <label class="form-check-label" for="debit">Debit card</label>
                            </div>
                        </div>
                        <div class="row g-4" style="display: none;">
                            <div class="col-md-6">
                                <label for="cc-name" class="form-label">Name on card</label>
                                <input type="text" class="form-control" id="cc-name">
                                <div id="emailHelp" class="form-text">Full name as displayed on card</div>
                            </div>
                            <div class="col-md-6">
                                <label for="cc-number" class="form-label">Credit card number</label>
                                <input type="text" class="form-control" id="cc-number">
                                <div class="invalid-feedback">Credit card number is required</div>
                            </div>
                            <div class="col-md-3">
                                <label for="expiration" class="form-label">Expiration</label>
                                <input type="text" class="form-control" id="expiration">
                            </div>
                            <div class="col-md-3">
                                <label for="cc-cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv">
                            </div>
                        </div>
                        <button type="submit" href="{{ route('cart.thankyou') }}" class="btn btn-warning mt-5">Place Order</button>
                        <!-- <a href="{{ route('cart.thankyou') }}" class="btn btn-warning mt-5">Place Order</a> -->
                    </form>
                </div>

                <div class="col-lg-4">
                    <div class="your-cart-box">
                        <h3 class="mb-3 d-flex text-capitalize">Your cart<span id="badge"
                                class="badge bg-theme new-badge rounded-pill ms-auto bg-dark" >{{Cart::instance('cart')->content()->count()}}</span>
                        </h3>
                        <ul class="list-group mb-3">

                            <li class="list-group-item d-flex justify-content-between lh-condensed active">
                                <div class="text-dark">
                                    <h6 class="my-0">Subtotal</h6>
                                    <small></small>
                                </div>
                                <span>₹{{Cart::instance('cart')->subtotal() }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed active">
                                <div class="text-dark">
                                    <h6 class="my-0">Tax</h6>
                                    <small></small>
                                </div>
                                <span>₹{{Cart::instance('cart')->tax() }}</span>
                            </li>
                            <li class="list-group-item d-flex lh-condensed justify-content-between">
                                <span class="fw-bold">Total (INR)</span>
                                <strong>₹{{Cart::instance('cart')->total() }}</strong>
                            </li>
                        </ul>

                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Section End -->
@endsection
@push('scripts')
    <script>
        $(function () {
            $("#sameAsBilling").on("change", function () {
                if ($(this).prop('checked') == true) {
                    $("#shippingAddress").hide();
                }
                else {
                    $("#shippingAddress").show();
                }
            });
        });

        $('#placeOrderBtn').on('click', function(event) {
        event.preventDefault();
        var formData = {
            billingAddress: $('#billingAddress').val(),
            shippingAddress: $('#shippingAddress').val()
        };
        var sameAsBilling = $('#sameAsBilling').prop('checked');
        if (sameAsBilling) {
            formData.shippingAddress = formData.billingAddress;
        } else {
            formData.shippingAddress = $('#shippingAddress').val();
        }
        $.ajax({
            type: "POST",
            url: "{{ route('placeorder') }}",
            data: formData,
            success: function(response) {
                alert("Order placed successfully!");
                window.location.href = "{{ route('cart.thankyou') }}";
            },
            error: function(xhr, status, error) {
                console.error("Form submission error:", error);
                }
            });
        });
    </script>
@endpush