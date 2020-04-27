@extends('backend/layouts/app')

@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Orders</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="breadcrumb-item">Orders</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <a href="#" class="btn btn-primary btn-sm">Add</a>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_filter pt-2">
                                    Showing {{ $orders->firstItem() }}
                                    to {{ $orders->lastItem() }}
                                    of {{ $orders->total() }} entries
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-hover table-bordered" id="sampleTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Created At</th>
                                            <th>Address</th>
                                            <th>Items</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->created_at->toDayDateTimeString() }}</td>
                                            <td>
                                                <pre>{{ $order->address }}</pre>
                                            </td>
                                            <td>{{ $order->orderItems->count() }}</td>
                                            <td><a href="{{ route('admin.orders.show', $order) }}" class="btn btn-primary btn-sm w-100">View</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="pagination justify-content-center">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection