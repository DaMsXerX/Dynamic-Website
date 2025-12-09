# COMPLETE TECHNICAL ANALYSIS - LARAVEL SOLAR PROJECT

## 1. MIGRATIONS - COMPLETE DATABASE STRUCTURE

### 1.1 `users` Table
**Purpose:** User authentication and admin access
- `id` (bigint, primary key)
- `name` (string)
- `email` (string, unique)
- `email_verified_at` (timestamp, nullable)
- `password` (string)
- `remember_token` (string)
- `created_at`, `updated_at` (timestamps)

### 1.2 `settings` Table
**Purpose:** Site-wide configuration and global settings
- `id` (bigint, primary key)
- `site_name` (string, nullable)
- `logo_path` (string, nullable)
- `primary_phone` (string, nullable)
- `secondary_phone` (string, nullable)
- `support_email` (string, nullable)
- `address_line1` (string, nullable)
- `address_line2` (string, nullable)
- `city` (string, nullable)
- `state` (string, nullable)
- `pincode` (string, nullable)
- `map_embed_url` (text, nullable)
- `footer_about` (text, nullable)
- `footer_text` (text, nullable)
- `social_links` (json, nullable) - Array of {platform, url, icon}
- `web3forms_key` (string, nullable)
- `created_at`, `updated_at` (timestamps)

**Foreign Keys:** None

### 1.3 `navigation_links` Table
**Purpose:** Navigation menu items
- `id` (bigint, primary key)
- `settings_id` (foreignId, nullable) → `settings.id` (onDelete: set null)
- `label` (string)
- `url` (string)
- `order` (integer, default: 0)
- `is_primary` (boolean, default: true)
- `created_at`, `updated_at` (timestamps)

**Foreign Keys:** `settings_id` → `settings.id`

### 1.4 `heroes` Table
**Purpose:** Hero sections for different pages
- `id` (bigint, primary key)
- `page_slug` (string, indexed) - e.g., 'home', 'about', 'services'
- `title` (string, nullable)
- `subtitle` (string, nullable)
- `description` (text, nullable) - Rich text content
- `primary_image` (string, nullable)
- `background_image` (string, nullable)
- `badge_text` (string, nullable)
- `cta_label` (string, nullable)
- `cta_url` (string, nullable)
- `theme` (enum: 'light'|'dark', default: 'light')
- `created_at`, `updated_at` (timestamps)

**Foreign Keys:** None

### 1.5 `hero_tables` Table
**Purpose:** Table rows within hero sections (e.g., subsidy tables)
- `id` (bigint, primary key)
- `hero_id` (foreignId) → `heroes.id` (onDelete: cascade)
- `capacity` (string, nullable)
- `central` (string, nullable)
- `state` (string, nullable)
- `total` (string, nullable)
- `order` (integer, default: 0)
- `created_at`, `updated_at` (timestamps)

**Foreign Keys:** `hero_id` → `heroes.id`

### 1.6 `stats` Table
**Purpose:** Statistics/metrics displayed on pages
- `id` (bigint, primary key)
- `title` (string, nullable)
- `value` (string, nullable)
- `icon_url` (string, nullable)
- `page_slug` (string, nullable) - Filter by page
- `order` (integer, default: 0)
- `created_at`, `updated_at` (timestamps)

**Foreign Keys:** None

### 1.7 `services` Table
**Purpose:** Service offerings
- `id` (bigint, primary key)
- `title` (string)
- `description` (text, nullable) - Rich text
- `image` (string, nullable)
- `cta_label` (string, nullable)
- `cta_url` (string, nullable)
- `category` (enum: 'residential'|'commercial'|'industrial'|'other', default: 'other')
- `order` (integer, default: 0)
- `created_at`, `updated_at` (timestamps)

**Foreign Keys:** None

### 1.8 `pricing_packages` Table
**Purpose:** Pricing plans/packages
- `id` (bigint, primary key)
- `plan_name` (string)
- `price_label` (string, nullable)
- `is_featured` (boolean, default: false)
- `cta_label` (string, nullable)
- `cta_url` (string, nullable)
- `order` (integer, default: 0)
- `created_at`, `updated_at` (timestamps)

**Foreign Keys:** None

### 1.9 `pricing_features` Table
**Purpose:** Features list for each pricing package
- `id` (bigint, primary key)
- `pricing_package_id` (foreignId) → `pricing_packages.id` (onDelete: cascade)
- `description` (string)
- `order` (integer, default: 0)
- `created_at`, `updated_at` (timestamps)

**Foreign Keys:** `pricing_package_id` → `pricing_packages.id`

### 1.10 `why_choose_items` Table
**Purpose:** "Why Choose Us" feature cards
- `id` (bigint, primary key)
- `title` (string, nullable)
- `description` (text, nullable)
- `icon_url` (string, nullable)
- `page_slug` (string, nullable) - Filter by page
- `order` (integer, default: 0)
- `created_at`, `updated_at` (timestamps)

**Foreign Keys:** None

### 1.11 `projects` Table
**Purpose:** Completed project showcase
- `id` (bigint, primary key)
- `title` (string)
- `location` (string, nullable)
- `category` (string, nullable) - 'residential'|'commercial'|'industrial'
- `image` (string, nullable)
- `excerpt` (text, nullable)
- `order` (integer, default: 0)
- `created_at`, `updated_at` (timestamps)

**Foreign Keys:** None

### 1.12 `faqs` Table
**Purpose:** Frequently asked questions
- `id` (bigint, primary key)
- `question` (string)
- `answer` (text, nullable) - Rich text
- `page_slug` (string, nullable) - Filter by page
- `order` (integer, default: 0)
- `created_at`, `updated_at` (timestamps)

**Foreign Keys:** None

### 1.13 `team_members` Table
**Purpose:** Team member profiles
- `id` (bigint, primary key)
- `name` (string)
- `role` (string, nullable)
- `photo` (string, nullable)
- `bio` (text, nullable) - Rich text
- `order` (integer, default: 0)
- `created_at`, `updated_at` (timestamps)

**Foreign Keys:** None

### 1.14 `cta_sections` Table
**Purpose:** Call-to-action sections on pages
- `id` (bigint, primary key)
- `page_slug` (string, nullable) - Filter by page
- `headline` (string, nullable)
- `subtext` (text, nullable)
- `button_text` (string, nullable)
- `button_url` (string, nullable)
- `created_at`, `updated_at` (timestamps)

