<x-app-layout>
    @section('title', 'Users')

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
                                <a href="{{ route('users.index') }}" class="nav-link"><i
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
                    <form action="{{ route('users.store') }}" method="POST"enctype="multipart/form-data">
                        @csrf
                        <div class="row ">
                            <div class="col-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Add User</h3>

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
                                            <label for="inputName">Email</label>
                                            <input type="email" id="email" name="email" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Password</label>
                                            <input type="password" id="password" name="password"
                                                class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Password Confirmation</label>
                                            <input type="password" id="password_confirmation"
                                                name="password_confirmation" class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <label for="image_path">upload image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image_path"
                                                        id="image_path">
                                                    <label class="custom-file-label" for="image_path">Choose
                                                        file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName">Roles</label>
                                            <select name="roles[]" id="roles" class="form-control select2" multiple>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success bg-success float-right">
                                    Create new User
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
