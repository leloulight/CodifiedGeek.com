
<div class="form-group">
    {!! Form::label('title', 'Category Title:') !!}<span class="text-danger"><strong>*</strong></span>
    {!! Form::text('title', null, ['class' => 'form-control','required'=>'']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Category Description:') !!}<span class="text-danger"><strong>*</strong></span>
    {!! Form::textarea('description', null, ['class' => 'form-control','required'=>'']) !!}
</div>
<div class="form-group row">
    <div class="col-md-2">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
    </div>
    <a href="/skillcategories" title="Cancel" class="btn btn-danger">Cancel</a>
</div>

<script type="text/javascript">
    //validate the form in the front end
    $('document').ready(function() {
        $('#skillcategoriesform').validate({
            messages : {
                title:'The Category title field is required!',
                description:'The Category description field is required!',
                    }


        });
    });
</script>