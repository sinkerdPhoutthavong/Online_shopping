<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use app\Category for this
use App\Category;

class CategoryController extends Controller
{ 
    public function addCategory(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }
            if(empty($data['meta_description'])){
                $data['meta_description'] = "";
            }
            if(empty($data['meta_keywords'])){
                $data['meta_keywords'] = "";
            }
            $category = new Category();
            $category->name = $data['category_name'];
            $category->parent_id = $data['parent_id'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_description'];
            $category->meta_keywords = $data['meta_keywords'];
            $category->status = $status;
            $category->save();
            return redirect('/admin/view-categories')->with('flash_message_success','ເພີ່ມ Category ສຳເລັດແລ້ວ!!');
        }
        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.add_category')->with(compact('levels'));
    }
    public function viewCategories(Request $request){
        $categories = Category::get();
        $categories = json_decode(json_encode($categories));
        return view('admin.categories.view_categories')->with(compact('categories'));
    }
    public function editCategory(Request $request,$id= null){
        if($request->isMethod('post')){
            $data = $request->all();
            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }
            if(empty($data['url'])){
                return redirect()->back()->with('flash_message_error','ກະລຸນາໃສ່ URL');
            }
            if(empty($data['meta_description'])){
                $data['meta_description'] = "";
            }

            if(empty($data['meta_keyword'])){
                $data['meta_keyword'] = "";
            }
            Category::where(['id'=>$id])->update(['name'=>$data['category_name'],'description'=>$data['description'],'url'=>$data['url'],'meta_title'=>$data['meta_title'],
            'meta_description'=>$data['meta_description'],'meta_keywords'=>$data['meta_keyword'],'status'=>$status]);
            return redirect('/admin/view-categories')->with('flash_message_success','ອັບເດດ Category ສຳເລັດແລ້ວ!!');
        }
        $categoryDetails = Category::where(['id'=>$id])->first();
        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.edit_category')->with(compact('categoryDetails','levels'));
    }
    public function deleteCategory($id = null){
        if(!empty($id)){
            Category::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','ລຶບ Category ສຳເລັດແລ້ວ!!');
        }
    }
}
