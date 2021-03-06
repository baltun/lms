<div class="table-responsive">
    <table class="table" id="lessons-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
        <th>Parent Id</th>
        <th>Type Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($lessons as $lessons)
            <tr>
                <td>{{ $lessons->id }}</td>
                <td>{{ $lessons->name }}</td>
                <td>{{ $lessons->parent_id }}</td>
                <td>{{ $lessons->type_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['lessons.destroy', $lessons->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('lessons.show', [$lessons->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('lessons.edit', [$lessons->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
