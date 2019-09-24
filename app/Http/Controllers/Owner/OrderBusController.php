<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\OrderBus;
use App\PembayaranBus;

class OrderBusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['order_bus'] = OrderBus::orderBy('created_at','desc')->get();
        return view('owner/order_bus.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = OrderBus::get();
        return view('owner/order_bus.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $a = $request['tgl_berangkat'];
        // dd($a);
        $b = $request['tgl_kembali'];
        // $validator = Validator::make(request()->all(),[
            
        //     'tgl_berangkat'=> 'required',
        //     ]);
        if ($b<$a) {
            return redirect('orderbus/create')->with(['error' => 'Tanggal Pinjam Tidak Boleh Melebihi Tanggal Kembali !']);
        }
        else{
            $orderbus = new OrderBus;
            $orderbus->fill($request->All());
            $orderbus->Save();   

             return redirect('orderbus')->with(['success' => 'Data Berhasil Disimpan']);
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
        //
        $data['order_bus'] = OrderBus::find($id);
        
        // dd($data['user']);
        return view('owner/order_bus.edit',$data);
    }

    public function cetak($id)
    {
        //
        $data['order_bus'] = OrderBus::find($id);
        $name['user'] = User::find(Auth::user()->id);
        
        // dd($data['user']);
        return view('owner/order_bus.cetak',$data,$name);
    }

    public function pembayaran()
    {
        $data["pembayaran"] = Pembayaran::get();
        dd($data);
        return view('owner/order_bus.pembayaran');
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
        $user = OrderBus::find($id);
        $user->fill($request->all());
        $user->update();

       return redirect('orderbus');
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
        $data = OrderBus::find($id)->delete();
        return response()->json($data);
    }

    function pdf()
    {
        // $a = $request['tgl_awal'];
        // $b = $request['tgl_akhir'];
        
        // dd($awal);
        // $data['order_shuttles']=OrderShuttle::whereBetween('tgl_berangkat',[$a, $b])->get();    
         $data['order_bus'] = OrderBus::get();
          // dd($data);
        $pdf = \PDF::loadView('bus-pdf', $data);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('laporan_bus.pdf');   
    }
}
