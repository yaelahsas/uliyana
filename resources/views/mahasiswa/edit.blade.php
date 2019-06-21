@extends('layouts.admin')
@section('content')
    <h1>Edit Users</h1>


{!! Form::model($mahasiswa,['method'=>'PATCH','action'=>['MahasiswaController@update',$mahasiswa->id]]) !!}
        <div class="form-group">
            {!! Form::label('name','Nama:') !!}
            {!! Form::text('name',null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('kelas_id','Kelas:') !!}
            {!! Form::select('kelas_id',[''=>'Choose Options :']+ $kelas ,null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('jenis_kelamin','Jenis Kelamin:') !!}
            {!! Form::select('jenis_kelamin',[''=>'Choose Options :']+ $kelamin ,null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('alamat','Alamat:') !!}
            {!! Form::text('alamat',null, ['class'=>'form-control']) !!}
        </div>



        <div class="form-group">

            {!! Form::submit('Masukkan', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    @include('includes.error')

        @stop
