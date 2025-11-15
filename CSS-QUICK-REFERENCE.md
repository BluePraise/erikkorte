# Quick Reference - New CSS Structure

## Where to Find/Edit Styles

### Global Styles (Affect All Pages)

| What You Need | Edit This File |
|--------------|---------------|
| Colors, fonts, transitions | `01-variables.css` |
| Link colors, body defaults | `02-reset.css` |
| Heading styles (h1-h6) | `03-typography.css` |
| Site wrapper, utilities | `04-global.css` |
| Images, video, media | `05-media.css` |
| **Bootstrap grid/utils** | **CDN (head.php)** |
| Header, topbar, navigation | `07-header.css` |
| Footer, social links | `08-footer.css` |
| Buttons, breadcrumbs, icons | `09-components.css` |

### Page-Specific Styles

| Page Type | Edit This File |
|-----------|---------------|
| Homepage | `pages/home.css` |
| Blog/Archives | `pages/blog.css` |
| Contact page | `pages/contact.css` |
| Memorials | `pages/condoleances.css` |
| Testimonials | `pages/testimonials.css` |

## Common Tasks

### Change Theme Colors
Edit `01-variables.css`:
```css
:root {
    --theme-color-1: #b3211f;  /* Primary red */
    --theme-color-2: #757577;  /* Gray */
    --theme-color4: #3c3950;   /* Dark text */
}
```

### Change Fonts
Edit `01-variables.css`:
```css
:root {
    --main-font: "Source Sans 3", sans-serif;
    --header-font: "Montserrat", sans-serif;
}
```

### Modify Navigation
Edit `06-header.css` - search for:
- `.navbar` - main navigation
- `.dropdown-menu` - dropdowns
- `.mobile_menubtn` - mobile menu button

### Modify Footer
Edit `07-footer.css` - search for:
- `footer` - main footer
- `.footer-nav` - footer navigation bar
- `.footer-socials` - social links

### Add New Button Style
Edit `08-components.css`:
```css
.btn-your-name {
    background-color: #yourcolor;
    /* your styles */
}
```

### Add New Page Styles
1. Create `pages/yourpage.css`
2. Add to `functions.php`:
```php
if (is_page('yourpage')) {
    wp_enqueue_style('erikkorte-yourpage',
        get_template_directory_uri() . '/assets/css/pages/yourpage.css',
        ['erikkorte-main'],
        '2.0.0'
    );
}
```

## File Loading Order

```
1. Bootstrap 5.3.8 (CDN - loaded in head.php)
   ↓
2. style.css (WP required)
   ↓
3. style-new.css
   ↓ imports ↓
   - 01-variables.css
   - 02-reset.css
   - 03-typography.css
   - 04-global.css
   - 05-media.css
   - 07-header.css
   - 08-footer.css
   - 09-components.css
   ↓
4. pages/[specific].css (conditional)
```

## Bootstrap Grid Usage

Bootstrap 5.3.8 is loaded via CDN, providing:
- **Grid**: `.container`, `.container-fluid`, `.row`, `.col-*`
- **Spacing**: `.m-*`, `.p-*`, `.mt-*`, `.mb-*`, `.my-*`, etc.
- **Display**: `.d-none`, `.d-flex`, `.d-block`, `.d-lg-*`, etc.
- **Flex**: `.justify-content-*`, `.align-items-*`

Use Bootstrap classes directly in templates - no local CSS needed for grid.

## Browser Cache

After making CSS changes, clear cache:
- **Hard Refresh:** Ctrl+F5 (Windows) / Cmd+Shift+R (Mac)
- **Or:** Change version number in `functions.php` from '2.0.0' to '2.0.1'

## Debugging

### Style Not Applying?
1. Check browser dev tools (F12) → Network tab
2. Verify CSS file is loading
3. Check for syntax errors in CSS
4. Verify selector specificity
5. Clear browser cache

### Wrong Styles Loading?
1. Check `functions.php` conditional logic
2. Verify page template/type
3. Check CSS file order in `style-new.css`

## Performance Tips

- Only add to global CSS if used on most/all pages
- Keep page-specific styles in their own files
- Use CSS variables for repeated values
- Minimize `!important` usage
- Use shorthand properties when possible

## Bootstrap Classes Still Available

**Navigation Only:**
- `.navbar`, `.navbar-expand-lg`
- `.navbar-nav`, `.nav-item`, `.nav-link`
- `.dropdown-menu`
- `.navbar-toggler`

**DO NOT USE:**
- `.container`, `.row`, `.col-*` (use `.wrapper` instead)
- `.btn` (use custom `.button`)
- `.d-*` utilities (write specific classes)
