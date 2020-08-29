<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\Children;
use App\Service;
use App\Year;
use DB;
use PDF;
use Validator;

class AttendanceController extends Controller
{

    public function attendance()
    {
        $data['services'] = Service::get();
        return view('admin.attendance.index',$data);
    }

    public function attendList(Request $request){
        $request->validate([
            'service_id' => 'required',
        ]);
        $service_type = $request->service_id;

        $data['children'] = Children::where('service_id', $service_type)->get();
        return view('admin.attendance.attendList', $data);

    }


    public function view()
    {
        $data['allData'] = Attendance::select('date')->groupBy('date')->orderBy('id', 'DESC')->get();

        return view('admin.attendance.view-attendance', $data);
    }

    // public function add(Request $request)
    // {
    //     $data['children'] = Children::where('service_id','1')->orderBy('surname')->get();
    //     return view('admin.attendance.add-attendance', $data);
    // }

    public function store(Request $request)
    {
        if(empty($data['children_id'])){
            $data['children_id'] = "";
        }
        $validator = Validator::make($request->all(), [

            'date' => 'required',

        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // if(empty($data['attendance_status'])){
        //     return redirect()->back()->with('flash_message_error', 'Attendance Status not checked');
        // }
        Attendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();
        $countchildren = Count($request->children_id);
        for($i=0; $i < $countchildren; $i++){
        $attendance_status = 'attendance_status'.$i;
        $attend = new Attendance();
        $attend->date = date('Y-m-d',strtotime($request->date));
        $attend->children_id = $request->children_id[$i];
        $attend->attendance_status = $request->$attendance_status;
        $attend->save();
        }
        return redirect()->route('admin.attend-view')->with('flash_message_success','Attendance taken successfully');
    }

    public function edit(Request $request,$date)
    {
        $service_type = $request->service_id;

        $data['editData'] = Attendance::where('date', $date)->get();
        $data['children'] = Children::where('service_id',$service_type)->orderBy('surname')->get();

        $data['service_id'] = $request->service_id;
        return view('admin.attendance.attendList', $data);
    }

    public function details($date)
    {
        $data['details'] = Attendance::where('date', $date)->orderBy('id', 'DESC')->get();

        return view('admin.attendance.attendance-details', $data);
    }


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

    public function addYear(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'year' => 'required',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $year = new Year;
            $year->year = $data['year'];

            $year->save();
            return redirect()->back()->with('flash_message_success', 'Year added Successfully!');
         }
         $years = Year::get();
        return view('admin.marks.add-year')->with(compact('years'));
    }


    public function editYear(Request $request, $id = null)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            //echo "<pre>"; print_r($data); die;
             foreach($data['idYear'] as $key => $year){
                 Year::where(['id' =>$data['idYear'][$key]])->update([
                     'year'=>$data['year'][$key],
                     ]);
             }
             return redirect()->back()->with('flash_message_success', 'Year has been updated successfully');
         }
    }

    // public function editTitle(Request $request, $id=null)
    // {

    //     if($request->isMethod('post')){
    //         $data = $request->all();
    //         $validator = Validator::make($request->all(), [
    //             'title' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
    //         ]);
    //         if($validator->fails()){
    //             return redirect()->back()->withErrors($validator)->withInput();
    //         }
    //         Title::where(['id'=>$id])->update([
    //             'title'=>$data['title'],
    //         ]);
    //         return redirect('/admin/view-titles')->with('flash_message_success','Title updated Successfully!');
    //     }
    //     $titleDetails = Title::where(['id'=>$id])->first();
    //     return view('admin.titles.edit_title')->with(compact('titleDetails'));
    // }

    public function deleteTitle($id = null)
    {
        // if(!empty($id)){
            ExamsYear::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success', 'Year deleted Successfully!');
        //}
    }
}
