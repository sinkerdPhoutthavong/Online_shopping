<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use Image;
use App\Category;
use App\Product;
use App\ProductsAttribute;
use App\ProductImage;
use DB;
use App\cart;
use App\Banner;
use App\Coupon;
use App\User;
use App\Country;
use App\DeliveryAddress;

class ProductsController extends Controller
{
    public function addProduct(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }
            $product = new Product;
            if(empty($data['category_id'])){
                return redirect()->back()->with('flash_message_error','ບໍ່ສາມາດເພີ່ມສິນຄ້າ ກາລຸນາລອງໃໝ່ອີກຄັ້ງ !!');
            }
            $product->category_id = $data['category_id'];
            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            if(!empty($data['description'])){
                $product->description = $data['description'];
            }else{
                $product->description = '';
            }
            $product->care = $data['care'];
            $product->price = $data['price'];
            // Upload Image
            if($request->hasFile('image')){
               $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/products/large/'.$filename;
                    $medium_image_path = 'images/backend_images/products/medium/'.$filename;
                    $small_image_path = 'images/backend_images/products/small/'.$filename;
                    //Resize Images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                    //Store Image name in Products table
                    $product->image = $filename;
                }
            }
            $product->status = $status;
            $product->save();
            return redirect('/admin/view-products')->with('flash_message_success','ເພີ່ມສິນຄ້າຮຽບຮ້ອຍແລ້ວ!!');
        }
        // Categories dropdown start
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach ($categories as $cat) {
            $categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
            foreach ($sub_categories as $sub_cat) {
                $categories_dropdown .= "<option value='".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
            }
        }
        // Categories dropdown end
        return view('admin.products.add_product')->with(compact('categories_dropdown'));
    }
    public function viewProducts(){
        $products = Product::orderBy('id','DESC')->get();
        $products = json_decode(json_encode($products ));
        foreach ($products as $key => $val) {
            $category_name = Category::where(['id'=>$val->category_id])->first();
            $products[$key]->category_name = $category_name->name;
        }
        $productCount = Product::orderBy('id')->count();
        // echo "<pre>";print_r($productCount);die;
        //echo "<pre>";print_r($products);die;
        return view('admin.products.view_products')->with(compact('products','productCount'));
    }
    public function editProduct(Request $request,$id= null){
        if($request->isMethod('post')){
           $data = $request->all();
           if(empty($data['status'])){
            $status = 0;
            }else{
                $status = 1;
            }
           // Upload Image
           if($request->hasFile('image')){
            $image_tmp = Input::file('image');
             if($image_tmp->isValid()){
                 $extension = $image_tmp->getClientOriginalExtension();
                 $filename = rand(111,99999).'.'.$extension;
                 $large_image_path = 'images/backend_images/products/large/'.$filename;
                 $medium_image_path = 'images/backend_images/products/medium/'.$filename;
                 $small_image_path = 'images/backend_images/products/small/'.$filename;
                 //Resize Images
                 Image::make($image_tmp)->save($large_image_path);
                 Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                 Image::make($image_tmp)->resize(300,300)->save($small_image_path);
             }

         }else{
                $filename = $data['current_image'];
         }

         if(empty($data['description'])){
             $data['description'] = '';
         }
         if(empty($data['care'])){
            return redirect('/admin/edit-product/'.$id)->with('flash_message_error','ແກ້ໄຂບໍ່ສໍາເລັດ!! ກາລຸນາປ້ອນ ວັດສະດຸຜິດລະພັນ!!');
        }
          
          Product::where(['id'=>$id])->update(['category_id'=>$data['category_id'],'product_name'=>$data['product_name'],'product_code'=>$data['product_code'],'product_color'=>$data['product_color'],'description'=>$data['description'],'care'=>$data['care'],'price'=>$data['price'],'image'=>$filename,'status'=>$status]);
                 return redirect('/admin/view-products')->with('flash_message_success','ອັບເດດສີນຄ້າສຳເລັດແລ້ວ!!');
        }
        // show product in form
           // get Product detial
            $productDetails = Product::where(['id'=>$id])->first();
            // Categories dropdown start
                $categories = Category::where(['parent_id'=>0])->get();
                $categories_dropdown = "<option value='' selected disabled>Select</option>";
                foreach ($categories as $cat) {
                    if($cat->id == $productDetails->category_id){
                        $selected = "selected";
                    }else{
                        $selected = "";
                    }
                    $categories_dropdown .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
                    $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
                    foreach ($sub_categories as $sub_cat) {
                        if($sub_cat->id == $productDetails->category_id){
                            $selected = "selected";
                        }else{
                            $selected = "";
                        }
                        $categories_dropdown .= "<option value='".$sub_cat->id."' ".$selected.">&nbsp;--&nbsp;".$sub_cat->name."</option>";
                    }
                }
             // Categories dropdown end
            return view('admin.products.edit_products')->with(compact('productDetails','categories_dropdown'));
            //return redirect('/admin/view-product')->with('flash_message_success','ອັບເດດ ສິນຄ້າ ສຳເລັດແລ້ວ!!');       
    }
    public function deleteProductImage($id = null){
        // get Product Image name
        $productImage = Product::where(['id'=>$id])->first();
        // get Product Image Paths
        $large_image_path = 'images/backend_images/products/large/';
        $medium_image_path = 'images/backend_images/products/medium/';
        $small_image_path = 'images/backend_images/products/small/';
        //Delete Large Image id net exists in folder
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }
        // delete image from product table
        Product :: where(['id'=>$id])->update(['image'=>'']);
        return redirect()->back()->with('flash_message_success','ຮູບພາບສິນຄ້າຖືກລຶບຮຽບຮ້ອຍແລ້ວ!!');
    }  
    public function deleteProduct($id = null){
        if(!empty($id)){
            Product::where(['id'=>$id])->delete();
            return redirect('/admin/view-products')->with('flash_message_success','ລຶບສິນຄ້າສຳເລັດແລ້ວ!!');
        }
    }
    public function addAttributes(Request $request,$id=null){
        $productDetails = Product::with('attributes')->where(['id'=>$id])->first();
        // $productDetails = json_decode(json_encode($productDetails));
       // echo "<pre>";print_r($productDetails);die;
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>";print_r($data);die;
            foreach($data['sku'] as $key => $val) {
                if(!empty($val)){
                    //prevent duplicate SKu CHECK
                    $attrCountSKU = ProductsAttribute::where('sku',$val)->count();
                    if($attrCountSKU>0){
                        return redirect('admin/add-attributes/'.$id)->with('flash_message_error','ລະຫັດ SKU ທີ່ທ່ານປ້ອນມີຢູ່ແລ້ວ!! ກາລຸນາລອງ SKU ໃໝ່ອີກຄັ້ງ.');
                    }
                    //prevent duplicate SKu CHECK
                    $attrCountSizes = ProductsAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                    if($attrCountSizes>0){
                        return redirect('admin/add-attributes/'.$id)->with('flash_message_error','ຂະໜາດ "'.$data['size'][$key].'" ຂອງສິນຄ້າທີ່ທ່ານປ້ອນມີຢູ່ແລ້ວ!! ກາລຸນາລອງໃໝ່ອີກຄັ້ງ.');
                    }
                    $attribute = new ProductsAttribute; 
                    $attribute->product_id = $id;
                    $attribute->sku = $val;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->save();
                }
            }
            return redirect('admin/add-attributes/'.$id)->with('flash_message_success',' !! ເພີ່ມຄຸນລັກສະນະຂອງສິນຄ້າສຳເລັດແລ້ວ !!');
        }
        return view('admin.products.add_attributes')->with(compact('productDetails'));
    }
    public function deleteAttribute($id = null){
        if(!empty($id)){
            ProductsAttribute::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','ລຶບຄຸນລັກສະນະສິນຄ້າສຳເລັດແລ້ວ!!');
        }
    }
    public function products($url = null){
        //Show 404 page if Category URL dose not exist
        $countCategory = Category::where(['url'=>$url,'status'=>1])->count();
        if ($countCategory==0) {
            abort(404);
        }
        //for show product in sub category only
        $cateogoryDetails = Category::where([ 'url' => $url])->first();
        
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        //for show product in sub category of all for maincatrgories
        if($cateogoryDetails->parent_id==0){
            // if url is Main category url
            $subCategories = Category::where(['parent_id'=>$cateogoryDetails->id])->get();
           // $cat_ids= "";
            foreach ($subCategories as $subcat) {
                $cat_ids[] = $subcat->id;
            }
            $productsAll = Product::whereIn('category_id',$cat_ids)->where('status',1)->get();
        }else{
            // if url is sub category url
            $productsAll = Product::where(['category_id' =>$cateogoryDetails->id])->where('status',1)->get();
        }
        $banners = Banner::where('status','1')->get();
        return view('products.listing')->with(compact('cateogoryDetails','productsAll','categories','banners'));
    }
    public function product($id = null){
        //Show 404 page if product disable
        $countProduct = Product::where(['id'=>$id,'status'=>1])->count();
        if ($countProduct==0) {
            abort(404);
        }
        //get Product Detials 
        $productDetails = Product::with('attributes')->where('id',$id)->first();
        // $productDetails = json_decode(json_encode($productDetails));
        // echo "<pre>";print_r($productDetails);die;
        //Get all Categories and Sub Categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        //Get Product Alternate Images
        $productAltImage = ProductImage::where('product_id',$id)->get();

        //cal culate for product instock and show in detail page
         $total_stock = ProductsAttribute::where('product_id',$id)->sum('stock');

        // for reacommend prosuct with the same category
        $ralatedProducts = Product::where('id','!=',$id)->where(['category_id'=>$productDetails->category_id])->get(); 
        // foreach($ralatedProducts->chunk(3) as $chunk){
        //     foreach($chunk as $items){
        //         echo $items;echo "<br>";
        //     }
        //     echo "<br><br><br>";
        //     die;
           
        // }  
        return view('products.detail')->with(compact('productDetails','categories','productAltImage','total_stock','ralatedProducts'));
    }
    public function getProductPrice(Request $request){
        $data = $request->all();
        $proArr = explode("-",$data['idSize']);
        $proAttr = ProductsAttribute::where(['product_id'=>$proArr[0],'size'=>$proArr[1]])->first();
        echo $proAttr->price;
        echo "#";
        echo $proAttr->stock;
    }
    public function addImages(Request $request,$id=null){
        $productDetails = Product::with('attributes')->where(['id'=>$id])->first();
        $categoryDetails = Category::where(['id'=>$productDetails->category_id])->first();
        $category_name = $categoryDetails->name;
        if($request->isMethod('post')){
                $data = $request->all();
                //echo "<pre>";print_r($data);die;
                if($request->hasFile('image')){
                    $files = $request->file('image');
                    foreach ($files as $file) {
                        //echo "<pre>";print_r($files);die;
                        //Upload product to folder and insert to database with name
                        $Image = new ProductImage;
                        $extension = $file->getClientOriginalExtension();
                        $fileName = rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/backend_images/products/large/'.$fileName;
                        $medium_image_path = 'images/backend_images/products/medium/'.$fileName;
                        $small_image_path = 'images/backend_images/products/small/'.$fileName;
                        //Resize Images
                        Image::make($file)->save($large_image_path);
                        Image::make($file)->resize(600,600)->save($medium_image_path);
                        Image::make($file)->resize(300,300)->save($small_image_path);
                        //Store Image name in Products table
                        $Image->image = $fileName;
                        $Image->product_id = $data['product_id'];
                        $Image->save();
                    }
                }
            return redirect('admin/add-images/'.$id)->with('flash_message_success','ເພີ່ມຮູບພາບສໍາເລັດແລ້ວ!!');
        }

        $productImages = ProductImage::where(['product_id'=>$id])->get();
        return view('admin.products.add_images')->with(compact('productDetails','productImages'));
    }
    public function deleteAltImage($id=null){
        // get Product Image name
        $productImage = ProductImage::where(['id'=>$id])->first();
        // get Product Image Paths
        $large_image_path = 'images/backend_images/products/large/';
        $medium_image_path = 'images/backend_images/products/medium/';
        $small_image_path = 'images/backend_images/products/small/';
        //Delete Large Image id net exists in folder
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }
        // delete image from product table
        ProductImage :: where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','ຮູບພາບສິນຄ້າຖືກລຶບຮຽບຮ້ອຍແລ້ວ!!');
    }
    public function editAttributes(Request $request,$id=null){
        if($request->isMethod('post')){
            $data = $request->all();  
            //echo "<pre>";print_r($data);die; 
           foreach ($data['idAttr'] as $key => $attr) {
                if($data['price'][$key]==""){
                    return redirect()->back()->with('flash_message_error','ບໍ່ສາມາດອັບເດດສິນຄ້າໄດ້ !! ກາລຸນາປ້ອນລາຄາສິນຄ້າໃຫ້ຄົບຖ້ວນ!!');
                }
                if($data['stock'][$key]==""){
                    return redirect()->back()->with('flash_message_error','ບໍ່ສາມາດອັບເດດສິນຄ້າໄດ້ !! ກາລຸນາປ້ອນຈໍານວນສິນຄ້າໃຫ້ຄົບຖ້ວນ!!');
                }
               ProductsAttribute::where(['id'=>$data['idAttr'][$key]])->update(['price'=>$data['price'][$key],'stock'=>$data['stock'][$key]]);
           }
           return redirect()->back()->with('flash_message_success','ອັບເດດຂໍ້ມູນສໍາເລັດແລ້ວ!!');
        }

    }
    public function addtoCart(Request $request){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        
        if($request->isMethod('post')){
            $data = $request->all();
            
            //echo "<pre>";print_r($data);die;
            if(empty($data['user_email'])){
                $data['user_email'] = " ";
            }
            if(empty($data['session_id'])){
                $data['session_id'] = " ";
            }
            if(empty($data['size'])){
                return redirect()->back()->with('flash_message_error','ກາລຸນາເລືອກຂະໜາດຂອງສີນຄ້າ');
            }

            $session_id = Session::get('session_id');
            if(empty($session_id)){
                $session_id = str_random(40);
                Session::put('session_id',$session_id);
            }
            $sizeArr = explode("-",$data['size']);

            $countProducts =  DB::table('carts')->where(['product_id'=>$data['product_id'],'product_color'=>$data['product_color'],
            'size'=>$sizeArr[1],'session_id'=>$session_id])->count();
            if($countProducts>0){
                return redirect()->back()->with('flash_message_error','ສິນຄ້າທີ່ທ່ານເພີ່ມມີຢູ່ໃນກະຕ່າຂອງທ່ານແລ້ວ!!');
            }else{
                $getSKU = ProductsAttribute::select('sku')->where(['product_id'=>$data['product_id'],'size'=>$sizeArr[1]])->first();

                DB::table('carts')->insert(['product_id'=>$data['product_id'],'product_name'=>$data['product_name'],'product_code'=>$getSKU->sku,
                'product_color'=>$data['product_color'],'price'=>$data['price'],'size'=>$sizeArr[1],'quantity'=>$data['quantity'],'user_email'=>$data['user_email'],
                'session_id'=>$session_id]);
            }
        }
        return redirect('/cart')->with('flash_message_success','ເພີ່ມສິນຄ້າລົງກະຕ່າສໍາເລັດແລ້ວ');
    }
    public function cart(){
        $session_id = Session::get('session_id');
        $userCart = DB::table('carts')->where(['session_id'=>$session_id])->get();
         //Get Product Alternate Images
        // $productAltImage = ProductImage::where('product_id',$id)->get();
        //echo "<pre>";print_r($userCart);die;
        foreach ($userCart as $key => $product) {
            $productDetails = Product::where('id',$product->product_id)->first();
            $userCart[$key]->image = $productDetails->image;
        }
        return view('products.cart')->with(compact('userCart',''));
    }
    public function deleteCartproduct($id=null){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        if(!empty($id)){
            Cart::where(['id'=>$id])->delete();
            return redirect('cart')->with('flash_message_success','ລຶບສິນຄ້າສຳເລັດແລ້ວ!!');
        }
    }
    public function updateCartQuantity($id=null,$quantity=null){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        
        $getCartDetails = Cart::where('id',$id)->first();
        $getAttributeStock = ProductsAttribute::where('sku',$getCartDetails->product_code)->first();

        //echo $getAttributeStock->stock;
        //echo "--";
        $updated_quantity = $getCartDetails->quantity+$quantity;
        if($getAttributeStock->stock >= $updated_quantity){
            $cartQuantity = Cart::where('id',$id)->increment('quantity',$quantity);
            return redirect('cart')->with('flash_message_success','ເພີ່ມຈໍານວນສິນຄ້າສໍາເລັດແລ້ວ!!');
        }
        return redirect('cart')->with('flash_message_error','ຈໍານວນສິນຄ້າທີ່ທ່ານຕ້ອງການບໍ່ສາມາດໃຊ້ງານໄດ້!!');
    }
    public function applyCoupon(Request $request){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            $couponCount = Coupon::where('coupon_code',$data['coupon_code'])->count();
            if($couponCount==0){
                return redirect()->back()->with('flash_message_error','Coupon ທີ່ທ່ານປ້ອນໃຊ້ງານບໍ່ໄດ້!!');
            }else{
                //get coupon details
                $couponDetails = Coupon::Where('coupon_code',$data['coupon_code'])->first();

                // If coupon not actives
                if($couponDetails->status==0){
                    return redirect()->back()->with('flash_message_error','Coupon ທີ່ທ່ານປ້ອນໃຊ້ງານບໍ່ໄດ້!!');
                }

                //If coupon Expried
                $expiry_date = $couponDetails->expiry_date;
                $current_date = date('Y-m-d');
                if($expiry_date < $current_date){
                    return redirect()->back()->with('flash_message_error','Coupon ທີ່ທ່ານປ້ອນໝົດອາຍຸການໃຊ້ງານແລ້ວ!!');
                }

                //Coupon is Valid for discount

                //Get Cart Total Amount
                $session_id = Session::get('session_id');
                $userCart = DB::table('carts')->where(['session_id'=>$session_id])->get();
                $total_amount=0;
                //Loop for get total amount in cart
                foreach ($userCart as $items) {
                    $total_amount = $total_amount + ($items->price * $items->quantity);
                }

                //Check if amount type is Fixed or percentage
                if($couponDetails->amount_type = "Fixed"){
                    $couponAmount = $couponDetails->amount;
                }else{
                    $couponAmount = $total_amount * ($couponDetails->amount/100);
                }
                
                //Add Coupon code and amount session
                Session::put('CouponAmount',$couponAmount);
                Session::put('CouponCode',$data['coupon_code']);
                return redirect()->back()->with('flash_message_success','Coupon ທີ່ທ່ານປ້ອນສໍາເລັດແລ້ວ. ທ່ານໄດ້ຮັບສ່ວນຫຼຸດແລ້ວ!!');
            }
        }
    }
    public function checkout(Request $request){
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $userDetails = User::find($user_id);
        $countries = Country::get();

        //CHECK IF SHIPPING IS Address Exits
        $shippingCount = DeliveryAddress::where('user_id',$user_id)->count();
        if($shippingCount>0){
            $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();
        }

        //Update cart Table with user email
        $session_id = Session::get('session_id');
        DB::table('carts')->where(['session_id'=>$session_id])->update(['user_email'=>$user_email]);

        if($request->isMethod('post')){
            $data = $request->all();
            if(empty($data['shipping_name']) || empty($data['shipping_address']) || empty($data['shipping_email']) || empty($data['shipping_city'])
            || empty($data['shipping_state']) || empty($data['shipping_country']) || empty($data['shipping_pincode']) || empty($data['shipping_mobile'])
            ){
                return redirect()->back()->with('flash_message_error','ກະລຸນາປ້ອນຂໍ້ມູນໃຫ້ຄົບຖ້ວນ ເພື່ອດໍາເນີນການຕໍ່!!');
            }else{

                if($shippingCount>0){
                    //UPDATE SHIPPING ADDRESS
                    DeliveryAddress::where('user_id',$user_id)->update(['name'=>$data['shipping_name'],'address'=>$data['shipping_address'],
                                    'user_email'=>$data['shipping_email'],'city'=>$data['shipping_city'],'state'=>$data['shipping_state'],'country'=>$data['shipping_country'],
                                    'pincode'=>$data['shipping_pincode'],'mobile'=>$data['shipping_mobile']]);
                                    return redirect()->action('ProductsController@orderReview');
                }else{
                    // echo "<pre>";print_r($data);die;
                    //ADD NEW SHIPPING ADDRESS
                    $shipping = new DeliveryAddress;
                    $shipping->user_id = $user_id; 
                    $shipping->name = $data['shipping_name'];
                    $shipping->user_email = $user_email;
                    $shipping->address = $data['shipping_address'];
                    $shipping->city = $data['shipping_city'];
                    $shipping->state = $data['shipping_state'];
                    $shipping->country = $data['shipping_country'];
                    $shipping->pincode = $data['shipping_pincode'];
                    $shipping->mobile = $data['shipping_mobile'];
                    $shipping->save();
                    return redirect()->action('ProductsController@orderReview');
                }
            }
           
        }

        return view('products.checkout')->with(compact("userDetails","countries","shippingDetails","shippingCount"));
    }
    public function orderReview(Request $request){
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $userDetails = User::where('id',$user_id)->first();
        $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();
        $shippingDetails = json_decode(json_encode($shippingDetails));
        return view('products.order_review')->with(compact('userDetails','shippingDetails'));
    }

}
