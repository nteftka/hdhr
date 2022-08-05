<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kr;
use App\Models\Content;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class HdhrController extends Controller
{
    // middlewareによる認証制限を追加
    public function __construct(){
      $this->middleware('auth');
      $this->category = new Category();
    }


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
    public function login(){
      return view('dh/login');
    }

    /**
    * メインページ
    * @return view
    */
    public function main(){
      $user = Auth::user();
      $contents = Content::Join('kr', 'contents.kr_id', '=', 'kr.id')
                          ->select('contents.id', 'contents.date', 'kr.id as kr_id','kr.number', 'kr.name', 'kr.gender', 'kr.birth')
                          ->join('users', 'contents.dh_id', '=', 'users.id')
                          ->where('users.id', '=', $user->id)
                          ->orderBy('contents.id', 'desc')
                          ->get();

      $page = Content::paginate(3);

      return view('dh/main', compact('contents', 'page'));

    }

    /**
    * 業務内容新規作成ページ
    * @return view
    *
    */
    public function create($id){
      $user = Kr::find($id);

      // PDのプルダウン
      $categories = $this->category->get();
      return view('dh/create', compact('categories'))->with('user', $user);
    }

    /**
    * 新規投稿確認ページ
    *
    */
    public function confirm(Request $request)
    {
      $data = $request->all();
      $request->validate([
        'name' => 'required',
        'kana' => 'required',
        'birth' => 'required',
        'gender' => 'required',
        'date' => 'required',
        'rup_pd' => 'required',
        'lup_pd' => 'required',
        'run_pd' => 'required',
        'lun_pd' => 'required',
        'contents' => 'required',
        'memo' => 'required',
      ]);
      return view('dh/confirm')->with($data);
    }


    /*
    * 新規投稿登録完了
    *
    */
    public function complate(Request $request)
    {
      // ログインしているユーザIDを取得
      $dh_id = Auth::id();

      $contents = new Content();
      // // 値の登録
      $contents->dh_id = $dh_id;
      $contents->kr_id = $request->id;
      $contents->date = $request->date;
      $contents->rup_pd = $request->rup_pd;
      $contents->lup_pd = $request->lup_pd;
      $contents->run_pd = $request->run_pd;
      $contents->lun_pd = $request->lun_pd;
      $contents->contents = $request->contents;
      $contents->memo = $request->memo;
      //
      // // 保存
      $contents->save();


      // mainにリダイレクト
      return redirect()->to('/main');

    }

    /**
    * 患者一覧ページ
    * @return view
    */
    public function kr()
    {
      $kr = Kr::orderBy('number', 'asc')->paginate(5);

      return view('dh/kr', compact('kr'));

    }

    /**
    * アカウント変更ページ
    *
    */
    public function user_edit()
    {
      $user = Auth::user();
      return view('dh/user_edit');
    }

    public function user_edit_complate(Request $request)
    {
      $user = Auth::user();
      $user->name = $request->name;
      $user->save();
      return redirect('main');
    }

    /**
    * 患者ページ
    *
    */
    public function kr_contents(){
      return view('dh/kr_contents');
    }

    /**
    * 業務内容詳細
    *
    */
    public function contents($id){
      $contents = Content::find($id);
      $data = DB::table('contents')
                ->select('contents.id', 'contents.date', 'kr.number', 'kr.name', 'kr.gender', 'kr.birth')
                ->join('kr', 'contents.kr_id', '=', 'kr.id')
                ->where('contents.id', '=', $contents->id)
                ->get();
      return view('dh/contents', compact('data'))->with('contents', $contents);
    }

    /**
    * データ表示ページ
    *
    */
    public function data(){
      return view('dh/data');
    }

    /**
    * 業務内容編集
    *
    */
    public function contents_edit($id){
      $contents = Content::find($id);

      $data = Content::Join('kr', 'contents.kr_id', '=', 'kr.id')
                    ->select('contents.id', 'contents.date', 'kr.id as kr_id', 'kr.number', 'kr.name', 'kr.kana', 'kr.gender', 'kr.birth')
                    ->where('contents.id', '=', $contents->id)
                    ->get();

      $categories = $this->category->get();
      return view('dh/contents_edit', compact('data'))->with('contents', $contents);
    }

    /**
    * 業務内容編集確認ページ
    *
    */
    public function contents_confirm(Request $request)
    {
      $data = $request->all();
      $request->validate([
        'rup_pd' => 'required',
        'lup_pd' => 'required',
        'run_pd' => 'required',
        'lun_pd' => 'required',
        'date' => 'required',
        'contents' => 'required',
        'memo' => 'required',
      ]);
      return view('dh/contents_confirm')->with($data);
    }

    /**
    * 業務内容編集完了処理
    *
    */
    public function contents_complate(Request $request, $id)
    {

      $contents = Content::find($id);

      $dh_id = Auth::id();

      $contents->dh_id = Auth::id();
      $contents->kr_id = $request->kr_id;
      $contents->date = $request->date;
      $contents->rup_pd = $request->rup_pd;
      $contents->lup_pd = $request->lup_pd;
      $contents->run_pd = $request->run_pd;
      $contents->lun_pd = $request->lun_pd;
      $contents->contents = $request->contents;
      $contents->memo = $request->memo;

      $contents->save();

      return redirect()->to('main');
    }

    /**
    * 患者登録ページ
    *
    */
    public function kr_add()
    {
      return view('dh/kr_add');
    }

    /**
    * 患者登録確認ページ
    *
    */
    public function kr_add_confirm(Request $request)
    {
      $request->validate([
        'number' => 'required|unique:kr,number',
        'name' => 'required|min:2',
        'kana' => 'required|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
        'gender' => 'required',
        'birth' => 'required',
      ]);


      $data = $request->all();
      return view('dh/kr_add_confirm', ['data' => $data]);
    }

    /**
    * 患者登録完了処理（患者一覧へ）
    *
    */
    public function kr_add_complate(Request $request)
    {
      $kr = new Kr();

      // 値の登録
      $kr->number = $request->number;
      $kr->name = $request->name;
      $kr->kana = $request->kana;
      $kr->gender = $request->gender;
      $kr->birth = $request->birth;
      // $kr->gender = $request->gender;

      $kr->save();

      return view('dh/kr_add_complate', ['kr' => $kr]);
    }

    /*
    * 患者検索ページ
    *
    */

    public function search(Request $request)
    {
      $keyword = $request->input('keyword');

      $query = Kr::query();

      if(!empty($keyword)){
        $query->where('number', 'LIKE', "{$keyword}%");
      }

      $posts = $query->get();

      $page = Kr::paginate(5);


      return view('dh/search', compact('posts', 'keyword', 'page'));
    }

    /*
    * 患者情報編集ページ
    *
    */

    public function kr_edit($id)
    {
      $kr = Kr::find($id);
      return view('dh/kr_edit')->with('kr', $kr);
    }

    /*
    * 患者情報編集確認ページ
    *
    */
    public function kr_edit_confirm(Request $request)
    {
      $data = $request->all();
      $request->validate([
        'number' => 'required',
        'name' => 'required',
        'kana' => 'required',
        'gender' => 'required',
        'birth' => 'required',
      ]);
      return view('dh/kr_edit_confirm')->with($data);
    }

    /*
    * 患者情報編集完了処理
    *
    */
    public function kr_edit_complate(Request $request, $id)
    {
      $kr = Kr::find($id);
      $kr->number = $request->number;
      $kr->name = $request->name;
      $kr->kana = $request->kana;
      $kr->gender = $request->gender;
      $kr->birth = $request->birth;

      $kr->save();
      return redirect()->to('/kr');
    }

    /*
    * 患者個人ページ
    *
    */
    public function kr_info($id)
    {
      $kr = Kr::find($id);
      $data = Content::Join('kr', 'contents.kr_id', '=', 'kr.id')
                      ->join('users', 'contents.dh_id', '=', 'users.id')
                      ->select('contents.*', 'contents.id as contents_id', 'kr.*', 'users.name as dh_name')
                      ->where('kr.id', '=', $kr->id)
                      ->orderBy('contents.id', 'desc')
                      ->get();

      return view('dh/kr_info', compact('data'))->with('kr', $kr);
    }

    public function graphsample($id)
    {
      $kr = Kr::find($id);
      $data = Content::Join('kr', 'contents.kr_id', '=', 'kr.id')
                      ->join('users', 'contents.dh_id', '=', 'users.id')
                      ->select('contents.*', 'contents.id as contents_id', 'kr.*', 'users.name as dh_name')
                      ->where('kr.id', '=', $kr->id)
                      ->orderBy('contents.date', 'asc')
                      ->get();

    // // $rup_pd = $data->rup_pd;
    //                   var_dump($data);

      return view('/graphsample', compact('data'))->with('kr', $kr);
    }

    public function graph($id)
    {
      $kr = Kr::find($id);
      $list = Content::Join('kr', 'contents.kr_id', '=', 'kr.id')
                      ->join('users', 'contents.dh_id', '=', 'users.id')
                      ->select('contents.*', 'contents.id as contents_id', 'kr.*', 'users.name as dh_name')
                      ->where('kr.id', '=', $kr->id)
                      ->orderBy('contents.id', 'desc')
                      ->get();

      return responce()->json(['lists']->$list)->with('kr', $kr);

    }

    public function contents_delete($id)
    {
      //削除対象レコードを検索
      $content = Content::find($id);

      //削除
      Content::find($id)->delete();

      //リダイレクト
      return redirect()->to('main')->with('flash_msg','削除が完了いたしました。');
    }

    public function kr_delete($id)
    {
      //削除対象レコードを検索
      $kr = Kr::find($id);

      //削除
      Kr::find($id)->delete();

      //リダイレクト
      return redirect()->to('kr')->with('flash_msg','削除が完了いたしました。');
    }

}
