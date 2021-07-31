<div class="row">
    @csrf
    <div class="form-group col-lg-12 col-sm-12" id="displayInfo">
    </div>
    <div class="form-group col-lg-6 col-sm-6">
        <label class="col-form-label">Nome</label>
        <input type="text" id="nome" name="nome" placeholder="Nome" class="form-control" value="{{isset($user)?$user->nome:''}}" required/>
    </div>
    <div class="form-group col-lg-6 col-sm-6">
        <label class="col-form-label">E-mail</label>
        <input type="email" placeholder="E-mail" id="e_mail" name="e_mail" class="form-control" value="{{isset($user)?$user->e_mail:''}}" required/>
    </div>
    <div class="form-group col-lg-6 col-sm-6">
        <label class="col-form-label">Senha </label>
        <input type="password" id="password" name="password" minlength="8" maxlength="8" placeholder="{{isset($user)?'Nova senha':'Senha'}}" class="form-control" {{isset($user)?null:'required'}}/>
    </div>
    <div class="form-group col-lg-6 col-sm-6">
        <label class="col-form-label">Data de Nascimento</label>
        <input type="date" id="data_de_nascimento" name="data_de_nascimento" value="{{isset($user)?($user->data_de_nascimento? $user->data_de_nascimento:null):null}}" class="form-control" placeholder="dia/mês/ano"/>
    </div>
    @if(isset($user))
        <input type="hidden" name="user_reference" id="user_reference" value="{{$user->id}}">
        <div class="form-group col-lg-6 col-sm-6">
            <label class="col-form-label">Data de Registro</label>
            <input type="text" class="form-control" readonly="true" value="{{date('d/m/Y',strtotime($user->created_at))}}">
        </div>
    @endif
</div>