@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Modificar usuario: {{$user->name}}</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Ingrese la información requerida</h3>
                </div>

                <div class="card-body">
                    <form action="{{url('/admin/users/'.$user->id.'/update')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nombre</label><b>*</b>
                                    <input type="text" value="{{$user->name}}" name="name" class="form-control" minlength="4" maxlength="20" pattern="[A-Za-z\s]+" title="Solo se permiten letras" required>
                                    @error('name')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Correo</label><b>*</b>
                                    <input type="email" value="{{$user->email}}" name="email" class="form-control" maxlength="50" required>
                                    @error('email')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('admin/users/usersIndex') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-success">Actualizar usuario</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection