<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show($id){
        $user = User::findOrFail($id);
        return view('admin.users.show',compact('user'));
    }

      /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        $user = User::findOrFail($id);

        $request->validate([
            'name'=>'required|max:50',
            'email'=>'required|max:50|unique:users,email,'.$user->id,
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('admin.users.usersIndex')
        ->with('message_status', 'Usuario actualizado exitosamente')
        ->with('icon', 'success');
    }

}
