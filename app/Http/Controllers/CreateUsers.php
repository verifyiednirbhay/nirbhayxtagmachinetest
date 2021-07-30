<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use App\Exception\UndefinedVariableException;
class CreateUsers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(5);

        return view('Users.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role'=>'required'
        ]);

        try{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'roles'=>$request->role
            ]);
        }catch(\Exception  $e){
            return redirect()->route('create-users.index')
            ->with('error','Error Occured');
        }

        if(!isset($user)){
            
            return redirect()->route('create-users.index')
            ->with('error','Error Occured');
        }
      

        event(new Registered($user));

        return redirect()->route('create-users.index')
            ->with('success','User created successfully.');
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(User $user)
    // {
    //     return view('users.show',compact('product'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($createuser,User $user)
    {
        $datas=User::where('id',$createuser)->first();
        return view('users.edit',[
            'datas'=>$datas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id,Request $request, User $user)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role'=>'required'
        ]);
        try{

            $user->where('id',$id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password,
                'roles'=>$request->role
            ]);
           
        }catch(\Exception $e){
           return redirect()->route('create-users.index')
            ->with('error','Error Occured');
        }
       
        return redirect()->route('create-users.index')
            ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id,User $user)
    {
    
        $user->where('id',$id)->delete();

        return redirect()->route('create-users.index')
            ->with('success','User deleted successfully');
    }
}