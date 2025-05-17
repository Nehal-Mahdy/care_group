@section('title', 'Users Edit')
<x-app-layout>
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
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Update Country</h3>

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
                                            <input type="text" id="name" name="name"
                                                value="{{ $user->name }}" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Email</label>
                                            <input type="email" id="email" name="email"
                                                value="{{ $user->email }}" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Password</label>
                                            <input type="password" id="password" name="password" value=""
                                                class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Password Confirmation</label>
                                            <input type="password" id="password" name="password_confirmation"
                                                value="" class="form-control" />
                                        </div>

                                        @if (!$user->hasRole('ROLE_SUPER_ADMIN'))
                                            <div class="form-group">
                                                <label for="inputName">Roles</label>
                                                <select name="roles[]" id="roles" class="form-control select2"
                                                    multiple>
                                                    @foreach ($roles as $role)
                                                        <option @selected($user->roles->contains($role))
                                                            value="{{ $role->name }}">
                                                            {{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success bg-success float-right">
                                    Update User
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
