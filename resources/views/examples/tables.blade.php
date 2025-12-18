<x-oneui::page>
    <x-slot:title>Table & Data Examples</x-slot>
    <x-slot:head>
        <link rel="stylesheet" href="{{ asset('vendor/oneui/js/plugins/highlightjs/styles/atom-one-dark.css') }}">
    </x-slot>

    <x-slot:sidebar>
        @include('oneui.partials.sidebar')
    </x-slot>

    <x-slot:content>
        <div class="content">
            <h2 class="content-heading">Badge</h2>

            @php
            $badgeCode = '<x-oneui::badge type="primary">Primary</x-oneui::badge>
<x-oneui::badge type="success">Success</x-oneui::badge>
<x-oneui::badge type="info">Info</x-oneui::badge>
<x-oneui::badge type="warning">Warning</x-oneui::badge>
<x-oneui::badge type="danger">Danger</x-oneui::badge>';
            @endphp
            <x-oneui::code-example title="Badge Types" :code="$badgeCode">
                <div class="d-flex gap-2">
                    <x-oneui::badge type="primary">Primary</x-oneui::badge>
                    <x-oneui::badge type="success">Success</x-oneui::badge>
                    <x-oneui::badge type="info">Info</x-oneui::badge>
                    <x-oneui::badge type="warning">Warning</x-oneui::badge>
                    <x-oneui::badge type="danger">Danger</x-oneui::badge>
                </div>
            </x-oneui::code-example>

            @php
            $pillCode = '<x-oneui::badge type="success" :pill="true">Active</x-oneui::badge>
<x-oneui::badge type="danger" :pill="true">Deleted</x-oneui::badge>
<x-oneui::badge type="primary" :light="false">Solid</x-oneui::badge>';
            @endphp
            <x-oneui::code-example title="Pill & Solid Badge" :code="$pillCode">
                <div class="d-flex gap-2">
                    <x-oneui::badge type="success" :pill="true">Active</x-oneui::badge>
                    <x-oneui::badge type="danger" :pill="true">Deleted</x-oneui::badge>
                    <x-oneui::badge type="primary" :light="false">Solid</x-oneui::badge>
                </div>
            </x-oneui::code-example>

            <h2 class="content-heading">Table</h2>

            @php
            $tableCode = '<x-oneui::table :hover="true" :striped="true">
    <x-slot:head>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
    </x-slot>
    <tr>
        <td>1</td>
        <td>John Doe</td>
        <td>john@example.com</td>
        <td><x-oneui::badge type="success" :pill="true">Active</x-oneui::badge></td>
    </tr>
    <tr>
        <td>2</td>
        <td>Jane Smith</td>
        <td>jane@example.com</td>
        <td><x-oneui::badge type="warning" :pill="true">Pending</x-oneui::badge></td>
    </tr>
</x-oneui::table>';
            @endphp
            <x-oneui::code-example title="Table with Hover & Striped" :code="$tableCode">
                <x-oneui::table :hover="true" :striped="true">
                    <x-slot:head>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </x-slot>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>john@example.com</td>
                        <td><x-oneui::badge type="success" :pill="true">Active</x-oneui::badge></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jane Smith</td>
                        <td>jane@example.com</td>
                        <td><x-oneui::badge type="warning" :pill="true">Pending</x-oneui::badge></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Bob Wilson</td>
                        <td>bob@example.com</td>
                        <td><x-oneui::badge type="danger" :pill="true">Inactive</x-oneui::badge></td>
                    </tr>
                </x-oneui::table>
            </x-oneui::code-example>

            <h2 class="content-heading">Card</h2>

            @php
            $cardCode = '<x-oneui::card title="Card Title">
    This is the card content. You can put any content here.
</x-oneui::card>';
            @endphp
            <x-oneui::code-example title="Basic Card" :code="$cardCode">
                <x-oneui::card title="Card Title">
                    This is the card content. You can put any content here.
                </x-oneui::card>
            </x-oneui::code-example>

            @php
            $cardFooterCode = '<x-oneui::card title="Card with Footer">
    Card content goes here.
    <x-slot:footer>
        <div class="text-end">
            <x-oneui::button type="secondary" size="sm">Cancel</x-oneui::button>
            <x-oneui::button type="primary" size="sm">Save</x-oneui::button>
        </div>
    </x-slot>
