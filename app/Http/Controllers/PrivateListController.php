<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Model\User_list;

class PrivateListController extends Controller
{


  public function index(Request $request)
    {

      $curentUserId = auth()->id();

      $drop = new User_list;
      $drop->where('user_lists.user_id','=',$curentUserId)->delete();

      $users_id = $request->all()['user_id'];


      foreach($users_id as $v){

        $user_list = new User_list;
        $user_list->user_id = (int) $curentUserId;
        $user_list->contact_id = (int) $v;
        $user_list->save();

      }

      return (int) $users_id;

    }

  public function getList(Request $request)
    {

      $curentUserId = auth()->id();
      $privat_list = DB::table('user_lists')->where('user_id', '=', $curentUserId)->select('contact_id')->get();
      return $privat_list;

    }

}
