<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $lessons->name }}</p>
</div>

<!-- Type Id Field -->
<div class="col-sm-12">
    {!! Form::label('type_id', 'Type Id:') !!}
    <p>{{ $lessons->type_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $lessons->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $lessons->updated_at }}</p>
</div>

