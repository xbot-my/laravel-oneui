<laravel-boost-guidelines>
=== foundation rules ===

# Laravel Boost Guidelines

The Laravel Boost guidelines are specifically curated by Laravel maintainers for this application. These guidelines should be followed closely to enhance the user's satisfaction building Laravel applications.

## Foundational Context
This application is a Laravel application and its main Laravel ecosystems package & versions are below. You are an expert with them all. Ensure you abide by these specific packages & versions.

- php - 8.3.27
- laravel/framework - v12.44.0
- pestphp/pest - v4.2.0
- orchestra/testbench - v10.8.0

## Conventions
- You must follow all existing code conventions used in this application. When creating or editing a file, check sibling files for the correct structure, approach, naming.
- Use descriptive names for variables and methods. For example, `isRegisteredForDiscounts`, not `discount()`.
- Check for existing components to reuse before writing a new one.

## Verification Scripts
- Do not create verification scripts or tinker when tests cover that functionality and prove it works. Unit and feature tests are more important.

## Application Structure & Architecture
- Stick to existing directory structure - don't create new base folders without approval.
- Do not change the application's dependencies without approval.

## Frontend Bundling
- If the user doesn't see a frontend change reflected in the UI, it could mean they need to run `npm run build`, `npm run dev`, or `composer run dev`. Ask them.

## Replies
- Be concise in your explanations - focus on what's important rather than explaining obvious details.

## Documentation Files
- You must only create documentation files if explicitly requested by the user.


## Example Pages
- When adding new component examples to `resources/views/examples/*.blade.php`, ALWAYS include both:
  1. The rendered component preview inside `<x-oneui::code-example>`
  2. The usage code in a `@php` variable before the component
- Format:
  ```blade
  @php
  $featureCode = <<<'CODE'
  <x-oneui::component prop="value">Content</x-oneui::component>
  CODE;
  @endphp
  <x-oneui::code-example title="Feature Name" :code="$featureCode">
      <x-oneui::component prop="value">Content</x-oneui::component>
  </x-oneui::code-example>
  ```
- This provides visual preview AND copy-pasteable code for users

## Component Development Roadmap
- **REFERENCE**: `COMPONENT_STATUS.md` - Official component implementation status and priority roadmap
- Before implementing new components, always check COMPONENT_STATUS.md for:
- After implementing a component, update its status in COMPONENT_STATUS.md
- Follow the implementation phases in priority order:
  - Phase 1: Essential UI (Tooltip, Popover, Switch, Ribbon, MegaMenu, HorizontalNav)
  - Phase 2: Form Enhancements (Range, Rating, FormValidation, InputMask, MaxLength)
  - Phase 3: Third-Party Integrations (ChartJS, DataTables, FullCalendar, ImageCropper, Carousel)
  - Phase 4: Advanced Features (CKEditor5, SweetAlert2, VectorMap, Dropzone, SyntaxHighlight)

## Git Workflow
- **Commit Milestone**: After completing a logical unit of work (e.g., component feature fix, example page update), create a git commit and push to remote
- **Commit Triggers**:
  - Component implementation/enhancement completed
  - Example page added/updated
  - Documentation updated (CLAUDE.md, COMPONENT_STATUS.md, etc.)
  - Bug fix completed
- **Auto-Commit**: Use `engineering-workflow-skills:git-pushing` skill to commit with conventional commit format
- **Don't let uncommitted work accumulate** - push frequently to avoid loss


=== boost rules ===

## Laravel Boost
- Laravel Boost is an MCP server that comes with powerful tools designed specifically for this application. Use them.

## Artisan
- Use the `list-artisan-commands` tool when you need to call an Artisan command to double check the available parameters.

## URLs
- Whenever you share a project URL with the user you should use the `get-absolute-url` tool to ensure you're using the correct scheme, domain / IP, and port.

## Tinker / Debugging
- You should use the `tinker` tool when you need to execute PHP to debug code or query Eloquent models directly.
- Use the `database-query` tool when you only need to read from the database.

## Reading Browser Logs With the `browser-logs` Tool
- You can read browser logs, errors, and exceptions using the `browser-logs` tool from Boost.
- Only recent browser logs will be useful - ignore old logs.

## Searching Documentation (Critically Important)
- Boost comes with a powerful `search-docs` tool you should use before any other approaches. This tool automatically passes a list of installed packages and their versions to the remote Boost API, so it returns only version-specific documentation specific for the user's circumstance. You should pass an array of packages to filter on if you know you need docs for particular packages.
- The 'search-docs' tool is perfect for all Laravel related packages, including Laravel, Inertia, Livewire, Filament, Tailwind, Pest, Nova, Nightwatch, etc.
- You must use this tool to search for Laravel-ecosystem documentation before falling back to other approaches.
- Search the documentation before making code changes to ensure we are taking the correct approach.
- Use multiple, broad, simple, topic based queries to start. For example: `['rate limiting', 'routing rate limiting', 'routing']`.
- Do not add package names to queries - package information is already shared. For example, use `test resource table`, not `filament 4 test resource table`.

### Available Search Syntax
- You can and should pass multiple queries at once. The most relevant results will be returned first.

1. Simple Word Searches with auto-stemming - query=authentication - finds 'authenticate' and 'auth'
2. Multiple Words (AND Logic) - query=rate limit - finds knowledge containing both "rate" AND "limit"
3. Quoted Phrases (Exact Position) - query="infinite scroll" - Words must be adjacent and in that order
4. Mixed Queries - query=middleware "rate limit" - "middleware" AND exact phrase "rate limit"
5. Multiple Queries - queries=["authentication", "middleware"] - ANY of these terms


=== php rules ===

## PHP

- Always use curly braces for control structures, even if it has one line.

### Constructors
- Use PHP 8 constructor property promotion in `__construct()`.
    - <code-snippet>public function __construct(public GitHub $github) { }</code-snippet>
- Do not allow empty `__construct()` methods with zero parameters.

### Type Declarations
- Always use explicit return type declarations for methods and functions.
- Use appropriate PHP type hints for method parameters.

<code-snippet name="Explicit Return Types and Method Params" lang="php">
protected function isAccessible(User $user, ?string $path = null): bool
{
    ...
}
</code-snippet>

## Comments
- Prefer PHPDoc blocks over comments. Never use comments within the code itself unless there is something _very_ complex going on.

## PHPDoc Blocks
- Add useful array shape type definitions for arrays when appropriate.

## Enums
- Typically, keys in an Enum should be TitleCase. For example: `FavoritePerson`, `BestLake`, `Monthly`.
</laravel-boost-guidelines>
