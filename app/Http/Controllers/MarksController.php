<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Children;
use App\Mark;
use App\Service;
use App\Month;
use App\Year;
use Validator;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function marks()
    {
        $data['services'] = Service::get();
        $data['months'] = Month::get();
        $data['years'] = Year::get();
        return view('admin.marks.add-marks',$data);
    }

    public function marksList(Request $request){
        $validator = Validator::make($request->all(), [
            'service_id' => 'required',
            'month_id' => 'required',
            'year_id' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $service_type = $request->service_id;
        $month = $request->month_id;
        $year = $request->year_id;

        $data['children'] = Children::where('service_id', $service_type)->get();
        $data['service_id'] = $request->service_id;
        $data['month_id'] = $request->month_id;
        $data['year_id'] = $request->year_id;
        return view('admin.marks.childrenList', $data);

    }


    public function saveMarks(Request $request)
    {
        $validator = Validator::make($request->all(),[

        ]);

        //$marks = json_decode($request->marks, true);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

            $countchildren = Count($request->children_id);
            for($i=0; $i < $countchildren; $i++){
            $marks = 'marks'.$i;
            $service_id = 'service_id';
            $month_id = 'month_id';
            $year_id = 'year_id';
            $mark = new Mark();
            $mark->children_id = $request->children_id[$i];
            $mark->service_id = $request->$service_id;
            $mark->month_id = $request->$month_id;
            $mark->year_id = $request->$year_id;
            $mark->marks = $request->$marks;
            $mark->save();
        }

        return redirect()->route('admin.marks')->with('flash_message_success', 'Marks Save Successfully');
    }


    public function view()
    {
        $data['allData'] = Mark::select('service_id','month_id','year_id')->groupBy('service_id','month_id','year_id')->orderBy('id', 'DESC')->get();

        return view('admin.marks.view-marks', $data);
    }

    public function edit(Request $request, $month_id)
    {

        $service_type = $request->service_id;
        $month = $request->month_id;
        $year = $request->year_id;

        $data['editData'] = Mark::where('month_id', $month_id)->orderBy('marks','DESC')->get();
        $data['children'] = Children::where('service_id',$service_type)->orderBy('surname')->get();

        $data['service_id'] = $request->service_id;
        $data['month_id'] = $request->month_id;
        $data['year_id'] = $request->year_id;
        return view('admin.marks.childrenList', $data);
    }

    public function details($month_id)
    {


        $data['details'] = Mark::where('month_id', $month_id)->orderBy('id', 'DESC')->get();

        return view('admin.marks.mark-details', $data);
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
    public function edits($id)
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
