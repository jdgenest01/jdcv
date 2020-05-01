@if ($errors->any())
<div class="alert alert-danger" role="alert">

    {!! implode('', $errors->all('<div>:message</div>')) !!}
</div>
@endif

@if ( isset($success) )
<div class="alert alert-success" role="alert">
    Saved
</div>
@endif
