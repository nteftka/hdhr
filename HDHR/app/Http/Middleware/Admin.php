<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    private $auth;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);
        // ユーザがログインしていない場合は、ログイン画面へリダイレクト
        if(empty( auth()->user())){
          return redirect()->route('login');
        }

        // ユーザーの権限チェック
        if(auth()->user()->admin_flg === 'admin'){
          $this->auth = true;
        } else {
          $this->auth = false;
        }

        // ユーザの権限がasminだった場合は、アクセスを許可
        if($this->auth === true){
          return $next($request);
        }

        // それ以外はログイン画面にリダイレクト
        return redirect()->route('login')->with('error', '権限がありません');
    }
}
