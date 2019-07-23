<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OrderTour;

class OrderTourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['order_tour'] = OrderTour::get();
        return view('owner/order_tour.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = OrderTour::get();
        return view('owner/order_tour.create', $data);
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
        // dd($request);
        $ordertour = new OrderTour;
        $ordertour->fill($request->All());
        $ordertour->Save();   

         return redirect('ordertour');
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
        $data['order_tour'] = OrderTour::find($id);
        
        return view('owner/order_tour.edit',$data);
    }

    public function cetak($id)
    {
        //
        $data['order_tour'] = OrderTour::find($id);
        
        return view('owner/order_tour.cetak',$data);
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
        $user = OrderTour::find($id);
        $user->fill($request->all());
        $user->update();

       return redirect('ordertour');
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
        $data = OrderTour::find($id)->delete();
        return response()->json($data);
    }
}
