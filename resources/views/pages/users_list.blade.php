<table class="table responsiveTable table-hover">
    <thead>
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Data Registro</th>
        <th>Acções</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($lista as $user)
            <tr>
                <td class="tdwidthMobile">
                    {{$user->nome}}
                </td>
                <td class="tdwidthMobile">
                    {{$user->e_mail}}
                </td>
                <td class="tdwidthMobile">
                    {{date('d-m-Y',strtotime($user->created_at))}}
                </td>
                <td class="tdwidthMobile text-center" style="display: inline-flex">
                    <a href="{{route('edit.user',$user->id)}}" title="Editar" class="btn btn-dark btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>
                    <span class="separator"></span>
                    <a href="#" title="Eliminar" data-toggle="modal" reference="{{$user->id}}" data-target="#modalDelete" class="btn btn-danger btn-delete-user btn-sm">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@include('pages._includes.modalDelete')