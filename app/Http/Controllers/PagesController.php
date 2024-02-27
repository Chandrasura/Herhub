<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Vip;
use App\Models\Profit;
use App\Models\Support;
use App\Models\Settings;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    public function index(){
        $user = Auth::user();

        $data = [
            [
                'label' => 'I. Start Task',
                'content' => ["minimum of 100 USDT is required to reset the tasks counter of the optimization.", "Once the 45 tasks have been completed, the user must request a full withdrawal 
                and receive the withdrawal amount before requesting to reset the account."],
            ],
            [
                'label' => 'II. Withdrawal',
                'content' => ["The user must complete 45 tasks to be able to request a withdrawal.", "The user must complete 45 tasks to be able to request a withdrawal."],
            ],
            [
                'label' => 'III. Funds',
                'content' => ["The user must complete 45 tasks to be able to request a withdrawal.", "The user must complete 45 tasks to be able to request a withdrawal."],
            ],
            [
                'label' => 'IV. Account Security',
                'content' => ["The user must complete 45 tasks to be able to request a withdrawal.", "The user must complete 45 tasks to be able to request a withdrawal."],
            ],
            [
                'label' => 'V. Normal Products',
                'content' => ["The user must complete 45 tasks to be able to request a withdrawal.", "The user must complete 45 tasks to be able to request a withdrawal."],
            ],
            [
                'label' => 'VI. Combination Tasks',
                'content' => ["The user must complete 45 tasks to be able to request a withdrawal.", "The user must complete 45 tasks to be able to request a withdrawal."],
            ],
            [
                'label' => 'VII. Deposits',
                'content' => ["The user must complete 45 tasks to be able to request a withdrawal.", "The user must complete 45 tasks to be able to request a withdrawal."],
            ],
            [
                'label' => 'VIII. Merchant Cooperation',
                'content' => ["The user must complete 45 tasks to be able to request a withdrawal.", "The user must complete 45 tasks to be able to request a withdrawal."],
            ],
            [
                'label' => 'IX. Invitation',
                'content' => ["The user must complete 45 tasks to be able to request a withdrawal.", "The user must complete 45 tasks to be able to request a withdrawal."],
            ],
            [
                'label' => 'X. Operating Hours',
                'content' => ["Platform operating hours 10:00 to 22:59:5940.", "Online customer service hours 10:00 to 22:59:5941.", "Withdrawal operation hours 10:00 to 22:59:59"],
            ],
        ];

        $supports = Support::orderBy('name', 'ASC')->get();
        $vips = Vip::all();

        return view('welcome', compact(['data', 'supports', 'user', 'vips']));
    }

    public function deposit(){
        $user = Auth::user();
        return view('user.deposit', compact(['user']));
    }

    public function support(){
        $supports = Support::orderBy('name', 'ASC')->get();
        return view('user.cslink', compact(['supports']));
    }

    public function wallet(){
        $user = Auth::user();
        return view('user.wallet', compact(['user']));
    }

    public function updateWallet(Request $request){
        $user = Auth::user();

        $request->validate([
            'wallet_address' => 'required|string',
            'withdrawal_pin' => [
                'required', 'numeric', function($attribute, $value, $fail) use($user) {
                    if (!Hash::check($value, $user->withdrawal_pin)) {
                        $fail("Incorrect withdrawal pin");
                    }
                }
            ]
        ]);

        $user->update([
            'wallet_address' => $request->wallet_address,
        ]);

        return redirect()->back()->with('success', 'Wallet address updated successfully!!!');

    }

    public function withdraw(){
        $user = Auth::user();
        return view('user.withdraw', compact(['user']));
    }

    public function storeWithdraw(Request $request){
        $user = Auth::user();

        if(!$user->wallet_address){
            return redirect()->back()->with('error', 'Kindly update wallet address first to place withdrawal');
        }

        $request->validate([
            'withdrawal_amount' => [
                'required', 'numeric', 'gt:0', function($attribute, $value, $fail) use($user) {
                    $minimum_withdrawal = Settings::where('key', 'minimum_withdrawal')->first();
                    
                    if ($value > $user->available_balance) {
                        $fail("The withdawal amount is greater than your available balance");
                    } else if($value < $minimum_withdrawal){
                        $fail("The minimum withdrawal is USDT $minimum_withdrawal->value");
                    }
                }
            ],
            'withdrawal_pin' => [
                'required', 'numeric', function($attribute, $value, $fail) use($request, $user) {
                    if (!Hash::check($value, $user->withdrawal_pin)) {
                        $fail("Incorrect withdrawal pin");
                    }
                }
            ]
        ]);

        $amount = round($request->withdrawal_amount, 2);

        try{
            DB::beginTransaction();

            Withdraw::create([
                'user_id' => $user->id,
                'amount' => $amount,
            ]);

            $user->update([
                'available_balance' => $user->available_balance - $amount,
                'total_balance' => $user->total_balance - $amount
            ]);

            DB::commit();
    
        } catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong...');
        }

        return redirect()->back()->with('success', 'Withdrawal placed successfully!!!');
    }

    public function logout(){
        return view('user.logout');
    }

    public function starting(){
        $user = Auth::user();
        $profit = Profit::where('user_id', $user->id)->whereDate('created_at', Carbon::today())->sum('amount');
        $task = Task::where('user_id', $user->id)->whereDate('created_at', Carbon::today())->count();

        return view('user.start', compact(['user', 'profit', 'task']));
    }
}
