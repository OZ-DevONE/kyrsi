<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthUser extends Controller
{
    // Функция регистрации нового пользователя
    public function registerUser(Request $request){
        // Проверка на аунтификацию пользователя
        if(Auth::check()){
            return redirect(route('user.home'));
        }

        // Проверка всех данных которые были переданы
        $validFields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        // Проверка на существование пользователя с таким email
        if (User::where('email', $validFields['email'])->exists()) {
            return redirect(route('user.register'))->withErrors([
                'email' => 'Данный пользователь с таким email, уже существует!'
            ]);
        }

        $user = User::create($validFields);
        if($user){
            Auth::login($user);
            return redirect(route('user.home'));
        }
    }

    // Функция входа для пользователя
    public function loginInUser(Request $request){
        // Проверка на аунтификацию пользователя
        if(Auth::check()){
            return redirect(route('user.home'));
        }

        $formFields = $request->only(['email','password']);
        if(Auth::attempt($formFields)){
            return redirect(route('user.home'));
        }
        return redirect(route('user.login'))->withErrors([
            'err' => 'Ошибка не верные данные для входа!'
        ]);
    }
}