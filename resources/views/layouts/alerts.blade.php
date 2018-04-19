<div class="container">
    <div class="row">
        <div class="col-sm-offset-2 col-md-8">

            @if (isset($success))
                <div class="text-center" style="padding-top: 20px;">
                    <div class="alert alert-success text-center">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong class="alert-link">{{ $success }}</strong>
                    </div>
                </div>
            @endif

            @if (isset($error))
                <div class="text-center" style="padding-top: 20px;">
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong class="alert-link">{{ $error }}</strong>
                    </div>
                </div>
            @endif

            @if (isset($warning))
                <div class="text-center" style="padding-top: 20px;">
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong class="alert-link">{{ $warning }}</strong>
                    </div>
                </div>
            @endif

            @if (isset($info))
                <div class="text-center" style="padding-top: 20px;">
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong class="alert-link">{{ $info }}</strong>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="text-center" style="padding-top: 20px;">
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        Please check the form below for errors
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>