**Foreign Keys:** None

### 1.15 `contact_forms` Table
**Purpose:** Contact form configurations
- `id` (bigint, primary key)
- `title` (string, nullable)
- `description` (text, nullable)
- `success_message` (text, nullable)
- `receiver_email` (string, nullable)
- `enable_web3forms` (boolean, default: false)
- `web3forms_key` (string, nullable)
- `created_at`, `updated_at` (timestamps)

**Foreign Keys:** None

### 1.16 `contact_fields` Table
**Purpose:** Dynamic form fields for contact forms
- `id` (bigint, primary key)
- `contact_form_id` (foreignId) → `contact_forms.id` (onDelete: cascade)
- `label` (string)
- `type` (string, default: 'text') - 'text'|'textarea'|'email'|'phone'|'select'|etc.
- `is_required` (boolean, default: true)
- `order` (integer, default: 0)
- `options` (text, nullable) - JSON or comma-separated for selects
- `created_at`, `updated_at` (timestamps)

**Foreign Keys:** `contact_form_id` → `contact_forms.id`

### 1.17 `subsidy_rows` Table
**Purpose:** Subsidy table rows (e.g., PM Surya Ghar Yojana)
- `id` (bigint, primary key)
- `section_slug` (string, nullable) - e.g., 'pm_surya_ghar', 'khandwa_subsidy'
- `capacity` (string, nullable)
- `central_subsidy` (string, nullable)
- `state_subsidy` (string, nullable)
- `total_subsidy` (string, nullable)
- `order` (integer, default: 0)
- `created_at`, `updated_at` (timestamps)

**Foreign Keys:** None

### 1.18 `bullet_lists` Table
**Purpose:** Bullet point lists for various sections
- `id` (bigint, primary key)
- `section_slug` (string, nullable) - Section identifier
- `text` (text, nullable)
- `order` (integer, default: 0)
- `created_at`, `updated_at` (timestamps)

**Foreign Keys:** None

---

## 2. MODELS - COMPLETE ELOQUENT STRUCTURE

### 2.1 User Model
**Table:** `users`
**Fillable:** `name`, `email`, `password`
**Casts:** `email_verified_at` → datetime, `password` → hashed
**Relationships:** None
**Traits:** HasFactory, Notifiable

### 2.2 Setting Model
**Table:** `settings`
**Fillable:** `site_name`, `logo_path`, `primary_phone`, `secondary_phone`, `support_email`, `address_line1`, `address_line2`, `city`, `state`, `pincode`, `map_embed_url`, `footer_about`, `footer_text`, `social_links`, `web3forms_key`
**Casts:** `social_links` → array
**Relationships:**
- `hasMany(NavigationLink::class)` → `navigationLinks()`

### 2.3 NavigationLink Model
**Table:** `navigation_links`
**Fillable:** `settings_id`, `label`, `url`, `order`, `is_primary`
**Casts:** None
**Relationships:**
- `belongsTo(Setting::class)` → `setting()`

### 2.4 Hero Model
**Table:** `heroes`
**Fillable:** `page_slug`, `title`, `subtitle`, `description`, `primary_image`, `background_image`, `badge_text`, `cta_label`, `cta_url`, `theme`
**Casts:** None
**Relationships:**
- `hasMany(HeroTable::class)` → `tables()`

### 2.5 HeroTable Model
**Table:** `hero_tables`
**Fillable:** `hero_id`, `capacity`, `central`, `state`, `total`, `order`
**Casts:** None
**Relationships:**
- `belongsTo(Hero::class)` → `hero()`

### 2.6 Stat Model
**Table:** `stats`
**Fillable:** `title`, `value`, `icon_url`, `page_slug`, `order`
**Casts:** None
**Relationships:** None

### 2.7 Service Model
**Table:** `services`
**Fillable:** `title`, `description`, `image`, `cta_label`, `cta_url`, `category`, `order`
**Casts:** None
**Relationships:** None

### 2.8 PricingPackage Model
**Table:** `pricing_packages`
**Fillable:** `plan_name`, `price_label`, `is_featured`, `cta_label`, `cta_url`, `order`
**Casts:** None
**Relationships:**
- `hasMany(PricingFeature::class)` → `features()`

### 2.9 PricingFeature Model
**Table:** `pricing_features`
**Fillable:** `pricing_package_id`, `description`, `order`
**Casts:** None
**Relationships:**
- `belongsTo(PricingPackage::class, 'pricing_package_id')` → `package()`

### 2.10 WhyChooseItem Model
**Table:** `why_choose_items`
**Fillable:** `title`, `description`, `icon_url`, `page_slug`, `order`
**Casts:** None
**Relationships:** None

### 2.11 Project Model
**Table:** `projects`
**Fillable:** `title`, `location`, `category`, `image`, `excerpt`, `order`
**Casts:** None
**Relationships:** None

### 2.12 Faq Model
**Table:** `faqs`
**Fillable:** `question`, `answer`, `page_slug`, `order`
**Casts:** None
**Relationships:** None

### 2.13 TeamMember Model
**Table:** `team_members`
**Fillable:** `name`, `role`, `photo`, `bio`, `order`
**Casts:** None
**Relationships:** None

### 2.14 CtaSection Model
**Table:** `cta_sections`
**Fillable:** `page_slug`, `headline`, `subtext`, `button_text`, `button_url`
**Casts:** None
**Relationships:** None

### 2.15 ContactForm Model
**Table:** `contact_forms`
**Fillable:** `title`, `description`, `success_message`, `receiver_email`, `enable_web3forms`, `web3forms_key`
**Casts:** `enable_web3forms` → boolean
**Relationships:**
- `hasMany(ContactField::class)` → `fields()`

### 2.16 ContactField Model
**Table:** `contact_fields`
**Fillable:** `contact_form_id`, `label`, `type`, `is_required`, `order`, `options`
**Casts:** `is_required` → boolean
**Relationships:**
- `belongsTo(ContactForm::class, 'contact_form_id')` → `form()`

### 2.17 SubsidyRow Model
**Table:** `subsidy_rows`
**Fillable:** `section_slug`, `capacity`, `central_subsidy`, `state_subsidy`, `total_subsidy`, `order`
**Casts:** None
**Relationships:** None

