
<div class="form-group">
    {!! Form::label('skilltitle', 'Skill Title:') !!}<span class="text-danger"><strong>*</strong></span>
    {!! Form::text('skilltitle', null, ['class' => 'form-control','required'=>'']) !!}
</div>
<div class="form-group">
    {!! Form::label('abbreviation', 'Abbreviation:') !!}
    {!! Form::text('abbreviation', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group row">
    <div class="col-md-4">
        {!! Form::label('skill_category_id', 'Skill Category:') !!}<span class="text-danger"><strong>*</strong></span>
        {!! Form::select('skill_category_id', $skill_categories, ['class' => 'form-control','required'=>'']) !!}
    </div>
    <div class="col-md-4">
        {!! Form::label('yearsexp', 'Years of Experience:') !!}<span class="text-danger"><strong>*</strong></span>
        {!! Form::select('yearsexp', array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','10+'=>'10+'), ['class' => 'form-control','required'=>'']) !!}
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
    </div>
    <a href="/skills" title="Cancel" class="btn btn-danger">Cancel</a>
</div>

<script type="text/javascript">
    //validate the form in the front end
    $('document').ready(function() {
        $('#skillform').validate();
    });
</script>