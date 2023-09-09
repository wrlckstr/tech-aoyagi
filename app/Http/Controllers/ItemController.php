<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index(Request $request)
    {
        // 商品一覧取得

        $query = Item::query();

        // 検索キーワードを取得
        $search = $request->input('search');

      // キーワードが入力されている場合は検索条件を追加
      if ($search) {
          $query->where('name', 'LIKE', "%{$search}%")
               ->orWhere('produce', 'LIKE', "%{$search}%")
               ->orWhere('type', 'LIKE', "%{$search}%")
               ->orWhere('price', 'LIKE', "%{$search}%")
               ->orWhere('variety', 'LIKE', "%{$search}%");
      }

      $members1 = $query->paginate(10);

        return view('item.index', ['item_info'=> $members1,  'search' => $search]);
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'variety' => $request->variety,
                'price' => $request->price,
                'produce' => $request->produce,
                'detail' => $request->detail,
            ]);

            return redirect('/items/index');
        }

        return view('item.add');
    }

    /**
     * 商品編集
     */
    
    // 画面遷移
    public function edit(Request $request){
        $item_editer=Item::find($request->id);
        return view('item.edit',['item_edit'=>$item_editer]);
    }
    
    // 編集ボタンの中身
    public function kousin(Request $request){
        $itemkousin = Item::find($request->id);

        $itemkousin -> name = $request->name;
        $itemkousin -> produce = $request->produce;
        $itemkousin -> type = $request->type;
        $itemkousin -> variety = $request->variety;
        $itemkousin -> price = $request->price;
        $itemkousin -> detail = $request->detail;

        $itemkousin -> save();
        return redirect('/items/index');
    }

    // 削除ボタンの中身
    public function destroy1(Request $request){
        $destroy_item = Item::find($request->id);
        $destroy_item -> delete();

        return redirect('/items/index');
    }

    // 詳細
    public function detail(Request $request){
        $detail_controller = Item::find($request->id);
        return view('/item/detail',['item_detail'=>$detail_controller]);
    }
}
