@auth('company')
@else
<div id="gabung" class="section md-padding">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section-header -->
            <div class="section-header text-center">
                <h2 class="title">Gabung Menjadi Mitra Sedot WC</h2>
            </div>
            <!-- /Section-header -->

            <!-- contact -->
            <div class="col-sm-4">
                <div class="about">
                    <h3>Silahkan Register Disini</h3>
                    <a class="btn btn-primary" href="{{route('register')}}">Register</a>
                </div>
            </div>
            <!-- /contact -->

            <!-- contact -->
            <div class="col-sm-4">
                <div class="contact">
                    <img class="logo" src="{{asset('frontend/img/logo.png')}}" alt="logo">
                </div>
            </div>
            <!-- /contact -->

            <!-- contact -->
            <div class="col-sm-4">
                <div class="about">
                    <h3>Kemudian Login Disini</h3>
                    <a class="btn btn-primary" href="{{route('login')}}">Login</a>
                </div>
            </div>
            <!-- /contact -->

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>

@endauth
