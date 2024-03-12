<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::select(
            "SELECT * FROM users where is_active=1"
        );
       
    // {
    //     $user  = User::where('is_active', 1)->chunk(50, function($inspectors) {
    //         foreach ($inspectors as $inspector) {
              
    //         }
    //     });
    //     return $user;
        $response = [
            'status'  => true,
            'message' => 'User Retrieved Successfully',
            'data'    => $users,
        ];
    //    dd($user);
        return response()->json($response);
    }

    /**
     * Show the form for creating a ne;w resource.
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
      
        $user       = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        if ($user->save())
        {
            $response = [
                'status'  => true,
                'message' => 'User Added Successfully',
                'data'    => $user,
            ];
        }
        else
        {
            $response = [
                'status'  => false,
                'message' => 'Something went wrong',
            ];
        }

        return response()->json($response);
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
   
     return response()->json(User::whereId($id)->first());
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
        // dd( $request->all());
        $user       = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
     
        if ($user->save())
        {
            $response = [
                'status'  => true,
                'message' => 'User Updated Successfully',
                'data'    => $user,
            ];
        }
        else
        {
            $response = [
                'status'  => false,
                'message' => 'Something went wrong',
            ];
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        
      $user =  User::find($id);
    
        if ($user->delete())
        {
            $response = [
                'status'  => true,
                'message' => 'User delete Successfully',
                'data'    => $user,
            ];
        }
        else
        {
            $response = [
                'status'  => false,
                'message' => 'Something went wrong', 
            ];
        }

        return response()->json($response);
    }
}
