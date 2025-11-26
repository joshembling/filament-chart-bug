<?php

namespace App\Filament\Resources\Users\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Support\Collection;

class PriceChart extends ChartWidget
{
    use InteractsWithPageFilters;

    public ?User $record = null;

    protected ?string $heading = 'Price data';

    protected int|string|array $columnSpan = 'full';

    protected $subscribed = true;

    public ?string $filter = '7';

    protected function getFilters(): ?array
    {
        return [
            7 => 7,
            30 => 30,
            60 => 60,
            90 => 90,
        ];
    }

    protected function getData(): array
    {
        $activeFilter = $this->filter;
        $range = match ($activeFilter) {
            '7' => [10, 15, 12, 8, 7, 14, 20, 18, 22, 25, 30, 28],
            '30' => [120, 140, 108, 200, 202, 25, 30, 28, 26, 24, 22, 20],
            '60' => [20, 22, 25, 30, 208, 26, 2004, 22, 200, 108, 15, 12],
            '90' => [300, 208, 206, 204, 22, 20, 18, 15, 12, 10, 8, 7],
            default => [],
        };

        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    'data' => $range,
                ],
            ],
            'labels' => $range,
        ];

        return [
            'datasets' => $datasets ?? [],
            'labels' => $allDates ?? [],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
