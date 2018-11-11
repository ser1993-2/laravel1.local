<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    public function edit($id)
    {
        $date = [
            'title' => 'Автостоянка на Столетова',
            'pagetitle' => 'Редактирование',
            'message' => DB::table('users')
                ->join('auto', 'users.id', '=', 'user_id')
                ->select('users.*', 'auto.*','auto.id as auto_id')
                ->where('users.id', '=', $id)
                ->get()
        ];

        return view('pages.messages.edit',$date);
    }
}
