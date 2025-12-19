<?php

namespace App\Services;

use App\Models\User;

class SubscriptionService
{
    public function getSubscriptionData(User $user): array
    {
        $subscription = $user->subscription(env('STRIPE_PRODUCT_ID'));

        if (!$subscription || !$subscription->valid()) {
            return [
                'current_plan' => 'Grátis',
                'status_plan' => 'Inativo',
                'expiration_plan' => null,
            ];
        }

        $stripeSub = $subscription->asStripeSubscription();
        $item = $stripeSub->items->data[0] ?? null;

        $timeExpiration = $item?->current_period_end;

        $expiration_plan = $timeExpiration
            ? date('d/m/Y - H:i:s', $timeExpiration)
            : null;

        $priceId = $item?->price->id;

        return [
            'current_plan' => match ($priceId) {
                env('STRIPE_MONTHLY_PRICE_ID') => 'Mensal',
                env('STRIPE_YEARLY_PRICE_ID') => 'Anual',
                default => 'Desconhecido',
            },
            'status_plan' => match (true) {
                $subscription->active() => 'Ativo',
                $subscription->onGracePeriod() => 'Cancelado (até expirar)',
                $subscription->ended() => 'Encerrado',
                default => 'Inativo',
            },
            'expiration_plan' => $expiration_plan,
        ];
    }

    public function getInvoices(User $user): array
    {
        return collect($user->invoices())
            ->map(fn ($invoice) => [
                'id' => $invoice->id,
                'date' => $invoice->date()->format('d/m/Y'),
                'total' => $invoice->total(),
                'status' => $invoice->status,
            ])
            ->toArray();
    }
}
