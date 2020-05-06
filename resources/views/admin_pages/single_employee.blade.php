<!DOCTYPE html>
<html lang="en">
    @include('admin_layouts.styling')
    <body class="nav-fixed">
        @include('admin_layouts.navbar')
        <div id="layoutSidenav">
            @include('admin_layouts.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="page-header pb-10 page-header-dark ">
                        <div class="container-fluid">
                        </div>
                    </div><br>
                    <div class="container-fluid mt-n10">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card" style="width: 18rem; margin-bottom:20px">
                                    <img class="card-img-top" src={{ asset('bootstrap/employees/'. $collection->image_path) }} style="height:200px;">
                                </div>
                            </div>
                        </div>
                        @include('admin_layouts.data_tables')
                    </div>
                </main>
                @include('admin_layouts.footer')
            </div>
        </div>
        @include('admin_layouts.javascript')
    </body>
</html>
