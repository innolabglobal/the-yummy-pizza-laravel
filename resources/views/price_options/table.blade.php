<div class="table-responsive">
    <table class="table" id="priceOptions-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Value</th>
        <th>Menu Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($priceOptions as $priceOption)
            <tr>
                <td>{{ $priceOption->name }}</td>
            <td>{{ $priceOption->value }}</td>
            <td>{{ $priceOption->menu_id }}</td>
                <td>
                    {!! Form::open(['route' => ['priceOptions.destroy', $priceOption->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('priceOptions.show', [$priceOption->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('priceOptions.edit', [$priceOption->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
