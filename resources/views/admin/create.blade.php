@extends('layouts.app')

@section('content')

<style type="text/css">
    select.form-control:not([size]):not([multiple]) { height:calc(2.25rem + 9px); }
  </style>


<head>
<script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.maskedinput.js') }}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="js/validator.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#cep").mask("99999-999");
    $("#telefone").mask("(99).99999-9999");
});
</script>
</head>
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastro</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/usuario/store" data-toggle="validator">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">	Email </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                            <div>
                                <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                                    <label for="telefone" class="col-md-4 control-label">Telefone</label>
                                    <div class="col-md-6">
                                        <input id="telefone" type="text" class="form-control" name="telefone" value="{{ old('telefone') }}" >

                                        @if ($errors->has('telefone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('telefone') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                            </div>

                            <div>
                                <div class="form-group{{ $errors->has('cidade') ? ' has-error' : '' }}">
                                    <label for="cidade" class="col-md-4 control-label">Cidade</label>
                                    <div class="col-md-6">
                                        <input id="cidade" type="text" class="form-control" name="cidade" value="{{ old('cidade') }}" >

                                        @if ($errors->has('cidade'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cidade') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                            </div>

                                    <div>
                                    <div class="form-group{{ $errors->has('estadoid') ? ' has-error' : '' }}">
                                        <label for="estadoid" class="col-md-4 control-label">Estado</label>
                                        <div class="col-md-6">
	                                    {!!Form::select('estadoid', $list_estado, null, ['class'=>'form-control '])!!}
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('relacaoid') ? ' has-error' : '' }}">
                                        <label for="relacaoid" class="col-md-4 control-label">Tipo de Relação Com Roberto Fonseca</label>
                                        <div class="col-md-6">
	                                    {!!Form::select('relacaoid', $list_relacao, null, ['class'=>'form-control'])!!}
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
                                        <label for="endereco" class="col-md-4 control-label">Endereço</label>
                                        <div class="col-md-6">
	                                    {!!Form::text('endereco', null, ['class'=>'form-control'])!!}
                                        </div>
                                    </div>
                                    <div>
                                  <div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}">
                                      <label for="cep" class="col-md-4 control-label">CEP</label>
                                      <div class="col-md-6">
                                          <input id="cep" type="text"  class="form-control " name="cep" value="{{ old('cep') }}" >

                                          @if ($errors->has('cep'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('cep') }}</strong>
                                          </span>
                                          @endif
                                      </div>
                              </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">Senha</label>

                                    <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirmar Senha </label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                @if (Auth::check())

                                  <div  align="center">
                                    {!!Form::label('tipousuario', 'Tipo de Usuário:')!!}
                                          <label>
                                          	<input type="radio" name="tipousuario" value="0"
                                          	{{isset($usuario->tipousuario) && $usuario->tipousuario == 0 ? 'checked' : '' }}
                                          	required>Administrador
                                          </label>
                                          <label>
                                          	<input type="radio" name="tipousuario" value="1"
                                          	{{isset($usuario->tipousuario) && $usuario->tipousuario == 1 ? 'checked' : '' }}
                                          	required>Usuário
                                          </label><br>
                                  </div><br>
                                @else
                                @endif


                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Registrar
                                        </button>
                                        @if (Auth::check())
                                                <a href="/usuario" class="btn btn-primary">Cancelar</a>
                                          @else
                                                <a href="/publicacao" class="btn btn-primary">Cancelar</a>
                                        @endif
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
