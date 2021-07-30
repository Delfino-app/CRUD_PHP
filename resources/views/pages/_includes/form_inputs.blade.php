<div class="row">
    <div class="form-group col-lg-6 col-sm-6">
        <label class="col-form-label">Nome</label>
        <input type="text" id="nome" name="nome" placeholder="Nome" class="form-control" value="{{isset($user)?$user->nome:''}}" required/>
    </div>
    <div class="form-group col-lg-6 col-sm-6">
        <label class="col-form-label">E-mail</label>
        <input type="email" placeholder="E-mail" name="e_mail" class="form-control" value="{{isset($user)?$user->e_mail:''}}" required/>
    </div>
    <div class="form-group col-lg-6 col-sm-6">
        <label class="col-form-label">Senha </label>
        <input type="text" name="password" minlength="8" maxlength="8" placeholder="{{isset($user)?'Nova senha':'Senha'}}" class="form-control" {{isset($user)?null:'required'}}/>
    </div>
    <div class="form-group col-lg-6 col-sm-6">
        <label class="col-form-label">Data de Nascimento</label>
        <input type="text" data-mask="00/00/0000" name="data_de_nascimento" value="{{isset($user)?date('d/m/Y',strtotime($user->data_de_nascimento)):null}}" class="form-control" placeholder="dia/mês/ano"/>
    </div>
</div>