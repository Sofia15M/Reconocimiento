<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Barryvdh\DomPDF\Facade\pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application admin dashboard.
     */
    public function dashboard()
    {
        return view('admin.index');
    }

    /**
     * Users functions.
     */

    /**
     * Display a listing of the resource.
     */
    public function usersIndex()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createUser()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:50|unique:users',
            'password' => 'required|min:8|max:20|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request['password']);
        $user->save();

        //Assign the 'user' role to the newly created user
        $user->assignRole('user');

        return redirect()->route('admin.users.usersIndex')
            ->with('message_status', 'Usuario registrado exitosamente')
            ->with('icon', 'success');
    }

    /**
     * Confirm removal of the specified resource from storage.
     */
    public function confirmDeleteUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.delete', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'inactivo';

        $user->save();

        return redirect()->route('admin.users.usersIndex')
            ->with('message_status', 'Usuario eliminado exitosamente')
            ->with('icon', 'success');
    }

    /**
     * Show inactive users.
     */
    public function showInactiveUsers()
    {
        $users = User::all();
        return view('admin.users.inactive', compact('users'));
    }

    /**
     * Confirm user activation.
     */
    public function confirmActivateUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.activate', compact('user'));
    }

    /**
     * Active user.
     */
    public function activateUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'activo';

        $user->save();

        return redirect()->route('admin.users.usersIndex')
            ->with('message_status', 'Usuario activado exitosamente')
            ->with('icon', 'success');
    }

    /**
     * Show user report options.
     */
    public function usersReports()
    {
        return view('admin.users.reports');
    }


}

