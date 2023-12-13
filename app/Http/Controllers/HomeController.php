<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseApplication;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        //Переменная categories Course модель выбираем category метод distinct который выдает уникальные значнеия не повторения метод pluck извлекает данные и возвращает данные
        $categories = Course::select('category')->distinct()->pluck('category');

        // Получаем значение категории из запроса. Если в запросе присутствует параметр 'category',
        // его значение присваивается переменной $category.
        $category = $request->query('category');
        
        // Если есть курсы, выводи только курсы по категории и используем пагинацию 
        if ($category) {
            $courses = Course::where('category', $category)->paginate(3);
        } else {
            $courses = Course::paginate(3);
        }
    
        // Возвращаем представление welcome и передаем в него данные курсов, категорий и заявок пользователя.
        return view('welcome', compact('courses', 'categories'));
    }
}
