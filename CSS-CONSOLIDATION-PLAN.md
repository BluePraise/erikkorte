# CSS Consolidation Plan - ErikKorte Theme

## Current Situation Analysis

### Files Identified
1. **Root `style.css`** - 1,417 lines
   - Required WordPress theme file (contains theme header)
   - Currently has comment: "This theme's styles are loaded from assets/css/style.css"
   - Contains duplicate and legacy styles
   - Mixed Bootstrap utility classes and custom CSS

2. **`assets/css/style.css`** - 1,108 lines
   - Modern CSS with CSS variables
   - Better organized with clear sections
   - Uses Bootstrap navbar classes extensively
   - No WordPress theme header

### Key Problems Identified

1. **Duplication**: Both files contain similar styles for:
   - Header/navigation
   - Topbar/contacts
   - Body/wrapper styling
   - Button styles
   - Typography

2. **Bootstrap Usage**: Heavy Bootstrap dependency but only really needed for:
   - Navigation (`.navbar`, `.navbar-expand-lg`, `.nav-item`, `.nav-link`)
   - Mobile menu (`.navbar-toggler`, responsive breakpoints)
   - Dropdown menus (`.dropdown-menu`)

3. **Organization Issues**:
   - Root `style.css` has many page-specific styles mixed in
   - No clear separation between global vs page-specific
   - Bootstrap grid classes (`.row`, `.col-`) scattered throughout

---

## 🎯 RECOMMENDATION 1: Duplication Cleanup

### Keep vs Remove Strategy

#### ✅ KEEP in `assets/css/style.css` (Make this the primary file)
**Reason**: Better organized, uses CSS variables, more modern approach

**Content to Keep:**
- CSS Variables (`:root`)
- Reset styles
- Typography (h1-h6, p, a)
- Global layout (.wrapper, body)
- Navigation (all navbar styles)
- Footer
- All component-specific styles

#### ❌ REMOVE from root `style.css`
**Action**: Strip down to bare minimum (WordPress requires this file to exist)

**Keep ONLY:**
```css
/*
* Theme Name: ErikKorte-Uitvaartverzorging
* Author: Magalie Chetrit
* Author URI: https://www.magaliechetrit.com
* Version: 2.0.0
* Description: Modern funeral services theme
* Text Domain: erikkorte
*/

/* All styles are loaded from assets/css/ */
```

**Move Everything Else**: Consolidate into organized files in `assets/css/`

---

## 🎯 RECOMMENDATION 2: Bootstrap Minimization

### Current Bootstrap Dependencies

**Actually Needed (Navigation Only):**
```css
/* Bootstrap Navigation Classes */
.navbar
.navbar-expand-lg
.navbar-nav
.nav-item
.nav-link
.dropdown-menu
.navbar-toggler
.navbar-collapse
```

**NOT Needed (Remove):**
- `.container`, `.container-fluid` - Use custom `.wrapper` instead
- `.row`, `.col-*` - Use CSS Grid or Flexbox
- `.btn` - Use custom `.button` class
- `.d-flex`, `.d-block` - Write specific classes or use inline
- All other Bootstrap utilities

### Action Plan for Bootstrap

#### Option A: Keep Minimal Bootstrap (Recommended)
**File**: Create `assets/css/bootstrap-nav-only.css`
```css
/* Extract only navbar-related Bootstrap code */
/* Approximately 200-300 lines */
```

#### Option B: Replace Bootstrap Navigation (More Work)
- Write custom mobile menu JS
- Create custom dropdown styles
- Benefits: Smaller filesize, more control
- Downside: More maintenance

**My Recommendation**: **Option A** - Keep minimal Bootstrap for nav only

---

## 🎯 RECOMMENDATION 3: CSS Architecture

### Proposed File Structure

```
erikkorte/
├── style.css (WordPress required, minimal)
└── assets/
    └── css/
        ├── style.css (main orchestrator, loads others)
        ├── 01-variables.css (CSS custom properties)
        ├── 02-reset.css (normalize, base resets)
        ├── 03-typography.css (fonts, headings, text)
        ├── 04-global.css (body, wrapper, utilities)
        ├── 05-bootstrap-nav.css (minimal Bootstrap nav only)
        ├── 06-header.css (header, topbar, navigation)
        ├── 07-footer.css (footer styles)
        ├── 08-components.css (buttons, forms, cards)
        ├── 09-layout.css (page structures, grids)
        └── pages/
            ├── home.css
            ├── blog.css
            ├── contact.css
            ├── condoleances.css
            ├── testimonials.css
            └── uitvaarthuis-twente.css
```

