@extends('layout.template')
@section('titulo','Novo Usuário')
@section('add-css')
<link rel="stylesheet" href="{{asset('asset/css/custom.css')}}" type="text/css">
@endsection
@section('conteudo')
    <div class="container">
        <div class="row justify-content-center p-20">
            <div class="col-lg-8">
                <div class="row bg-white content-inicio">
                    <div class="col-lg-12 p-20">
                        <h3 class="text-info float-letf">
                            Novo Usuário
                        </h3>
                        <hr>
                    </div>
                    <div class="col-lg-12 p-20">
                        <form id="formulario" method="POST">
                            @include('pages._includes.form_inputs')
                            <hr>
                            <div class="w-100 form-group">
                                <div class="float-right">
                                    <a href="{{route('home')}}" class="btn btn-dark btn-sm">
                                        Cancelar
                                    </a>
                                    <button class="btn btn-primary btn-sm" type="submit">
                                        <i class="fa fa-save"></i> Salvar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('add-js')
    <script src="{{asset('js/plugin/jQuery-Mask/src/jquery.mask.js')}}"></script>
    <script src="{{asset('js/plugin/jquery-validation/dist/jquery.validate.js')}}"></script>
	<script src="{{asset('js/plugin/jquery-validation/dist/additional-methods.js')}}"></script>
    <script src="{{asset('js/User/new.js')}}" type="module"></script>
    @include('pages._includes.validate')
@endsection