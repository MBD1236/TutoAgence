<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function formUser() {
        return view ('register');
    }

    public function addUser(RegisterRequest $request) {
        $data = $request->validated();
        $mdp = $request->validated('password');
        $mdp = Hash::make($mdp);
        $data['password'] = $mdp;
        User::create($data);
        return to_route('login');
    }
}
