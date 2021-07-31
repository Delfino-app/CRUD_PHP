@extends('layout.template')
@section('titulo','Inicio')

@section('conteudo')
    <div class="container">
        <div class="row justify-content-center p-20">
            <div class="col-lg-8">
                <div class="row bg-white content-inicio">
                    <div class="col-lg-12 p-20">
                        <h3 class="text-info float-letf">
                            Usuários
                        </h3>
                        <hr>
                    </div>
                    <div class="col-lg-12 p-20 list-user-content">
                        <div class="w-100" id="displayInfo">
                        </div>
                        @if((isset($lista)) && (!empty($lista)))
                            @include('pages.users_list')
                        @else
                            @include('pages.empty_list')
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <hr>
                        <a href="{{route('new.user')}}" class="float-right btn btn-primary btn-sm">
                            <i class="fa fa-plus-circle"></i> Novo Usuário
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('add-js')
    <script src="{{asset('js/User/delete.js')}}" type="module"></script>
@endsection