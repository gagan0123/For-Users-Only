<img src='https://gitlab.com/gagan0123/for-users-only/raw/master/assets/icon-128x128.png' align='right' />

# For Users Only #
**Contributors:** [gagan0123](https://profiles.wordpress.org/gagan0123)
**Tags:** login, users, membership
**License:** GPLv2 or later
**License URI:** http://www.gnu.org/licenses/gpl-2.0.html
**Requires at least:** WordPress 2.7
**Requires PHP:** 5.6
**Tested up to:** 5.1
**Stable tag:** 1.1.1

## Project Overview
"For Users Only" is a WordPress plugin designed to restrict site access exclusively to logged-in users. It automatically redirects any non-authenticated user attempting to access the frontend to the WordPress login page, attempting to preserve the intended destination for post-login redirection.

## Tech Stack
* **Language**: PHP (>= 5.6)
* **Framework**: WordPress Plugin API (Tested up to 5.1)
* **Build Tools**: Grunt (for documentation generation)

## Project Structure
```
.
├── assets/                  # Plugin assets (icons, etc.)
├── class-for-users-only.php # Core logic class (redirects, checks)
├── Gruntfile.js             # Grunt configuration for readme conversion
├── init.php                 # Plugin entry point
├── package.json             # NPM dependencies (dev)
├── README.md                # Documentation (Generated/Manual)
└── readme.txt               # WordPress Plugin Repository documentation source
```

## Installation & Setup (Verified)

### Requirements
* **PHP**: 5.6 or higher
* **WordPress**: 2.7 or higher

### Installation Steps
1.  Download the plugin folder.
2.  Upload the `for-users-only` directory to the `/wp-content/plugins/` directory of your WordPress installation.
3.  Activate the plugin through the 'Plugins' menu in WordPress.

*Note: There are no external dependencies required for the runtime of this plugin. `npm install` is only needed if you intend to regenerate the `README.md` from `readme.txt` using the included Grunt task.*

## Features & Usage

### 1. Mandatory Login
*   **Logic**: Hooks into the `init` action.
*   **Check**: Verifies if `! is_user_logged_in()`.
*   **Exclusion**: Does not redirect if the current page is `wp-login.php` or `wp-register.php` (checked via global `$pagenow`).

### 2. Intelligent Redirection
*   **Redirect**: Uses `wp_safe_redirect` to send users to the login URL.
*   **Return URL**: Appends the current page URL as a `redirect_to` query parameter so users return to their intended page after logging in.
    *   *Note*: The URL reconstruction logic currently has a known issue on standard HTTP (port 80) connections, where it may append the `SERVER_NAME` incorrectly.

### 3. Security
*   **Input Sanitization**: Uses `filter_input` for `SERVER_NAME`, `REQUEST_URI`, etc.
*   **Safe Redirect**: Uses `wp_safe_redirect` to prevent open redirect vulnerabilities.

## Changelog

### 1.1.1
* Make use of wp_safe_redirect.
* Using strict type checking.
* Filter super global variables data.

### 1.1
* Checked compatibility with WordPress 4.8.1 and mentioned it in readme.
* Some formatting modifications in code as per WordPress standards.
* Some modifications in the readme file.

### 1.0
* Initial Plugin uploaded.
