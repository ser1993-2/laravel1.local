<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;

class StatController extends Controller
{
    public function editStat($u_id,$a_id,request $request)
    {
        $new = $request->input('select');

        DB::table('auto')
            ->where('id', $a_id)
            ->update(['status' => $new]);

        return redirect()->route('edit',$u_id);
    }
}
