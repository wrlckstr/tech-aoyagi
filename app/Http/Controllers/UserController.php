<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\members;
use App\Models\User;
use Illuminate\Bus\UpdatedBatchJobCounts;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * ユーザー一覧
     * @param Request $request
     * @return Response
     */

     public function index (Request $request){
      $query = User::query();

      // 検索キーワードを取得
      $search = $request->input('search');

      // キーワードが入力されている場合は検索条件を追加
      if ($search) {
          $query->where('name', 'LIKE', "%{$search}%");
      }

      $members1 = $query->paginate(10);

      return view('/User/index', ['info' => $members1, 'search' => $search]);
     }


   //   編集画面への遷移
     public function edit  (Request $request){
      $members = User::find($request->id);
      return view('User.edit',['members_edit'=>$members]);
     }

   //   編集画面の編集ボタン
     public function edit_koushin(Request $request){
         $this -> validate($request, [
            'name' =>'required| max:255',
            'email' =>'required| max:255|email'
         ],[
            'name.required'=>'担当者名は必須です',
            'name.max'=>'担当者名は255文字以下にしてください',
            'email.required'=>'メールアドレスは必須です',
            'email.max'=>'メールアドレスは255文字以内にしてください',
            'email.email' => '有効なメールアドレスではありません'
         ]);

         $members_edit= User::find($request->id);
         $members_edit -> name = $request->name;
         $members_edit -> role = $request->role;
         $members_edit -> email = $request->email;
         $members_edit -> save();

         return redirect('/user/index');
     }
   //   編集画面の削除ボタン
     public function destroy(Request $request){
      $members_edit= User::find($request->id);
      $members_edit -> delete();
      return redirect('/user/index');
     }
}