</x-oneui::card>';
            @endphp
            <x-oneui::code-example title="Card with Footer" :code="$cardFooterCode">
                <x-oneui::card title="Card with Footer">
                    Card content goes here.
                    <x-slot:footer>
                        <div class="text-end">
                            <x-oneui::button type="secondary" size="sm">Cancel</x-oneui::button>
                            <x-oneui::button type="primary" size="sm">Save</x-oneui::button>
                        </div>
                    </x-slot>
                </x-oneui::card>
            </x-oneui::code-example>

            <h2 class="content-heading">Data-Driven Table</h2>

            {{-- Define sample data --}}
            @php
            $users = [
                ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'status' => 'active', 'balance' => 1500.50],
                ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'status' => 'pending', 'balance' => 2340.00],
                ['id' => 3, 'name' => 'Bob Wilson', 'email' => 'bob@example.com', 'status' => 'inactive', 'balance' => 890.25],
            ];

            $dataTableCode = <<<'CODE'
<x-oneui::table 
    :data="$users" 
    :columns="[
        'id' => '#',
        'name' => 'Name',
        'email' => 'Email',
        'status' => [
            'label' => 'Status',
            'badge' => true,
            'badgeMap' => ['active' => 'success', 'pending' => 'warning', 'inactive' => 'danger']
        ],
        'balance' => [
            'label' => 'Balance',
            'format' => 'currency'
        ],
    ]"
/>
CODE;
            @endphp
            <x-oneui::code-example title="Auto-Generated from Array" :code="$dataTableCode">
                <x-oneui::table 
                    :data="$users" 
                    :columns="[
                        'id' => '#',
                        'name' => 'Name',
                        'email' => 'Email',
                        'status' => [
                            'label' => 'Status',
                            'badge' => true,
                            'badgeMap' => ['active' => 'success', 'pending' => 'warning', 'inactive' => 'danger']
                        ],
                        'balance' => [
                            'label' => 'Balance',
                            'format' => 'currency'
                        ],
                    ]"
                />
            </x-oneui::code-example>

            {{-- Table with Actions --}}
            @php
            $actionsCode = <<<'CODE'
<x-oneui::table :data="$users" :columns="[...]">
    <x-slot:actions>
        <button class="btn btn-sm btn-alt-secondary" onclick="editRow(this)">
            <i class="fa fa-edit"></i>
        </button>
        <button class="btn btn-sm btn-alt-danger" onclick="deleteRow(this)">
            <i class="fa fa-trash"></i>
        </button>
    </x-slot>
</x-oneui::table>

<script>
function editRow(btn) {
    const row = btn.closest('tr');
    const data = JSON.parse(row.dataset.row);
    alert('Edit: ' + data.name);
}
</script>
CODE;
            @endphp
            <x-oneui::code-example title="Table with Actions" :code="$actionsCode">
                <x-oneui::table 
                    :data="$users" 
                    :columns="[
                        'id' => '#',
                        'name' => 'Name',
                        'email' => 'Email',
                    ]"
                >
                    <x-slot:actions>
                        <button type="button" class="btn btn-sm btn-alt-secondary" onclick="editRow(this)" title="Edit">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-alt-danger" onclick="deleteRow(this)" title="Delete">
                            <i class="fa fa-trash"></i>
                        </button>
                    </x-slot>
                </x-oneui::table>
            </x-oneui::code-example>
        </div>
    </x-slot>

    <x-slot:scripts>
        <script src="{{ asset('vendor/oneui/js/plugins/highlightjs/highlight.pack.min.js') }}"></script>
        <script>One.helpersOnLoad('js-highlightjs');</script>
        <script>
            // Row action functions - get row data from data-row attribute
            function editRow(btn) {
                const row = btn.closest('tr');
                const data = JSON.parse(row.dataset.row);
                alert('Edit User:\n\nID: ' + data.id + '\nName: ' + data.name + '\nEmail: ' + data.email);
            }
            
            function deleteRow(btn) {
                const row = btn.closest('tr');
                const data = JSON.parse(row.dataset.row);
                if (confirm('Are you sure you want to delete ' + data.name + '?')) {
                    row.remove();
                }
            }
        </script>
    </x-slot>
</x-oneui::page>
