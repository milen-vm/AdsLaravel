<div class="form-group">
    {{ Form::label('text', 'Text', ['class' => 'control-label',]) }}
    {{ Form::textarea('text', $comment->text, ['class' => 'form-control', 'rows' => 5, 'required' => 'required',]) }}
</div>