### Loading Strategy in `functions.php`

```php
function erikkorte_enqueue_styles() {
    // 1. Global styles (always load)
    wp_enqueue_style('erikkorte-main',
        get_template_directory_uri() . '/assets/css/style.css',
        [],
        '2.0.0'
    );

    // 2. Conditional page-specific styles
    if (is_front_page()) {
        wp_enqueue_style('erikkorte-home',
            get_template_directory_uri() . '/assets/css/pages/home.css',
            ['erikkorte-main'],
            '2.0.0'
        );
    }

    if (is_singular('post') || is_home() || is_archive()) {
        wp_enqueue_style('erikkorte-blog',
            get_template_directory_uri() . '/assets/css/pages/blog.css',
            ['erikkorte-main'],
            '2.0.0'
        );
    }

    if (is_page('contact') || is_page('meld-een-overlijden')) {
        wp_enqueue_style('erikkorte-contact',
            get_template_directory_uri() . '/assets/css/pages/contact.css',
            ['erikkorte-main'],
            '2.0.0'
        );
    }

    if (is_singular('cpt_condolances') || is_post_type_archive('cpt_condolances')) {
        wp_enqueue_style('erikkorte-condoleances',
            get_template_directory_uri() . '/assets/css/pages/condoleances.css',
            ['erikkorte-main'],
            '2.0.0'
        );
    }

    if (is_singular('testim_and_reviews') || is_post_type_archive('testim_and_reviews')) {
        wp_enqueue_style('erikkorte-testimonials',
            get_template_directory_uri() . '/assets/css/pages/testimonials.css',
            ['erikkorte-main'],
            '2.0.0'
        );
    }
}
add_action('wp_enqueue_scripts', 'erikkorte_enqueue_styles');
```

---

## 🎯 RECOMMENDATION 4: What Goes Where

### Global Styles (Always Load)

**File: `style.css` (main orchestrator)**
```css
@import url('01-variables.css');
@import url('02-reset.css');
@import url('03-typography.css');
@import url('04-global.css');
@import url('05-bootstrap-nav.css');
@import url('06-header.css');
@import url('07-footer.css');
@import url('08-components.css');
@import url('09-layout.css');
```

**What to Include:**
- CSS Variables
- Reset/normalize
- Typography (all fonts, headings, base text)
- Body, wrapper, basic layout
- Header (topbar, navigation, logo)
- Footer
- Reusable components (buttons, forms, cards)
- Utility classes

**File Size Target**: ~600-800 lines total

---

### Page-Specific Styles (Conditional Load)

#### `pages/home.css`
- Hero/banner specific to homepage
- Homepage intro section
- Count numbers
- Gem textboxes
- Any homepage-only components

#### `pages/blog.css`
- Blog post cards
- Category styling
- Post meta
- Pagination
- Archive layouts
- Single post layouts

#### `pages/contact.css`
- Contact forms
- Address blocks
- Maps (if any)
- Contact-specific layouts

#### `pages/condoleances.css`
- Condoleance cards
- Candle tables
- Memorial layouts
- Comment/tribute sections
- Single condoleance templates

#### `pages/testimonials.css`
- Testimonial cards
- Review layouts
- Rating displays
- Testimonial-specific components

#### `pages/uitvaarthuis-twente.css`
- Location-specific styling
- Regional content layouts
- Almelo section styles

---

## 📊 Expected Performance Improvements

### Before (Current)
```
Root style.css:      1,417 lines (~65KB)
Assets style.css:    1,108 lines (~50KB)
Total loaded:        ~115KB (duplicated, inefficient)
```

### After (Optimized)
```
Global CSS:          ~800 lines (~35KB) - Always loaded
Page-specific:       ~200-400 lines (~10-15KB) - Conditionally loaded
Total homepage:      ~45-50KB (60% reduction)
Total inner page:    ~50-55KB (52% reduction)
```

