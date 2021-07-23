<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\TravelPackage;
use App\Mail\TransactionSuccess;

use Carbon\Carbon;
use Mail;

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        $item = Transaction::with(['details', 'travel_package', 'user'])->findOrFail($id);
        return view('pages.checkout', [
            'item' => $item
        ]);
    }

    public function process(Request $request, $id)
    {
        $travel_package = TravelPackage::findOrFail($id);

        $transaction = Transaction::create([
            'travel_packages_id' => $id,
            'users_id' => Auth::user()->id,
            'transaction_total' => $travel_package->price,
            'transaction_status' => 'IN_CART'
        ]);

        TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'username' => Auth::user()->username
        ]);

        return redirect()->route('checkout', $transaction->id);
    }

    public function remove(Request $request, $detail_id)
    {
        $item = TransactionDetail::findOrFail($detail_id);

        $transaction = Transaction::with(['details', 'travel_package'])->findOrFail($item->transactions_id);

        if ($transaction->details->count() == 5) {
            $transaction->transaction_total = $transaction->travel_package->price;
        }

        // $transaction->transaction_total -= $transaction->travel_package->price;

        // $single_price = ($transaction->travel_package->price) / 4;

        $transaction->save();
        $item->delete();

        return redirect()->route('checkout', $item->transactions_id);
    }

    public function create(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username'
        ]);

        $data = $request->all();
        $data['transactions_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['details', 'travel_package'])->find($id);

        // $item = Transaction::with(['details'])->findOrFail($id);

        if ($transaction->details->count() == 5) {
            $transaction->transaction_total += $transaction->travel_package->price;
        }
        // $transaction->transaction_total += $transaction->travel_package->price;




        // $single_price = ($transaction->travel_package->price) / 4;

        // $single_price += ($transaction->travel_package->price) / 4;

        // if ($single_price < $package_price) {
        //     $transaction->transaction_total = $package_price;
        // } else {
        //     $transaction->transaction_total += ($package_price + ($package_price * 0.85));
        // }

        $transaction->save();

        return redirect()->route('checkout', $id);
    }

    public function success(Request $request, $id)
    {
        $transaction = Transaction::with(['details', 'travel_package.galleries', 'user'])->findOrFail($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();

        // Kirim tiket ke email usernya
        Mail::to($transaction->user)->send(
            new TransactionSuccess($transaction)
        );

        return view('pages.success');
    }
}
