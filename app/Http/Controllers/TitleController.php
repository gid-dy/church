<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Title;
use App\Organisation;
use App\Service;
use App\Childrenclass;
use App\Classleader;
use App\Bibleclass;
use Image;

class TitleController extends Controller
{
    public function addTitle(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'title' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $title = new Title;
            $title->title = $data['title'];

            $title->save();
            return redirect('/admin/view-titles')->with('flash_message_success', 'Title added Successfully!');
         }
        return view('admin.titles.add_title');
    }


    public function viewTitles()
    {
        $title = Title::get();

        return view('admin.titles.view_titles')->with(compact('title'));
    }


    public function editTitle(Request $request, $id=null)
    {

        if($request->isMethod('post')){
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'title' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            Title::where(['id'=>$id])->update([
                'title'=>$data['title'],
            ]);
            return redirect('/admin/view-titles')->with('flash_message_success','Title updated Successfully!');
        }
        $titleDetails = Title::where(['id'=>$id])->first();
        return view('admin.titles.edit_title')->with(compact('titleDetails'));
    }

    public function deleteTitle($id = null)
    {
        // if(!empty($id)){
            Title::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success', 'Title deleted Successfully!');
        //}
    }

    public function addClass(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'class_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $class = new Bibleclass;
            $class->class_name = $data['class_name'];

            $class->save();
            return redirect('/admin/view-classes')->with('flash_message_success', 'Bible Class added Successfully!');
         }
        return view('admin.classes.add_class');
    }


    public function viewClasses()
    {
        $class = Bibleclass::get();

        return view('admin.classes.view_classes')->with(compact('class'));
    }


    public function editClass(Request $request, $id=null)
    {

        if($request->isMethod('post')){
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'class_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            Bibleclass::where(['id'=>$id])->update([
                'class_name'=>$data['class_name'],
            ]);
            return redirect('/admin/view-classes')->with('flash_message_success','Class name updated Successfully!');
        }
        $classDetails = Bibleclass::where(['id'=>$id])->first();
        return view('admin.classes.edit_class')->with(compact('classDetails'));
    }

    public function deleteClass($id = null)
    {
        // if(!empty($id)){
            Bibleclass::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success', 'Bible Class deleted Successfully!');
        //}
    }

    public function addOrganisation(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'Organisation' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $organisation = new Organisation;
            $organisation->Organisation = $data['Organisation'];

            $organisation->save();
            return redirect('/admin/view-organisations')->with('flash_message_success', 'Organisation added Successfully!');
         }
        return view('admin.organisations.add_organisation');
    }


    public function viewOrganisations()
    {
        $organisation = Organisation::get();

        return view('admin.organisations.view_organisations')->with(compact('organisation'));
    }


    public function editOrganisation(Request $request, $id=null)
    {

        if($request->isMethod('post')){
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'Organisation' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            Organisation::where(['id'=>$id])->update([
                'Organisation'=>$data['Organisation'],
            ]);
            return redirect('/admin/view-organisations')->with('flash_message_success','Organisation updated Successfully!');
        }
        $organisationDetails = Organisation::where(['id'=>$id])->first();
        return view('admin.organisations.edit_organisation')->with(compact('organisationDetails'));
    }

    public function deleteOrganisation($id = null)
    {
        // if(!empty($id)){
            Organisation::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success', 'Organisation deleted Successfully!');
        //}
    }



    public function addService(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'service_type' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $service_type = new Service;
            $service_type->service_type = $data['service_type'];

            $service_type->save();
            return redirect('/admin/view-service_types')->with('flash_message_success', 'Service Type added Successfully!');
         }
        return view('admin.service_type.add_servicetype');
    }


    public function viewServices()
    {
        $service_type = Service::get();

        return view('admin.service_type.view_servicetypes')->with(compact('service_type'));
    }


    public function editService(Request $request, $id=null)
    {

        if($request->isMethod('post')){
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'service_type' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            Service::where(['id'=>$id])->update([
                'service_type'=>$data['service_type'],
            ]);
            return redirect('/admin/view-service_types')->with('flash_message_success','Service Type updated Successfully!');
        }
        $serviceDetails = Service::where(['id'=>$id])->first();
        return view('admin.service_type.edit_servicetype')->with(compact('serviceDetails'));
    }

    public function deleteService($id = null)
    {
        // if(!empty($id)){
            Service::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success', 'Service Type deleted Successfully!');
        //}
    }


    public function addClassleader(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'surname' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'othernames' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            //echo "<pre>"; print_r($data);die;

            $classleader = new Classleader;
            $classleader->bibleclass_id = $data['bibleclass_id'];
            $classleader->surname = $data['surname'];
            $classleader->othernames = $data['othernames'];

            $classleader->save();
            return redirect('/admin/view-class_leaders')->with('flash_message_success', 'Class leader added Successfully!');
         }
         $bibleclasses = Bibleclass::get();
        return view('admin.classleaders.add_classleader')->with(compact('bibleclasses'));
    }

    public function viewClassleaders()
    {
        $classleader = Classleader::get();
        $classleader = json_decode(json_encode($classleader));
            foreach($classleader as $key =>$val){
                $class_name = Bibleclass::where(['id'=>$val->bibleclass_id])->first();
                $classleader[$key]->class_name = $class_name->class_name;
            }

        return view('admin.classleaders.view_classleaders')->with(compact('classleader'));
    }

    public function editClassleader(Request $request, $id=null)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'surname' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'othernames' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }



            Classleader::where(['id'=>$id])->update([
                'surname'=>$data['surname'],
                'othernames'=>$data['othernames'],
                'bibleclass_id'=>$data['bibleclass_id'],
            ]);
            return redirect('/admin/view-class_leaders')->with('flash_message_success','Class leader updated Successfully!');
        }
        $classleaderDetails = Classleader::where(['id'=>$id])->first();

        $class_name = Bibleclass::get();
        $class_name_dropdown ="<option value='' selected disabled>Select</option>";
        foreach ($class_name as $class_name) {
            if($class_name->id==$classleaderDetails->bibleclass_id){
                $selected ="selected";
            }else{
                $selected = " ";
            }
            $class_name_dropdown .= "<option value='".$class_name->id."' ".$selected.">".$class_name->class_name."</option>";
        }
        return view('admin.classleaders.edit_classleader')->with(compact('classleaderDetails','class_name_dropdown'));
    }



    public function deleteClassleader($id = null)
    {
            Classleader::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success', 'Class Leader deleted Successfully!');
    }





    public function addChildClass(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'children_class' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $childrenclass = new Childrenclass;
            $childrenclass->children_class = $data['children_class'];

            $childrenclass->save();
            return redirect('/admin/view-childclasses')->with('flash_message_success', 'Class added Successfully!');
         }
        return view('admin.childclass.add_childclass');
    }


    public function viewChildClasses()
    {
        $childrenclass = Childrenclass::get();

        return view('admin.childclass.view_childclasses')->with(compact('childrenclass'));
    }


    public function editChildClass(Request $request, $id=null)
    {

        if($request->isMethod('post')){
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'children_class' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            Childrenclass::where(['id'=>$id])->update([
                'children_class'=>$data['children_class'],
            ]);
            return redirect('/admin/view-childclasses')->with('flash_message_success','Class updated Successfully!');
        }
        $childrenclassDetails = Childrenclass::where(['id'=>$id])->first();
        return view('admin.childclass.edit_childclass')->with(compact('childrenclassDetails'));
    }

    public function deleteChildClass($id = null)
    {
        // if(!empty($id)){
            Childrenclass::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success', 'Title deleted Successfully!');
        //}
    }

}
