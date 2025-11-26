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
            '7' => 7,
            '30' => 30,
            '60' => 60,
            '90' => 90,
            default => '100',
        };

        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    'data' => [$range, $range, $range, $range],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
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
