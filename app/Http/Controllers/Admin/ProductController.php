<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::join('categories', 'products.category_id', 'categories.id')
        ->join('brands', 'products.brand_id', 'brands.id')
        ->select('products.*', 'categories.category_name', 'brands.brand_name')
        ->get();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $brands = Brand::all();

        return view('admin.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['product_quantity'] = $request->product_quantity;
        $data['discount_price'] = $request->discount_price;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['selling_price'] = $request->selling_price;
        $data['product_details'] = $request->product_details;
        $data['video_link'] = $request->video_link;
        $data['main_slider'] = $request->main_slider;
        $data['hot_deal'] = $request->hot_deal;
        $data['best_rated'] = $request->best_rated;
        $data['trend'] = $request->trend;
        $data['mid_slider'] = $request->mid_slider;
        $data['hot_new'] = $request->hot_new;
        $data['buyone_getone'] = $request->buyone_getone;
        $data['status'] = 1;

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;


        if ($image_one && $image_two && $image_three) {

            // for image one

            // Get filename with extension
            $filenameWithExt_one = $image_one->getClientOriginalName();

            // Get file path
            $filename_one = pathinfo($filenameWithExt_one, PATHINFO_FILENAME);

            // Remove unwanted characters
            $filename_one = preg_replace("/[^A-Za-z0-9 ]/", '', $filename_one);
            $filename_one = preg_replace("/\s+/", '-', $filename_one);

            // Get the original image extension
            $extension_one = $image_one->getClientOriginalExtension();

            // Create unique file name
            $fileNameToStore_one = $filename_one.'_'.time().'.'.$extension_one;

            $resize_one = Image::make($image_one)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg');
            Storage::put("public/media/product/{$fileNameToStore_one}", $resize_one->__toString());
            $data['image_one'] = 'media/product/' . $fileNameToStore_one;


            // for image two
            $filenameWithExt_two = $image_two->getClientOriginalName();
            $filename_two = pathinfo($filenameWithExt_two, PATHINFO_FILENAME);
            $filename_two = preg_replace("/[^A-Za-z0-9 ]/", '', $filename_two);
            $filename_two = preg_replace("/\s+/", '-', $filename_two);
            $extension_two = $image_two->getClientOriginalExtension();
            $fileNameToStore_two = $filename_two.'_'.time().'.'.$extension_two;
            $resize_two = Image::make($image_two)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg');
            Storage::put("public/media/product/{$fileNameToStore_two}", $resize_two->__toString());
            $data['image_two'] = 'media/product/' . $fileNameToStore_two;


            // for image three
            $filenameWithExt_three = $image_three->getClientOriginalName();
            $filename_three = pathinfo($filenameWithExt_three, PATHINFO_FILENAME);
            $filename_three = preg_replace("/[^A-Za-z0-9 ]/", '', $filename_three);
            $filename_three = preg_replace("/\s+/", '-', $filename_three);
            $extension_three = $image_three->getClientOriginalExtension();
            $fileNameToStore_three = $filename_three.'_'.time().'.'.$extension_three;
            $resize_three = Image::make($image_three)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg');
            Storage::put("public/media/product/{$fileNameToStore_three}", $resize_three->__toString());
            $data['image_three'] = 'media/product/' . $fileNameToStore_three;


            Product::create($data);

            $notification = array(
                'message' => 'Product Created Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = Subcategory::where('category_id', $id)->get();

        return json_encode($cat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $image1 = $product->image_one;
        $image2 = $product->image_two;
        $image3 = $product->image_three;

        unlink('storage/'.$image1);
        unlink('storage/'.$image2);
        unlink('storage/'.$image3);

        $product->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function active($id)
    {
        Product::where('id', $id)->update([
            'status'=>1,
        ]);

        $notification = array(
            'message' => 'Product Active Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        Product::where('id', $id)->update([
            'status'=>0,
        ]);

        $notification = array(
            'message' => 'Product Inactive Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

}
