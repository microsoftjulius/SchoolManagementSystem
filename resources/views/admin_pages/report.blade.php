<!DOCTYPE html>
<html lang="en">
    @include('admin_layouts.styling')
    <body class="nav-fixed card">
        @include('admin_layouts.navbar')
        <div id="layoutSidenav">
            @include('admin_layouts.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="page-header pb-10 page-header-dark ">
                        <div class="container-fluid">
                        </div>
                    </div><br><br>
                    <div class="container-fluid mt-n10">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src={{ asset('bootstrap/students/'. $collection->image_path) }} alt="{{ $collection->sfirst_name }}'s photo" style="height:200px">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src={{ asset('bootstrap/parents/'. $collection->guardian->image_path) }} alt="{{ $collection->sfirst_name }}'s parent photo   " style="height:200px">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-head text-left" style="height:200px; margin-left:20px"><br>
                                        <h4 class="text-center"><u>Fees Payment</u></h4>
                                        <p>Total Amount To Pay: {{ number_format($collection->classRooms->fees_amount) }} /=</p>
                                        <p>Total Amount Paid:
                                            @foreach($meta as $fees)
                                                {{ number_format($fees) }} /=
                                            @endforeach
                                        </p>
                                        <p>Remaining Balance: 
                                            {{ number_format(($collection->classRooms->fees_amount - $fees) * -1)}}/=
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        @include('admin_layouts.data_tables')
                    </div>
                </main>
                <footer class="footer mt-auto footer-light">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &#xA9; Your Website 2020</div>
                            <div class="col-md-6 text-md-right small">
                                <a href="#!">Privacy Policy</a>
                                &#xB7;
                                <a href="#!">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        @include('admin_layouts.javascript')
    </body>

<!-- Mirrored from themes.startbootstrap.com/sb-admin-pro/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Apr 2020 04:43:38 GMT -->
</html>
