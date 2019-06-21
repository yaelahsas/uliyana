@extends('layouts.admin')
@section('content')
    <h1>Mahasiswa</h1>
    @if(session('deleted_mahasiswa'))

           <div class="alert alert-danger" role="alert">{{session('deleted_mahasiswa')}}</div>

           @endif

           @if(session('edit_mahasiswa'))

                  <div class="alert alert-success" role="alert">{{session('edit_mahasiswa')}}</div>

   @endif


    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Kelas</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @if($mahasiswa)
            @foreach($mahasiswa as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->kelas->name}}</td>
            <td>{{$user->jenis_kelamin ==  1 ? 'Laki-Laki' : 'Perempuan'}}</td>
            <td>{{$user->alamat}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
            <td>
            <a href="{{route('mahasiswa.edit', $user->id)}}" class="btn btn-warning col-sm-4 fa fa-edit" style="margin-right:  5px" ></a>
            <form action="{{ route('mahasiswa.destroy', $user->id)}}" method="post">
                    @csrf
                    @method('DELETE')
            <button class="btn btn-danger col-sm-4 fa fa-trash" type="submit"></button>
            </form></td>

        </tr>

            @endforeach

            @endif
        </tbody>
      </table>
@stop
