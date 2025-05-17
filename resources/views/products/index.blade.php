<x-app-layout>
    @section('title', 'Products')
    <div class="content-wrapper mx-auto">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{ route('products.create') }}" class="btn btn-success">New Product <i
                                class="fas fa-plus"></i>
                        </a>
                    </div>

                    <div class="col-sm-6 d-flex justify-content-end">
                        <div class="btn-group dropleft">
                            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon rounded-0"
                                data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <button type="button" class="btn btn-info rounded-0">Filter Product</button>

                            <div class="dropdown-menu" role="menu" style="">
                                <a class="dropdown-item" href="{{ route('products.index') }}">All</a>
                                <div class="dropdown-divider"></div>

                                @foreach ($categories as $category)
                                    <a class="dropdown-item"
                                        href="{{ route('products.index') }}?filter[category.slug]={{ $category->slug }}">{{ $category->name }}</a>
                                @endforeach

                                <div class="dropdown-divider"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card overflow-auto">
                <div class="card-header">
                    <h3 class="card-title">Products</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects" id="indexTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $index => $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        {{ $product->name }}
                                    </td>

                                    <td>
                                        {{ $product->slug }}
                                    </td>
                                    <td>
                                        {{ $product->description }}
                                    </td>

                                    <td>
                                        {{ $product->category->name }}
                                    </td>
                                    <td>
                                        {{ $product->price }}
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group dropleft">
                                            <button type="button"
                                                class="btn btn-info dropdown-toggle dropdown-icon rounded-0"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <button type="button" class="btn btn-info rounded-0">Product
                                                Actions</button>

                                            <div class="dropdown-menu" role="menu" style="">
                                                <a class="dropdown-item btn btn-info "
                                                    href="{{ route('products.edit', $product->id) }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    Edit
                                                </a>
                                                <div class="dropdown-divider"></div>

                                                <form class="dropdown-item"
                                                    action="{{ route('products.destroy', $product->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="border-0 p-0">
                                                        <i class="fas fa-trash"></i>
                                                        Delete
                                                    </button>
                                                </form>



                                            </div>
                                        </div>



                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>

</x-app-layout>
