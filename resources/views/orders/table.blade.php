<div class="table-responsive">
    <table class="table" id="orders-table">
        <thead>
            <tr>
                <th>Order Number</th>
        <th>User Id</th>
        <th>Status</th>
        <th>Grand Total</th>
        <th>Item Count</th>
        <th>Payment Status</th>
        <th>Payment Method</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>City</th>
        <th>Country</th>
        <th>Post Code</th>
        <th>Phone Number</th>
        <th>Notes</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->order_number }}</td>
            <td>{{ $order->user_id }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->grand_total }}</td>
            <td>{{ $order->item_count }}</td>
            <td>{{ $order->payment_status }}</td>
            <td>{{ $order->payment_method }}</td>
            <td>{{ $order->first_name }}</td>
            <td>{{ $order->last_name }}</td>
            <td>{{ $order->address }}</td>
            <td>{{ $order->city }}</td>
            <td>{{ $order->country }}</td>
            <td>{{ $order->post_code }}</td>
            <td>{{ $order->phone_number }}</td>
            <td>{{ $order->notes }}</td>
                <td>
                    {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('orders.show', [$order->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('orders.edit', [$order->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
