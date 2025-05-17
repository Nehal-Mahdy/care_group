<x-app-layout>
    @section('title', 'Orders')
    <div class="content-wrapper mx-auto">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                        <div class="btn-group dropleft">
                            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon rounded-0"
                                data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <button type="button" class="btn btn-info rounded-0">Filter Orders</button>

                            <div class="dropdown-menu" role="menu" style="">
                                <a class="dropdown-item" href="{{ route('orders.index') }}">All</a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ route('orders.index') }}?filter[paid]=true">Paid</a>
                                <a class="dropdown-item"
                                    href="{{ route('orders.index') }}?filter[paid]=false">Unpaid</a>
                                <a class="dropdown-item"
                                    href="{{ route('orders.index') }}?filter[cancelled]=true">Cancelled</a>

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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Orders</h3>

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
                                <th>Order Number</th>
                                <th>Name</th>
                                <th>Order Date</th>
                                <th>Total (£)</th>
                                <th>Paid</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $index => $order)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                    <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                    <td>£{{ number_format($order->total_price, 2) }}</td>
                                    <td>{{ $order->paid ? 'Yes' : 'No' }}</td>
                                    <td>{{ $order->payment_method ?? 'N/A' }}</td>
                                    <td>{{ ucfirst($order->status) }}</td>
                                    <td class="text-right">
                                        <div class="btn-group dropleft">
                                            <button type="button"
                                                class="btn btn-info dropdown-toggle dropdown-icon rounded-0"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <button type="button" class="btn btn-info rounded-0">Order
                                                Actions</button>

                                            <div class="dropdown-menu" role="menu" style="">


                                                <form class="dropdown-item"
                                                    action="{{ route('orders.destroy', $order->id) }}" method="POST">
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
                            @endforeach
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