### 2.18 BulletList Model
**Table:** `bullet_lists`
**Fillable:** `section_slug`, `text`, `order`
**Casts:** None
**Relationships:** None

---

## 3. FILAMENT RESOURCES - ADMIN PANEL STRUCTURE

### 3.1 SettingResource
**Model:** Setting
**Pages:** List, Create, Edit
**Form Fields:**
- site_name (TextInput)
- logo_path (TextInput)
- primary_phone (TextInput, tel)
- secondary_phone (TextInput, tel)
- support_email (TextInput, email)
- address_line1 (TextInput)
- address_line2 (TextInput)
- city (TextInput)
- state (TextInput)
- pincode (TextInput)
- map_embed_url (Textarea, full width)
- footer_about (Textarea, full width)
- footer_text (Textarea, full width)
- social_links (TextInput)
- web3forms_key (TextInput)
**Relations:** None
**Editable From Filament:** Site name, logo, contact info, address, footer content, social links, map embed, web3forms key

### 3.2 NavigationLinkResource
**Model:** NavigationLink
**Pages:** List, Create, Edit
**Form Fields:** (Schema not fully visible, but based on fillable: settings_id, label, url, order, is_primary)
**Relations:** None
**Editable From Filament:** Navigation menu items (label, URL, order, primary flag)

### 3.3 HeroResource
**Model:** Hero
**Pages:** List, Create, Edit
**Form Fields:**
- page_slug (TextInput, required)
- title (TextInput)
- subtitle (TextInput)
- description (Textarea, full width)
- primary_image (FileUpload, image)
- background_image (FileUpload, image)
- badge_text (TextInput)
- cta_label (TextInput)
- cta_url (TextInput, url)
- theme (Select: light/dark, default: light, required)
**Relations:** None
**Editable From Filament:** Hero sections for each page (title, subtitle, description, images, CTA buttons, theme)

### 3.4 HeroTableResource
**Model:** HeroTable
**Pages:** List, Create, Edit
**Form Fields:** (Based on fillable: hero_id, capacity, central, state, total, order)
**Relations:** None
**Editable From Filament:** Table rows within hero sections (subsidy tables, etc.)

### 3.5 StatResource
**Model:** Stat
**Pages:** List, Create, Edit
**Form Fields:** (Based on fillable: title, value, icon_url, page_slug, order)
**Relations:** None
**Editable From Filament:** Statistics/metrics displayed on pages

### 3.6 ServiceResource
**Model:** Service
**Pages:** List, Create, Edit
**Form Fields:**
- title (TextInput, required)
- description (Textarea, full width)
- image (FileUpload, image)
- cta_label (TextInput)
- cta_url (TextInput, url)
- category (Select: residential/commercial/industrial/other, default: other, required)
- order (TextInput, numeric, required, default: 0)
**Relations:** None
**Editable From Filament:** Service offerings (title, description, image, category, CTA, order)

### 3.7 PricingPackageResource
**Model:** PricingPackage
**Pages:** List, Create, Edit
**Form Fields:** (Based on fillable: plan_name, price_label, is_featured, cta_label, cta_url, order)
**Relations:** None
**Editable From Filament:** Pricing plans (name, price, featured flag, CTA, order)

### 3.8 PricingFeatureResource
**Model:** PricingFeature
**Pages:** List, Create, Edit
**Form Fields:** (Based on fillable: pricing_package_id, description, order)
**Relations:** None
**Editable From Filament:** Features for each pricing package

### 3.9 WhyChooseItemResource
**Model:** WhyChooseItem
**Pages:** List, Create, Edit
**Form Fields:** (Based on fillable: title, description, icon_url, page_slug, order)
**Relations:** None
**Editable From Filament:** "Why Choose Us" feature cards

### 3.10 ProjectResource
**Model:** Project
**Pages:** List, Create, Edit
**Form Fields:**
- title (TextInput, required)
- location (TextInput)
- category (TextInput)
- image (FileUpload, image)
- excerpt (Textarea, full width)
- order (TextInput, numeric, required, default: 0)
**Relations:** None
**Editable From Filament:** Project showcase items (title, location, category, image, excerpt, order)

### 3.11 FaqResource
**Model:** Faq
**Pages:** List, Create, Edit
**Form Fields:** (Based on fillable: question, answer, page_slug, order)
**Relations:** None
**Editable From Filament:** FAQ items (question, answer, page filter, order)

### 3.12 TeamMemberResource
**Model:** TeamMember
**Pages:** List, Create, Edit
**Form Fields:** (Based on fillable: name, role, photo, bio, order)
**Relations:** None
**Editable From Filament:** Team member profiles (name, role, photo, bio, order)

### 3.13 CtaSectionResource
**Model:** CtaSection
**Pages:** List, Create, Edit
**Form Fields:** (Based on fillable: page_slug, headline, subtext, button_text, button_url)
**Relations:** None
**Editable From Filament:** CTA sections for pages (headline, subtext, button text/URL)

### 3.14 ContactFormResource
**Model:** ContactForm
**Pages:** List, Create, Edit
**Form Fields:** (Based on fillable: title, description, success_message, receiver_email, enable_web3forms, web3forms_key)
**Relations:** None
**Editable From Filament:** Contact form configurations

### 3.15 ContactFieldResource
**Model:** ContactField
**Pages:** List, Create, Edit
**Form Fields:** (Based on fillable: contact_form_id, label, type, is_required, order, options)
**Relations:** None
**Editable From Filament:** Dynamic form fields for contact forms

### 3.16 SubsidyRowResource
**Model:** SubsidyRow
**Pages:** List, Create, Edit
**Form Fields:** (Based on fillable: section_slug, capacity, central_subsidy, state_subsidy, total_subsidy, order)
**Relations:** None
**Editable From Filament:** Subsidy table rows

### 3.17 BulletListResource
**Model:** BulletList
**Pages:** List, Create, Edit
**Form Fields:** (Based on fillable: section_slug, text, order)
**Relations:** None
**Editable From Filament:** Bullet point lists for sections

---

## 4. BLADE VIEWS - COMPLETE CONTENT ANALYSIS

### 4.1 Layouts

