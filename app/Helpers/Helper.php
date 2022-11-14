<?php

namespace App\Helpers;

use App\Models\Customer;
use Illuminate\Support\Str;

class Helper
{
    public static function menu($menus, $parent_id = 0, $char = '')
    {


        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id){

                $html .= '
                    <tr>
                        <td>'  . $menu->id  .'</td>
                        <td>'  . $char . $menu->name  .'</td>
                        <td>'  . self::active($menu->active)  .'</td>
                        <td> <img src="'.$menu->thumb.'" height="60px" width="60px"></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/admin/menus/edit/ '. $menu->id .'">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a class="btn btn-danger btn-sm"
                                href="#" onclick="removeRow('. $menu->id .',\'/admin/menus/destroy\')">
                                <i class="fas fa-trash-alt"></i>
                            </a>

                        </td>
                    </tr>

                ';

                unset($menus[$key]);

                $html .= self::menu($menus,$menu->id,$char .'--');
            }
        }

        return $html;


    }

    public static function active($active = 0) :string{
        return $active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>'
            :'<span class="btn btn-success btn-xs">YES</span>';
    }

    public static function menus($menus, $parent_id = 0) : string
    {
        $html = '';
        foreach ($menus as $key => $menu){
            if($menu->parent_id == $parent_id) {
                $html .= '
                  <li>
                     <a href="/danh-muc/ ' . $menu->id . ' - ' . Str::slug($menu->name, '-').'.html">
                        ' . $menu->name . '
                     </a>';

                     if(self::isChild($menus, $menu->id)){
                        $html .= '<ul class="sub-menu">';
                        $html .= self::menus($menus,$menu->id);
                        $html .= '</ul>';
                     }

                  $html .='</li>
                ';
            }
        }

        return $html;
    }

    public static function isChild($menus,$id) : bool
    {
        foreach ($menus as $key => $menu){
            if ($menu->parent_id == $id){
                return true;
            }
        }
        return false;
    }

    public static function price($price = 0, $pricesale = 0){
        if($pricesale != 0) return number_format($pricesale) ;
        if($price != 0) return number_format($price) ;

        return '<a href="/lienhe.html">Liên Hệ</a>';
    }

    public static function activeOD($active = 0):string  {
        if ($active == 0){
            return '<span class="btn btn-primary btn-xs">Chờ xác nhận</span>';
        }else if ($active == 1){
            return '<span class="btn btn-warning  btn-xs">Đang giao</span>';
        } else if ($active == 2) {
            return '<span class="btn btn-success btn-xs">Thành công</span>';
        }
        return '<span class="btn btn-danger btn-xs">Hủy</span>';
    }

    public static function activeOrder($active) : string
    {
        return self::activeOD($active) ;
    }


}
