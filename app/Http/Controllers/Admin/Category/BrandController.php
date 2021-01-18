<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();

        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|unique:brands|max:55',
        ]);

        $data = array();

        $data['brand_name'] = $request->brand_name;

        $image = $request->file('brand_logo');

        if($image){
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'media/brand/';
            $image_url = $upload_path.$image_full_name;

            $image->move($upload_path, $image_full_name);

            $data['brand_logo'] = $image_url;

            Brand::create($data);

            $notification = array(
                'message' => 'Brand Created Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } 
        else
        {
            Brand::create($data);

            $notification = array(
                'message' => 'Brand Created Successfully without brand logo',
                'alert-type' => 'success'
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        return view('admin.brand.edit', compact('brand'));
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
        $oldLogo = $request->existing_logo;

        $data = array();

        $data['brand_name'] = $request->brand_name;

        $image = $request->file('brand_logo');

        if($image){
            unlink($oldLogo);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'media/brand/';
            $image_url = $upload_path.$image_full_name;

            $image->move($upload_path, $image_full_name);

            $data['brand_logo'] = $image_url;

            Brand::findOrFail($id)->update($data);

            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect('/admin/brand')->with($notification);
        } 
        else
        {
            Brand::findOrFail($id)->update($data);

            $notification = array(
                'message' => 'Brand Updated Successfully without brand logo',
                'alert-type' => 'success'
            );

            return redirect('/admin/brand')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        $image = $brand -> brand_logo;

        unlink($image);

        $brand->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
