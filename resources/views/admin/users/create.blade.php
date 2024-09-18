@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de usuario</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese la información requerida</h3>
                </div>

                <div class="card-body">
                    <form action="{{url('/admin/users/storeUser')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nombre</label><b>*</b>
                                    <input type="text" value="{{old('name')}}" name="name" class="form-control" minlength="4" maxlength="40" pattern="[A-Za-z\s]+" title="Solo se permiten letras" required>
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
                                    <input type="email" value="{{old('email')}}" name="email" class="form-control" maxlength="50" required>
                                    @error('email')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Contraseña</label><b>*</b>
                                    <input type="password" name="password" class="form-control" minlength="4" maxlength="20" required>
                                    @error('password')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Verificar contraseña</label><b>*</b>
                                    <input type="password" name="password_confirmation" class="form-control" minlength="4" maxlength="20" required>
                                    @error('password_confirmation')
                                    <small style="color:red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('admin/users/usersIndex') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Registrar usuario</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