#### 4.1.1 `layouts/main.blade.php`
**Structure:**
- Includes `layouts.header`
- Main content area with `@yield('content')`
- Includes `layouts.footer`

#### 4.1.2 `layouts/header.blade.php`
**Sections Identified:**
- **Navbar:** Logo, navigation links, mobile toggle
- **Static Content:**
  - Logo image: `/image/logo2.png` (HARDCODED)
  - Navigation links: Home, About Us, Services, Contact (HARDCODED)
- **Dynamic Content Needed:**
  - Logo path from `Setting` model (`logo_path`)
  - Navigation links from `NavigationLink` model (where `is_primary = true`, ordered by `order`)
- **Components:** None
- **Partials:** None

#### 4.1.3 `layouts/footer.blade.php`
**Sections Identified:**
- **Left Column:**
  - Logo: `/image/logo2.png` (HARDCODED)
  - About text: "Indore Solar Solutions delivers..." (HARDCODED)
  - Social icons (commented out)
- **Middle Column:**
  - Quick Links: Home, About Us, Services, Projects, Contacts (HARDCODED)
- **Right Column:**
  - Address: "101, Lord Krishna Apartment..." (HARDCODED)
  - Google Maps embed URL (HARDCODED)
- **Copyright:** "Copyright © 2025 Ciggytech..." (HARDCODED)
- **Dynamic Content Needed:**
  - Logo from `Setting` model (`logo_path`)
  - Footer about text from `Setting` model (`footer_about`)
  - Footer text from `Setting` model (`footer_text`)
  - Social links from `Setting` model (`social_links` - JSON array)
  - Quick links from `NavigationLink` model
  - Address from `Setting` model (address_line1, address_line2, city, state, pincode)
  - Map embed URL from `Setting` model (`map_embed_url`)

### 4.2 Pages

#### 4.2.1 `pages/home.blade.php`
**Sections Identified:**

1. **Subsidy Section (Lines 9-228)**
   - **Static Content:**
     - Heading: "Get a Solar Subsidy of ₹1,08,000 in Khandwa!" (HARDCODED)
     - Description text (HARDCODED)
     - Table with 4 rows: 1kW, 2kW, 3kW, Above 3kW (HARDCODED)
     - Image: `/image/indian-family-with-solar-panel-home-smiling-indian-family-with-solar-panel_1308175-241892.avif` (HARDCODED)
     - Badge: "20,000+ परिवारों का भरोसा" (HARDCODED)
   - **Dynamic Content Needed:**
     - Hero section from `Hero` model (where `page_slug = 'home'`)
     - Subsidy table rows from `SubsidyRow` model (where `section_slug = 'khandwa_subsidy'` or similar)
     - Hero table rows from `HeroTable` model (via `Hero` relationship)

2. **Team Intro Section (Lines 232-323)**
   - **Static Content:**
     - Heading: "India's Leading Solar Solutions Provider" (HARDCODED)
     - Two paragraphs of description (HARDCODED, duplicated)
     - Image: `https://analyticsindiamag.com/wp-content/uploads/2019/08/solar-india-1550x804.jpg` (HARDCODED)
     - "About Us" button link (HARDCODED)
   - **Dynamic Content Needed:**
     - Content from `Hero` model (where `page_slug = 'home'`) or separate content model
     - Image from `Hero` model (`primary_image` or `background_image`)

3. **Stats Section (Lines 327-426)**
   - **Static Content:**
     - 4 stat cards with hardcoded values:
       - "525 Completed Projects"
       - "482 Happy Clients"
       - "1106 Questions Answered"
       - "525 Satisfied"
     - Icon URLs (HARDCODED from Flaticon)
   - **Dynamic Content Needed:**
     - Stats from `Stat` model (where `page_slug = 'home'` or null), ordered by `order`

4. **Services Section (Lines 430-588)**
   - **Static Content:**
     - Heading: "Our Solar Services" (HARDCODED)
     - 6 service cards with hardcoded content:
       - Residential Solar
       - Commercial Solar
       - Industrial Solar
       - Off Grid Solar Systems
       - Hybrid Solar Systems
       - Solar Water Heaters
     - All images: `/image/Residential-Rooftop.png` (HARDCODED, same for all)
   - **Dynamic Content Needed:**
     - Services from `Service` model, ordered by `order`
     - Loop through services to display cards

5. **Pricing Section (Lines 628-737)**
   - **Static Content:**
     - Heading: "Solar Pricing Packages" (HARDCODED)
     - 3 pricing cards:
       - 1 kW Solar - ₹55,000
       - 2 kW Solar - ₹95,000 (highlighted)
       - 3 kW Solar - ₹1,35,000
     - Features list hardcoded in each card
   - **Dynamic Content Needed:**
     - Pricing packages from `PricingPackage` model, ordered by `order`
     - Features from `PricingFeature` model (via `PricingPackage` relationship)
     - Loop through packages and their features

6. **Why Choose Us Section (Lines 742-885)**
   - **Static Content:**
     - Heading: "Why Choose Us?" (HARDCODED)
     - 4 cards with hardcoded content:
       - Trusted by Government & Clients
       - Sustainable & Cost-Effective
       - Proven Experience in the Solar Sector
       - Expert Team Technicians
     - Icon URLs (HARDCODED from Flaticon)
   - **Dynamic Content Needed:**
     - Items from `WhyChooseItem` model (where `page_slug = 'home'` or null), ordered by `order`
     - Loop through items

7. **CTA Section (Lines 888-906)**
   - **Static Content:**
     - Heading: "Switch to Clean Energy Today" (HARDCODED)
     - Subtext: "Let's build a greener future together." (HARDCODED)
     - Button: "Contact Us" (HARDCODED)
   - **Dynamic Content Needed:**
     - CTA from `CtaSection` model (where `page_slug = 'home'`)

8. **Recent Projects Section (Lines 910-977)**
   - **Static Content:**
     - Heading: "Recent Projects" (HARDCODED)
     - 3 project cards with hardcoded content:
       - 8kW Solar Plant - Khandwa • Residential Rooftop
       - 5kW Solar Plant - Ujjain • Commercial Building
       - 15kW Solar Plant - Dewas • Factory Installation
     - All images: `/image/Residential-Rooftop.png` (HARDCODED, same for all)
   - **Dynamic Content Needed:**
     - Projects from `Project` model, ordered by `order` (limit to 3-6)
     - Loop through projects

