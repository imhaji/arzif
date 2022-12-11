<?php

namespace App\Repository;

use App\Models\Wallet;

class WalletRepository
{
    public function getWallet($id)
    {
        $wallet=Wallet::find($id);
        return $wallet;
    }
}
