<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            'nomes' => [
                'Matheus Gomes', 
                'José Lira'
            ]
        ];

        dd($users);
    }

    public function show($id) 
    {
        dd('ID do usuário: '.$id);
    }
}
