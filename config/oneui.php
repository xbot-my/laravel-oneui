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
    | Note: All components are also available via auto-discovery using the
    | 'oneui' namespace: <x-oneui::component-name>
    |
    */
    'components' => [
        // Layout Components
        'page' => \XBot\OneUI\View\Components\Page::class,
        'block' => \XBot\OneUI\View\Components\Block::class,
        'hero' => \XBot\OneUI\View\Components\Hero::class,
        'container' => \XBot\OneUI\View\Components\Container::class,
        'row' => \XBot\OneUI\View\Components\Row::class,
        'col' => \XBot\OneUI\View\Components\Col::class,
        'offcanvas' => \XBot\OneUI\View\Components\Offcanvas::class,

        // Form Components
        'button' => \XBot\OneUI\View\Components\Button::class,
        'input' => \XBot\OneUI\View\Components\Input::class,
        'select' => \XBot\OneUI\View\Components\Select::class,
        'select2' => \XBot\OneUI\View\Components\Select2::class,
        'checkbox' => \XBot\OneUI\View\Components\Checkbox::class,
        'radio' => \XBot\OneUI\View\Components\Radio::class,
        'switch' => \XBot\OneUI\View\Components\Switch::class,
        'input-group' => \XBot\OneUI\View\Components\InputGroup::class,
        'file-input' => \XBot\OneUI\View\Components\FileInput::class,
        'floating-label' => \XBot\OneUI\View\Components\FloatingLabel::class,
        'form' => \XBot\OneUI\View\Components\Form::class,
        'datepicker' => \XBot\OneUI\View\Components\DatePicker::class,
        'editor' => \XBot\OneUI\View\Components\Editor::class,

        // Data Display Components
        'table' => \XBot\OneUI\View\Components\Table::class,
        'badge' => \XBot\OneUI\View\Components\Badge::class,
        'card' => \XBot\OneUI\View\Components\Card::class,
        'pagination' => \XBot\OneUI\View\Components\Pagination::class,
        'stat-widget' => \XBot\OneUI\View\Components\StatWidget::class,
        'stat-group' => \XBot\OneUI\View\Components\StatGroup::class,

        // Navigation Components
        'breadcrumb' => \XBot\OneUI\View\Components\Breadcrumb::class,
        'nav-tabs' => \XBot\OneUI\View\Components\NavTabs::class,
        'tabs' => \XBot\OneUI\View\Components\Tabs::class,
        'nav-item' => \XBot\OneUI\View\Components\NavItem::class,
        'sidebar-menu' => \XBot\OneUI\View\Components\SidebarMenu::class,

        // Feedback Components
        'alert' => \XBot\OneUI\View\Components\Alert::class,
        'spinner' => \XBot\OneUI\View\Components\Spinner::class,
        'toast' => \XBot\OneUI\View\Components\Toast::class,
        'progress' => \XBot\OneUI\View\Components\Progress::class,
        'loading' => \XBot\OneUI\View\Components\Loading::class,
        'ribbon' => \XBot\OneUI\View\Components\Ribbon::class,
        'tooltip' => \XBot\OneUI\View\Components\Tooltip::class,
        'popover' => \XBot\OneUI\View\Components\Popover::class,

        // Overlay Components
        'modal' => \XBot\OneUI\View\Components\Modal::class,
        'dropdown' => \XBot\OneUI\View\Components\Dropdown::class,

        // Interactive Components
        'accordion' => \XBot\OneUI\View\Components\Accordion::class,
        'stepper' => \XBot\OneUI\View\Components\Stepper::class,
        'timeline' => \XBot\OneUI\View\Components\Timeline::class,

        // Utility Components
        'avatar' => \XBot\OneUI\View\Components\Avatar::class,
        'code-example' => \XBot\OneUI\View\Components\CodeExample::class,
    ],
];
