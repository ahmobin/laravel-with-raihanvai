<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        try{
            return User::all();

        }catch (\Exception $e){
            Log::critical($e->getMessage() . " " . $e->getFile() ." " . $e->getLine());
        }
    }


    public function create(){
        try{
            return view("users.create");

        }catch (\Exception $e){
            Log::critical($e->getMessage() . " " . $e->getFile() ." " . $e->getLine());
        }
    }


    public function store(UserStoreRequest $request){
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    }

    public function show(int $id){
        return User::find($id);
    }

    public function edit(int $id){

        $query = DB::statement("");



        $user = User::find($id);
        return view("users.edit",compact("user"));
    }

    public function update(Request $request, int $id){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|email|'. Rule::unique("users")->ignore($id)
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where("id",$request->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return $user;


    }

    public function delete(int $id){
       User::find($id)->delete();
    }
}
