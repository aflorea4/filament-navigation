<?php

namespace Aflorea4\FilamentNavigation\Tests;

use Filament\Panel;
use Filament\PanelProvider;
use Aflorea4\FilamentNavigation\FilamentNavigation;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->plugin(FilamentNavigation::make());
    }
}
