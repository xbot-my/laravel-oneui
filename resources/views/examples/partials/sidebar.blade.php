{{-- Shared OneUI examples sidebar (legacy, use _sidebar.blade.php instead) --}}
@php
    $currentPath = request()->path();
@endphp

<x-oneui::nav-item href="/oneui/buttons" icon="si si-cursor"
    :active="$currentPath === 'oneui/buttons'">Buttons</x-oneui::nav-item>
<x-oneui::nav-item href="/oneui/alerts" icon="si si-bell"
    :active="$currentPath === 'oneui/alerts'">Alerts</x-oneui::nav-item>
<x-oneui::nav-item href="/oneui/forms" icon="si si-note"
    :active="$currentPath === 'oneui/forms'">Forms</x-oneui::nav-item>
<x-oneui::nav-item href="/oneui/modals" icon="si si-layers"
    :active="$currentPath === 'oneui/modals'">Modals</x-oneui::nav-item>
<x-oneui::nav-item href="/oneui/tables" icon="si si-grid"
    :active="$currentPath === 'oneui/tables'">Tables</x-oneui::nav-item>
<x-oneui::nav-item href="/oneui/navigation" icon="si si-directions"
    :active="$currentPath === 'oneui/navigation'">Navigation</x-oneui::nav-item>
<x-oneui::nav-item href="/oneui/feedback" icon="si si-info"
    :active="$currentPath === 'oneui/feedback'">Feedback</x-oneui::nav-item>
<x-oneui::nav-item href="/oneui/layout" icon="si si-screen-desktop"
    :active="$currentPath === 'oneui/layout'">Layout</x-oneui::nav-item>
<x-oneui::nav-item href="/oneui/stats" icon="si si-graph"
    :active="$currentPath === 'oneui/stats'">Stats</x-oneui::nav-item>