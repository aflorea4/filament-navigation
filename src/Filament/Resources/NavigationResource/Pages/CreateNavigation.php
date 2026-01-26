<?php

namespace Aflorea4\FilamentNavigation\Filament\Resources\NavigationResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Aflorea4\FilamentNavigation\Filament\Resources\NavigationResource\Pages\Concerns\HandlesNavigationBuilder;
use Aflorea4\FilamentNavigation\FilamentNavigation;

class CreateNavigation extends CreateRecord
{
    use HandlesNavigationBuilder;

    public static function getResource(): string
    {
        return FilamentNavigation::get()->getResource();
    }
}
