@extends('layouts.nav')

@section('contanier')
<div class="container mt-5 d-flex justify-content-center" style="color:rgb(255, 255, 255); text-align: center;">
    <div class="col-md-6">
        <h2 style="color: white;">Редактирование курса</h2>
        {{-- Показать ошибки валидации --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Форма редактирования курса --}}
        <form action="{{ route('admin.update', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            {{-- Название курса --}}
            <div class="form-group mb-3">
                <label style="color: white;" for="title">Название</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $course->title }}" required>
            </div>

            {{-- Описание курса --}}
            <div class="form-group mb-3">
                <label style="color: white;" for="description">Описание</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $course->description }}</textarea>
            </div>

            {{-- Изображение курса --}}
            <div class="form-group mb-3">
                <label style="color: white;" for="img_src">Ссылка на изображение</label>
                <input type="text" class="form-control" id="img_src" name="img_src" value="{{ $course->img_src }}" required>
            </div>

            {{-- Кнопка отправки формы --}}
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
</div>
@endsection
