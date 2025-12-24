<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Button Component Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .test-container { padding: 2rem; max-width: 1200px; margin: 0 auto; }
        .test-section { margin-bottom: 2rem; padding: 1.5rem; border: 1px solid #dee2e6; border-radius: 0.5rem; }
        .test-section h3 { margin-bottom: 1rem; color: #0d6efd; }
    </style>
</head>
<body>
    <div class="test-container">
        <h1>Button Component Test</h1>

        <!-- 测试1: 默认按钮 -->
        <div class="test-section" id="test-default">
            <h3>Default Button</h3>
            <x-oneui::button id="btn-default" data-test="default">Click Me</x-oneui::button>
        </div>

        <!-- 测试2: Primary按钮 -->
        <div class="test-section" id="test-primary">
            <h3>Primary Button</h3>
            <x-oneui::button type="primary" id="btn-primary" data-test="primary">Save</x-oneui::button>
        </div>

        <!-- 测试3: Outline按钮 -->
        <div class="test-section" id="test-outline">
            <h3>Outline Button</h3>
            <x-oneui::button type="success" :outline="true" id="btn-outline" data-test="outline">Cancel</x-oneui::button>
        </div>

        <!-- 测试4: 链接按钮 -->
        <div class="test-section" id="test-link">
            <h3>Link Button</h3>
            <x-oneui::button type="primary" href="https://example.com" id="btn-link" data-test="link">Visit Site</x-oneui::button>
        </div>

        <!-- 测试5: 禁用按钮 -->
        <div class="test-section" id="test-disabled">
            <h3>Disabled Button</h3>
            <x-oneui::button type="danger" :disabled="true" id="btn-disabled" data-test="disabled">Cannot Click</x-oneui::button>
        </div>

        <!-- 测试6: 大小变体 -->
        <div class="test-section" id="test-sizes">
            <h3>Button Sizes</h3>
            <x-oneui::button type="info" size="lg" id="btn-lg" data-test="large">Large</x-oneui::button>
            <x-oneui::button type="info" size="sm" id="btn-sm" data-test="small">Small</x-oneui::button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Button test page loaded');

            document.getElementById('btn-primary').addEventListener('click', function() {
                this.textContent = 'Clicked!';
                this.disabled = true;
            });
        });
    </script>
</body>
</html>
