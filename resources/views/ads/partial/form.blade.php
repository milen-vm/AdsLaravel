<div class="form-group">
    {{ Form::label('title', 'Title', ['class' => 'control-label',]) }}
    {{ Form::text('title', $ad->title, ['class' => 'form-control', 'required' => 'required',]) }}
</div>

<div class="form-group">
    {{ Form::label('text', 'Text', ['class' => 'control-label',]) }}
    {{ Form::textarea('text', $ad->text, ['class' => 'form-control', 'rows' => 5,]) }}
</div>

<div class="form-group">
    {{ Form::label('name', 'Name', ['class' => 'control-label',]) }}
    {{ Form::text('name', $ad->name, ['class' => 'form-control', 'required' => 'required',]) }}
</div>

<div class="form-group">
    {{ Form::label('phone', 'Phone', ['class' => 'control-label',]) }}
    {{ Form::text('phone', $ad->phone, ['class' => 'form-control', 'required' => 'required',]) }}
</div>

<div class="form-group">
    {{ Form::label('is_free', 'Is Free', ['class' => 'control-label', 'required' => 'required',]) }}
    {{ Form::checkbox('is_free', null, $ad->is_free) }}
</div>