
<div class="form-group">
    {!! Form::label('company', 'Company Name:') !!}<span class="text-danger"><strong>*</strong></span>
    {!! Form::text('company', null, ['class' => 'form-control','required'=>'']) !!}
</div>
<div class="form-group">
    {!! Form::label('jobtitle', 'Job Title:') !!}<span class="text-danger"><strong>*</strong></span>
    {!! Form::text('jobtitle', null, ['class' => 'form-control','required'=>'']) !!}
</div>
<div class="form-group">
    {!! Form::label('currentlyemployed', 'Currently Employed:') !!}<span class="text-danger"><strong>*</strong></span>
    {!! Form::select('currentlyemployed', array('1' => 'Yes', '0' => 'No'), ['class' => 'form-control','required'=>'']) !!}
</div>
<div class="form-group row">
    <div class="col-md-6">
        {!! Form::label('startdate', 'Start Date:') !!}<span class="text-danger"><strong>*</strong></span>
        {!! Form::date('startdate', null, ['class' => 'form-control','required'=>'']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('enddate', 'Date Left/Quit:') !!}<span class="text-danger"><strong>*</strong></span>
        {!! Form::date('enddate', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6">
        {!! Form::label('city', 'City:') !!}<span class="text-danger"><strong>*</strong></span>
        {!! Form::text('city', null, ['class' => 'form-control','required'=>'']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('state', 'State:') !!}<span class="text-danger"><strong>*</strong></span><br />
        {!! Form::select('state', array('AL'=>'ALABAMA',
            'AK'=>'ALASKA',
            'AS'=>'AMERICAN SAMOA',
            'AZ'=>'ARIZONA',
            'AR'=>'ARKANSAS',
            'CA'=>'CALIFORNIA',
            'CO'=>'COLORADO',
            'CT'=>'CONNECTICUT',
            'DE'=>'DELAWARE',
            'DC'=>'DISTRICT OF COLUMBIA',
            'FM'=>'FEDERATED STATES OF MICRONESIA',
            'FL'=>'FLORIDA',
            'GA'=>'GEORGIA',
            'GU'=>'GUAM GU',
            'HI'=>'HAWAII',
            'ID'=>'IDAHO',
            'IL'=>'ILLINOIS',
            'IN'=>'INDIANA',
            'IA'=>'IOWA',
            'KS'=>'KANSAS',
            'KY'=>'KENTUCKY',
            'LA'=>'LOUISIANA',
            'ME'=>'MAINE',
            'MH'=>'MARSHALL ISLANDS',
            'MD'=>'MARYLAND',
            'MA'=>'MASSACHUSETTS',
            'MI'=>'MICHIGAN',
            'MN'=>'MINNESOTA',
            'MS'=>'MISSISSIPPI',
            'MO'=>'MISSOURI',
            'MT'=>'MONTANA',
            'NE'=>'NEBRASKA',
            'NV'=>'NEVADA',
            'NH'=>'NEW HAMPSHIRE',
            'NJ'=>'NEW JERSEY',
            'NM'=>'NEW MEXICO',
            'NY'=>'NEW YORK',
            'NC'=>'NORTH CAROLINA',
            'ND'=>'NORTH DAKOTA',
            'MP'=>'NORTHERN MARIANA ISLANDS',
            'OH'=>'OHIO',
            'OK'=>'OKLAHOMA',
            'OR'=>'OREGON',
            'PW'=>'PALAU',
            'PA'=>'PENNSYLVANIA',
            'PR'=>'PUERTO RICO',
            'RI'=>'RHODE ISLAND',
            'SC'=>'SOUTH CAROLINA',
            'SD'=>'SOUTH DAKOTA',
            'TN'=>'TENNESSEE',
            'TX'=>'TEXAS',
            'UT'=>'UTAH',
            'VT'=>'VERMONT',
            'VI'=>'VIRGIN ISLANDS',
            'VA'=>'VIRGINIA',
            'WA'=>'WASHINGTON',
            'WV'=>'WEST VIRGINIA',
            'WI'=>'WISCONSIN',
            'WY'=>'WYOMING',
            'AE'=>'ARMED FORCES AFRICA \ CANADA \ EUROPE \ MIDDLE EAST',
            'AA'=>'ARMED FORCES AMERICA (EXCEPT CANADA)',
            'AP'=>'ARMED FORCES PACIFIC'), ['class' => 'form-control','required'=>'']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('jobdescription', 'Job Description:') !!}<span class="text-danger"><strong>*</strong></span>
    {!! Form::textarea('jobdescription', null, ['class' => 'form-control','required'=>'']) !!}
</div>
<div class="form-group row">
    <div class="col-md-2">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
    </div>
    <a href="/jobs" title="Cancel" class="btn btn-danger">Cancel</a>
</div>

<script type="text/javascript">
    //validate the form in the front end
    $('document').ready(function() {
        $('#jobform').validate();
    });
</script>