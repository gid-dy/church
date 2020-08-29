<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Children;
use App\Region;
use App\Title;
use App\Childrenclass;
use App\Bibleclass;
use App\Organisation;
use App\Service;
use Image;
use Validator;

class ChildrenController extends Controller
{

    public function addChild(Request $request)
    {

        $regions = Region::get();

        if($request->isMethod('post')){
                $data = $request->all();
                //echo "<pre>"; print_r($data); die;

                $validator = Validator::make($request->all(), [
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'title_id' => 'required',
                    'service_id' => 'required',
                    'childrenclass_id' => 'required',
                    'membership_type'=>'required',
                    'surname' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                    'othernames' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                    'age' => 'required',
                    'dob' => 'required',
                    'gender' => 'required',
                    'educational_level'=>'required',
                    'specify'=>'required',
                    'contact_1' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                    'contact_2' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                    'baptism_status' => 'required',
                    'occupation' => 'regex:/^[\pL\s\-]+$/u|max:255',
                    'resident' => 'regex:/^[\pL\s\-]+$/u|max:255',
                    'region' => 'required',
                    'hometown' => 'regex:/^[\pL\s\-]+$/u|max:255',
                    'mothers_name' => 'nullable|regex:/^[\pL\s\-]+$/u|max:255',
                    'mothers_contact' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                    'mothers_occupation' => 'nullable|regex:/^[\pL\s\-]+$/u|max:255',
                    'fathers_name' => 'nullable|regex:/^[\pL\s\-]+$/u|max:255',
                    'fathers_contact' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                    'fathers_occupation' => 'nullable|regex:/^[\pL\s\-]+$/u|max:255',
                    'mother_deceased' =>'required',
                    'father_deceased' =>'required',
                    'emergency_name' =>'required|regex:/^[\pL\s\-]+$/u|max:255',
                    'emergency_contact'=>'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                    'relation'=>'required|regex:/^[\pL\s\-]+$/u|max:255',
                ]);

                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                if (Children::where('contact_1', $request->contact_1)->exists()){
                    return redirect()->back()->with('flash_message_error', 'Member already exists!');
                }

                if (Children::where(['surname'=>$data['surname'], 'othernames'=>$data['othernames']])->exists()){
                    return redirect()->back()->with('flash_message_error', 'Member already exists!');
                }



                // if(empty($data['Organisation_id'])){
                //     $data['Organisation_id'] = "";
                // }

                $children = new Children;
                $children->title_id = $data['title_id'];
                $children->service_id = $data['service_id'];
                $children->childrenclass_id = $data['childrenclass_id'];
                $children->membership_type = $data['membership_type'];
                $children->surname = $data['surname'];
                $children->othernames = $data['othernames'];
                $children->age = $data['age'];
                $children->dob = $data['dob'];
                $children->gender = $data['gender'];
                $children->contact_1 = $data['contact_1'];
                if (!empty($data['contact_2'])) {
                    $children->contact_2 = $data['contact_2'];
                }else{
                    $children->contact_2 = '';
                }
                $children->educational_level = $data['educational_level'];
                $children->specify = $data['specify'];
                $children->baptism_status = $data['baptism_status'];
                $children->occupation = $data['occupation'];
                $children->resident = $data['resident'];
                $children->region = $data['region'];
                $children->hometown = $data['hometown'];
                $children->mothers_name = $data['mothers_name'];
                $children->mothers_contact = $data['mothers_contact'];
                $children->mothers_occupation = $data['mothers_occupation'];
                $children->mother_deceased = $data['mother_deceased'];
                $children->fathers_name = $data['fathers_name'];
                $children->fathers_contact = $data['fathers_contact'];
                $children->fathers_occupation = $data['fathers_occupation'];
                $children->father_deceased = $data['father_deceased'];
                $children->emergency_name = $data['emergency_name'];
                $children->emergency_contact = $data['emergency_contact'];
                $children->relation = $data['relation'];

                // if($data['role']=='teacher' || $data['role']=='helper'){
                //     if (!empty($data['Organisation_id'])) {
                //         $children->Organisation_id = $data['Organisation_id'];
                //     }

                //     return redirect()->back()->with('flash_message_error', 'Select organisation!');
                // }
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
            $titles = Title::all();

            $services = Service::get();

            $childrenclasses = Childrenclass::get();

            return view('index')->with(compact('regions','titles','services','childrenclasses'));
    }

    public function viewChildFirstService(){
        $firstservice = Children::get();
        $firstservice = json_decode(json_encode($firstservice));
            foreach($firstservice as $key => $val){
                $title = Title::where(['id'=>$val->title_id])->first();
                $firstservice[$key]->title = $title->title;
                $service_type = Service::where(['id'=>$val->service_id])->first();
                $firstservice[$key]->service_type = $service_type->service_type;
                $children_class = Childrenclass::where(['id'=>$val->childrenclass_id])->first();
                $firstservice[$key]->children_class = $children_class->children_class;


            }
        return view('admin.children.view_firstservice')->with(compact('firstservice'));
    }


    public function viewChildFirstServiceDetails($children_id){

        $FirstServiceDetails = Children::where('id',$children_id)->first();
        $FirstServiceDetails =json_decode(json_encode($FirstServiceDetails));

        $service_id = $FirstServiceDetails->service_id;
        $serviceDetails = Service::where('id', $service_id)->first();

        $title_id = $FirstServiceDetails->title_id;
        $titleDetails = Title::where('id', $title_id)->first();

        $childrenclass_id = $FirstServiceDetails->childrenclass_id;
        $childrenclassDetails = Childrenclass::where('id', $childrenclass_id)->first();
        return view('admin.children.view_firstservicedetails')->with(compact('FirstServiceDetails','serviceDetails','titleDetails','childrenclassDetails'));
    }

    public function deleteChildFirstService($id=null)
    {
        $childimage = Children::where(['id'=>$id])->first();
        $large_image_path = 'images/backend_images/children/';

        //deleting large image if not exist in folder
        if(file_exists($large_image_path.$childimage->image)){
            unlink($large_image_path.$childimage->image);
        }

        Children::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Member has been deleted successfully!');
    }

    public function editChildFirstService(Request $request, $id=null)
    {
        $regions = Region::get();

        if($request->isMethod('post')){
            $data = $request->all();

            $validator = Validator::make($request->all(), [
                'title_id' => 'required',
                'service_id' => 'required',
                'childrenclass_id' => 'required',
                'membership_type'=>'required',
                'surname' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'othernames' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'age' => 'required',
                'dob' => 'required',
                'gender' => 'required',
                'educational_level'=>'required',
                'specify'=>'required',
                'contact_1' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'contact_2' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'baptism_status' => 'required',
                'occupation' => 'regex:/^[\pL\s\-]+$/u|max:255',
                'resident' => 'regex:/^[\pL\s\-]+$/u|max:255',
                'region' => 'required',
                'hometown' => 'regex:/^[\pL\s\-]+$/u|max:255',
                'mothers_name' => 'nullable|regex:/^[\pL\s\-]+$/u|max:255',
                'mothers_contact' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'mothers_occupation' => 'nullable|regex:/^[\pL\s\-]+$/u|max:255',
                'fathers_name' => 'nullable|regex:/^[\pL\s\-]+$/u|max:255',
                'fathers_contact' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'fathers_occupation' => 'nullable|regex:/^[\pL\s\-]+$/u|max:255',
                'mother_deceased' =>'required',
                'father_deceased' =>'required',
                'emergency_name' =>'required|regex:/^[\pL\s\-]+$/u|max:255',
                'emergency_contact'=>'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'relation'=>'required|regex:/^[\pL\s\-]+$/u|max:255',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,999999).'.'.$extension;
                    $large_image_path = 'images/backend_images/children/'.$filename;

                    //Resize Images
                    Image::make($image_tmp)->save($large_image_path);

                }

            }else{
                $filename = $data['current_image'];
            }

            Children::where(['id'=>$id])->update([
                'title_id'=>$data['title_id'],
                'service_id'=>$data['service_id'],
                'childrenclass_id'=>$data['childrenclass_id'],
                'membership_type'=>$data['membership_type'],
                'surname'=>$data['surname'],
                'othernames'=>$data['othernames'],
                'dob'=>$data['dob'],
                'age'=>$data['age'],
                'gender'=>$data['gender'],
                'contact_1'=>$data['contact_1'],
                'contact_2'=>$data['contact_2'],
                'baptism_status'=>$data['baptism_status'],
                'occupation'=>$data['occupation'],
                'resident'=>$data['resident'],
                'hometown'=>$data['hometown'],
                'region'=>$data['region'],
                'educational_level'=>$data['educational_level'],
                'specify'=>$data['specify'],
                'mother_deceased'=>$data['mother_deceased'],
                'father_deceased'=>$data['father_deceased'],
                'mothers_name'=>$data['mothers_name'],
                'mothers_contact'=>$data['mothers_contact'],
                'mothers_occupation'=>$data['mothers_occupation'],
                'fathers_name'=>$data['fathers_name'],
                'fathers_contact'=>$data['fathers_contact'],
                'fathers_occupation'=>$data['fathers_occupation'],
                'emergency_name'=>$data['emergency_name'],
                'emergency_contact'=>$data['emergency_contact'],
                'relation'=>$data['relation'],
                'image'=>$filename
            ]);
            return redirect()->back()->with('flash_message_success','Member info updated successfully');
        }
        $childrenDetails = Children::where(['id'=>$id])->first();

            $titles = Title::all();

            $services = Service::get();

            $childrenclasses = Childrenclass::get();

        return view('admin.children.edit_firstservice')->with(compact('regions','childrenDetails','titles','services','childrenclasses'));
    }

    public function viewChildSecondService(){
        $secondservice = Children::get();
        $secondservice = json_decode(json_encode($secondservice));
            foreach($secondservice as $key => $val){
                $title = Title::where(['id'=>$val->title_id])->first();
                $secondservice[$key]->title = $title->title;
                $children_class = Childrenclass::where(['id'=>$val->childrenclass_id])->first();
                $secondservice[$key]->children_class = $children_class->children_class;
                $service_type = Service::where(['id'=>$val->service_id])->first();
                $secondservice[$key]->service_type = $service_type->service_type;


            }
        return view('admin.children.view_secondservice')->with(compact('secondservice'));
    }

    public function viewChildSecondServiceDetails($children_id){

        $SecondServiceDetails = Children::where('id',$children_id)->first();
        $SecondServiceDetails =json_decode(json_encode($SecondServiceDetails));

        $service_id = $SecondServiceDetails->service_id;
        $serviceDetails = Service::where('id', $service_id)->first();

        $title_id = $SecondServiceDetails->title_id;
        $titleDetails = Title::where('id', $title_id)->first();

        $childrenclass_id = $SecondServiceDetails->childrenclass_id;
        $childrenclassDetails = Childrenclass::where('id', $childrenclass_id)->first();


        return view('admin.children.view_secondservicedetails')->with(compact('SecondServiceDetails','serviceDetails','titleDetails','childrenclassDetails'));
    }

    public function deleteChildSecondService($id=null)
    {

        $childimage = Children::where(['id'=>$id])->first();
        $large_image_path = 'images/backend_images/children/';

        //deleting large image if not exist in folder
        if(file_exists($large_image_path.$childimage->image)){
            unlink($large_image_path.$childimage->image);
        }

        Children::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Member has been deleted successfully!');
    }

    public function editChildSecondService(Request $request, $id=null)
    {
        $regions = Region::get();

        if($request->isMethod('post')){
            $data = $request->all();

            $validator = Validator::make($request->all(), [
                'title_id' => 'required',
                'service_id' => 'required',
                'childrenclass_id' => 'required',
                'membership_type'=>'required',
                'surname' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'othernames' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'age' => 'required',
                'dob' => 'required',
                'gender' => 'required',
                'educational_level'=>'required',
                'specify'=>'required',
                'contact_1' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'contact_2' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'baptism_status' => 'required',
                'occupation' => 'regex:/^[\pL\s\-]+$/u|max:255',
                'resident' => 'regex:/^[\pL\s\-]+$/u|max:255',
                'region' => 'required',
                'hometown' => 'regex:/^[\pL\s\-]+$/u|max:255',
                'mothers_name' => 'nullable|regex:/^[\pL\s\-]+$/u|max:255',
                'mothers_contact' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'mothers_occupation' => 'nullable|regex:/^[\pL\s\-]+$/u|max:255',
                'fathers_name' => 'nullable|regex:/^[\pL\s\-]+$/u|max:255',
                'fathers_contact' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'fathers_occupation' => 'nullable|regex:/^[\pL\s\-]+$/u|max:255',
                'mother_deceased' =>'required',
                'father_deceased' =>'required',
                'emergency_name' =>'required|regex:/^[\pL\s\-]+$/u|max:255',
                'emergency_contact'=>'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'relation'=>'required|regex:/^[\pL\s\-]+$/u|max:255',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,999999).'.'.$extension;
                    $large_image_path = 'images/backend_images/children/'.$filename;

                    //Resize Images
                    Image::make($image_tmp)->save($large_image_path);

                }

            }else{
                $filename = $data['current_image'];
            }



            Children::where(['id'=>$id])->update([
                'title_id'=>$data['title_id'],
                'service_id'=>$data['service_id'],
                'childrenclass_id'=>$data['childrenclass_id'],
                'membership_type'=>$data['membership_type'],
                'surname'=>$data['surname'],
                'othernames'=>$data['othernames'],
                'dob'=>$data['dob'],
                'age'=>$data['age'],
                'gender'=>$data['gender'],
                'contact_1'=>$data['contact_1'],
                'contact_2'=>$data['contact_2'],
                'baptism_status'=>$data['baptism_status'],
                'occupation'=>$data['occupation'],
                'resident'=>$data['resident'],
                'hometown'=>$data['hometown'],
                'region'=>$data['region'],
                'educational_level'=>$data['educational_level'],
                'specify'=>$data['specify'],
                'mother_deceased'=>$data['mother_deceased'],
                'father_deceased'=>$data['father_deceased'],
                'mothers_name'=>$data['mothers_name'],
                'mothers_contact'=>$data['mothers_contact'],
                'mothers_occupation'=>$data['mothers_occupation'],
                'fathers_name'=>$data['fathers_name'],
                'fathers_contact'=>$data['fathers_contact'],
                'fathers_occupation'=>$data['fathers_occupation'],
                'emergency_name'=>$data['emergency_name'],
                'emergency_contact'=>$data['emergency_contact'],
                'relation'=>$data['relation'],
                'image'=>$filename
            ]);
            return redirect()->back()->with('flash_message_success','Member info updated successfully');
        }
        $childrenDetails = Children::where(['id'=>$id])->first();

        $titles = Title::all();

            $services = Service::get();

            $childrenclasses = Childrenclass::get();

        return view('admin.children.edit_secondservice')->with(compact('regions','childrenDetails','titles','services','childrenclasses'));
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
