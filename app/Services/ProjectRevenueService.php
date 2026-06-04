<?php

namespace App\Services;

class ProjectRevenueService
{
    /**
     * @return array{percent_share: float, share_amount: float}
     */
    public function calculate(float $totalPrice, int $teamMembers): array
    {
        $percentShare = round(100 / $teamMembers, 2);
        $shareAmount = round($totalPrice * ($percentShare / 100), 2);

        return [
            'percent_share' => $percentShare,
            'share_amount' => $shareAmount,
        ];
    }
}