9. **PM Surya Ghar Section (Lines 980-1018)**
   - **Static Content:**
     - Heading: "PM Surya Ghar Yojana Government Subsidy 2024" (HARDCODED)
     - Description text (HARDCODED)
     - Bullet list (HARDCODED)
     - Subsidy table (HARDCODED)
   - **Dynamic Content Needed:**
     - Subsidy rows from `SubsidyRow` model (where `section_slug = 'pm_surya_ghar'`)
     - Bullet list items from `BulletList` model (where `section_slug = 'pm_surya_ghar'`)

10. **FAQ Section (Lines 1022-1045)**
    - **Static Content:**
      - Heading: "Frequently Asked Questions" (HARDCODED)
      - 3 FAQ items (HARDCODED):
        - "What is the lifespan of solar panels?"
        - "How much can I save monthly?"
        - "Is government subsidy available?"
    - **Dynamic Content Needed:**
      - FAQs from `Faq` model (where `page_slug = 'home'` or null), ordered by `order`
      - Loop through FAQs

11. **Contact Section (Lines 1054-1215)**
    - **Static Content:**
      - Heading: "Ready to Go Solar in Khandwa?" (HARDCODED)
      - Description text (HARDCODED)
      - Phone: "+91 95224 95229" (HARDCODED)
      - Contact form with hardcoded fields (name, contact, pincode, message)
      - Web3Forms access key hardcoded in form
    - **Dynamic Content Needed:**
      - Phone from `Setting` model (`primary_phone`)
      - Contact form configuration from `ContactForm` model
      - Contact form fields from `ContactField` model (via `ContactForm` relationship)
      - Web3Forms key from `Setting` model or `ContactForm` model

**Model Mapping for Home Page:**
- `Hero` (page_slug: 'home')
- `HeroTable` (via Hero)
- `SubsidyRow` (section_slug: 'khandwa_subsidy', 'pm_surya_ghar')
- `Stat` (page_slug: 'home')
- `Service` (all)
- `PricingPackage` (all) + `PricingFeature` (via package)
- `WhyChooseItem` (page_slug: 'home')
- `CtaSection` (page_slug: 'home')
- `Project` (all, limited)
- `BulletList` (section_slug: 'pm_surya_ghar')
- `Faq` (page_slug: 'home')
- `ContactForm` + `ContactField` (for contact section)
- `Setting` (for phone, web3forms key)

#### 4.2.2 `pages/about.blade.php`
**Sections Identified:**

1. **About Hero Section (Lines 7-23)**
   - **Static Content:**
     - Background image: `/image/Residential-Rooftop.png` (HARDCODED)
     - Heading: "About Us" (HARDCODED)
     - Description: "Empowering India with clean..." (HARDCODED)
   - **Dynamic Content Needed:**
     - Hero from `Hero` model (where `page_slug = 'about'`)

2. **Team Intro Section (Lines 43-118)**
   - **Static Content:**
     - Heading: "India's Leading Solar Solutions Provider" (HARDCODED)
     - Two paragraphs (HARDCODED, duplicated)
     - Image URL (HARDCODED)
   - **Dynamic Content Needed:**
     - Content from `Hero` model or separate content section

3. **Mission & Vision Section (Lines 123-149)**
   - **Static Content:**
     - Heading: "Our Mission & Vision" (HARDCODED)
     - Mission card text (HARDCODED)
     - Vision card text (HARDCODED)
   - **Dynamic Content Needed:**
     - Could use `BulletList` model or separate content model

4. **Why Choose Us Section (Lines 153-186)**
   - **Static Content:**
     - Heading: "Why Choose Us" (HARDCODED)
     - 4 cards with hardcoded content and icon URLs
   - **Dynamic Content Needed:**
     - Items from `WhyChooseItem` model (where `page_slug = 'about'`), ordered by `order`

5. **Team Section (Lines 190-217)**
   - **Static Content:**
     - Heading: "Meet Our Team" (HARDCODED)
     - 3 team member cards:
       - Rohan Sharma - Founder & CEO
       - Priya Mehta - Project Manager
       - Amit Verma - Senior Engineer
     - Image URLs from external sources (HARDCODED)
   - **Dynamic Content Needed:**
     - Team members from `TeamMember` model, ordered by `order`
     - Loop through team members

6. **CTA Section (Lines 221-239)**
   - **Static Content:**
     - Heading: "Switch to Clean Energy Today" (HARDCODED)
     - Button: "Contact Us" (HARDCODED)
   - **Dynamic Content Needed:**
     - CTA from `CtaSection` model (where `page_slug = 'about'`)

7. **Contact Section (Lines 333-494)**
   - **Static Content:**
     - Similar to home page contact section
     - Phone: "+91 95224 95229" (HARDCODED)
     - Form fields hardcoded
   - **Dynamic Content Needed:**
     - Same as home page contact section

**Model Mapping for About Page:**
- `Hero` (page_slug: 'about')
- `WhyChooseItem` (page_slug: 'about')
- `TeamMember` (all)
- `CtaSection` (page_slug: 'about')
- `ContactForm` + `ContactField`
- `Setting` (for phone, web3forms key)
- `BulletList` (for mission/vision, if used)

#### 4.2.3 `pages/services.blade.php`
**Sections Identified:**

1. **Service Hero Section (Lines 9-23)**
   - **Static Content:**
     - Background image: `/image/Residential-Rooftop.png` (HARDCODED)
     - Heading: "Our Solar Services" (HARDCODED)
     - Description (HARDCODED)
   - **Dynamic Content Needed:**
     - Hero from `Hero` model (where `page_slug = 'services'`)

2. **What We Offer Section (Lines 25-33)**
   - **Static Content:**
     - Heading: "What We Offer" (HARDCODED)
     - Description (HARDCODED)
   - **Dynamic Content Needed:**
     - Could use `Hero` model description or separate content

3. **Services Grid Section (Lines 35-87)**
   - **Static Content:**
     - 6 service cards with hardcoded content:
       - Residential Solar
       - Commercial Solar
       - Industrial Solar
       - Maintenance & AMC
       - Solar EPC Services
       - Solar Panel Cleaning
     - All images: `/image/Residential-Rooftop.png` (HARDCODED)
   - **Dynamic Content Needed:**
     - Services from `Service` model, ordered by `order`
     - Loop through services

