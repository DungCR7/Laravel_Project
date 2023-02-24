<?php
 
namespace App\Http\View\Composers;
use App\Models\Menu;
use Illuminate\View\View;
 
class ProfileComposer
{
  
    protected $users;
 
   
    public function __construct()
    {
       
    }
 
  
    public function compose(View $view)
    {
        $menus =  Menu::select('id','name')->orderByDesc('id')->get();
        
        $view ->with('menus1',$menus);
    }
}