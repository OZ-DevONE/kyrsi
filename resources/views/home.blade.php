@extends('layouts.nav')

@section('contanier')
    <div class="container mt-5">
        <h1 style="color:white;">Мои заявки</h1>
        
        {{-- Одобренные заявки --}}
        <h2 style="color:white;">Одобренные заявки</h2>
        @foreach ($applications as $application)
            @if($application->status == 'Одобрено' || $application->status == 'На рассмотрении')
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Заявка на курс: {{ $application->course->title }}</h5>
                        <p class="card-text">Статус: {{ $application->status }}</p>
                    </div>
                </div>
            @endif
        @endforeach

        {{-- другой статус заявок --}}
        <h2 style="color:white;">На рассмотрении</h2>
        @foreach ($applications as $application)
            @if($application->status != 'Одобрено' && $application->status != 'На рассмотрении')
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Заявка на курс: {{ $application->course->title }}</h5>
                        <p class="card-text">Статус: {{ $application->status }}</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
