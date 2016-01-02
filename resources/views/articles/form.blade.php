<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::textarea('body', null, ['class' => 'form-control wysiwyg-editor', 'placeholder' => 'Enter text...']) !!}
</div>
<div class="form-group">
    {!! Form::label('image', 'Main Image (jpeg or png):') !!}
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('thumbimage', 'Thumbnail Image (jpeg or png):') !!}
    {!! Form::file('thumbimage', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>