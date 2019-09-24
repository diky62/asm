<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OrderShuttle;
use PDF;

class LaporanShuttleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('owner/laporan_shuttle.index');
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
    public function show(Request $request)
    {
        $a = $request['tgl_awal'];
        $b = $request['tgl_akhir'];
        // dd($b);
        $data['order_shuttles']=OrderShuttle::whereBetween('tgl_berangkat',[$a, $b])->get();
        $jumlah_pesanan = OrderShuttle::whereBetween('tgl_berangkat',[$a, $b])->count();
         // dd($jumlah_pesanan);
        foreach ($data['order_shuttles'] as $c => $nilai) {
            $nilai->sum_nilai = $nilai->sum('total');
        }
        $total = $nilai->sum_nilai;
         return view('owner/laporan_shuttle.show', $data, ['a' => $a, 'b'=>$b, 'total'=>$total, 'jumlah_pesanan'=>$jumlah_pesanan]);
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

    function pdf(Request $request)
    {
        $a = $request['tgl_awal'];
        $b = $request['tgl_akhir'];
        
        // dd($b);
        $data['order_shuttles']=OrderShuttle::whereBetween('tgl_berangkat',[$a, $b])->get();    
        // $data['order_shuttles']=OrderShuttle::get();
          // dd($data);
        $pdf = \PDF::loadView('pdf', $data, ['a' => $a, 'b'=>$b]);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download('laporan_shuttle.pdf');   
    }

}
