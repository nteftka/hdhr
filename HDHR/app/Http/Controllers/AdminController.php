<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\UserAdd;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{

  /**
  * ログイン
  * @return view
  */


  public function index()
  {
    $user = Auth::user();
    $contents = Content::Join('kr', 'contents.kr_id', '=', 'kr.id')
                        ->select('contents.id', 'contents.date', 'kr.id as kr_id','kr.number', 'kr.name', 'kr.gender', 'kr.birth')
                        ->join('users', 'contents.dh_id', '=', 'users.id')
                        ->where('users.id', '=', $user->id)
                        ->orderBy('contents.id', 'desc')
                        ->get();

    $page = Content::paginate(3);

    return view('index', compact('contents', 'page'));
  }


  /**
  * トップページ
  * @return view
  */
  public function admin_top()
  {
    return view('admin/admin_top');
  }


    public function showForm()
    {
      session()->forget('full_date');
      return view('admin_add');
    }

  /**
  * スタッフ登録
  * @return view
  */
  public function admin_add(Request $request)
  {
    $full_date = Carbon::create($request->year, $request->month, $request->day);

    session()->put('full_date', $full_date);
    // return redirect()->route('admin_add_confirm');
    return view('admin/admin_add');
  }

  /**
  * スタッフ一覧
  * @return view
  */
  public function admin_user(){

    $data = User::paginate(6);
    return view('admin/admin_user', compact('data'));
  }

  /**
  * スタッフ登録確認
  * @return view
  */
  public function admin_add_confirm(Request $request)
  {
    $request->validate([
      'number' => 'required|unique:users,number',
      'name' => 'required|min:2',
      'email' => 'required|email',
      'password' => 'required',
    ]);
    $data = $request->all();
    return view('admin/admin_add_confirm', ['data' => $data])->with($data);
  }




  /*
  * スタッフ新規登録完了
  *
  */
  public function admin_add_complate(Request $request)
  {
    $full_date = session()->get('full_date');
    // return view('complete', compact('full_date'));
    $user = new UserAdd;

    // 値の登録

    $user->number = $request->number;
    $user->name = $request->name;
    $user->password = bcrypt($request->password);
    $user->created_at = $request->full_date;

    // 保存
    $user->save();

    // トップ画面にリダイレクト
    return view('admin/admin_top');
  }

  /**
  * スタッフ情報編集
  * @return view
  */
  public function admin_edit($id)
  {
    $user = UserAdd::find($id);
    return view('admin/admin_edit')->with('user', $user);
  }

  /**
  * スタッフ情報編集確認
  * @return view
  */
  public function admin_edit_confirm(Request $request)
  {
    $data = $request->all();
    $request->validate([
      'number' => 'required',
      'name' => 'required',
    ]);
    return view('admin/admin_edit_confirm')->with($data);
  }

  /**
  * スタッフ情報編集完了
  *
  */
  public function admin_edit_finish(Request $request, $id)
  {
    $user = UserAdd::find($id);

    $user->number = $request->number;
    $user->name = $request->name;
    // $user->created_at = $request->created_at;

    $user->save();

    return redirect()->to('admin_user');
  }

  /**
  * スタッフ削除
  *
  */
  public function admin_delete(Request $request)
  {
    $user = UserAdd::destroy($request->id);
    return redirect()->to('admin_user');
    }

}
