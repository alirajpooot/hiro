<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\NewsCategory;
use Validator;
use Image;
use App\Location;
use App\Slider;
use App\BusinessNature;

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
        $cat->parent_id = $req->parentcat;
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


    // locations
    public function Locations()
    {
        $locs = Location::where('parent_id', '0')->get();
        return view('admin.pages.location.location',['locs' => $locs]);
    }

    public function addLocation(Request $req)
    {
        $attributes = [
            'location' => 'Location',
            'parentloc' => 'Parent Location'
        ];
        $validator = Validator::make($req->only(['location']) ,[
            'location' => 'required|unique:locations,name'
        ])->setAttributeNames($attributes);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $loc = new Location;
        $loc->name = $req->location;
        $loc->slug = str_replace(' ','-',$req->location);
        $loc->parent_id = $req->parentloc;
        if($loc->save()){
            return redirect()->back()->with('successmsg', 'Location has beed addes successfully');
        }
    }

    public function editLoc($id = '')
    {
        $locs = Location::where('parent_id', '0')->get();
        $locd = Location::find($id);
        return view('admin.pages.location.editlocation',['locd' => $locd, 'locs' => $locs]);
    }

    public function editLocPost(Request $req)
    { 
        $attributes = [
            'location' => 'Location',
            'parentloc' => 'Parent Location'
        ];
        $validator = Validator::make($req->only(['location']) ,[
            'location' => 'required'
        ])->setAttributeNames($attributes);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $loc = Location::find($req->id);
        $loc->name = $req->location;
        $loc->slug = str_replace(' ','-',$req->location);
        $loc->parent_id = $req->parentloc;
        if($loc->save()){
            return redirect()->back()->with('successmsg', 'Location has beed Updated successfully');
        }
    }

    public function deleteLocPost($id = 0)
    {
        $data =  Location::find($id);      
        $del = Location::where('id', $id)->delete();
        return redirect()->back()->with('successmsg', 'Location has beed deleted successfully');
    }

    public function Sliders()
    {
        $sliders = Slider::get();
        return view('admin.pages.slider.sliders', ['sliders' => $sliders]);
    }

    public function SlidersPost(Request $req)
    {
        if($req->hasFile('sliderimage'))
    	{
    		$file = $req->sliderimage;
    		$ext = $req->file('sliderimage')->getClientOriginalExtension();
            if($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg')
            {
            	$newname = Auth::user()->id.date("His").'.'.$ext;
                $image = Image::make($file);
                $image->save('public/assets/images/sliders/'.$newname, 60);
                
                $slider = new Slider;
                $slider->image = $newname;
                $slider->sort = $req->sort;
                if($slider->save()){
                    return redirect()->back()->with('successmsg', 'Slider has beed added successfully');
                }
 
            }
    	} return redirect()->back();
    }

    public function SliderDel($id = '')
    {
        if(!empty($id)){
            $gets = Slider::find($id);
            if(!empty($gets->image)){
                $file_path = base_path().'/public/assets/images/sliders/'.$gets->image;
                if(file_exists($file_path)) {unlink($file_path);}
                 }
            $dels = Slider::where('id', $id)->delete();
            return redirect()->back()->with('successmsg', 'Slider has beed Deleted successfully');
        }
        return redirect()->back();
    }

    public function SliderSort(Request $req)
    {
        if(!empty($req->id) and !empty($req->sort)){
            $gets = Slider::find($req->id);
            $gets->sort = $req->sort;
            if($gets->save()){echo 'successmsg', 'Slider has beed Updated successfully';}
        } else {
        return redirect()->back();
        }
    }

    public function businessNature()
    {
        $btypes = businessNature::get(); 
        return view('admin.pages.businessnature.businessnature', ['types' => $btypes]);
    }

    public function businessNatureAdd(Request $req)
    {
        $attributes = [
            'type' => 'Type',
        ];
        $validator = Validator::make($req->only(['type']) ,[
            'type' => 'required|unique:business_natures,name'
        ])->setAttributeNames($attributes);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $type = new BusinessNature;
        $type->name = $req->type;
        if($type->save()){
            return redirect()->back()->with('successmsg', 'Business Type has beed addes successfully');
        }
    }

    public function businessNatureDelete($id = '')
    {
        if(empty($id)){return redirect()->back();}
            $dels = BusinessNature::where('id', $id)->delete();
            return redirect()->back()->with('successmsg', 'Business Type has beed Deleted successfully');        
    }

    public function businessNatureEdit(Request $req)
    {
        $te = BusinessNature::find($req->id);
        $te->name = $req->type;
        if($te->save()){
            echo '<div class="alert alert-success">Type Updated Successfully</div>';
        }
    }

}
