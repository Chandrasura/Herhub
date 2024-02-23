<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use App\Models\Deposit;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo;
    public function redirectTo()
    {
        $this->redirectTo = 'pages.index';
        request()->session()->flash('user_registered', 'true');
        return route($this->redirectTo);
    }

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
            'full_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'min:7', 'max:12', 'unique:users'],
            'phone' => ['required', 'numeric', 'gt:0', 'unique:users'],
            'gender' => ['required', 'string', 'in:male,female,others'],
            'withdrawal_pin' => ['required', 'numeric', 'gt:0', 'digits:4'],
            'referral_code' => ['required', 'string', 'exists:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'terms' => ['accepted'],
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
        try{
            DB::beginTransaction();
            $user = User::create([
                'name' => ucwords($data['full_name']),
                'username' => $data['username'],
                'phone' => $data['phone'],
                'gender' => $data['gender'],
                'balance' => 28,
                'withdrawal_pin' => Hash::make($data['withdrawal_pin']),
                'referral_code' => $this->generateUniqueReferralCode(),
                'password' => Hash::make($data['password']),
            ]);
    
            Deposit::create([
                'user_id' => $user->id,
                'amount' => 28
            ]);
    
            DB::commit();
            return $user;
        } catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong...');
        }
    }

    public function generateUniqueReferralCode()
    {
        $isUnique = false;

        while (!$isUnique) {
            $referralCode = '';
            for ($i = 0; $i < 6; $i++) {
                // Generate a random number between 97 ('a') and 122 ('z') ASCII values
                $randomNumber = rand(97, 122);
                // Convert the ASCII value to its corresponding character
                $referralCode .= strtoupper(chr($randomNumber));
            }

            // Check if the referral code already exists in the database
            $exists = User::where('referral_code', $referralCode)->exists();

            if (!$exists) {
                $isUnique = true;
            }
        }

        return $referralCode;
    }
}
