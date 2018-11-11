<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;

class DeleteController extends Controller
{
    public function delete($id,$number)
    {
        DB::table('auto')->where('number_auto', '=', $number)->delete();

        return redirect()->route('home');
    }
}
