<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\RepositoriesInterfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    protected $user_repository;
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user_repository = $user;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.register');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "errors" => $validator->errors()
            ]);
        } else {
            if (Auth::attempt($request->only(["email", "password"]))) {
                $user = Auth::user();
                // check user role to defind the redirect url
                if ($user->hasRole('admin')) {
                    $redirect_url = 'dashboard';
                } else if ($user->hasRole('seller')) {
                    $redirect_url = 'MyStore';
                } else
                    $redirect_url = '/';

                return response()->json([
                    "status" => true,
                    "redirect" => url($redirect_url),
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "errors" => ["Invalid credentials"]
                ]);
            }
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "errors" => $validator->errors()
            ]);
        }

        $data = $request->all();
        $user = $this->create($data);

        Auth::login($user);
        $customerRole = Role::where('name', 'customer')->first();
        $user->roles()->attach($customerRole->id);

        // check user role to defind the redirect url
        if ($user->hasRole('admin') || $user->hasRole('seller')) {
            $redirect_url = 'dashboard';
        } else {
            $redirect_url = '/';
        }

        return response()->json([
            "status" => true,
            "redirect" => url($redirect_url),
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
        return $this->user_repository->storeOrUpdate(null, [
            'name' => $data['name'],
            'email' => $data['email'],
            'photo_src' => 'default_user_photo.png',
            'password' => Hash::make($data['password'])
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect()->route("home");
    }
}
