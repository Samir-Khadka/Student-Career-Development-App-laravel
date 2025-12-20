@echo off
echo [INFO] Preparing to push to GitHub...

:: Ensure we are in the script directory
cd /d "%~dp0"

:: Initialize git if not present
if not exist ".git" (
    echo [INFO] Initializing Git repository...
    git init
)

echo [INFO] Adding and committing files...
git add .
git commit -m "Project upload"

echo [INFO] Configuring remote and pushing...
git branch -M main
git remote remove origin 2>nul
git remote add origin https://github.com/Samir-Khadka/Student-Career-Development-App-laravel.git
git push -u origin main

echo [SUCCESS] Operation completed.
pause
