@if ($errors->any())
    <div class="container">
        <ul class="alert row alert-danger" style="list-style-type: none;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif