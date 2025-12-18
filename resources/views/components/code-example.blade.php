@php $exampleId = 'example-' . uniqid(); @endphp

<div class="block block-rounded">
    @if($title)
        <div class="block-header block-header-default">
            <h3 class="block-title">{{ $title }}</h3>
        </div>
    @endif
    <div class="block-content">
        <ul class="nav nav-tabs nav-tabs-alt" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#{{ $exampleId }}-preview"
                    role="tab">
                    <i class="fa fa-fw fa-eye me-1"></i> Preview
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#{{ $exampleId }}-code" role="tab">
                    <i class="fa fa-fw fa-code me-1"></i> Code
                </button>
            </li>
        </ul>
        <div class="tab-content block-content">
            <div class="tab-pane active" id="{{ $exampleId }}-preview" role="tabpanel">
                {{ $slot }}
            </div>
            <div class="tab-pane" id="{{ $exampleId }}-code" role="tabpanel">
                <div class="position-relative">
                    <button type="button" class="btn btn-sm btn-alt-secondary position-absolute end-0 top-0 m-2"
                        onclick="copyCode('{{ $exampleId }}', this)" title="Copy to clipboard">
                        <i class="fa fa-copy"></i>
                    </button>
                    <pre class="rounded"
                        style="background: #282c34; padding: 1rem; padding-right: 3rem;"><code id="{{ $exampleId }}-source" class="html">{!! e($code) !!}</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>