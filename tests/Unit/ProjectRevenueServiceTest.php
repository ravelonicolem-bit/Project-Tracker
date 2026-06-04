<?php

use App\Services\ProjectRevenueService;

test('revenue service calculates percent share and share amount', function () {
    $result = (new ProjectRevenueService)->calculate(100000, 2);

    expect($result['percent_share'])->toBe(50.0)
        ->and($result['share_amount'])->toBe(50000.0);
});

test('revenue service handles single team member', function () {
    $result = (new ProjectRevenueService)->calculate(50000, 1);

    expect($result['percent_share'])->toBe(100.0)
        ->and($result['share_amount'])->toBe(50000.0);
});
