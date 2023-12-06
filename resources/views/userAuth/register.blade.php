@extends('layouts.nav')
    
@section('contanier')
<div class="container mt-5 d-flex justify-content-center" style="position: relative; z-index: 1; color:rgb(255, 255, 255); text-align: center;">
    <div class="col-md-3">
        <form method="POST" action="{{ route('auth.register-user') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Имя</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email адрес</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" required>
            @error('email')
                <div class="alert alert-danger" role="alert">
                {{$message}}
                </div>
            @enderror
            </div>
            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>   
    </div>
</div>
@endsection