### Additional Benefits
- **Maintainability**: Easy to find and update styles
- **Performance**: Smaller initial load, faster render
- **Organization**: Clear separation of concerns
- **Scalability**: Easy to add new pages/components
- **Debugging**: Easier to trace style issues

---

## 🛠️ Implementation Steps

### Phase 1: Preparation (1-2 hours)
1. ✅ Create backup of both CSS files
2. ✅ Create new directory structure in `assets/css/`
3. ✅ Create empty files for new architecture

### Phase 2: Extract & Organize (3-4 hours)
1. ✅ Extract CSS variables to `01-variables.css`
2. ✅ Extract resets to `02-reset.css`
3. ✅ Extract typography to `03-typography.css`
4. ✅ Extract global layouts to `04-global.css`
5. ✅ Extract minimal Bootstrap nav to `05-bootstrap-nav.css`
6. ✅ Extract header styles to `06-header.css`
7. ✅ Extract footer styles to `07-footer.css`
8. ✅ Extract components to `08-components.css`

### Phase 3: Page-Specific Separation (2-3 hours)
1. ✅ Create and populate `pages/home.css`
2. ✅ Create and populate `pages/blog.css`
3. ✅ Create and populate `pages/contact.css`
4. ✅ Create and populate `pages/condoleances.css`
5. ✅ Create and populate `pages/testimonials.css`
6. ✅ Create and populate `pages/uitvaarthuis-twente.css`

### Phase 4: Integration (1-2 hours)
1. ✅ Update `assets/css/style.css` with @import statements
2. ✅ Update `functions.php` with conditional loading
3. ✅ Strip root `style.css` to bare minimum
4. ✅ Update any hardcoded stylesheet references

### Phase 5: Testing & Cleanup (2-3 hours)
1. ✅ Test all pages for broken styles
2. ✅ Check mobile responsiveness
3. ✅ Verify navigation works properly
4. ✅ Remove unused/duplicate classes
5. ✅ Minify for production (optional)

**Total Estimated Time**: 9-14 hours

---

## 🚨 Critical Notes

### Bootstrap Decision Point
**Before starting Phase 2**, decide:
- [ ] Option A: Keep minimal Bootstrap nav (~300 lines)
- [ ] Option B: Replace Bootstrap completely (more work)

**Recommendation**: Option A for faster implementation

### WordPress Theme Requirement
**IMPORTANT**: Root `style.css` MUST exist with theme header comment for WordPress to recognize the theme. It can be nearly empty, but must have:
```css
/*
Theme Name: [Name]
Author: [Author]
*/
```

### Testing Checklist
- [ ] Homepage loads correctly
- [ ] All navigation links work
- [ ] Mobile menu functions
- [ ] Dropdown menus work
- [ ] Blog posts display properly
- [ ] Contact forms styled correctly
- [ ] Condoleances display correctly
- [ ] Footer displays properly
- [ ] No console errors
- [ ] No missing styles

---

## 💡 Quick Wins (Do These First)

1. **Strip root style.css** - 15 minutes, immediate clarity
2. **Create variables file** - 30 minutes, enables theming
3. **Separate header CSS** - 45 minutes, reduces duplication
4. **Conditional page loading** - 1 hour, performance boost

These 4 steps alone will give you:
- 40% less duplicate code
- Clearer organization
- Performance improvement on most pages

---

## Questions to Answer Before Starting

1. **Do you want to keep Bootstrap?** (Recommendation: Yes, nav only)
2. **Do you need IE11 support?** (Affects CSS Grid usage)
3. **Do you want CSS minification?** (Affects build process)
4. **Do you use a child theme?** (Affects file structure)
5. **Do you have staging site?** (Important for testing)

---

## Next Steps

1. Review this plan
2. Answer questions above
3. Create backup of current CSS
4. Start with "Quick Wins" section
5. Proceed with full phases if satisfied with quick wins

---

**Estimated Overall Impact:**
- ⚡ 50%+ faster page loads
- 🎯 80% easier maintenance
- 📦 40% smaller CSS footprint
- ✨ 100% clearer organization
