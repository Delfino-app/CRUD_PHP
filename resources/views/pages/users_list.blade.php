<table class="table responsiveTable table-hover responsive">
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
                <td>
                    {{$user->nome}}
                </td>
                <td>
                    {{$user->e_mail}}
                </td>
                <td>
                    {{date('d-m-Y',strtotime($user->created_at))}}
                </td>
                <td class="text-center" style="display: inline-flex">
                    <a href="{{route('edit.user',$user->id)}}" title="Editar" class="btn btn-dark btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>
                    <span class="separator"></span>
                    <a href="#" title="Eliminar" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>