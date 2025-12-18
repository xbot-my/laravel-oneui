<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Component Prefix
    |--------------------------------------------------------------------------
    |
    | This value will set a prefix for all OneUI Blade components.
    | By default it's empty. If you want to prefix components with "oneui-",
    | set this value to "oneui" and components will be available as:
    | <x-oneui-page> instead of <x-oneui::page>
    |
    */
    'prefix' => '',

    /*
    |--------------------------------------------------------------------------
    | Components
    |--------------------------------------------------------------------------
    |
    | List of components that should be registered.
    | The key is the component alias, the value is the class name.
    |
    */
    'components' => [
        'page' => \XBot\OneUI\View\Components\Page::class,
    ],
];
