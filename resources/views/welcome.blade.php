@extends('layouts.nav')


@section('contanier')
<div class="categories">
    @foreach ($categories as $category)
        <a href="{{ request()->fullUrlWithQuery(['category' => $category]) }}">{{ $category }}</a>
    @endforeach
</div>
{{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    {{-- слайдер --}}
    <div class="container mt-5">
        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://romansementsov.ru/wp-content/uploads/2021/05/%D0%B8%D0%B7%D0%BE%D0%B1%D1%80%D0%B0%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5_2021-05-15_145052.png" class="d-block w-100" alt="C#">
            </div>
            <div class="carousel-item">
                <img src="https://romansementsov.ru/wp-content/uploads/2021/08/%D0%B8%D0%B7%D0%BE%D0%B1%D1%80%D0%B0%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5_2021-08-11_105031.png" class="d-block w-100" alt="C++">
            </div>
            <div class="carousel-item">
                <img src="https://romansementsov.ru/wp-content/uploads/2021/05/%D0%B8%D0%B7%D0%BE%D0%B1%D1%80%D0%B0%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5_2021-05-10_222332.png" class="d-block w-100" alt="Python">
            </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    {{-- слайдер --}}

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
                {{-- перебираем полученный массив и на каждый элемент достаем данные по его индексу --}}
                @foreach ($courses as $course)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ $course->img_src }}" class="card-img-top" alt="Изображение курса">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->title }}</h5>
                                <p class="card-text">{{ $course->description }}</p>
                                @auth
                                    <form action="{{ route('course.apply', $course->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-secondary">Оставить заявку</button>
                                    </form>
                                @endauth
                            </div>
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