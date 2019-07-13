<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Roles;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users']=User::with('roles')->get();
        return view('owner/user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['roles']=Roles::get();
        // dd($data);
        return view('owner/user.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role'=> 'required',
            ]);
        $data['users']=User::create([
            'roles_id' => $request['role'],
            'name' => $request['name'],
            'alamat' => $request['alamat'],
            'no_hp' => $request['no_hp'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        return redirect()-> route('user.index')->with(['success' => 'Data Berhasil Ditambahkan!']);    }

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
        $data['users'] = User::find($id);
        $data['roles']=Roles::get();
        
        // dd($data['user']);
        return view('owner/user.edit',$data);
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
        // $data['users']=User::where('id',$request['id'])
        // ->update([
        //     'roles_id' => $request['role'],
        //     'name' => $request['name'],
        //     'alamat' => $request['alamat'],
        //     'no_hp' => $request['no_hp'],
        //     'email' => $request['email'],
        //     'password' => bcrypt($request['password']),
        // ]);
        // dd($data['users']);
        // return redirect('user');

        $user = User::find($id);
        $user->fill($request->all());
        $user->update();

       return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()-> route('user.index');
    }
}
