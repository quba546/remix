@extends('layout.app')

@section('content')
    <div class="d-flex" id="wrapper">
        @include('shared.sidebar-admin')
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <i class="fas fa-bars toggle-admin-icon" id="menu-toggle"></i>
            </nav>
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-1 col-lg-2"></div>
                    <div class="col-10 col-lg-8 bg-white shadow-lg text-center">
                        <h2 class="text-uppercase font-weight-bold mt-3">Panel administratora</h2>
                        <div class="border border-success rounded m-4">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam consequuntur culpa dicta illo neque recusandae voluptate. Animi consequatur dolorem impedit ipsam molestias mollitia non officia quaerat, quas quidem, sequi voluptates voluptatum! Adipisci at dolorem eos, explicabo fugiat harum inventore minus possimus rerum sint? Amet aperiam aspernatur aut dolorem ipsum numquam odio quas quisquam? Fugiat hic inventore nam nemo obcaecati qui rem repellat repudiandae tempora. Amet asperiores corporis, culpa dolor dolorum, error est magnam maxime nihil optio qui sed totam, voluptatum. Accusamus alias aliquam aliquid aspernatur cumque earum ex fugiat inventore ipsum itaque, iure laboriosam possimus quisquam sequi soluta vel veniam.
                        </div>
                    </div>
                    <div class="col-1 col-lg-2"></div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
@endsection
