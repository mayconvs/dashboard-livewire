<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\Component;

class PricingCards extends Component
{
    public function __construct()
    {
        
    }

    public function plans()
    {
        $prices = [
            "monthly" => env('STRIPE_PRODUCT_ID') . "@@@" . env('STRIPE_MONTHLY_PRICE_ID'),
            "yearly" => env('STRIPE_PRODUCT_ID') . "@@@" . env('STRIPE_YEARLY_PRICE_ID'),
        ];

        return view('components.pricing-cards', compact('prices'));

    }

    public function plan_selected($id)
    {
        // check if id is valid
        $plan =  Crypt::decryptString($id);

        if(!$plan) {
            return redirect()->route('plans');
        }

        $plan = explode('@@@', $plan);
        $product_id = $plan[0];
        $price_id = $plan[1];

        return auth()->user()
        ->newSubscription($product_id, $price_id)
        /* ->allowPromotionCodes() */
        ->checkout([
            'success_url' => route('subscription.success'),
            'cancel_url' => route('users'),
        ]);

    }

    public function subscription_success() {
        return view('subscription_success');
    }

    

    public function render(): View|Closure|string
    {
        $prices = [
            "monthly" => Crypt::encryptString(env('STRIPE_PRODUCT_ID') . "@@@" . env('STRIPE_MONTHLY_PRICE_ID')),
            "yearly" => Crypt::encryptString(env('STRIPE_PRODUCT_ID') . "@@@" . env('STRIPE_YEARLY_PRICE_ID')),
        ];
        return view('components.pricing-cards', compact('prices'));
    }
}
