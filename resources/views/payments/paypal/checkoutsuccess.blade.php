<div class="jumbotron jumbotron-sm" style="background-color: deepskyblue;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h3 class="h4">
                    Thank You <small>Payment is Being Processed</small></h3>
                    <div>
                        @if(isset($confirmation))
                            Confirmation Number: {{ $confirmation }}
                        @endif
                    </div>
            </div>
        </div>
    </div>
</div>



