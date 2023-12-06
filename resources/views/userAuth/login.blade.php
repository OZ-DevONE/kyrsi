@extends('layouts.nav')
    
@section('contanier')
<div class="container mt-5 d-flex justify-content-center" style="color:rgb(255, 255, 255); text-align: center;">
    <div class="col-md-3">
        <form method="POST" action="{{ route('auth.loginin-user') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email адрес</label>
                <input type="email" class="form-control" name="email" placeholder="email@gmail.com" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" class="form-control" name="password" placeholder="Пароль" required>
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
            @error('err')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </form>
        <p class="mt-1">Нету профиля? <a href="{{ route('user.register') }}">Создать.</a></p>
    </div>
</div>
@endsection
