<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;

class AddController extends Controller
{
    public function add($id,request $request)
    {

        if ($id == 0) {
            $this->setClient($request);
        }


        $this->setAuto($request);


        if ($id == 0) {
            $tel = $request->input('tel');
            $findClient = DB::table('users')->select('id')->where('phone', '=', $tel)->get();
            return redirect()->route('edit',$findClient[0]->id);
        }
                return redirect()->route('edit',$id);

    }

    public function setClient(request $request)
    {
            $name = $request->input('name');
            $gender = $request->input('gender');
            $tel = $request->input('tel');
            $adress = $request->input('adress');

            $findClient = DB::table('users')->select('phone')->where('phone', '=', $tel)->get();


            if (empty($findClient[0]->phone)) {
                DB::table('users')->insert([
                    ['username' => $name,
                        'gender' => $gender,
                        'phone' => $tel,
                        'adress' => $adress,]
                ]);
            }
    }

    public function setAuto(request $request)
    {

        $tel = $request->input('tel');
        $user_id = DB::table('users')->select('id')->where('phone', '=', $tel)->get();
        $brend = $request->input('brend');
        $model = $request->input('model');

        $color = $request->input('color');
        $number = $request->input('number');

        $findAuto = DB::table('auto')->select('number_auto')->where('number_auto', '=', $number)->get();

        dd($tel);
        if (empty($findAuto[0]->number_auto)) {
            DB::table('auto')->insert([
                ['user_id' => $user_id[0]->id,
                    'brand' => $brend,
                    'model' => $model,
                    'color' => $color,
                    'number_auto' => $number,
                    'status' => 'Находится на територии']
            ]);

        }
    }
}