4. **How Our Service Works Section (Lines 89-123)**
   - **Static Content:**
     - Heading: "How Our Service Works" (HARDCODED)
     - 4 process steps (HARDCODED):
       - Site Assessment
       - Design & Planning
       - Installation
       - Activation
   - **Dynamic Content Needed:**
     - Could use `BulletList` model or separate content model

5. **CTA Section (Lines 177-186)**
   - **Static Content:**
     - Heading: "Ready to Switch to Solar?" (HARDCODED)
     - Button: "Contact Now" (HARDCODED)
   - **Dynamic Content Needed:**
     - CTA from `CtaSection` model (where `page_slug = 'services'`)

**Model Mapping for Services Page:**
- `Hero` (page_slug: 'services')
- `Service` (all)
- `CtaSection` (page_slug: 'services')
- `BulletList` (for process steps, if used)

#### 4.2.4 `pages/projects.blade.php`
**Sections Identified:**

1. **Projects Hero Section (Lines 8-22)**
   - **Static Content:**
     - Background image from Unsplash (HARDCODED)
     - Heading: "Our Solar Projects" (HARDCODED)
     - Description (HARDCODED)
   - **Dynamic Content Needed:**
     - Hero from `Hero` model (where `page_slug = 'projects'`)

2. **Filter Buttons (Lines 24-33)**
   - **Static Content:**
     - Filter buttons: All, Residential, Commercial, Industrial (HARDCODED)
   - **Dynamic Content Needed:**
     - Could be dynamic based on unique categories in `Project` model

3. **Projects Grid (Lines 36-94)**
   - **Static Content:**
     - 6 project cards with hardcoded content:
       - 3kW Home Rooftop Solar - Khandwa
       - 20kW Commercial Solar - Corporate Office
       - 100kW Industrial Plant - Pithampur
       - 2kW Residential Solar - Vijay Nagar
       - 50kW School Solar - Private School
       - 75kW Factory Solar - Sanwer Road
     - Images from Unsplash (HARDCODED)
   - **Dynamic Content Needed:**
     - Projects from `Project` model, ordered by `order`
     - Filter by category (residential/commercial/industrial)
     - Loop through projects

**Model Mapping for Projects Page:**
- `Hero` (page_slug: 'projects')
- `Project` (all, filterable by category)

#### 4.2.5 `pages/contact.blade.php`
**Sections Identified:**

1. **Contact Info Section (Lines 10-38)**
   - **Static Content:**
     - Heading: "Get in Touch" (HARDCODED)
     - Phone: "+91 95224 95229" (HARDCODED)
     - Email: "info@solar.in" (HARDCODED)
     - Address: "101, Lord Krishna Apartment..." (HARDCODED)
     - Google Maps embed URL (HARDCODED)
   - **Dynamic Content Needed:**
     - Phone from `Setting` model (`primary_phone`, `secondary_phone`)
     - Email from `Setting` model (`support_email`)
     - Address from `Setting` model (address_line1, address_line2, city, state, pincode)
     - Map embed URL from `Setting` model (`map_embed_url`)

2. **Contact Form Section (Lines 41-75)**
   - **Static Content:**
     - Heading: "Send Us a Message" (HARDCODED)
     - Form fields: Name, Phone, Email, Message (HARDCODED)
     - Web3Forms access key hardcoded
   - **Dynamic Content Needed:**
     - Contact form configuration from `ContactForm` model
     - Contact form fields from `ContactField` model (via `ContactForm` relationship)
     - Web3Forms key from `Setting` model or `ContactForm` model

**Model Mapping for Contact Page:**
- `Setting` (for contact info, address, map, web3forms key)
- `ContactForm` + `ContactField` (for dynamic form)

---

## 5. CONTROLLERS - CURRENT STATE & REQUIRED DATA

### 5.1 HomeController
**Current State:**
```php
public function index(){
    return view('pages.home');
}
```
**Blade View:** `pages.home`
**Data Currently Passed:** None
**Data That Should Be Passed:**
- `hero` - Hero model (where page_slug = 'home') with tables relationship
- `subsidyRows` - SubsidyRow model (where section_slug = 'khandwa_subsidy' or similar)
- `stats` - Stat model (where page_slug = 'home' or null), ordered by order
- `services` - Service model, ordered by order
- `pricingPackages` - PricingPackage model with features relationship, ordered by order
- `whyChooseItems` - WhyChooseItem model (where page_slug = 'home' or null), ordered by order
- `ctaSection` - CtaSection model (where page_slug = 'home')
- `projects` - Project model, ordered by order (limit 3-6)
- `subsidyRowsPM` - SubsidyRow model (where section_slug = 'pm_surya_ghar')
- `bulletListPM` - BulletList model (where section_slug = 'pm_surya_ghar')
- `faqs` - Faq model (where page_slug = 'home' or null), ordered by order
- `contactForm` - ContactForm model (first or where page_slug = 'home')
- `contactFields` - ContactField model (via contactForm relationship)
- `settings` - Setting model (first record) - for phone, web3forms key

### 5.2 AboutController
**Current State:**
```php
public function index()
{
    return view('pages.about');
}
```
**Blade View:** `pages.about`
**Data Currently Passed:** None
**Data That Should Be Passed:**
- `hero` - Hero model (where page_slug = 'about')
- `whyChooseItems` - WhyChooseItem model (where page_slug = 'about' or null), ordered by order
- `teamMembers` - TeamMember model, ordered by order
- `ctaSection` - CtaSection model (where page_slug = 'about')
- `contactForm` - ContactForm model
- `contactFields` - ContactField model (via contactForm)
- `settings` - Setting model (for phone, web3forms key)
- `missionVision` - BulletList model (where section_slug = 'mission_vision') - optional

### 5.3 ServicesController
**Current State:**
```php
public function index()
{
    return view('pages.services');
}
```
**Blade View:** `pages.services`
**Data Currently Passed:** None
**Data That Should Be Passed:**
- `hero` - Hero model (where page_slug = 'services')
- `services` - Service model, ordered by order
- `ctaSection` - CtaSection model (where page_slug = 'services')
- `processSteps` - BulletList model (where section_slug = 'service_process') - optional

