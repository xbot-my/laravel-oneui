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
        'sidebar' => \XBot\OneUI\View\Components\Sidebar::class,
        'header' => \XBot\OneUI\View\Components\Header::class,
        'side-overlay' => \XBot\OneUI\View\Components\SideOverlay::class,

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
        'range' => \XBot\OneUI\View\Components\Range::class,
        'rating' => \XBot\OneUI\View\Components\Rating::class,
        'validation' => \XBot\OneUI\View\Components\Validation::class,
        'input-mask' => \XBot\OneUI\View\Components\InputMask::class,
        'max-length' => \XBot\OneUI\View\Components\MaxLength::class,
        'dropzone' => \XBot\OneUI\View\Components\Dropzone::class,
        'c-k-editor5' => \XBot\OneUI\View\Components\CKEditor5::class,
        'c-k-editor5-inline' => \XBot\OneUI\View\Components\CKEditor5Inline::class,
        'simple-mde' => \XBot\OneUI\View\Components\SimpleMDE::class,
        'tags-input' => \XBot\OneUI\View\Components\TagsInput::class,
        'color-picker' => \XBot\OneUI\View\Components\ColorPicker::class,
        'dual-list-box' => \XBot\OneUI\View\Components\DualListBox::class,

        // Data Display Components
        'table' => \XBot\OneUI\View\Components\Table::class,
        'badge' => \XBot\OneUI\View\Components\Badge::class,
        'card' => \XBot\OneUI\View\Components\Card::class,
        'pagination' => \XBot\OneUI\View\Components\Pagination::class,
        'stat-widget' => \XBot\OneUI\View\Components\StatWidget::class,
        'stat-group' => \XBot\OneUI\View\Components\StatGroup::class,
        'chart-js' => \XBot\OneUI\View\Components\ChartJS::class,
        'datatables' => \XBot\OneUI\View\Components\DataTables::class,
        'full-calendar' => \XBot\OneUI\View\Components\FullCalendar::class,
        'image-cropper' => \XBot\OneUI\View\Components\ImageCropper::class,
        'carousel' => \XBot\OneUI\View\Components\Carousel::class,
        'tree' => \XBot\OneUI\View\Components\Tree::class,
        'sparkline' => \XBot\OneUI\View\Components\Sparkline::class,

        // Navigation Components
        'breadcrumb' => \XBot\OneUI\View\Components\Breadcrumb::class,
        'nav-tabs' => \XBot\OneUI\View\Components\NavTabs::class,
        'tabs' => \XBot\OneUI\View\Components\Tabs::class,
        'nav-item' => \XBot\OneUI\View\Components\NavItem::class,
        'sidebar-menu' => \XBot\OneUI\View\Components\SidebarMenu::class,
        'mega-menu' => \XBot\OneUI\View\Components\MegaMenu::class,
        'horizontal-nav' => \XBot\OneUI\View\Components\HorizontalNav::class,
        'horizontal-nav-item' => \XBot\OneUI\View\Components\HorizontalNavItem::class,

        // Feedback Components
        'alert' => \XBot\OneUI\View\Components\Alert::class,
        'spinner' => \XBot\OneUI\View\Components\Spinner::class,
        'toast' => \XBot\OneUI\View\Components\Toast::class,
        'progress' => \XBot\OneUI\View\Components\Progress::class,
        'loading' => \XBot\OneUI\View\Components\Loading::class,
        'ribbon' => \XBot\OneUI\View\Components\Ribbon::class,
        'tooltip' => \XBot\OneUI\View\Components\Tooltip::class,
        'popover' => \XBot\OneUI\View\Components\Popover::class,
        'sweet-alert2' => \XBot\OneUI\View\Components\SweetAlert2::class,
        'bootstrap-notify' => \XBot\OneUI\View\Components\BootstrapNotify::class,

        // Overlay Components
        'modal' => \XBot\OneUI\View\Components\Modal::class,
        'dropdown' => \XBot\OneUI\View\Components\Dropdown::class,
        'magnific-popup' => \XBot\OneUI\View\Components\MagnificPopup::class,

        // Interactive Components
        'accordion' => \XBot\OneUI\View\Components\Accordion::class,
        'stepper' => \XBot\OneUI\View\Components\Stepper::class,
        'timeline' => \XBot\OneUI\View\Components\Timeline::class,

        // Utility Components
        'avatar' => \XBot\OneUI\View\Components\Avatar::class,
        'code-example' => \XBot\OneUI\View\Components\CodeExample::class,
        'vector-map' => \XBot\OneUI\View\Components\VectorMap::class,
        'syntax-highlight' => \XBot\OneUI\View\Components\SyntaxHighlight::class,
        'icons' => \XBot\OneUI\View\Components\Icons::class,
        'animations' => \XBot\OneUI\View\Components\Animations::class,
        'appear' => \XBot\OneUI\View\Components\Appear::class,
        'simple-bar' => \XBot\OneUI\View\Components\SimpleBar::class,
        'video-background' => \XBot\OneUI\View\Components\VideoBackground::class,
        'data-list' => \XBot\OneUI\View\Components\DataList::class,
        'steps' => \XBot\OneUI\View\Components\Steps::class,
        'tiles' => \XBot\OneUI\View\Components\Tiles::class,
        'countdown' => \XBot\OneUI\View\Components\Countdown::class,
        'easy-pie-chart' => \XBot\OneUI\View\Components\EasyPieChart::class,
        'sortable' => \XBot\OneUI\View\Components\Sortable::class,
        'image' => \XBot\OneUI\View\Components\Image::class,
        'user-card' => \XBot\OneUI\View\Components\UserCard::class,
        'post-card' => \XBot\OneUI\View\Components\PostCard::class,
    ],
];
