<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Children;
use App\Region;
use App\Title;
use App\Organisation;
use App\Service;
use Image;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $regions = Region::get();

        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
             if(empty($data['title_id'])){
                 return redirect()->back()->with('flash_message_error', 'Select Under category option!');
             }
            if(empty($data['service_type_id'])){
                return redirect()->back()->with('flash_message_error', 'Price cannot be empty!');
            }

            
            $children = new Children;
            $children->title_id = $data['title_id'];
            $children->service_type_id = $data['service_type_id'];
            $children->Organisation_id = $data['Organisation_id'];
            $children->surname = $data['surname'];
            $children->othernames = $data['othernames'];
            $children->age = $data['age'];
            $children->dob = $data['dob'];
            $children->gender = $data['gender'];
            $children->role = $data['role'];
            $children->contact_1 = $data['contact_1'];
            $children->contact_2 = $data['contact_2'];
            $children->baptism_status = $data['baptism_status'];
            $children->marital_status = $data['marital_status'];
            $children->occupation = $data['occupation'];
            $children->resident = $data['resident'];
            $children->region = $data['region'];
            $children->hometown = $data['hometown'];
            $children->mothers_name = $data['mothers_name'];
            $children->mothers_contact = $data['mothers_contact'];
            $children->mothers_occupation = $data['occupation'];
            $children->fathers_name = $data['fathers_name'];
            $children->fathers_contact = $data['fathers_contact'];
            $children->fathers_occupation = $data['fathers_occupation'];
             //upload image
             if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,999999).'.'.$extension;
                    $large_image_path = 'images/backend_images/children/'.$filename;

                    //Resize Images
                    Image::make($image_tmp)->save($large_image_path);

                    //store image name in tours table
                    $children->image =$filename;
                }

            }
            $children->save();
            return redirect()->back()->with('flash_message_success','Member has been added successfully!');
        }
        $title = Title::get();
        $title_dropdown ="<option value='' selected disabled>Select</option>";
        foreach ($title as $title) {
            $title_dropdown .= "<option value='".$title->id."'>".$title->title."</option>";
        }
        $service_type = Service::get();
        $service_type_dropdown ="<option value='' selected disabled>Select</option>";
        foreach ($service_type as $service_type) {
            $service_type_dropdown .= "<option value='".$service_type->id."'>".$service_type->service_type."</option>";
        }
        $Organisation = Organisation::get();
        $Organisation_dropdown ="<option value='' selected disabled>Select</option>";
        foreach ($Organisation as $Organisation) {
            $Organisation_dropdown .= "<option value='".$Organisation->id."'>".$Organisation->Organisation."</option>";
        }
        return view('index')->with(compact('regions','title_dropdown','service_type_dropdown','Organisation_dropdown'));
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
        //
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
        //
    }
}
