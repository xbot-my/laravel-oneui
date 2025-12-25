# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Fixed
- Fixed route duplication in `routes/examples.php`
- Cleaned up `.DS_Store` files from project

### Docs
- Added PHPDoc documentation for 8 components (Badge, Card, FileInput, FloatingLabel, Form, InputGroup, Pagination, Table)

---

## [1.1.0] - 2024-12-25

### Added
**Complete 100% Component Coverage**
- `image` - Responsive image wrapper
- `user-card` - User profile widget
- `post-card` - Blog/article card
- `tiles` - Dashboard tile widgets

**Third-Party Integration (100%)**
- `ck-editor5-inline` - CKEditor5 inline editor
- `dual-list-box` - Native dual list box
- `tree` - Custom tree component
- `sparkline` - Canvas-based sparkline charts

### Changed
- Refactored example loading mechanism to use `routes/examples.php`
- Updated command classes structure
- Cleaned up sidebar components
- Enhanced example pages with component categories

### Fixed
- Fixed Pest 4 + Orchestra Testbench compatibility issues

---

## [1.0.1] - 2024-12-24

### Added
**Phase 1 Essential UI Components**
- `switch` - Toggle switch input
- `ribbon` - Corner ribbon badges
- `tooltip` - Bootstrap tooltips
- `popover` - Bootstrap popovers

**Phase 2 Form Enhancements**
- `range` - Range slider input
- `rating` - Star rating component
- `validation` - Form validation messages
- `input-mask` - Input masking
- `max-length` - Character counter

**Phase 3 Third-Party Integrations**
- `date-picker` - Flatpickr date picker
- `select2` - Select2 dropdown
- `editor` - CKEditor5 classic editor
- `image-cropper` - Image cropping
- `datatables` - jQuery DataTables
- `chart-js` - Chart.js integration
- `full-calendar` - FullCalendar integration
- `dropzone` - Dropzone file upload
- `carousel` - Bootstrap carousel
- `sweet-alert2` - SweetAlert2 dialogs
- `vector-map` - JSVectorMap integration
- `syntax-highlight` - Prism.js syntax highlighting
- `bootstrap-notify` - Bootstrap notifications
- `magnific-popup` - Magnific popup
- `simple-mde` - SimpleMDE markdown editor

**Phase 4 Advanced Features**
- `mega-menu` - Large dropdown menu
- `horizontal-nav` - Horizontal navigation
- `countdown` - Countdown timer
- `easy-pie-chart` - Canvas pie chart
- `sortable` - Drag-and-drop sortable
- `color-picker` - HTML5 color picker
- `tags-input` - Tags input using Select2
- `icons` - Icon helpers
- `animations` - CSS animation helpers
- `appear` - Scroll appear animations
- `simple-bar` - Custom scrollbar
- `video-background` - Video background

### Changed
- Enhanced Block component with new features
- Enhanced Button component with new variants

---

## [1.0.0] - 2024-12-19

### Added
**Initial Release - 100 Components**

**Layout Components (10)**
- `page` - Full page layout with sidebar, header, footer
- `block` - OneUI content block with header and options
- `hero` - Hero section with background image support
- `container` - Bootstrap container
- `row` / `col` - Grid system with responsive breakpoints
- `offcanvas` - Slide-out drawer panel
- `sidebar` - Sidebar navigation
- `header` - Page header
- `side-overlay` - Side overlay panel

**Form Components (26)**
- `button` - Buttons with multiple variants
- `input` - Text input with validation states
- `textarea` - Textarea input
- `select` - Select dropdown
- `checkbox` / `radio` - Form check controls
- `input-group` - Input groups with prepend/append
- `file-input` - File upload input
- `floating-label` - Floating label inputs
- `form` - Form wrapper with CSRF

**Data Display Components (13)**
- `table` - Data-driven table with formatters
- `badge` - Status badges
- `card` - Cards with slots
- `pagination` - Laravel paginator integration
- `stat-widget` - Statistics widget
- `stat-group` - Statistics group
- `data-list` - Data list display

**Navigation Components (8)**
- `breadcrumb` - Breadcrumb navigation
- `nav-tabs` - Tab navigation
- `tabs` - Tab content
- `sidebar-menu` - Multi-level sidebar menu
- `nav-item` - Navigation menu items

**Feedback Components (11)**
- `alert` - Alert messages with icons
- `spinner` - Loading spinners
- `toast` - Toast notifications
- `progress` - Progress bars
- `loading` - Full-screen loading overlay

**Overlay Components (3)**
- `modal` - Modal dialogs
- `dropdown` - Dropdown menus
- `popover` - Bootstrap popovers

**Interactive Components (5)**
- `accordion` - Collapse/expand accordion
- `stepper` - Step wizard
- `timeline` - Timeline display

**Utility Components (19)**
- `avatar` - User avatar
- `code-example` - Code example display with syntax highlight
- `icons` - Icon helpers
- `animations` - CSS animation helpers

**Data Processing**
- `DataAdapter` - Normalize various data sources
- `ItemCollection` - Collection of data items
- `DataItem` - Single item wrapper with dot notation
- `BadgeFormatter` / `DateFormatter` / `CurrencyFormatter`
