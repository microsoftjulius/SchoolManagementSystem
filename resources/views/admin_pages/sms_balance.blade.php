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
                        @include('admin_layouts.cards')
                        @include('admin_layouts.data_tables')
                    </div>
                </main>
                @include('admin_layouts.footer')
            </div>
        </div>
        @include('admin_layouts.javascript')
    </body>
</html>
