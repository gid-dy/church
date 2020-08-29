<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Children;
use App\Classleader;
use App\Adult;
use App\Region;
use App\Title;
use App\Organisation;
use App\Bibleclass;
use App\Service;
use App\Childrenclass;
use Image;
use Validator;
class AdultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addAdult(Request $request)
    {

        $regions = Region::get();

        if($request->isMethod('post')){
            $data = $request->all();

            $validator = Validator::make($request->all(), [
                'image' => 'required',
                'title_id' => 'required',
                'service_id' => 'required',
                'bibleclass_id' => 'required',
                'Organisation_id' => 'required',
                'childrenclass_id' => 'nullable',
                'surname' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'othernames' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'membership_type'=>'required',
                'position'=>'required',
                'age' => 'required',
                'dob' => 'required',
                'gender' => 'required',
                'email' => 'nullable|email',
                'contact_1' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'contact_2' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'baptism_status' => 'required',
                'married_status' => 'required',
                'anniversary_date' =>'nullable',
                'occupation' => 'regex:/^[\pL\s\-]+$/u|max:255',
                'resident' => 'regex:/^[\pL\s\-]+$/u|max:255',
                'region' => 'required',
                'hometown' => 'regex:/^[\pL\s\-]+$/u|max:255',
                'mother_deceased' =>'required',
                'father_deceased' =>'required',
                'emergency_name' =>'required|regex:/^[\pL\s\-]+$/u|max:255',
                'emergency_contact'=>'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'relation'=>'required|regex:/^[\pL\s\-]+$/u|max:255',

            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            if (Adult::where(['contact_1'=>$data['contact_1']])->exists()){
                return redirect()->back()->with('flash_message_error', 'Member already exists!');
            }

            if (Adult::where(['surname'=>$data['surname'], 'othernames'=>$data['othernames']])->exists()){
                return redirect()->back()->with('flash_message_error', 'Member already exists!');
            }

            if(empty($data['children_id'])){
                $data['children_id'] = "";
            }

            if(empty($data['childrenclass_id'])){
                $data['childrenclass_id'] = "";
            }


            $adult = new Adult;
            $adult->title_id = $data['title_id'];
            $adult->service_id = $data['service_id'];
            $adult->bibleclass_id = $data['bibleclass_id'];
            $adult->Organisation_id = json_encode($data['Organisation_id']);
            if (!empty($data['childrenclass_id'])) {
                $adult->childrenclass_id = $data['childrenclass_id'];
            }else{
                $adult->childrenclass_id = '';
            }
            $adult->children_id = json_encode($data['children_id']);
            $adult->membership_type = $data['membership_type'];
            $adult->position = $data['position'];
            $adult->surname = $data['surname'];
            $adult->othernames = $data['othernames'];
            $adult->age = $data['age'];
            $adult->dob = $data['dob'];
            $adult->gender = $data['gender'];
            $adult->email = $data['email'];
            $adult->contact_1 = $data['contact_1'];
            if (!empty($data['contact_2'])) {
                $adult->contact_2 = $data['contact_2'];
            }else{
                $adult->contact_2 = '';
            }
            $adult->baptism_status = $data['baptism_status'];
            $adult->married_status = $data['married_status'];
            $adult->anniversary_date = $data['anniversary_date'];
            $adult->occupation = $data['occupation'];
            $adult->resident = $data['resident'];
            $adult->region = $data['region'];
            $adult->hometown = $data['hometown'];
            $adult->mothers_name = $data['mothers_name'];
            $adult->mothers_contact = $data['mothers_contact'];
            $adult->mother_deceased = $data['mother_deceased'];
            $adult->fathers_name = $data['fathers_name'];
            $adult->fathers_contact = $data['fathers_contact'];
            $adult->father_deceased = $data['father_deceased'];
            $adult->emergency_name = $data['emergency_name'];
            $adult->emergency_contact = $data['emergency_contact'];
            $adult->relation = $data['relation'];
            //upload image
                if($request->hasFile('image')){
                    $image_tmp = $request->file('image');
                    if($image_tmp->isValid()){
                        $extension = $image_tmp->getClientOriginalExtension();
                        $filename = rand(111,999999).'.'.$extension;
                        $large_image_path = 'images/backend_images/adults/'.$filename;

                        //Resize Images
                        Image::make($image_tmp)->save($large_image_path);

                        //store image name in tours table
                        $adult->image =$filename;
                    }

                }
                //dd($adult);
                $adult->save();
                return redirect()->back()->with('flash_message_success','Member has been added successfully!');
            }
            $titles = Title::all();

            $services = Service::get();

            $Organisations = Organisation::get();

            $childrenclasses = Childrenclass::get();

            $bibleclasses = Bibleclass::get();

            $children = Children::orderBy('surname')->get();

            return view('adult')->with(compact('regions','titles','services','bibleclasses','Organisations','children','childrenclasses'));
    }



    public function viewAdultFirstService()
    {
        $firstservice = Adult::get();
        $firstservice = json_decode(json_encode($firstservice));
            foreach($firstservice as $key => $val){
                $title = Title::where(['id'=>$val->title_id])->first();
                $firstservice[$key]->title = $title->title;

                $service_type = Service::where(['id'=>$val->service_id])->first();
                $firstservice[$key]->service_type = $service_type->service_type;

                $children = json_decode($firstservice[$key]->children_id);

                $data = [];

                if(is_array($children)){
                    foreach ($children as $child) {
                        $data[] = Children::where(['id'=>$child])->first();
                    }
                }

                $firstservice[$key]->children = $data;


                $Organisation = json_decode($firstservice[$key]->Organisation_id);

                $data = [];

                if(is_array($Organisation)){
                    foreach ($Organisation as $Organisation) {
                        $data[] = Organisation::where(['id'=>$Organisation])->first();
                    }
                }



                $firstservice[$key]->Organisation = $data;

                // $Organisation = Organisation::where(['id'=>$val->Organisation_id])->first();
                // $firstservice[$key]->Organisation = $Organisation->Organisation;

                $bibleclass = Bibleclass::where(['id'=>$val->bibleclass_id])->first();
                $firstservice[$key]->bibleclass = $bibleclass->class_name;

                $children_class = Childrenclass::where(['id'=>$val->childrenclass_id])->first();
                $firstservice[$key]->children_class = $children_class ??''->children_class ??'';

            }
        return view('admin.adult.view_firstservice', ['firstservices' => $firstservice]);
    }

    public function viewAdultFirstServiceDetails($adult_id){

        $FirstServiceDetails = Adult::where('id',$adult_id)->first();
        $FirstServiceDetails =json_decode(json_encode($FirstServiceDetails));

        $service_id = $FirstServiceDetails->service_id;
        $serviceDetails = Service::where('id', $service_id)->first();

        $title_id = $FirstServiceDetails->title_id;
        $titleDetails = Title::where('id', $title_id)->first();

        $bibleclass_id = $FirstServiceDetails->bibleclass_id;
        $bibleclassDetails = Bibleclass::where('id', $bibleclass_id)->first();

        $childrenclass_id = $FirstServiceDetails->childrenclass_id;
        $childrenclassDetails = Childrenclass::where('id', $childrenclass_id)->first();

        // $Organisation_id = $FirstServiceDetails->Organisation_id;
        // $OrganisationDetails = Organisation::where('id', $Organisation_id)->first();

        $children = json_decode($FirstServiceDetails->children_id);

                $data = [];

                if(is_array($children)){
                    foreach ($children as $child) {
                        $data[] = Children::where(['id'=>$child])->first();
                    }
                }


                $FirstServiceDetails->children = $data;

                $Organisation = json_decode($FirstServiceDetails->Organisation_id);

                $data = [];

                if(is_array($Organisation)){
                    foreach ($Organisation as $Organisation) {
                        $data[] = Organisation::where(['id'=>$Organisation])->first();
                    }
                }



                $FirstServiceDetails->Organisation = $data;
        return view('admin.adult.view_firstservicedetails')->with(compact('FirstServiceDetails','serviceDetails','titleDetails','bibleclassDetails','childrenclassDetails'));
    }

    public function deleteAdultFirstService($id=null)
    {
        $childimage = Adult::where(['id'=>$id])->first();
        $large_image_path = 'images/backend_images/adults/';

        //deleting large image if not exist in folder
        if(file_exists($large_image_path.$childimage->image)){
            unlink($large_image_path.$childimage->image);
        }

        Adult::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Member has been deleted successfully!');
    }

    public function editAdultFirstService(Request $request, $id=null)
    {
        $regions = Region::get();

        if($request->isMethod('post')){
            $data = $request->all();

            $validator = Validator::make($request->all(), [
                'title_id' => 'required',
                'service_id' => 'required',
                'Organisation_id' => 'required',
                'children_id' => 'nullable',
                'childrenclass_id' => 'nullable',
                'surname' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'othernames' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'membership_type'=>'required',
                'position'=>'required',
                'age' => 'required',
                'dob' => 'required',
                'gender' => 'required',
                'email' => 'nullable|email',
                'bibleclass_id' => 'required',
                'contact_1' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'contact_2' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'baptism_status' => 'required',
                'married_status' => 'required',
                'anniversary_date' =>'nullable',
                'occupation' => 'regex:/^[\pL\s\-]+$/u|max:255',
                'resident' => 'regex:/^[\pL\s\-]+$/u|max:255',
                'region' => 'required',
                'hometown' => 'regex:/^[\pL\s\-]+$/u|max:255',
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

            if(empty($data['children_id'])){
                $data['children_id'] = "";
            }


            Adult::where(['id'=>$id])->update([
                'title_id'=>$data['title_id'],
                'service_id'=>$data['service_id'],
                'Organisation_id'=>$data['Organisation_id'],
                'bibleclass_id'=>$data['bibleclass_id'],
                'childrenclass_id'=>$data['childrenclass_id'],
                'children_id'=>json_encode($data['children_id']),
                'surname'=>$data['surname'],
                'othernames'=>$data['othernames'],
                'membership_type'=>$data['membership_type'],
                'position'=>$data['position'],
                'dob'=>$data['dob'],
                'age'=>$data['age'],
                'gender'=>$data['gender'],
                'email'=>$data['email'],
                'contact_1'=>$data['contact_1'],
                'contact_2'=>$data['contact_2'],
                'baptism_status'=>$data['baptism_status'],
                'married_status'=>$data['married_status'],
                'anniversary_date'=>$data['anniversary_date'],
                'occupation'=>$data['occupation'],
                'resident'=>$data['resident'],
                'hometown'=>$data['hometown'],
                'region'=>$data['region'],
                'emergency_name'=>$data['emergency_name'],
                'emergency_contact'=>$data['emergency_contact'],
                'relation'=>$data['relation'],
                'image'=>$filename
            ]);
            return redirect()->back()->with('flash_message_success','Member info updated successfully');
        }
        $adultDetails = Adult::where(['id'=>$id])->first();

            $titles = Title::all();

            $services = Service::get();

            $Organisations = Organisation::get();

            $bibleclasses = Bibleclass::get();

            $childrenclasses = Childrenclass::get();

            $children = Children::orderBy('surname')->get();

        return view('admin.adult.edit_firstservice')->with(compact('regions','adultDetails','titles','services','Organisations','children','bibleclasses','childrenclasses'));
    }

    public function viewAdultSecondService(){
        $secondservice = Adult::get();
        $secondservice = json_decode(json_encode($secondservice));
            foreach($secondservice as $key => $val){
                $title = Title::where(['id'=>$val->title_id])->first();
                $secondservice[$key]->title = $title->title;

                $service_type = Service::where(['id'=>$val->service_id])->first();
                $secondservice[$key]->service_type = $service_type->service_type;

                $children = json_decode($secondservice[$key]->children_id);

                $data = [];

                if(is_array($children)){
                    foreach ($children as $child) {
                        $data[] = Children::where(['id'=>$child])->first();
                    }
                }

                $secondservice[$key]->children = $data;

                $Organisation = json_decode($secondservice[$key]->Organisation_id);

                $data = [];

                if(is_array($Organisation)){
                    foreach ($Organisation as $Organisation) {
                        $data[] = Organisation::where(['id'=>$Organisation])->first();
                    }
                }



                $secondservice[$key]->Organisation = $data;

                $bibleclass = Bibleclass::where(['id'=>$val->bibleclass_id])->first();
                $secondservice[$key]->bibleclass = $bibleclass->class_name;

                $children_class = Childrenclass::where(['id'=>$val->childrenclass_id])->first();
                $secondservice[$key]->children_class = $children_class ?? ''->children_class ?? '';

            }

        return view('admin.adult.view_secondservice', ['secondservices' => $secondservice]);
    }

    public function viewAdultSecondServiceDetails($adult_id){

        $SecondServiceDetails = Adult::where('id',$adult_id)->first();
        $SecondServiceDetails =json_decode(json_encode($SecondServiceDetails));

        $service_id = $SecondServiceDetails->service_id;
        $serviceDetails = Service::where('id', $service_id)->first();

        $title_id = $SecondServiceDetails->title_id;
        $titleDetails = Title::where('id', $title_id)->first();

        $bibleclass_id = $SecondServiceDetails->bibleclass_id;
        $bibleclassDetails = Bibleclass::where('id', $bibleclass_id)->first();

        $Organisation = json_decode($SecondServiceDetails->Organisation_id);

                $data = [];

                if(is_array($Organisation)){
                    foreach ($Organisation as $Organisation) {
                        $data[] = Organisation::where(['id'=>$Organisation])->first();
                    }
                }



                $SecondServiceDetails->Organisation = $data;

        $childrenclass_id = $SecondServiceDetails->childrenclass_id;
        $childrenclassDetails = Childrenclass::where('id', $childrenclass_id)->first();

        $children = json_decode($SecondServiceDetails->children_id);

                $data = [];

                if(is_array($children)){
                    foreach ($children as $child) {
                        $data[] = Children::where(['id'=>$child])->first();
                    }
                }


                $SecondServiceDetails->children = $data;
        return view('admin.adult.view_secondservicedetails')->with(compact('SecondServiceDetails','serviceDetails','titleDetails','bibleclassDetails','childrenclassDetails'));
    }

    public function deleteAdultSecondService($id=null)
    {

        $childimage = Adult::where(['id'=>$id])->first();
        $large_image_path = 'images/backend_images/adults/';

        //deleting large image if not exist in folder
        if(file_exists($large_image_path.$childimage->image)){
            unlink($large_image_path.$childimage->image);
        }

        Adult::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Member has been deleted successfully!');
    }

    public function editAdultSecondService(Request $request, $id=null)
    {
        $regions = Region::get();

        if($request->isMethod('post')){
            $data = $request->all();

            $validator = Validator::make($request->all(), [
                'title_id' => 'required',
                'service_id' => 'required',
                'Organisation_id' => 'required',
                'children_id' => 'nullable',
                'childrenclass_id' => 'nullable',
                'surname' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'othernames' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'membership_type'=>'required',
                'position'=>'required',
                'age' => 'required',
                'dob' => 'required',
                'gender' => 'required',
                'email' => 'nullable|email',
                'bibleclass_id' => 'required',
                'anniversary_date' =>'nullable',
                'contact_1' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'contact_2' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'baptism_status' => 'required',
                'married_status' => 'required',
                'occupation' => 'regex:/^[\pL\s\-]+$/u|max:255',
                'resident' => 'regex:/^[\pL\s\-]+$/u|max:255',
                'region' => 'required',
                'hometown' => 'regex:/^[\pL\s\-]+$/u|max:255',
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
                    $large_image_path = 'images/backend_images/adults/'.$filename;

                    //Resize Images
                    Image::make($image_tmp)->save($large_image_path);

                }

            }else{
                $filename = $data['current_image'];
            }

            if(empty($data['children_id'])){
                $data['children_id'] = "";
            }


            Adult::where(['id'=>$id])->update([
                'title_id'=>$data['title_id'],
                'service_id'=>$data['service_id'],
                'Organisation_id'=>$data['Organisation_id'],
                'bibleclass_id'=>$data['bibleclass_id'],
                'childrenclass_id'=>$data['childrenclass_id'],
                'children_id'=>json_encode($data['children_id']),
                'surname'=>$data['surname'],
                'othernames'=>$data['othernames'],
                'membership_type'=>$data['membership_type'],
                'position'=>$data['position'],
                'dob'=>$data['dob'],
                'age'=>$data['age'],
                'gender'=>$data['gender'],
                'email'=>$data['email'],
                'contact_1'=>$data['contact_1'],
                'anniversary_date'=>$data['anniversary_date'],
                'contact_2'=>$data['contact_2'],
                'baptism_status'=>$data['baptism_status'],
                'married_status'=>$data['married_status'],
                'occupation'=>$data['occupation'],
                'resident'=>$data['resident'],
                'hometown'=>$data['hometown'],
                'region'=>$data['region'],
                'emergency_name'=>$data['emergency_name'],
                'emergency_contact'=>$data['emergency_contact'],
                'relation'=>$data['relation'],
                'image'=>$filename
            ]);
            return redirect()->back()->with('flash_message_success','Member info updated successfully');
        }
        $adultDetails = Adult::where(['id'=>$id])->first();

        $titles = Title::all();

            $services = Service::get();

            $Organisations = Organisation::get();

            $bibleclasses = Bibleclass::get();

            $childrenclasses = Childrenclass::get();

            $children = Children::orderBy('surname')->get();


        return view('admin.adult.edit_secondservice')->with(compact('regions','adultDetails','titles','services','Organisations','children','bibleclasses','childrenclasses'));
    }

}
