# Template Parts Structure

This directory contains reusable template components for the Erik Korte theme.

## 📁 Directory Structure

```
template-parts/
├── hero-banner.php          # Hero section (featured image + title + breadcrumbs)
├── gallery.php              # Standalone gallery (deprecated - use content/gallery-block.php)
├── header/                  # Header components
└── content/                 # Flexible Content blocks
    ├── text-block.php       # Rich text content
    ├── gallery-block.php    # Image gallery (2 or 3 columns)
    ├── video-block.php      # Video embed
    ├── team-block.php       # Team members grid
    ├── two-column-block.php # Image + content layout
    └── cta-block.php        # Call to action
```

## 🎨 Component Usage

### Hero Banner
```php
get_template_part('template-parts/hero-banner');

// With custom title
get_template_part('template-parts/hero-banner', null, [
    'title' => 'Custom Title'
]);
```

### Standalone Gallery (Legacy)
```php
get_template_part('template-parts/gallery', null, [
    'field_name' => 'gallery_col',
    'columns' => 'two' // or 'three'
]);
```

### Flexible Content Blocks
These are automatically loaded by `page-flexible.php` based on ACF flexible content field.
See `FLEXIBLE-CONTENT-GUIDE.md` for details.

## 📝 Creating New Components

### For Flexible Content:
1. Create file in `content/` directory
2. Use `get_sub_field()` to retrieve ACF data
3. Add layout case to `page-flexible.php`

### For Standalone Parts:
1. Create file in root or appropriate subdirectory
2. Accept `$args` parameter for flexibility
3. Use with `get_template_part()`

## 🔄 Migration Notes

- `gallery.php` is deprecated in favor of `content/gallery-block.php`
- All flexible content blocks should use consistent markup structure
- Always escape output: `esc_html()`, `esc_url()`, `wp_kses_post()`
