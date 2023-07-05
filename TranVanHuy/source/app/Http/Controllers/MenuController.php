<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;

use App\Models\Menunote;

use App\Models\Menulocation;

use App\Components\MenuRecusive;

use App\Components\Position;

use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menuRecusive, $position;

    public function __construct(MenuRecusive $menuRecusive, Position $position){
        $this->menuRecusive = $menuRecusive;
        $this->position = $position;
    }

    public function index(){
        $data = Menu::orderBy('id', 'ASC')->paginate(5);
        if($key = request()->key)
        {
            $data = Menu::orderBy('id', 'ASC')->where('name','like','%'.$key.'%')->paginate(5);
        }
        return view('adminshop.menu.index', compact('data'));
    }

    public function create()
    {
        return view('adminshop.menu.create');
    }

    public function postcreate(Request $request)
    {
        Menu::create([
            'name' => $request->name,
        ]);

        return redirect()->route('adminshop.menu.index')->with('msg', 'Thêm menu thành công');
    }

    public function getMenunote(){
        $menunotes = Menunote::orderBy('id', 'ASC')->get();
        $listNote = [];
        Menunote::recursive($menunotes, $parents = 0, $level = 1, $listNote);
        return $listNote;
    }

    public function edit(Request $request, $id, Menunote $data1){
        $result = Menu::findOrFail($id);
        $menunotes = $result->menunote;
        $menulocations = $result->menulocation;

        $optionSelect = $this->menuRecusive->menuRecusiveAdd();
        $optionSelect1 = $this->menuRecusive->menuRecusiveEdit(0);
        $optionSelect2 = $this->menuRecusive->getParent();
        $optionSelect3 = $this->position->output();
        $optionSelect4 = $this->getMenunote();
        $noteid = $request->input('noteid');

        return view('adminshop.menu.edit', ['data1'=>$data1], compact('noteid', 'result', 'menunotes', 'menulocations', 'optionSelect', 'optionSelect1', 'optionSelect2', 'optionSelect3', 'optionSelect4'));
    }

    public function updateMenu(Request $request, $id){
        $result = Menu::findOrFail($id);
        $menunotes = $result->menunote;

        if($request->input('addmenunote'))
        {
            // $slug = Str::slug($request->name, '-');
            MenuNote::create([
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'slug' => 'home',
                'menu_id'=>$id,
            ]);
            return redirect()->route('adminshop.menu.edit', $id)->with('msg', 'Thêm menunote thành công');
        }
            if($request->input('editmenunote')){
                // $slug = Str::slug($request->menunotename, '-');
                $noteid = $request->input('noteid');
                Menunote::find($noteid)->update([
                            'name' => $request->menunotename,
                            'parent_id' => $request->parent_id,
                            'slug' => 'home',
                            'menu_id' => $id,
                        ]);
                return redirect()->route('adminshop.menu.edit', $id)->with('msg', 'Cập nhât menunote thành công');
            }

            if($request->input('savemenu')){
                $data = Menu::find($id);
                Menulocation::create([
                    'pos' => $request->pos,
                    'menu_id' => $id,
                ]);
                $data->name = $request->menuname;
                $data->save();
                return redirect()->route('adminshop.menu.index')->with('msg', 'Cập nhật menu thành công');
            }
    }

    public function delete(Request $request, $id)
    {
        Menu::find($id)->delete();
        return redirect()->route('adminshop.menu.index')->with('msg', 'Xóa loại sản phẩm thành công');
    }

    public function deleteNote(Request $request, $id)
    {
        foreach(Menu::all() as $item){
            Menunote::where('id', $id)->delete();
            return redirect()->route('adminshop.menu.edit', ['id' => $item->id])->with('msg', 'Xóa menunote thành công');
        }
    }
}
