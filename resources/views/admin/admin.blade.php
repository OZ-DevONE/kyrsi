@extends('layouts.nav')


@section('contanier')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        {{-- Проверка есть ли курсы --}}
        @if($courses->isNotEmpty()) 
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ $course->img_src }}" class="card-img-top" alt="Изображение курса">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->title }}</h5>
                                <p class="card-text">{{ $course->description }}</p>
                                {{-- @auth
                                    <form action="{{ route('course.apply', $course->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-secondary">Оставить заявку</button>
                                    </form>
                                @endauth --}}

                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.edit', $course->id) }}" class="btn btn-success">Изменить</a>
                            <form action="{{ route('admin.destroy', $course->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- макс на страницу выдается только 6 курсов, исполььзуется пагинация если курсов больше --}}
            {{ $courses->links() }}
        @else
            <div class="alert alert-warning" role="alert">
                Курсы пока отсутствуют.
            </div>
        @endif
    </div> 
@endsection