# Setting up Laravel Environment on Windows

Since you are missing `php` and `composer`, you need to set them up before you can run the project.

## Option 1: Laragon (Recommended - Easiest)
Laragon installs PHP, MySQL, and a Web Server for you automatically.

1.  **Download Laragon**: Go to [laragon.org/download](https://laragon.org/download/) and download **Laragon Full**.
2.  **Install**: Run the installer and click "Next" through simple setup.
3.  **Start Services**: Open Laragon, click **Start All**.
    *   This gives you PHP 8.1+, MySQL 8, and Nginx/Apache.
4.  **Add to PATH** (Important):
    *   In Laragon, go to **Menu > Tools > Path > Add to Path**.
    *   This makes `php` and `composer` commands work in your terminal.

## Option 2: Manual Installation

### 1. Install PHP
1.  Download **PHP 8.2 (VS16 x64 Thread Safe)** from [windows.php.net](https://windows.php.net/download/).
2.  Extract the zip file to `C:\php`.
3.  Add `C:\php` to your **Environment Variables** -> **Path**.
4.  Verify by opening a new terminal and running `php -v`.

### 2. Install Composer
1.  Download **Composer-Setup.exe** from [getcomposer.org](https://getcomposer.org/download/).
2.  Run the installer. It will find your php.exe at `C:\php\php.exe`.
3.  Verify by running `composer --version`.

## Next Steps
Once installed:
1.  Open your project folder in VS Code.
2.  Open a **New Terminal**.
3.  Run: `composer install`
4.  Run: `php artisan serve`
