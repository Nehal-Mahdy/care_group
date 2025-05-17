<x-app-layout>
    @section('title', 'Create Product Review')
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
                                <a href="{{ route('productReviews.index', ['productSlug' => $productSlug]) }}"
                                    class="nav-link"><i class="fas fa-long-arrow-alt-left"></i>
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
                    <form action="{{ route('productReviews.store', ['productSlug' => $productSlug]) }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row ">
                            <div class="col-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Add Review</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="inputName">Comment</label>
                                            <textarea type="text" id="comment" name="comment" class="form-control" value="{{ old('comment') }}" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Rating</label>
                                            <select name="rating" id="rating" class="form-control">
                                                @foreach ($rateValues as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName">Customer</label>
                                            <select name="customer_id" id="customer_id" class="form-control">
                                                <option value="">Select Customer</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->full_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="when_submitted">When Submitted</label>
                                            <input type="date" id="when_submitted" name="when_submitted"
                                                class="form-control" value="{{ old('when_submitted') }}">
                                        </div>

                                    </div>

                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success bg-success float-right">
                                    Create new Review
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
