@extends('template')

@section('contenu')
<br>
  <div class="col-sm-offset-3 col-sm-6">
    <div class="panel panel-info">
      <div class="panel-heading">Inscrivez-vous !</div>
      <div class="panel-body">
        {!! Form::open(array('action' => 'Auth\RegisterController@create')) !!}
        <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Votre identifiant']) !!}
        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
        {{ Form::password('password', array('placeholder'=>'Votre mot de passe', 'class'=>'form-control' ) ) }}
        {!! $errors->first('password', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Votre email']) !!}
        {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
        </div>
        {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@stop
