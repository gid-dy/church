<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\Adult;
use Validator;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCollection(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            $validator = Validator::make($request->all(), [
                'adult_id' => 'nullable',
                'type' => 'required',
                'date' => 'required',
                'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $collection = new Collection;
            if (!empty($data['adult_id'])) {
                $collection->adult_id = $data['adult_id'];
            }else{
                $collection->adult_id = '';
            }
            $collection->type = $data['type'];
            $collection->date = $data['date'];
            $collection->amount = $data['amount'];

            $collection->save();

            return redirect()->back()->with('flash_message_success','Collection recorded successfully!');
        }
        $adults = Adult::get();
        return view('admin.collections.add_collection')->with( compact('adults'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function record()
    {
        $current_day = Collection::select('tithe')->whereday('date', Carbon::now()->year)
                                        ->whereMonth('date', Carbon::now()->month)->count() && Collection::select('sum(amount) as total')
                                        >groupBy(Collection::raw('date', Carbon::now()->year))
                                        ->get();
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
