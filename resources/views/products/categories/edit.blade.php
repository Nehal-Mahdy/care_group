<x-app-layout>
    @section('title', 'Edit Product Category')
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
                                <a href="{{ route('productCategories.index') }}" class="nav-link"><i
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
                    <form action="{{ route('productCategories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Update Category</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="inputName">Category Name</label>
                                            <input type="text" id="name" name="name"
                                                value="{{ $category->name }}" class="form-control" />
                                        </div>

                                        {{-- slug --}}
                                        <div class="form-group
                                            ">
                                            <label for="inputSlug">Slug</label>
                                            <input type="text" id="slug" name="slug"
                                                value="{{ $category->slug }}" class="form-control" />

                                        </div>



                                        <div class="form-group">
                                            <label for="inputDescription">Description</label>
                                            <textarea id="description" name="description" class="form-control" rows="4">{{ $category->description }}</textarea>
                                        </div>
                                    </div>

                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success bg-success float-right">
                                    Update Category
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
