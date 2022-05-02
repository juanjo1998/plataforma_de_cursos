<div class="card">
    <div class="card-header">
       <div>
           <input type="text" wire:model="search" class="form-control mb-3" placeholder="Buscar usuario">                               
       </div>
    </div>    
    @if ($users->count())
        
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>               

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td width="10px">
                            <a class="btn btn-warning" href="{{route('admin.users.edit',$user)}}">Editar</a>
                        </td>     
                        <td width="10px"></td>                  
                    </tr>                
                @endforeach
            </tbody>
        </table>
    </div>


    <div class="card-footer">
        {{$users->links()}}
    </div>

    @else

    <div class="card-body">
        <strong class="text-danger">
            No existen coincidencias
        </strong>
    </div>

    @endif

</div>    