<x-app-layout>
    @section('title', 'Create Product')
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
                                <a href="{{ route('products.index') }}" class="nav-link"><i
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
                <div class="col-md-12 mx-auto">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Add Product</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputName">Name</label>
                                                    <input type="text" id="name" name="name"
                                                        class="form-control" value="{{ old('name') }}" />
                                                </div>
                                            </div>






                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="summernote" id="description" name="description">
                                                        {{ old('description') }}
                                                    </textarea>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="category" class="required form-label">category</label>
                                                    <select class="form-control select2 select2-success"
                                                        data-dropdown-css-class="select2-success" name="category_id"
                                                        style="width: 100%;">
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            Upload Image
                                        </h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="imgUp">
                                            <div class="imagePreview"></div>
                                            <label class="btn btn-primary">
                                                Upload<input type="file" class="uploadFile img" value="Upload Photo"
                                                    style="width: 0px;height: 0px;overflow: hidden;" name="image"
                                                    accept="image/*">
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            Price
                                        </h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="inputName">Price</label>
                                                        <input type="number" id="price" name="price"
                                                            class="form-control" value="{{ old('price') }}" />
                                                    </div>
                                                </div>



                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12 mb-4">
                                <button type="submit" class="btn btn-success bg-success float-right">
                                    Create new Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
