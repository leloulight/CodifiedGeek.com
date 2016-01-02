
<div class="form-group">
    {!! Form::label('description', 'Achievement Description:') !!}<span class="text-danger"><strong>*</strong></span>
    {!! Form::textarea('description', null, ['class' => 'form-control','required' =>'']) !!}
</div>
<div class="form-group">
    {!! Form::label('url', 'Website URL:') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group row">
    <div class="col-md-2">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
    </div>
    <a href="/jobs" title="Cancel" class="btn btn-danger">Cancel</a>
</div>

<script type="text/javascript">
    $('document').ready(function() {
        $('#achievementform').validate();
    });
</script>