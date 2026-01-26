# Upgrade Guide

## Upgrading from v1.x to v2.0

Starting with version v2.0, this package now supports Filament v4.x.

Follow these steps to update the package for Filament v4.x.

### Requirements

- PHP 8.2 or higher
- Laravel 11.0 or 12.0
- Filament 4.0

### Update Steps

1. Update your system requirements:
   - Ensure you're running PHP 8.2+
   - Ensure your Laravel version is 11.0 or 12.0
   - Upgrade Filament to v4.x or v5.x following the [official Filament upgrade guide](https://filamentphp.com/docs)

2. Update the package version in your `composer.json`:

```json
"aflorea4/filament-navigation": "^2.0"
```

3. Run `composer update`:

```sh
composer update aflorea4/filament-navigation
```

4. Clear your application cache:

```sh
php artisan filament:clear-cache
php artisan optimize:clear
```

5. Republish the plugin assets:

```sh
php artisan filament:assets
```

6. Test your navigation menus to ensure they're working correctly.

### Breaking Changes

- **Minimum PHP version**: Now requires PHP 8.2+
- **Minimum Laravel version**: Now requires Laravel 11.0+
- **Minimum Filament version**: Now requires Filament 4.0+
- **Removed dependency**: The `doctrine/dbal` package is no longer required

### No Code Changes Required

The plugin registration API remains the same as in v1.0, but the namespace has changed to `Aflorea4`:

```php
use Aflorea4\FilamentNavigation\FilamentNavigation;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugin(FilamentNavigation::make())
        // ...
}
```

**Note:** You will need to update all import statements from `RyanChandler\FilamentNavigation` to `Aflorea4\FilamentNavigation` throughout your application.

If you have any issues with the upgrade, please open an issue and provide details. Reproduction repositories are much appreciated.

## Upgrading from v0.x to v1.0

Starting with version v1.0, this package now only supports Filament v3.x.

Follow these steps to update the package for Filament v3.x.

1. Update the package version in your `composer.json`.
2. Run `composer update`.
3. Register the plugin inside of your project's `PanelProvider`.

```php
use Aflorea4\FilamentNavigation\FilamentNavigation;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugin(FilamentNavigation::make())
        // ...
}
```

4. Publish the plugin assets.

```sh
php artisan filament:assets
```

5. Open your panel and check that the resource has been registered and existing navigation menus are showing.

If you have registered custom navigation item types, the `addItemType()` method no longer exists.

Instead, register the item types on the `FilamentNavigation` plugin object directly.

```php
return $panel
    ->plugin(
        FilamentNavigation::make()
            ->itemType('post', [
                Select::make('post_id')
                    ->//...
            ])
    )
    // ...
```

If you previously used the configuration file to change the `navigation_model` or `navigation_resource` values, those no longer exist and need to be updated to method calls on the plugin object.

```php
return $panel
    ->plugin(
        FilamentNavigation::make()
            ->usingResource(MyNavigationResource::class)
            ->usingModel(MyNavigationModel::class)
    )
    // ...
```

If you have any issues with the upgrade, please open an issue and provide details. Reproduction repositories are much appreciated.
