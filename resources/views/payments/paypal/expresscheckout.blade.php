<div class="container">

    <div class="row db-padding-btm db-attached">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="db-wrapper">
                {!! Form::open(array('route' => 'checkoutProgress')) !!}
                {!! Form::hidden('type','register') !!}
                {!! Form::hidden('pay',500) !!}
                {!! Form::hidden('course_id',301) !!}
                <div class="db-pricing-eleven db-bk-color-one">
                    <div class="price">
                        <sup>$</sup>500
                        <small>Book the Session</small>
                    </div>
                    <div class="type">
                        Register Today
                    </div>
                    <ul>
                        <li><i class="glyphicon glyphicon-print"></i>Review Session</li>
                        <li><i class="glyphicon glyphicon-time"></i>Book it now</li>
                    </ul>
                    <div class="pricing-footer">
                        <button class="btn db-button-color-square btn-lg">
                            Register
                            <img class="img-responsive db-paypal-sm-btn" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-small.png" alt="Check out with PayPal" />
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="db-wrapper">
                {!! Form::open(array('route' => 'checkoutProgress')) !!}
                {!! Form::hidden('type','Partial') !!}
                {!! Form::hidden('pay',1000) !!}
                {!! Form::hidden('course_id',301) !!}
                <div class="db-pricing-eleven db-bk-color-two">
                    <div class="price">
                        <sup>$</sup>1000
                        <small>Recurring payment</small>
                    </div>
                    <div class="type">
                        Partial Payment
                    </div>
                    <ul>
                        <li><i class="glyphicon glyphicon-print"></i>Register Class </li>
                        <li><i class="glyphicon glyphicon-time"></i>Class Schedule</li>
                    </ul>
                    <div class="pricing-footer">
                        <button class="btn db-button-color-square btn-lg">Pay Now
                        <img class="img-responsive db-paypal-sm-btn" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-small.png" alt="Check out with PayPal" />
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="db-wrapper">
                {!! Form::open(array('route' => 'checkoutProgress')) !!}
                {!! Form::hidden('type','Full') !!}
                {!! Form::hidden('pay',2500) !!}
                {!! Form::hidden('course_id',301) !!}
                <div class="db-pricing-eleven db-bk-color-three">
                    <div class="price">
                        <sup>$</sup>2500
                        <small>Get 10% Discount</small>
                    </div>
                    <div class="type">
                        One Time Payment
                    </div>
                    <ul>
                        <li><i class="glyphicon glyphicon-print"></i>Limited Time Offer</li>
                        <li><i class="glyphicon glyphicon-time"></i>Get Coupons</li>
                    </ul>
                    <div class="pricing-footer">
                        <button class="btn db-button-color-square btn-lg">Get Discount
                            <img class="img-responsive db-paypal-sm-btn" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-small.png" alt="Check out with PayPal" />
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-12">
                <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/cc-badges-ppmcvdam.png" alt="Buy now with PayPal" />
                <h4>Registration and Payment</h4>
            </div>
        </div>


    </div>


</div>