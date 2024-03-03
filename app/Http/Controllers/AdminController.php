<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Product;
use App\Models\Support;
use App\Models\Settings;
use App\Models\Vip;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.pages.dashboard');
    }

    public function deposit(){
        $users = User::all();
        return view('admin.pages.deposit', compact(['users']));
    }

    public function storeDeposit(Request $request){
        $request->validate([
            'user' => 'required|string|exists:users,id',
            'amount' => 'required|numeric'
        ]);

        try{
            DB::beginTransaction();
            Deposit::create([
                'user_id' => $request->user,
                'amount' => round($request->amount, 2)
            ]);

            $user = User::where('id', $request->user)->first();
            $user->update([
                'availabe_balance' => $user->available_balance + round($request->amount, 2),
                'total_balance' => $user->total_balance + round($request->amount, 2)
            ]);
            DB::commit();
        } catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong...');
        }

        return redirect()->back()->with('success', 'Deposit created successfully');
    }

    public function support(){
        $supports = Support::orderBy('name', 'ASC')->get();
        return view('admin.pages.support', compact(['supports']));
    }

    public function storeSupport(Request $request){
        $request->validate([
            'support_name' => 'required|string|unique:supports,name',
            'support_link' => 'required|string|unique:supports,link'
        ]);

        Support::create([
            'name' => ucwords(strtolower($request->support_name)),
            'link' => $request->support_link
        ]);

        return redirect()->back()->with('success', 'Support created successfully');

    }

    public function updateMinimumWithdrawal(Request $request){
        $request->validate([
            'minimum_withdrawal' => 'required|integer|gt:0'
        ]);

        Settings::updateOrCreate([
            'key' => 'minimum_withdrawal',
        ], ['value' => $request->minimum_withdrawal]);

        return redirect()->back()->with('success', 'Minimum withdrawal updated successfully');
    }

    public function pendingWithdrawal(){
        $minimum_withdrawal = Settings::where('key', 'minimum_withdrawal')->first();
        $pending = Withdraw::where('status', 'pending')->orderBy('created_at', 'DESC')->get();
        return view('admin.pages.withdraw', compact(['pending', 'minimum_withdrawal']));
    }

    public function pendingWithdrawalAction($id, $action){
        $withdraw = Withdraw::find($id);
        if($action == 'approve'){
            $withdraw->update([
                'status' => 'successful',
            ]);
            return redirect()->back()->with('success', 'Withdrawal approved successfully');
        } else if($action == 'reject'){
            try{
                DB::beginTransaction();
                $user = User::where('id', $withdraw->user_id)->first();
                $user->update([
                    'available_balance' => $user->available_balance + $withdraw->amount,
                    'total_balance' => $user->total_balance + $withdraw->amount
                ]);
                $withdraw->update([
                    'status' => 'rejected',
                ]);
                DB::commit();
                return redirect()->back()->with('success', 'Withdrawal rejected successfully');    

            } catch(Exception $e){
                DB::rollBack();
                return redirect()->back()->with('error', 'Something went wrong...');
            }
        } else {
            return redirect()->back()->with('error', 'No action specified');
        }

    }

    public function vipLevels(){
        $vips = Vip::all();
        return view('admin.pages.levels', compact(['vips']));
    }

    public function storeVipLevel(Request $request){
        $request->validate([
            'vip_name' => 'required|string|unique:vips,name',
            'vip_amount' => 'required|integer|gt:0',
            'orders_per_day' => 'required|integer|gt:0',
            'percentage_profit' => 'required|numeric|gt:0',
            'image' => 'required|file|image|mimes:jpeg,jpg,webp,gif,png',
            'description' => 'required|array|min:1',
            'description.*' => 'required|string'
        ]);

        $descriptions = [];

        foreach($request->description as $des){
            $descriptions[] = $des;
        }

        $file = $request->File('image');
        $extension = $file->getClientOriginalExtension();
        $fileName = "$request->vip_name.$extension";

        $file->move('uploads/images/vips', $fileName);

        Vip::create([
            'name' => $request->vip_name,
            'amount' => $request->vip_amount,
            'orders_per_day' => $request->orders_per_day,
            'percentage_profit' => $request->percentage_profit,
            'image' => $fileName,
            'description' => json_encode($descriptions),
        ]);

        return redirect()->back()->with('success', 'Vip added successfully');    

    }

    public function products(){
        $products = Product::orderBy('name', 'ASC')->get();
        return view('admin.pages.products', compact(['products']));
    }

    public function storeProduct(Request $request){
        $request->validate([
            'image' => 'required|file|image|mimes:jpeg,jpg,webp,gif,png'
        ]);

        $file = $request->File('image');
        $extension = $file->getClientOriginalExtension();
        $productName = $this->generateProductCode();
        $fileName = "$productName.$extension";

        $vips = Vip::all();

        if(count($vips) > 0){
            $file->move('uploads/images/products', $fileName);
            $amount = 0;
            foreach($vips as $vip){
                if($vip->name == "VIP1") {
                    $amount = $this->generateProductAmount(100, 350);
                } else if($vip->name == "VIP2") {
                    $amount = $this->generateProductAmount(250, 600);
                } else if($vip->name == "VIP3") {
                    $amount = $this->generateProductAmount(500, 1200);
                } else if($vip->name == "VIP4") {
                    $amount = $this->generateProductAmount(800, 4000);
                }
                Product::create([
                    'name' => $productName,
                    'vip_id' => $vip->id,
                    'amount' => $amount,
                    'image' => $fileName
                ]);
            }

            return redirect()->back()->with('success', 'Product added successfully');    
        } else {
            return redirect()->back()->with('error', 'There are no VIPs at the moment. Kindly add at least one VIP to add a product.');    
        }
    }

    public function generateProductCode()
    {
        $isUnique = false;

        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        while (!$isUnique) {
            $randomString = '';
            for ($i = 0; $i < 12; $i++) {
                $randomString .= $characters[random_int(0, strlen($characters) - 1)];
            }

            $randomString = strtoupper($randomString);

            $exists = Product::where('name', $randomString)->exists();

            if (!$exists) {
                $isUnique = true;
            }
        }

        return $randomString;
    }

    function generateProductAmount($min, $max) {    
        // Calculate the number of integers divisible by 5 in the range
        $count = ($max - $min) / 5 + 1;
    
        // Generate a random index
        $randIndex = rand(0, $count - 1);
    
        // Calculate the random number
        $randomDivisibleBy5 = $min + 5 * $randIndex;
    
        return $randomDivisibleBy5;
    }

}
