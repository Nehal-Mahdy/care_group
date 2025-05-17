<x-app-layout>
    @section('title', 'Order Details')
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
                                <a href="{{ route('orders.index') }}"
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
                    <p class="lead">Order Details</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width:50%">Reference:</th>
                                    <td>{{ $order->order_ref }}</td>
                                </tr>
                                <tr>
                                    <th>Made:</th>
                                    <td>{{ $order->order_placed_when }}</td>
                                </tr>
                                <tr>
                                    <th>Address:</th>
                                    <td>{{ $order->address_1 }}</td>
                                </tr>
                                <tr>
                                    <th>Postcode/Zip:</th>
                                    <td>{{ $order->postcode }}</td>
                                </tr>
                                <tr>
                                    <th>City:</th>
                                    <td>{{ $order->city }}</td>
                                </tr>
                                <tr>
                                    <th>Country:</th>
                                    <td>{{ $order->country }}</td>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <td>{{ $order->phone }}</td>
                                </tr>
                                <tr>

                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ $order->email }}</td>
                                </tr>
                                <tr>
                                    <th>Discount:</th>
                                    <td>{{ $order->discount }}</td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td>{{ $order->total_price }}</td>
                                </tr>
                                <tr>
                                    <th>Insured:</th>
                                    <td>{{ $order->insured ? 'Yes' : 'No' }}</td>
                                </tr>
                                <tr>
                                    <th>CPD:</th>
                                    <td>{{ $order->cpd }}</td>
                                </tr>
                                <tr>
                                    <th>Supervision Session Dates:</th>
                                    <td>{{ $order->session_dates }}</td>
                                </tr>
                                <tr>
                                    <th>Notes:</th>
                                    <td>{{ $order->notes }}</td>
                                </tr>
                                <tr>
                                    <th>Items:</th>
                                    <td>{{ $order->product->name }}</td>
                                </tr>
                                <tr>
                                    <th>Payment Method:</th>
                                    <td>{{ $order->payment_method }}</td>
                                </tr>
                                <tr>
                                    <th>Payment Option:</th>
                                    <td>{{ $order->payment_option }}</td>
                                </tr>
                                <tr>
                                    <th>Fully Paid:</th>
                                    <td>{{ $order->paid_when }}</td>
                                </tr>
                                <tr>
                                    <th>Admin Notes:</th>
                                    <td>{{ $order->admin_notes }}</td>
                                </tr>



                                <tr>
                                    <th>Cancelled:</th>
                                    <td>{{ $order->cancelled ? 'Yes' : 'No' }}
                                        @if ($order->cancelled)
                                            <br>
                                            <span class="text-danger">Cancelled on {{ $order->cancelled_when }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
    <th>Status:</th>
    <td>
        @if ($order->status === 'pending' && $order->payment_method === 'Bank Transfer')
            <span class="badge badge-warning">Pending</span>
            <form action="{{ route('orders.complete', $order->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-success btn-sm">Complete</button>
            </form>
            <form action="{{ route('orders.cancel', $order->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
            </form>
        @elseif ($order->status === 'completed')
            <span class="badge badge-success">Completed</span>
        @else
            <span class="badge badge-danger">Cancelled</span>
        @endif
    </td>
</tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</x-app-layout>
