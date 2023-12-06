<?php

use App\Http\Controllers\AdminCourseController;
use App\Models\Course;
use App\Http\Controllers\AuthUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseApplicationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;

// Вывод страницы с курсами в максимальный размер 3 штуки и с использованиемм пагинации
Route::get('/', function () {
    $courses = Course::paginate(3);
    // Вовращаем группу типа массива из которого мы потом будем вытаскивать элементы по их индексу
    return view('welcome', compact('courses'));
});


//Группа пользователя
Route::name('user.')->group(function(){
    //Роутер отображения активных заявок
    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

    // Роутер пользователя, страница входа в личный кабинет.
    Route::get('/login', function(){
        if(Auth::check()){
            return redirect(route('user.home'));
        }
        return view('userAuth.login');
    })->name('login');

    // Роутер пользователя, страница регистрации для доступа к сайту.
    Route::get('/register', function(){
        if(Auth::check()){
            return redirect(route('user.home'));
        }
        return view('userAuth.register');
    })->name('register');
});

//Группа с конроллером аунтификации пользователя
Route::controller(AuthUser::class)->name('auth.')->group(function(){
    // Роутер post запроса на регистрацию пользователя
    Route::post('/register-user', 'registerUser')->name('register-user');

    // Роутер post запроса на авторизацию пользователя
    Route::post('/loginin-user', 'loginInUser')->name('loginin-user');

    // Роутер get запроса на logout пользователя
    Route::get('/logout', function(){
        Auth::logout();
        return redirect('/');
    })->name('logout');

});

Route::name('admin.')->group(function(){
    // Роутер рендера страницы админа
    Route::get('/admin', function(){
        $courses = Course::paginate(6);
        return view('admin.admin', compact('courses'));
    })->name('admin');

    // В группе маршрутов admin
    Route::delete('/admin/course/{course}', [AdminCourseController::class, 'destroy'])->name('destroy');
    Route::get('/admin/course/edit/{course}', [AdminCourseController::class, 'edit'])->name('edit');
    Route::post('/admin/course/edit/{course}', [AdminCourseController::class, 'update'])->name('update');

});


//Роутер заявки
Route::post('/course/apply/{course}', [CourseApplicationController::class, 'apply'])->name('course.apply')->middleware('auth');

//Роутер поиска 
Route::post('/search', [SearchController::class, 'search'])->name('search');
