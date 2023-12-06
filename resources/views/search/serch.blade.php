@extends('layouts.nav')

@section('contanier')
    <div class="container mt-5">
        <h2 style="color: white;">Результаты поиска</h2>
        @if($courses->isNotEmpty())
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ $course->img_src }}" class="card-img-top" alt="Изображение курса">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->title }}</h5>
                                <p class="card-text">{{ $course->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                По вашему запросу ничего не найдено.
            </div>
        @endif
    </div>
@endsection
