<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    public function showRegistrationForm()
    {
        abort(404);
    }

    public function ownerRegistrationForm()
    {
        return view('auth.owner_form');
    }
    public function ownerRegistration(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'mobile_number' => ['required', 'numeric', 'unique:users', 'digits:10'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[
            'mobile_number.digits' => 'The mobile number must be 10 digits without +880.'
        ]);

        DB::beginTransaction();
        try {
            $data = new User;
            $data->name = $request->name;
            $data->role_id = 1; //owner
            $data->email = $request->email;
            $data->mobile_number = '+880' . $request->mobile_number;
            $data->password = Hash::make($request->password);
            $data->save();
            DB::commit();
            return redirect()->route('welcome');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', "Internal Server Error");
        }
    }

    public function staffRegistrationForm()
    {
        return view('auth.staff_form');
    }
    public function staffRegistration(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'rank' => ['nullable', 'string', 'max:255'],
            'mobile_number' => ['required', 'numeric', 'unique:users', 'digits:10'],
            'service_year' => ['nullable', 'numeric'],
            'service_month' => ['nullable', 'numeric'],
            'password' => ['required', 'string', 'min:8'],
        ],[
            'mobile_number.digits' => 'The mobile number must be 10 digits without +880.'
        ]);

        DB::beginTransaction();
        try {
            $data = new User;
            $data->name = $request->name;
            $data->role_id = 2; //staff
            $data->email = $request->email;
            $data->mobile_number = '+880' . $request->mobile_number;
            $data->rank = $request->rank;
            $data->service_year = $request->service_year;
            $data->service_month = $request->service_month;
            $data->password = Hash::make($request->password);
            $data->save();
            DB::commit();
            return redirect()->route('welcome');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', "Internal Server Error");
        }
    }

    public function workerRegistrationForm()
    {
        return view('auth.worker_form');
    }
    public function workerRegistration(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'section_name' => ['nullable', 'string', 'max:255'],
            'rank' => ['nullable', 'string', 'max:255'],
            'service_year' => ['nullable', 'numeric'],
            'service_month' => ['nullable', 'numeric'],
            'mobile_number' => ['required', 'numeric', 'unique:users', 'digits:10'],
            'password' => ['required', 'string', 'min:8'],
        ],[
            'mobile_number.digits' => 'The mobile number must be 10 digits without +880.'
        ]);

        DB::beginTransaction();
        try {
            $data = new User;
            $data->name = $request->name;
            $data->role_id = 4; //worker
            $data->section_name = $request->section_name;
            $data->rank = $request->rank;
            $data->service_year = $request->service_year;
            $data->service_month = $request->service_month;
            $data->mobile_number = '+880' . $request->mobile_number;
            $data->password = Hash::make($request->password);
            $data->save();
            DB::commit();
            return redirect()->route('welcome');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', "Internal Server Error");
        }
    }

    public function buyerRegistrationForm()
    {
        return view('auth.buyer_form');
    }
    public function buyerRegistration(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'mobile_number' => ['required', 'numeric', 'unique:users'],
            'category' => ['required', 'string', 'max:255'],
            'nationality' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        DB::beginTransaction();
        try {
            $data = new User;
            $data->name = $request->name;
            $data->role_id = 4; //buyer
            $data->email = $request->email;
            $data->mobile_number = $request->mobile_number;
            $data->category = $request->category;
            if ($request->category == 'others') {
                $data->category = $request->category_other;
            }
            $data->nationality = $request->nationality;
            $data->password = Hash::make($request->password);
            $data->save();
            DB::commit();
            return redirect()->route('welcome');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', "Internal Server Error");
        }
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
