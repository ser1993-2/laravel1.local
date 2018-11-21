<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $date = [
            'title' => 'Автостоянка на Столетова',
            'pagetitle' => 'Автостоянка',
            'messages' => DB::table('users')
                ->join('auto', 'users.id', '=', 'user_id')
                ->select('users.*', 'auto.*')
                ->get(),
            'count' => DB::table('auto')->count(),
            'paginat' => DB::table('auto')->select('*')->paginate(2)
        ];

        return view('pages.messages.index',$date);
    }
    public function addIndex()
    {
        $date = [
            'title' => 'Добавление нового клиента',
            'pagetitle' => 'Добавление клиента',
        ];
        return view('pages.client.index',$date);
    }
    public function edit($id)
    {
        $date = [
            'title' => 'Автостоянка на Столетова',
            'pagetitle' => 'Редактирование',
            'user' => DB::table('users')->select('username','gender','phone','adress')
                ->where('id', '=', $id)
                ->get(),
            'message' => DB::table('users')
                ->join('auto', 'users.id', '=', 'user_id')
                ->select('users.*', 'auto.*','auto.id as auto_id')
                ->where('users.id', '=', $id)
                ->get()
        ];
        return view('pages.messages.edit',$date);
    }
    public function brandSearch(request $request)
    {
        $array = DB::table('brand_list')->select('brand_name')
            ->get();
        foreach ($array as $item) {
            $city[] = $item->brand_name;
        }
        if (!empty($request->get('term')))
        {
            $term = $request->get('term');
            $pattern = '/^'.preg_quote($term).'/iu';
            echo json_encode(preg_grep($pattern, $city));
        }
    }
}
