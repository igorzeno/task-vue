<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function __invoke()
    {
        $tasks = [
            [
                'id' => 1,
                'name' => 'Vera',
                'age' => 45,
            ],
            [
                'id' => 2,
                'name' => 'Igor',
                'age' => 53,
            ],
            [
                'id' => 3,
                'name' => 'Petr',
                'age' => 48,
            ]
        ];
        return $tasks;
    }
}
