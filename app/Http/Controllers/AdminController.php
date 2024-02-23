<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Support;
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
                'balance' => $user->balance + round($request->amount, 2)
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

    public function pendingWithdrawal(){
        $pending = Withdraw::where('status', 'pending')->orderBy('created_at', 'DESC')->get();
        return view('admin.pages.withdraw', compact(['pending']));
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
                    'balance' => $user->balance + $withdraw->amount
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
            return redirect()->back()->with('success', 'No action specified');
        }

    }




}
