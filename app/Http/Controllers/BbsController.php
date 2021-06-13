<?php

// エイリアス(名前空間)をファイルのパスにすることで自動読み込みを行うことができるようにする。
namespace App\Http\Controllers;

// Illuminate\Http\Requestクラスのhasメソッドは、リクエストに値が存在する場合に、trueを返す。
use Illuminate\Http\Request;

// models読み込み
use App\Models\Message;

class BbsController extends Controller
{
    public function index()
    {      
        $bbs_data = Message::where('is_delete',0)
                    ->orderBy('id','desc')
                    ->paginate(5);
        return view('bbs',compact('bbs_data'));    
    }

    public function add(Request $request)

    {
        $request->validate([
            'name'=>'required|max:10',
            'message'=>'required|max:30',
        ]);

        $name = $request->name;
        $message = $request->message;

        $data = [
            'view_name' => $name,
            'message' => $message
        ];

        Message::insert($data);

        return redirect('/');
    }

    public function delete($id)
    {
        Message::where('id',$id)
            ->update( [
                'is_delete' => 1,
                'updated_at' => now()
            ] );

            return redirect('/');
    }
}
