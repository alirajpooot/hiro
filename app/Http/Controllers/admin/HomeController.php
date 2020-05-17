<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\NewsCategory;
use Validator;
use Image;
use App\Service;

class HomeController extends Controller
{
    public function __construct()
    {
            if(!Auth::check()) {
                return redirect()->route('admin.login');
            }
    }

    public function index()
    {
        return view('admin.pages.dashboard');
    }

    public function Logout()
    {
        if(Auth::logout()){
            return redirect()->route('admin.login');
        }
        return redirect()->route('admin.login');
    }

    public function NewsCat()
    {
        $cats = NewsCategory::where('parent_id', '0')->get();
        return view('admin.pages.news.category',['cats' => $cats]);
    }

    public function addNewsCat(Request $req)
    {
        $attributes = [
            'category' => 'Category',
            'parentcat' => 'Parent Category'
        ];
        $validator = Validator::make($req->only(['category']) ,[
            'category' => 'required|unique:news_categories,name'
        ])->setAttributeNames($attributes);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $cat = new NewsCategory;
        $cat->name = $req->category;
        $cat->slug = str_replace(' ','-',$req->category);
        $cat->parent_id = 0;
        $cat->icon = $req->icon;
        if($req->hasFile('catimg'))
    	{
    		$file = $req->catimg;
    		$ext = $req->file('catimg')->getClientOriginalExtension();
            if($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg')
            {
            	$newname = Auth::user()->id.date("His").'.'.$ext;
                $image = Image::make($file)->fit(48);
                $image->save('public/assets/catimages/'.$newname, 60);
                $cat->logo = $newname;
 
            }
    	}
        if($cat->save()){
            return redirect()->back()->with('successmsg', 'Category has beed addes successfully');
        }
    }

    public function editNewsCat($id = '')
    {
        $cats = NewsCategory::where('parent_id', '0')->get();
        $catd = NewsCategory::find($id);
        return view('admin.pages.news.editcategories',['catd' => $catd, 'cats' => $cats]);
    }

    public function editNewsCatPost(Request $req)
    {
        $attributes = [
            'category' => 'Category',
            'parentcat' => 'Parent Category'
        ];
        $validator = Validator::make($req->only(['category']) ,[
            'category' => 'required'
        ])->setAttributeNames($attributes);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $cat = NewsCategory::find($req->id);
        $cat->name = $req->category;
        $cat->slug = str_replace(' ','-',$req->category);
        $cat->parent_id = $req->parentcat;
        $cat->icon = $req->icon;
        if($req->hasFile('catimg'))
    	{
            if(!empty($cat->logo)){
            $file_path = base_path().'/public/assets/catimages/'.$cat->logo;
            if(file_exists($file_path)) {unlink($file_path);}
             }
    		$file = $req->catimg;
    		$ext = $req->file('catimg')->getClientOriginalExtension();
            if($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg')
            {
            	$newname = Auth::user()->id.date("His").'.'.$ext;
                $image = Image::make($file)->fit(48);
                $image->save('public/assets/catimages/'.$newname, 60);
                $cat->logo = $newname;
 
            }
    	}
        if($cat->save()){
            return redirect()->back()->with('successmsg', 'Category has beed updated successfully');
        }
    }

    public function deleteNewsCatPost($id = 0)
    {
        $data =  NewsCategory::find($id);
        if(!empty($data->logo)){
            $file_path = base_path().'/public/assets/catimages/'.$data->logo;
            if(file_exists($file_path)) {unlink($file_path);}
        }
        
        $del = NewsCategory::where('id', $id)->delete();
        return redirect()->back()->with('successmsg', 'Category has beed deleted successfully');
    }

        public function Services()
    {
        $services = Service::get();
         $cats = NewsCategory::where('parent_id', '0')->get();
        return view('admin.pages.services.services',['cats' => $cats, 'services'=>$services]);
    }

    public function addServicePost(Request $req)
    {
        $attributes = [
            'servicename' => 'Service Name',
            'parentcat' => 'Parent Category'
        ];
        $validator = Validator::make($req->all() ,[
            'servicename' => 'required|unique:services,name',
            'parentcat' => 'required'
        ])->setAttributeNames($attributes);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $service = new Service;
        $service->cat_id = $req->parentcat;
        $service->name = $req->servicename;
        if($service->save()){
            return redirect()->back()->with('successmsg', 'Service has beed addes successfully');
        }
    }

    public function editServices($id = '')
    {
        $cats = NewsCategory::where('parent_id', '0')->get();
        $serviced = Service::find($id);
        return view('admin.pages.services.editservice',['serviced' => $serviced, 'cats' => $cats]);
    }

    public function editServicePost(Request $req)
    {
        $attributes = [
            'servicename' => 'Service Name',
            'parentcat' => 'Parent Category'
        ];
        $validator = Validator::make($req->all() ,[
            'servicename' => 'required',
            'parentcat' => 'required'
        ])->setAttributeNames($attributes);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $service = Service::find($req->id);
        $service->cat_id = $req->parentcat;
        $service->name = $req->servicename;
        if($service->save()){
            return redirect()->back()->with('successmsg', 'Service has beed addes successfully');
        }
    }

    public function deleteService($id='')
    {
        $del = Service::where('id', $id)->delete();
        return redirect()->back()->with('successmsg', 'Service has beed deleted successfully');
    }
   
}
