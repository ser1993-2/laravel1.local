<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{

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
}
