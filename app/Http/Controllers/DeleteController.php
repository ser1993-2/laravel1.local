<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;

class DeleteController extends Controller
{
    public function delete($id)
    {
        DB::table('auto')->where('id', '=', $id)->delete();

        return redirect()->route('home');
    }
}
