<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
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

         return redirect('ordertour')->with(['success' => 'Data Berhasil Disimpan']);
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
        $name['user'] = User::find(Auth::user()->id);
        
        return view('owner/order_tour.cetak',$data,$name);
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

    function pdf()
    {
        // $a = $request['tgl_awal'];
        // $b = $request['tgl_akhir'];
        
        // dd($awal);
        // $data['order_shuttles']=OrderShuttle::whereBetween('tgl_berangkat',[$a, $b])->get();    
         $data['order_tour'] = OrderTour::get();
          // dd($data);
        $pdf = \PDF::loadView('tour-pdf', $data);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('laporan_tour.pdf');   
    }
}
