<!doctype html>
<html lang="en">
<head>
    @include('parts.head')
    @include('parts.styles')
</head>
<body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page  pace-done menu-expanded"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div></div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
                <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header no-border">

                            <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Login with Robust</span></h6>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">
                                <form class="form-horizontal form-simple" action="{{route('login')}}" method="POST" novalidate="">

                                    @csrf
                                    <fieldset class="form-group position-relative has-icon-left mb-0">
                                        <input type="email" name="email" class="form-control form-control-lg input-lg" id="user-name" placeholder="Your Username" required="">
                                        <div class="form-control-position">
                                            <i class="icon-head"></i>
                                        </div>
                                        @error('email')
                                        <span style="color: red">{{$message}}</span>
                                        @enderror
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" name="password" class="form-control form-control-lg input-lg" id="user-password" placeholder="Enter Password" required="">
                                        <div class="form-control-position">
                                            <i class="icon-key3"></i>
                                        </div>
                                        @error('password')
                                        <span style="color: red">{{$message}}</span>
                                        @enderror
                                    </fieldset>

                                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Login</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>

@include('parts.scripts')

</body>
</html>
