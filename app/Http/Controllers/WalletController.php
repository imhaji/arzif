<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Repository\WalletRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallets = Wallet::orderBy('id','desc')->get();

        $data = [];

        foreach ($wallets as $wallet) {
            $data[$wallet->id] = $wallet->getData();
        }
        // dd($data)
        return view('index',compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'wallet'=>'required',
            'network'=>'required',
        ]);
        Wallet::create([
            'user_id'=>Auth::id(),
            'wallet'=>$request->wallet,
            'network'=>$request->network
        ]);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id ,WalletRepository $wallet)
    {

        return response()->json(['wallet'=>$wallet],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WalletRepository $wallet, $id)
    {
        $this->validate($request,[
            'wallet'=>$request->wallet,
            'network'=>$request->network,
        ]);
        $wallet->getWallet($id)->update([
            'user_id'=>Auth::id(),
            'wallet'=>$request->wallet,
            'network'=>$request->network
        ]);
        return response()->json(['message'=>"کیف پول شما با موفقیت ذخیره شد" , 'wallet'=>$wallet],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , WalletRepository $wallet)
    {
        $wallet->getWallet($id)->delete();
             return redirect()->back();
    }
}
