{{-- emailSeller.blade.php
    This view provides the form to email a seller for a listing
    --}}
@unless(count($errors) === 0)
<div class="alert alert-warning">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{ $error }}
        </li>
        @endforeach
    </ul>
</div>
@endunless
@if(Session::has('message'))
<div class="alert alert-info">
    @foreach(Session::get('message') as $message)
    {{ $message }} <br>
    @endforeach
</div>
@endif

{!! Form::open(array('route' => ['email_seller', $id], 'class' => 'form')) !!}

{!! Form::hidden('sellerEmail', $sellerEmail) !!}
<div class="form-group">
    {!! Form::label('Your Name') !!}
    {!! Form::text('name', null, 
    array('required', 
    'class'=>'form-control', 
    'placeholder'=>'Your name')) !!}
</div>

<div class="form-group">
    {!! Form::label('Your E-mail Address') !!}
    {!! Form::text('email', null, 
    array('required', 
    'class'=>'form-control', 
    'placeholder'=>'Your e-mail address')) !!}
</div>

<div class="form-group">
    {!! Form::label('Your Message') !!}
    {!! Form::textarea('message', null, 
    array('required', 
    'class'=>'form-control', 
    'placeholder'=>'Your message')) !!}
</div>

<div class="form-group">
    {!! Form::submit('Email seller', 
    array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}