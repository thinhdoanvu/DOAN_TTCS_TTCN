<?php

namespace App\Components;

use App\Models\Menu;

use App\Models\Menunote;

class MenuRecusive {

    private $html;

    public function __construct(){
        $this->html = '';
    }

    public function menuRecusiveAdd($parentId = 0, $subMark = ''){
        foreach(Menu::all() as $menu){
            $menus = $menu->id;
            $data = Menunote::where('parent_id', $parentId)->get();
            foreach ($data as $item){
                if($menus == $item->menu_id){
                    $this->html .= '<option value="' . $item->id . '">' . $subMark . $item->name . '</option>';
                    $this->menuRecusiveAdd($item->id, $subMark . '--');
                }
            }
            return $this->html;
        }
        
    }
    
    public function menuRecusiveEdit($parentIdMenuEdit, $parentId = 0, $subMark = ''){
        foreach(Menu::all() as $menu){
            $menus = $menu->id;
            $data = Menunote::where('parent_id', $parentId)->get();
            foreach ($data as $item){
                if($menus == $item->menu_id){
                    if($parentIdMenuEdit == $item->id){
                        $this->html .= '<option selected value="' . $item->id . '">' . $subMark . $item->name . '</option>';
                    }
                    else{
                        $this->html .= '<option value="' . $item->id . '">' . $subMark . $item->name . '</option>';
                    }
                    $this->menuRecusiveEdit($parentIdMenuEdit, $item->id, $subMark . '--');
                }
            }
            return $this->html;
        }
    }

    public function getParent(){
        $data = Menunote::where('parent_id', 0)->get();
        return $data;
    }
}

?>