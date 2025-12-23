# Upgrade Guide

This guide helps you upgrade between versions of Laravel OneUI.

## Version 1.1.0 to 1.2.0

### Breaking Changes

None

### New Features

- Added `StatWidget` and `StatGroup` components for statistics display
- Added `Avatar` component for user avatars
- Added `Accordion` component for collapsible content
- Added `Timeline` component for timeline display
- Added `Stepper` component for step wizards
- Added `DatePicker` component
- Added `Select2` enhanced dropdown component
- Added `Editor` rich text editor component

### Security Improvements

- **IMPORTANT**: Table component HTML output is now sanitized by default to prevent XSS attacks
- If you were using the `html => true` column option with user-generated content, review your usage
- You can customize allowed tags using the `allowedTags` column option:

```php
// Before (vulnerable)
<x-oneui::table :data="$data" :columns="[
    ['key' => 'content', 'html' => true]
]" />

// After (sanitized by default)
<x-oneui::table :data="$data" :columns="[
    ['key' => 'content', 'html' => true, 'allowedTags' => '<p><br><strong>']
]" />
```

### Deprecations

None

## Version 1.0.0 to 1.1.0

### Breaking Changes

None

### New Features

- Added `SidebarMenu` component for navigation
- Added `Offcanvas` slide-out drawer component
- Added `NavTabs` and `Tabs` components for tabbed navigation
- Added `CodeExample` component for displaying code with copy functionality

### Deprecations

None

## General Upgrade Steps

### 1. Update Composer

```bash
composer update xbot-my/laravel-oneui
```

### 2. Publish Assets (if needed)

```bash
php artisan vendor:publish --tag=oneui-assets --force
```

### 3. Clear Cache

```bash
php artisan view:clear
php artisan cache:clear
```

### 4. Review Component Usage

Check your Blade templates for any components that may have changed:

- Review breaking changes section for the version you're upgrading to
- Test your application thoroughly after upgrade
- Check for deprecation warnings in your logs

## Version Compatibility

| Laravel OneUI | Laravel | PHP |
|---------------|---------|-----|
| 1.2.x | 11.x, 12.x | 8.2+ |
| 1.1.x | 11.x, 12.x | 8.2+ |
| 1.0.x | 11.x | 8.2+ |

## Rolling Back

If you encounter issues after an upgrade, you can roll back to the previous version:

```bash
composer require xbot-my/laravel-oneui:^1.1.0
```

Then run:
```bash
php artisan view:clear
```

## Need Help?

If you encounter issues upgrading:

1. Check the [GitHub Issues](https://github.com/xbot-my/laravel-oneui/issues) for similar problems
2. Review the [documentation](README.md)
3. Open a new issue with details about your problem
