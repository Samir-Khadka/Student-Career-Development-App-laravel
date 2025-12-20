@echo off
set PHP_BIN=php

:: Check for Laragon PHP if standard php not found
if not exist "%PHP_BIN%" (
    if exist "C:\laragon\bin\php\php-8.3.28-Win32-vs16-x64\php.exe" (
        set PHP_BIN="C:\laragon\bin\php\php-8.3.28-Win32-vs16-x64\php.exe"
    )
)

echo [INFO] Waiting for Composer to finish installation...
:check_vendor
if exist "vendor\autoload.php" goto start_app
echo ... still waiting for vendor/autoload.php
timeout /t 5 >nul
goto check_vendor

:start_app
echo [SUCCESS] Composer installation detected!
echo.
echo [1/3] Generating Application Key...
%PHP_BIN% artisan key:generate

echo.
echo [2/3] Running Database Migrations...
%PHP_BIN% artisan migrate --force

echo.
echo [3/3] Starting Local Server...
echo Access your app at: http://127.0.0.1:8000
%PHP_BIN% artisan serve