### 5.4 ProjectsController
**Current State:**
```php
public function index()
{
    return view('pages.projects');
}
```
**Blade View:** `pages.projects`
**Data Currently Passed:** None
**Data That Should Be Passed:**
- `hero` - Hero model (where page_slug = 'projects')
- `projects` - Project model, ordered by order
- `categories` - Unique categories from Project model (for filter buttons)

### 5.5 ContactController
**Current State:**
```php
public function index(){
    return view('pages.contact');
}
```
**Blade View:** `pages.contact`
**Data Currently Passed:** None
**Data That Should Be Passed:**
- `settings` - Setting model (first record) - for phone, email, address, map, web3forms key
- `contactForm` - ContactForm model (first or where page_slug = 'contact')
- `contactFields` - ContactField model (via contactForm relationship), ordered by order

---

## 6. ROUTING - FRONTEND ROUTES

### 6.1 Routes That Render Frontend Pages
- `GET /` → `HomeController@index` → `pages.home`
- `GET /about` → `AboutController@index` → `pages.about`
- `GET /services` → `ServicesController@index` → `pages.services`
- `GET /projects` → `ProjectsController@index` → `pages.projects`
- `GET /contact` → `ContactController@index` → `pages.contact`

---

## 7. MODEL-TO-PAGE MAPPING

### 7.1 Home Page (`/`)
**Models Required:**
- `Hero` (page_slug: 'home') + `HeroTable`
- `SubsidyRow` (section_slug: 'khandwa_subsidy', 'pm_surya_ghar')
- `Stat` (page_slug: 'home')
- `Service` (all)
- `PricingPackage` + `PricingFeature`
- `WhyChooseItem` (page_slug: 'home')
- `CtaSection` (page_slug: 'home')
- `Project` (all, limited)
- `BulletList` (section_slug: 'pm_surya_ghar')
- `Faq` (page_slug: 'home')
- `ContactForm` + `ContactField`
- `Setting` (for phone, web3forms key)

### 7.2 About Page (`/about`)
**Models Required:**
- `Hero` (page_slug: 'about')
- `WhyChooseItem` (page_slug: 'about')
- `TeamMember` (all)
- `CtaSection` (page_slug: 'about')
- `ContactForm` + `ContactField`
- `Setting` (for phone, web3forms key)
- `BulletList` (section_slug: 'mission_vision') - optional

### 7.3 Services Page (`/services`)
**Models Required:**
- `Hero` (page_slug: 'services')
- `Service` (all)
- `CtaSection` (page_slug: 'services')
- `BulletList` (section_slug: 'service_process') - optional

### 7.4 Projects Page (`/projects`)
**Models Required:**
- `Hero` (page_slug: 'projects')
- `Project` (all, filterable by category)

### 7.5 Contact Page (`/contact`)
**Models Required:**
- `Setting` (for contact info, address, map, web3forms key)
- `ContactForm` + `ContactField` (for dynamic form)

### 7.6 Global (All Pages)
**Models Required:**
- `Setting` (for logo, footer content, social links)
- `NavigationLink` (for header navigation)

---

## 8. PAGE-BY-PAGE DYNAMIC CONTENT REQUIREMENTS

### 8.1 Home Page Dynamic Elements

1. **Header/Navbar:**
   - Logo from `Setting.logo_path`
   - Navigation links from `NavigationLink` (is_primary = true)

2. **Subsidy Section:**
   - Hero content from `Hero` (page_slug: 'home')
   - Subsidy table rows from `SubsidyRow` or `HeroTable`

3. **Team Intro Section:**
   - Content from `Hero` model or separate content

4. **Stats Section:**
   - All stats from `Stat` model (page_slug: 'home')

5. **Services Section:**
   - All services from `Service` model

6. **Pricing Section:**
   - All pricing packages from `PricingPackage` model
   - Features from `PricingFeature` model (via package)

7. **Why Choose Us:**
   - Items from `WhyChooseItem` model (page_slug: 'home')

8. **CTA Section:**
   - Content from `CtaSection` model (page_slug: 'home')

9. **Recent Projects:**
   - Projects from `Project` model (limit 3-6)

10. **PM Surya Ghar Section:**
    - Subsidy rows from `SubsidyRow` (section_slug: 'pm_surya_ghar')
    - Bullet list from `BulletList` (section_slug: 'pm_surya_ghar')

11. **FAQ Section:**
    - FAQs from `Faq` model (page_slug: 'home')

12. **Contact Section:**
    - Phone from `Setting.primary_phone`
    - Contact form from `ContactForm` + `ContactField`
    - Web3Forms key from `Setting.web3forms_key`

13. **Footer:**
    - Logo from `Setting.logo_path`
    - Footer about from `Setting.footer_about`
    - Footer text from `Setting.footer_text`
    - Social links from `Setting.social_links`
    - Quick links from `NavigationLink`
    - Address from `Setting` (address fields)
    - Map embed from `Setting.map_embed_url`

### 8.2 About Page Dynamic Elements

1. **Hero Section:**
   - Hero from `Hero` model (page_slug: 'about')

2. **Team Intro Section:**
   - Content from `Hero` or separate content

3. **Mission & Vision:**
   - Could use `BulletList` model or separate content

4. **Why Choose Us:**
   - Items from `WhyChooseItem` model (page_slug: 'about')

5. **Team Section:**
   - Team members from `TeamMember` model

6. **CTA Section:**
   - Content from `CtaSection` model (page_slug: 'about')

7. **Contact Section:**
   - Same as home page

8. **Header/Footer:**
   - Same as home page (global)

### 8.3 Services Page Dynamic Elements

1. **Hero Section:**
   - Hero from `Hero` model (page_slug: 'services')

2. **Services Grid:**
   - All services from `Service` model

3. **Process Steps:**
   - Could use `BulletList` model (section_slug: 'service_process')

4. **CTA Section:**
   - Content from `CtaSection` model (page_slug: 'services')

5. **Header/Footer:**
   - Same as home page (global)

### 8.4 Projects Page Dynamic Elements

1. **Hero Section:**
   - Hero from `Hero` model (page_slug: 'projects')

2. **Projects Grid:**
   - All projects from `Project` model
   - Filter by category (residential/commercial/industrial)

3. **Header/Footer:**
   - Same as home page (global)

### 8.5 Contact Page Dynamic Elements

