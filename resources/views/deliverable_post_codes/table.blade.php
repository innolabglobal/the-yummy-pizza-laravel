<div class="table-responsive">
    <table class="table" id="deliverablePostCodes-table">
        <thead>
            <tr>
                <th>Post Code</th>
        <th>Status</th>
        <th>Delivery Fees</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($deliverablePostCodes as $deliverablePostCode)
            <tr>
                <td>{{ $deliverablePostCode->post_code }}</td>
            <td>{{ $deliverablePostCode->status }}</td>
            <td>{{ $deliverablePostCode->delivery_fees }}</td>
                <td>
                    {!! Form::open(['route' => ['deliverablePostCodes.destroy', $deliverablePostCode->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('deliverablePostCodes.show', [$deliverablePostCode->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('deliverablePostCodes.edit', [$deliverablePostCode->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
