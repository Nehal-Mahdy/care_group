<x-app-layout>
    @section('title', 'Countries')

    <div class="content-wrapper mx-auto">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">
                                <a href="{{ route('countries.index') }}" class="nav-link"><i
                                        class="fas fa-long-arrow-alt-left"></i>
                                    Back</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('countries.store') }}" method="POST">
                        @csrf
                        <div class="row ">
                            <div class="col-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Add Country</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="inputName">Name</label>
                                            <input type="text" id="name" name="name" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Code</label>
                                            <input type="text" id="code" name="code" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">phonecode</label>
                                            <input type="text" id="phonecode" name="phonecode" class="form-control" />
                                        </div>
                                    </div>

                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success bg-success float-right">
                                    Create new Country
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- /.card -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</x-app-layout>
