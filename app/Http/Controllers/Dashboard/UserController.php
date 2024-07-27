<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        // select using query builder
        $users = DB::table('users')->select()->get();
        return view('dashboard.users.index', compact('users'));
    }


    public function destroy(string $id)
    {

        DB::table('users')->where('id', $id)->delete();;
     
        return redirect()->back()->with('success', 'Operation Successfully');
     }
    public function typeToggle(Request $request ,string $id )
    {
       $type=$request->has('type')? "ADM": "USR";
        $data['type']=$type;
        DB::table('users')->where('id',$id)->update($data);
        return redirect()->back()->with('success', 'Operation Successfully');

     }
    
}
