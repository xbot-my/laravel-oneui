<x-oneui::page title="Stats Widget Test">
    <x-slot:content>
        <div class="content">
            <h2 class="content-heading">StatWidget 测试 - 简单样式</h2>
            
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <x-oneui::stat-widget value="$12,682" label="Earnings" icon="fa fa-arrow-up" />
                </div>
                <div class="col-md-6 col-xl-3">
                    <x-oneui::stat-widget value="3,585" label="Users" icon="far fa-user-circle" />
                </div>
                <div class="col-md-6 col-xl-3">
                    <x-oneui::stat-widget value="697" label="Sales" icon="fa fa-chart-area" icon-position="right" />
                </div>
                <div class="col-md-6 col-xl-3">
                    <x-oneui::stat-widget value="359" label="Projects" icon="fa fa-box" icon-position="right" />
                </div>
            </div>
            
            <h2 class="content-heading">带颜色背景</h2>
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <x-oneui::stat-widget value="$18,632" label="Earnings" icon="fa fa-arrow-alt-circle-up" color="primary" />
                </div>
                <div class="col-md-6 col-xl-3">
                    <x-oneui::stat-widget value="4,962" label="Users" icon="far fa-user" color="success" />
                </div>
                <div class="col-md-6 col-xl-3">
                    <x-oneui::stat-widget value="1,258" label="Sales" icon="fa fa-chart-line" color="danger" icon-position="right" />
                </div>
                <div class="col-md-6 col-xl-3">
                    <x-oneui::stat-widget value="250" label="Projects" icon="fa fa-boxes" color="warning" icon-position="right" />
                </div>
            </div>
            
            <h2 class="content-heading">StatGroup 多列</h2>
            <div class="row">
                <div class="col-md-6">
                    <x-oneui::stat-group :items="[
                        ['value' => 85, 'label' => 'Projects', 'icon' => 'fa fa-briefcase', 'color' => 'primary'],
                        ['value' => 459, 'label' => 'Clients', 'icon' => 'fa fa-users', 'color' => 'success'],
                        ['value' => 258, 'label' => 'Orders', 'icon' => 'fa fa-shopping-cart', 'color' => 'danger'],
                    ]" />
                </div>
                <div class="col-md-6">
                    <x-oneui::stat-group :items="[
                        ['value' => '42%', 'label' => 'Conversion', 'icon' => 'fa fa-chart-pie', 'color' => 'info'],
                        ['value' => '$2,580', 'label' => 'Revenue', 'icon' => 'fa fa-dollar-sign', 'color' => 'warning'],
                    ]" />
                </div>
            </div>
        </div>
    </x-slot:content>
</x-oneui::page>