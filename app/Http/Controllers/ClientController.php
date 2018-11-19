<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function addAuto($id,request $request)
    {

        $brend = $request->input('brend');
        $model = $request->input('model');

        $color = $request->input('color');
        $number = $request->input('number');

        $findAuto = DB::table('auto')->select('number_auto')->where('number_auto', '=', $number)->get();

      //  unset($_SESSION);

        if (empty($findAuto[0]->number_auto)) {
            DB::table('auto')->insert([
                ['user_id' => $id,
                    'brand' => $brend,
                    'model' => $model,
                    'color' => $color,
                    'number_auto' => $number,
                    'status' => 'Находится на територии']
            ]);
            return redirect()->back()->with('ok', 'Автомобиль успешно добавлен');
        }else{
            return redirect()->back()->with('alert', 'Гос.номер уже зарегистрирован');
        }
    }

    public function editClient($id, request $request)
    {
        $name = $request->input('name');
        $gender = $request->input('gender');
        $tel = $request->input('tel');
        $adress = $request->input('adress');

        $findClient = DB::table('users')->select('phone')->where('phone', '=', $tel)->get();
        $findPhone = DB::table('users')->select('phone')->where('id', '=', $id)->get();


        if ($tel == $findPhone[0]->phone) {
            DB::table('users')
                ->where('id', $id)
                ->update(['username' => $name,
                    'gender' => $gender,
                    'phone' => $tel,
                    'adress' => $adress]);
            return redirect()->back()->with('ok', 'Данные успешно изменены1');
        }elseif (isset($findClient[0]->phone) == false) {

            DB::table('users')
                ->where('id', $id)
                ->update(['username' => $name,
                    'gender' => $gender,
                    'phone' => $tel,
                    'adress' => $adress]);
            return redirect()->back()->with('ok', 'Данные успешно изменены2');
        } else {
            return redirect()->back()->with('alert', 'Клиент с таким номером телефона уже существует');
        }
    }

    public function addClient(request $request)
    {
            $tel = $request->input('tel');
            $number = $request->input('number');
            $findClient = DB::table('users')->select('phone')->where('phone', '=', $tel)->get();
            $findAuto = DB::table('auto')->select('number_auto')->where('number_auto', '=', $number)->get();

        if (empty($findClient[0]->phone) && empty($findAuto[0]->number_auto)){

            $name = $request->input('name');
            $gender = $request->input('gender');
            $adress = $request->input('adress');
            $password = $request->input('password');
            $email = $request->input('email');

            DB::table('users')->insert([
                ['username' => $name,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'email' => $email,
                    'gender' => $gender,
                    'phone' => $tel,
                    'adress' => $adress,]
            ]);

            $findIdClient = DB::table('users')->select('id')->where('phone', '=', $tel)->get();
            $this->addAuto($findIdClient[0]->id,$request);

            return redirect()->route('edit',$findIdClient[0]->id)->with('ok', 'Клиент успешно добавлен');
        }else {
            return redirect()->back()->with('alert', 'Клиент с такими данными уже существует');
        }
    }

    public function deleteAuto($id,$number) {
        DB::table('auto')->where('number_auto', '=', $number)->delete();

            return redirect()->back()->with('ok', 'Автомобиль успешно удален');
    }

    public function editAuto($u_id, $a_id, request $request)
    {

        $new = $request->input('select');
        $brend = $request->input('brend');
        $model = $request->input('model');
        $color = $request->input('color');
        $number = $request->input('number');

        $findA = DB::table('auto')->select('number_auto')->where('id', '=', $a_id)->get();
        $findAuto = DB::table('auto')->select('number_auto')->where('number_auto', '=', $number)->get();


        if ($findA[0]->number_auto == $number) {
            DB::table('auto')
                ->where('id', $a_id)
                ->update(['status' => $new,
                    'brand' => $brend,
                    'model' => $model,
                    'color' => $color,
                    'number_auto' => $number
                ]);
            return redirect()->route('edit', $u_id)->with('ok', 'Данные успешно изменены');
        } elseif (empty($findAuto[0]->number_auto)) {
                DB::table('auto')
                    ->where('id', $a_id)
                    ->update(['status' => $new,
                        'brand' => $brend,
                        'model' => $model,
                        'color' => $color,
                        'number_auto' => $number
                    ]);
                return redirect()->route('edit', $u_id)->with('ok', 'Данные успешно изменены');
            } else {
                return redirect()->route('edit', $u_id)->with('alert', 'Номер автомобиля уже существует');
            }
    }

    public function authLogin(request $request) {

        $email = $request->input('Email');
        $password = $request->input('password');

        $findClient = DB::table('users')->select('password','id')->where('email', '=', $email)->get();

        if (password_verify($password , $findClient[0]->password)) {

            session(['Log'=>true]);
            session(['UserId'=>$findClient[0]->id]);

            return redirect()->route('home')->with('LogIn', 'Авторизация');
        } else {
            return redirect()->route('home')->with('LogOut', 'Неверная почта или пароль');
        }
    }

    public function LogOut(request $request) {

        $request->session()->forget('Log');
        $request->session()->forget('UserId');
//        session(['Log'=>false]);
//        session(['UserId'=>0]);
        return redirect()->route('home')->with('LogOut', 'Вы вышли');
    }
}

