<?php

namespace App\Http\Controllers\API;

use App\Exceptions\ExceptionHandle;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Exceptions\UserExceptions;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function create_user(Request $request){
        
        try {

            $validator = Validator::make(request()->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', Rules\Password::defaults()],
            ]);

            if($validator->fails()){
                return $this->errorResponse($validator->messages(), '', 422);
            }
    
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            if(!$user){
                throw new UserExceptions("User not created");
            }
            
            event(new Registered($user));

        } catch (\Exception $th) {
            $e = ExceptionHandle::log($th);
            return $this->errorResponse($e->getMessage(), $th->getMessage() , 422);
        }

        return $this->successResponse($user,'User Created', 201);
    }

    public function login_user(){

    }

    public function get_all_users(Request $request){
        $user = User::all();
        return $this->successResponse($user);
    }
}
