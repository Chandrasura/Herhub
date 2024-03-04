<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Vip;
use App\Models\Task;
use App\Models\Profit;
use App\Models\Deposit;
use App\Models\Product;
use App\Models\Support;
use App\Models\Settings;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
        $deposits = Deposit::orderByDesc('created_at')->get();
        $profit = Profit::where('user_id', $user->id)->where('status', 'completed')->sum('amount');
        
        return view('user.deposit', compact(['user','deposits', 'profit']));
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
            'account_name' => 'required|string',
            'wallet_address' => 'required|string',
            'wallet_name' => 'required|string',
            'network' => 'required|string',
            'withdrawal_pin' => [
                'required', 'numeric', function($attribute, $value, $fail) use($user) {
                    if (!Hash::check($value, $user->withdrawal_pin)) {
                        $fail("Incorrect withdrawal pin");
                    }
                }
            ]
        ]);

        $user->update([
            'wallet_account_name' => ucwords(strtolower($request->account_name)),
            'wallet_address' => $request->wallet_address,
            'wallet_name' => $request->wallet_name,
            'wallet_network' => $request->network,
        ]);

        return redirect()->back()->with('success', 'Wallet address updated successfully!!!');

    }

    public function withdraw(){
        $user = Auth::user();
        $withdrawArray = [
            [
                'name' => 'Transaction 1',
                'description' => 'Payment for service',
                'date_and_time' => '2024-02-27 10:30:00',
                'amount_deducted' => 50.00,
                'amount_remaining' => 950.00,
            ],
            [
                'name' => 'Transaction 2',
                'description' => 'Refund for overcharge',
                'date_and_time' => '2024-02-26 15:45:00',
                'amount_deducted' => 20.00,
                'amount_remaining' => 970.00,
            ],
        ];
        $withdraws = Withdraw::orderByDesc('created_at')->get();
        $profit = Profit::where('user_id', $user->id)->where('status', 'completed')->sum('amount');

        return view('user.withdraw', compact(['user','withdraws', 'profit']));
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
                    } else if($value < $minimum_withdrawal->value){
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
    public function terms(){
       $terms =[
        [
            'term'=>'To submit tasks and reset the account, you must complete all ratings first, and the minimum reset amount is 100USDT'
        ],
        [
            'term'=>'If you need to reset your account, you must contact our online customer service to reset your account after you have completed all your tasks and withdraw your money.'
        ],
        [
            'term'=>'User withdrawals and system withdrawal requirements/security of user funds.'
        ],
        [
            'term'=>'Each users needs to complete all the tasks before they can meet the system withdrawal requirements.'
        ],
        [
            'term'=>'To avoid any loss of funds, all withdrawals are processed automatically by the system and not manually.'
        ],
        [
            'term'=>"Users' funds are completely safe on the Platform and the Platform will be liable for any accidental loss."
        ],
        [
            'term'=>'Please do not disclose your account password and security code to others. The platform will not be held responsible for any loss or damage caused.'
        ],
        [
            'term'=>"All users are advised to keep their accounts secure to avoid disclosure."
        ],
        [
            'term'=>"The Platform is not responsible for any accidental disclosure of accounts."
        ],
        [
            'term'=>"Because of the financial implications of the accounts, it is important not to disclose them to avoid unnecessary problems."
        ],
        [
            'term'=>"Security code: It is recommended that you do not set a birthday password, ID card number, mobile phone number, etc. It is recommended that you set a more difficult password to protect your funds."
        ],
        [
            'term'=>"If you forget your password, you can reset it by contacting online customer service and be sure to change it yourself afterwards."
        ],
        [
            'term'=>"Tasks are randomly assigned by the system and therefore cannot be changed, cancelled, controlled or skipped in any way."
        ],
        [
            'term'=>"Due to the large number of users on the platform, it is impossible to manually distribute group purchase items, so all product items are distributed randomly by the system."
        ],
        [
            'term'=>"Activation of products/combination products are randomly released by the system and cannot be changed/cancelled/skipped by any user/staff."
        ],
        [
            'term'=>"Legal action will be taken in the event of misuse of the account."
        ],
        [
            'term'=>"Each item comes from a different merchant, no deposit for more than 10 minutes, and each deposit must be made with the online customer service to confirm the merchant's USDT address."
        ],
        [
            'term'=>"The platform will not be held responsible for any deposits made to the wrong account."
        ],
        [
            'term'=>"For each time activation of task, the user is required to complete it within 8 hours, if it is not completed without notifying the merchant to apply for a time extension, resulting in complaints from the merchant, the user is liable for breach of contract."
        ],
       ];
        return view('user.terms', compact(['terms']));
    }

    public function logout(){
        return view('user.logout');
    }

    public function starting(){
        $user = Auth::user();
        $profit = Profit::where('user_id', $user->id)->where('status', 'completed')->whereDate('created_at', Carbon::today())->sum('amount');
        $task = Task::where('user_id', $user->id)->whereDate('created_at', Carbon::today())->count();
        $products = Product::where('amount', '<', $user->available_balance)->where('vip_id', $user->vip_id)->get();
        return view('user.start', compact(['user', 'profit', 'task', 'products']));
    }

    public function task(Request $request){
        $user = Auth::user();

        $pending_tasks = Task::where('user_id', $user->id)->where('status', 'pending')->get();
        if(count($pending_tasks) > 0){
            return response([
                'error' => 'You have pending task to attend to!!!'
            ]);
        }

        $today_tasks = Task::where('user_id', $user->id)->whereDate('created_at', Carbon::today())->count();

        if($today_tasks == $user->vip->orders_per_day){
            return response([
                'error' => 'You have completed the task for today.'
            ]);
        }

        $product = Product::find($request->product);
        $task = Task::create([
            'product_id' => $product->id,
            'user_id' => $user->id
        ]);

        $profit = round((($user->vip->percentage_profit / 100) * $task->product->amount), 2);

        Profit::create([
            'user_id' => $user->id,
            'task_id' => $task->id,
            'amount' => $profit
        ]);

        $user->update([
            'available_balance' => $user->available_balance - $product->amount
        ]); 

        return response([
            'task' => $task->id
        ]);
    }

    public function submitTask(Request $request){
        $user = Auth::user();

        $task = Task::find($request->task);
        $task->update([
            'status' => 'completed'
        ]);

        $task->profit->update([
            'status' => 'completed'
        ]);

        $user->update([
            'available_balance' => $user->available_balance + $task->product->amount + $task->profit->amount,
            'total_balance' => $user->total_balance + $task->profit->amount
        ]);

        return redirect()->back()->with('success', 'Task completed successfully!!!');

    }

    public function vip(){
        $vips = Vip::all(); 

        return view('user.vips', compact('vips'));
    }
    
    public function record(){
        $user = Auth::user();
        $all_tasks = Task::orderByDesc('created_at')->get();
        $pending_tasks = Task::orderByDesc('created_at')->where('status', 'pending')->get();
        $completed_tasks = Task::orderByDesc('created_at')->where('status', 'completed')->get();
        $profit = Profit::where('user_id', $user->id)->where('status', 'completed')->sum('amount');
        return view('user.record', compact('all_tasks', 'profit', 'pending_tasks', 'completed_tasks'));
    }
}
