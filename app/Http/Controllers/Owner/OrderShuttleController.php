<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\OrderShuttle;
use App\Jurusan;

class OrderShuttleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['order_shuttles']=OrderShuttle::with('jurusan')->orderBy('created_at','desc')->get();
        // dd($data);
        
        $a = OrderShuttle::count();
        $c["nilai"] = OrderShuttle::get();
        foreach ($c['nilai'] as $c => $nilai) {
            $nilai->sum_nilai = $nilai->sum('total');
        }
        $total = $nilai->sum_nilai;
       

        // $z = OrderShuttle::whereMonth($month);
        // dd($month);
        // $jumlah_pesanan = OrderShuttle::get();
        // dd($jumlah_pesanan);

        // 
        return view('owner/order_shuttle.index',$data, ['a' => $a, 'total' => $total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data['jurusans']=Jurusan::get();
        // dd($data);
        return view('owner/order_shuttle.create',$data);
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
        $data['order_shuttle']=OrderShuttle::create([
            'jurusan_id' => $request['jurusan'],
            'nama' => $request['nama'],
            'alamat' => $request['alamat'],
            'no_identitas' => $request['no_identitas'],
            'tgl_berangkat' => $request['tgl_berangkat'],
            'harga' => $request['harga'],
            'diskon' => $request['diskon'],
            'total' => $request['total'],

        ]);

        return redirect()-> route('order_shuttle.index')->with(['success' => 'Data Berhasil Ditambahkan!']);
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
        $data['order_shuttle'] = OrderShuttle::find($id);
        $data['jurusans'] = Jurusan::get();
        
        // dd($data['user']);
        // return view('owner/user.edit',$data);
        return view('owner/order_shuttle.edit',$data);
    }

    public function cetak($id)
    {
        //
        $data['order_shuttle'] = OrderShuttle::find($id);
        $data['jurusans'] = Jurusan::get();
        $name['user'] = User::find(Auth::user()->id);
        
        // dd($data['user']);
        // dd($name);
        // return view('owner/user.edit',$data);
        return view('owner/order_shuttle.cetak',$data,$name);
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
        $user = OrderShuttle::find($id);
        $user->fill($request->all());
        $user->update();

       return redirect('order_shuttle');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order=OrderShuttle::find($id);
        $order->delete();
        return redirect()-> route('order_shuttle.index');
    }
}
