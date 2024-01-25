<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieController extends Controller
{
    public function buy(Request $request, $cookies)
    {
        $user = $request->user();

        $wallet = $user->wallet;
        if ($wallet < $cookies){
            return 'Your balance is not enough to buy specified amount of cokkies, Your wallet balance: '.$wallet;
        }
        
        $user->decrement('wallet', $cookies);
        
        Log:info('User ' . $user->email . ' have bought ' . $cookies . ' cookies'); // we need to log who ordered and how much
        
        return 'Success, you have bought ' . $cookies . ' cookies!';

    }
}