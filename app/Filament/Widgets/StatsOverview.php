<?php

namespace App\Filament\Widgets;

use App\Models\Company;
use App\Models\Share;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '15s';

    protected static bool $isLazy = true;

    protected function getStats(): array
    {
        return [
            Stat::make('Total cv shares', Share::count())
                ->description('Total number of cv shares')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('primary')
                ->chart(['7', '3', '4', '5', '6', '3', '5', '3']),

            Stat::make('Total users', User::count())
                ->description('Total number of users')
                ->color('primary')
                ->chart(['7', '3', '4', '5', '6', '3', '5', '3']),

            Stat::make('Total companies', Company::count())
                ->description('Total companies in app')
                ->color('primary')
                ->chart(['7', '3', '4', '5', '6', '3', '5', '3']),
        ];
    }
}
