<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use Image;
use App\Banner;

class BannersController extends Controller
{
    public function addBanner(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }
            //Input to database
            $brand = New Banner;
            $brand->title = $data['title'];
            $brand->link = $data['link'];
            $brand->description = $data['description'];
            // Upload Image
            if($request->hasFile('image')){
               $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $banner_image_path = 'images/frontend_images/banners/'.$filename;
                    Image::make($image_tmp)->resize(520,441)->save($banner_image_path);
                    //Store Image name in Products table
                    $brand->image = $filename;
                }
            }
            $brand->status = $status;
            $brand->save();
            return redirect('/admin/view-banners')->with('flash_message_success','ເພີ່ມ ແບນເນີ່ ຮຽບຮ້ອຍແລ້ວ!!');
        }
        
        return view('admin.banners.add_banner');
    }
    public function viewBanners(){
        $banners = Banner::get();
        return view('admin.banners.view_banners')->with(compact('banners'));
    }
    public function editBanner(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }
            //Input to database
            $brand = New Banner;
            $brand->title = $data['title'];
            $brand->link = $data['link'];
            $brand->description = $data['description'];
            // Upload Image
            if($request->hasFile('image')){
               $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $banner_image_path = 'images/frontend_images/banners/'.$filename;
                    Image::make($image_tmp)->resize(520,441)->save($banner_image_path);
                }
                }else{
                    $filename = $data['current_image'];
                }
                //UPDATE TO DATABASES USE ID
                 Banner::where(['id'=>$id])->update(['title'=>$data['title'],'link'=>$data['link'],'description'=>$data['description'],'image'=>$filename,'status'=>$status]);
                 return redirect('/admin/view-banners')->with('flash_message_success','ອັບເດດແບນເນີ່ສຳເລັດແລ້ວ!!');
            }
         //GET DETIAL FOR SHOW IN EDIT PAGES
            $bannerDetails = Banner::where(['id'=>$id])->first();
         return view('admin.banners.edit_banner')->with(compact('bannerDetails'));
    }
    public function deleteBanner($id=null){
        if(!empty($id)){
            Banner::where(['id'=>$id])->delete();
            return redirect('/admin/view-banners')->with('flash_message_success','ລຶບແບນເນີ່ສຳເລັດແລ້ວ!!');
        }
    }
    public function deleteBannerImage($id =null){
         // get Product Image name
         $brandImage = Banner::where(['id'=>$id])->first();
         // get Product Image Paths
         $image_path = 'images/frontend_images/banners/';
         //Delete Large Image id net exists in folder
         if(file_exists($image_path.$brandImage->image)){
             unlink($image_path.$brandImage->image);
         }
         // delete image from product table
         Banner :: where(['id'=>$id])->update(['image'=>'']);
         return redirect()->back()->with('flash_message_success','ຮູບພາບ ແບນເນີ່ ຖືກລຶບຮຽບຮ້ອຍແລ້ວ!!');
    }
}
 