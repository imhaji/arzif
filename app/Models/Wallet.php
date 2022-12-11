<?php

namespace App\Models;

use App\Http\Traits\WalletNetworkTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory, WalletNetworkTrait;
}
