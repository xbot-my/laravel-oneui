# Contributing to Laravel OneUI

Thank you for considering contributing to Laravel OneUI! This document provides guidelines and instructions for contributing to the project.

## Code Standards

### PHP Standards

- Follow [PSR-12](https://www.php-fig.org/psr/psr-12/) coding style
- Use PHP 8.2+ features (constructor property promotion, match expressions, etc.)
- Always use strict types: `declare(strict_types=1);`
- Use explicit return type declarations for all methods and functions
- Use descriptive names for variables and methods

### Example

```php
<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MyComponent extends Component
{
    public function __construct(
        public string $title,
        public bool $active = false,
    ) {
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function render(): View
    {
        return view('oneui::components.my-component');
    }
}
```

### Naming Conventions

| Type | Convention | Example |
|------|------------|---------|
| Classes | PascalCase | `ButtonComponent`, `DataTable` |
| Methods | camelCase | `getButtonClasses()`, `formatLabel()` |
| Variables | camelCase | `$buttonClasses`, `$columnConfig` |
| Constants | UPPER_SNAKE_CASE | `DEFAULT_FORMAT`, `MAX_ITEMS` |

## Testing

### Running Tests

```bash
# Run all tests
composer test

# Run Pest tests
./vendor/bin/pest

# Run with coverage
./vendor/bin/pest --coverage
```

### Writing Tests

- Write tests for all new components
- Test both positive and negative cases
- For security-related features, include XSS prevention tests
- Place feature tests in `tests/Feature/Components/`
- Place unit tests in `tests/Unit/`

### Example Test

```php
<?php

use Illuminate\Support\Facades\Blade;

test('button renders with correct classes', function () {
    $html = Blade::render('<x-oneui::button type="primary">Click</x-oneui::button>');

    expect($html)->toContain('btn', 'btn-primary');
});
```

## Development Workflow

### Setting Up Development Environment

1. Fork the repository
2. Clone your fork:
   ```bash
   git clone https://github.com/your-username/laravel-oneui.git
   cd laravel-oneui
   ```
3. Install dependencies:
   ```bash
   composer install
   ```
4. Run the test suite:
   ```bash
   composer test
   ```

### Making Changes

1. Create a new branch for your feature:
   ```bash
   git checkout -b feature/your-feature-name
   ```

2. Make your changes following the code standards

3. Add/update tests as needed

4. Run tests and ensure they pass:
   ```bash
   composer test
   ```

5. Run Laravel Pint for code formatting:
   ```bash
   ./vendor/bin/pint
   ```

6. Commit your changes with a clear message:
   ```bash
   git commit -m "feat: add new XYZ component"
   ```

### Commit Message Convention

We follow conventional commits:

- `feat:` - New feature
- `fix:` - Bug fix
- `docs:` - Documentation changes
- `style:` - Code style changes (formatting, etc.)
- `refactor:` - Code refactoring
- `test:` - Adding or updating tests
- `security:` - Security-related changes

Examples:
```
feat: add date picker component
fix: XSS vulnerability in table HTML output
docs: update installation instructions
test: add tests for badge component
```

### Pull Requests

1. Push your changes to your fork:
   ```bash
   git push origin feature/your-feature-name
   ```

2. Create a pull request on GitHub

3. Fill in the PR template with:
   - Description of changes
   - Related issues
   - Testing steps
   - Screenshots (if applicable)

4. Wait for code review and address any feedback

## Adding New Components

### Component Structure

A new component should include:

1. **Component Class** (`src/View/Components/MyComponent.php`)
   - PHP class with constructor properties
   - Helper methods for complex logic
   - Explicit return type on `render()` method

2. **Blade Template** (`resources/views/components/my-component.blade.php`)
   - HTML structure
   - Proper escaping (`{{ }}`) for output

3. **Tests** (`tests/Feature/Components/MyComponentTest.php`)
   - Rendering tests
   - Variant tests (different sizes, colors, etc.)

### Example: Adding a New Component

```php
<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MyNewComponent extends Component
{
    public function __construct(
        public string $title,
        public string $size = 'md',
    ) {
    }

    public function sizeClasses(): string
    {
        return match ($this->size) {
            'sm' => 'component-sm',
            'lg' => 'component-lg',
            default => 'component-md',
        };
    }

    public function render(): View
    {
        return view('oneui::components.my-new-component');
    }
}
```

## Security

If you discover a security vulnerability, please email admin@xbot.my instead of using the issue tracker.

## Style Guide

### Documentation

- Use PHPDoc blocks for all public methods
- Include `@param`, `@return` tags where applicable
- Add inline comments for complex logic

```php
/**
 * Format the button classes based on component properties.
 *
 * @return string The CSS class string
 */
public function buttonClasses(): string
{
    // ...
}
```

### Blade Templates

- Use proper indentation (4 spaces)
- Add comments for complex sections
- Always use `{{ }}` for output unless raw HTML is intentionally needed

## Questions?

Feel free to open an issue for any questions about contributing!
