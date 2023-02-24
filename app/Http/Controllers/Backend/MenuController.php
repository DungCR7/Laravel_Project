<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Menu\FormResquest;
class MenuController extends Controller
{
    public function index(){
        $menu = DB::table('menus')->get();
        return view('Admin.Menu.list', [ 'title' => 'Danh sách sản phẩm','menus'=> $menu]);
    }
    public function create()
    {
        return view('Admin.Menu.add', [
            'title' => 'Thêm danh mục mới',
            // 'menus' =>$this -> getParent()
           
        ]);
    }
    function delete($id){
        if($id != null){
            DB::table('menus')->where('id', $id)->delete();
        }
        return redirect()->route('menu.index');
    }

    function edit($id){
        $menus = DB::table('menus')->where('id', $id)->first();
        return view('Admin.Menu.edit', compact('menus'),[
            'title' => 'Sửa danh mục',
           
        ]
    
    );
    }

    function update(Request $request, $id){
        $data = [
            'name' => $request->name,
            'updated_at' => $request->updated_at
        ];
        DB::table('menus') -> where('id', $id)
                            -> update($data);
        return redirect()->route('menu.index');
    }
    public function store(FormResquest $request)
    {
        try {
            Menu::create ([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
            ]);
           
           
            Session::flash('success', 'Tạo danh mục thành công');
            
        } catch (\Exception $err) {
            
            
        Session::flash('error', $err->getMessage());
            return false;
        }
            return redirect()->back();
    }
    
   
    

}
