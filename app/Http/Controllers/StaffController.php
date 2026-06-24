<?php

namespace App\Http\Controllers;

use App\Models\Staffs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $all = Staffs::all();

        return view('staffs.index', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'lastname' => 'required|min:3',
            'firstname' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed|alpha_num:ascii',
            // 'password_confirm' => 'required|min:8',
            'sexe' => 'required|in:M,F',
            'phone' => 'required',
            'role'=>'required|exists:roles,name',
            'birth_day' => 'required|date',
        ]);

        try {
            // code...
            DB::beginTransaction();
            $user = User::create([
                'lastname' => $validated['lastname'],
                'firstname' => $validated['firstname'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'gender' => $validated['sexe'],
                'phone' => $validated['phone'],
                'birth_day' => $validated['birth_day'],
            ]);

            Staffs::create([
                'user_id' => $user->id,
            ]);
            DB::commit();
            $role=$validated['role'];
            $user->assignRole($role);
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollBack();
        }

        return redirect()->route('admin.staffs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Staffs $staff)
    {
        //
        return view('staffs.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staffs $staff)
    {
        //
        return view('staffs.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staffs $staff)
    {
        //

        $validated = $request->validate([
            'lastname' => 'required|min:3',
            'firstname' => 'required|min:3',
            'email' => ['required', Rule::unique('users')->ignore($staff->user->id), 'min:3'],
            'sexe' => 'required|in:M,F',
            'phone' => ['required', Rule::unique('users')->ignore($staff->user->id), 'min:3'],
            'birth_day' => 'required|date',
        ]);
        $birth_day = '';
        if (isset($validated['birth_day'])) {
            $birth_day = $validated['birth_day'];
        } else {
            $birth_day = $staff->birth_day;
        }

        try {
            // code...
            DB::beginTransaction();
            $staff->user->update([
                'lastname' => $validated['lastname'],
                'firstname' => $validated['firstname'],
                'email' => $validated['email'],
                'gender' => $validated['sexe'],
                'phone' => $validated['phone'],
                'birth_day' => $birth_day,
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollBack();
        }

        return redirect()->route('admin.staffs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staffs $staff)
    {
        //
        $staff->delete();

        return redirect()->route('admin.staffs.index');
    }
}