1. **Contact Info:**
   - Phone from `Setting.primary_phone`, `Setting.secondary_phone`
   - Email from `Setting.support_email`
   - Address from `Setting` (address fields)
   - Map embed from `Setting.map_embed_url`

2. **Contact Form:**
   - Form configuration from `ContactForm` model
   - Form fields from `ContactField` model (via form)
   - Web3Forms key from `Setting.web3forms_key` or `ContactForm.web3forms_key`

3. **Header/Footer:**
   - Same as home page (global)

---

## 9. CONTROLLERS - REQUIRED DATA PASSING

### 9.1 HomeController - Required Data
```php
public function index(){
    $settings = Setting::first();
    $hero = Hero::where('page_slug', 'home')->with('tables')->first();
    $subsidyRows = SubsidyRow::where('section_slug', 'khandwa_subsidy')->orderBy('order')->get();
    $stats = Stat::where('page_slug', 'home')->orWhereNull('page_slug')->orderBy('order')->get();
    $services = Service::orderBy('order')->get();
    $pricingPackages = PricingPackage::with('features')->orderBy('order')->get();
    $whyChooseItems = WhyChooseItem::where('page_slug', 'home')->orWhereNull('page_slug')->orderBy('order')->get();
    $ctaSection = CtaSection::where('page_slug', 'home')->first();
    $projects = Project::orderBy('order')->limit(6)->get();
    $subsidyRowsPM = SubsidyRow::where('section_slug', 'pm_surya_ghar')->orderBy('order')->get();
    $bulletListPM = BulletList::where('section_slug', 'pm_surya_ghar')->orderBy('order')->get();
    $faqs = Faq::where('page_slug', 'home')->orWhereNull('page_slug')->orderBy('order')->get();
    $contactForm = ContactForm::first();
    $contactFields = $contactForm ? $contactForm->fields()->orderBy('order')->get() : collect();
    $navigationLinks = NavigationLink::where('is_primary', true)->orderBy('order')->get();
    
    return view('pages.home', compact(
        'settings', 'hero', 'subsidyRows', 'stats', 'services', 
        'pricingPackages', 'whyChooseItems', 'ctaSection', 'projects',
        'subsidyRowsPM', 'bulletListPM', 'faqs', 'contactForm', 
        'contactFields', 'navigationLinks'
    ));
}
```

### 9.2 AboutController - Required Data
```php
public function index(){
    $settings = Setting::first();
    $hero = Hero::where('page_slug', 'about')->first();
    $whyChooseItems = WhyChooseItem::where('page_slug', 'about')->orWhereNull('page_slug')->orderBy('order')->get();
    $teamMembers = TeamMember::orderBy('order')->get();
    $ctaSection = CtaSection::where('page_slug', 'about')->first();
    $contactForm = ContactForm::first();
    $contactFields = $contactForm ? $contactForm->fields()->orderBy('order')->get() : collect();
    $navigationLinks = NavigationLink::where('is_primary', true)->orderBy('order')->get();
    
    return view('pages.about', compact(
        'settings', 'hero', 'whyChooseItems', 'teamMembers', 
        'ctaSection', 'contactForm', 'contactFields', 'navigationLinks'
    ));
}
```

### 9.3 ServicesController - Required Data
```php
public function index(){
    $settings = Setting::first();
    $hero = Hero::where('page_slug', 'services')->first();
    $services = Service::orderBy('order')->get();
    $ctaSection = CtaSection::where('page_slug', 'services')->first();
    $navigationLinks = NavigationLink::where('is_primary', true)->orderBy('order')->get();
    
    return view('pages.services', compact(
        'settings', 'hero', 'services', 'ctaSection', 'navigationLinks'
    ));
}
```

### 9.4 ProjectsController - Required Data
```php
public function index(){
    $settings = Setting::first();
    $hero = Hero::where('page_slug', 'projects')->first();
    $projects = Project::orderBy('order')->get();
    $categories = Project::distinct()->pluck('category')->filter();
    $navigationLinks = NavigationLink::where('is_primary', true)->orderBy('order')->get();
    
    return view('pages.projects', compact(
        'settings', 'hero', 'projects', 'categories', 'navigationLinks'
    ));
}
```

### 9.5 ContactController - Required Data
```php
public function index(){
    $settings = Setting::first();
    $contactForm = ContactForm::first();
    $contactFields = $contactForm ? $contactForm->fields()->orderBy('order')->get() : collect();
    $navigationLinks = NavigationLink::where('is_primary', true)->orderBy('order')->get();
    
    return view('pages.contact', compact(
        'settings', 'contactForm', 'contactFields', 'navigationLinks'
    ));
}
```

---

## 10. SUMMARY - WHAT NEEDS TO BE DYNAMIC

### 10.1 Global Elements (All Pages)
- **Header Logo:** `Setting.logo_path`
- **Navigation Links:** `NavigationLink` (is_primary = true)
- **Footer Logo:** `Setting.logo_path`
- **Footer About Text:** `Setting.footer_about`
- **Footer Text:** `Setting.footer_text`
- **Footer Social Links:** `Setting.social_links` (JSON array)
- **Footer Quick Links:** `NavigationLink`
- **Footer Address:** `Setting` (address_line1, address_line2, city, state, pincode)
- **Footer Map:** `Setting.map_embed_url`

### 10.2 Home Page Specific
- Hero section (title, subtitle, description, images, CTA)
- Subsidy table rows
- Statistics/metrics
- Services grid
- Pricing packages with features
- Why Choose Us items
- CTA section
- Recent projects
- PM Surya Ghar subsidy table and bullet list
- FAQ items
- Contact form configuration

### 10.3 About Page Specific
- Hero section
- Why Choose Us items
- Team members
- CTA section
- Mission/Vision content (optional)

### 10.4 Services Page Specific
- Hero section
- Services grid
- Process steps (optional)
- CTA section

### 10.5 Projects Page Specific
- Hero section
- Projects grid (filterable by category)

### 10.6 Contact Page Specific
- Contact information (phone, email, address, map)
- Dynamic contact form with configurable fields

---

## END OF ANALYSIS

This document provides a complete technical analysis of your Laravel project structure, database schema, models, Filament resources, Blade views, controllers, and routing. Use this as a reference to implement dynamic content throughout your website.


