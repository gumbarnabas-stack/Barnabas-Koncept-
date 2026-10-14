# Barnabas Koncept - Fresh Laravel 12 installer
# Run this PowerShell script from the extracted package folder.
$ErrorActionPreference = "Stop"

Write-Host "=== BARNABAS KONCEPT / LARAVEL 12 SETUP ===" -ForegroundColor Cyan

if (!(Get-Command composer -ErrorAction SilentlyContinue)) {
    Write-Host "Composer is not installed or is not in PATH." -ForegroundColor Red
    exit 1
}
if (!(Get-Command php -ErrorAction SilentlyContinue)) {
    Write-Host "PHP is not installed or is not in PATH." -ForegroundColor Red
    exit 1
}

$projectName = Read-Host "Enter Laravel project folder name (press Enter for barnabas-koncept)"
if ([string]::IsNullOrWhiteSpace($projectName)) { $projectName = "barnabas-koncept" }

if (Test-Path $projectName) {
    Write-Host "Folder '$projectName' already exists. Choose another name or delete the old folder first." -ForegroundColor Red
    exit 1
}

Write-Host "Creating fresh Laravel project..." -ForegroundColor Yellow
composer create-project laravel/laravel $projectName

$source = (Get-Location).Path
$destination = Join-Path $source $projectName

Write-Host "Copying Barnabas Koncept application files..." -ForegroundColor Yellow
Get-ChildItem -Path $source -Force |
    Where-Object { $_.Name -notin @($projectName, ".git") } |
    Copy-Item -Destination $destination -Recurse -Force

Set-Location $destination

if (!(Test-Path ".env")) { Copy-Item ".env.example" ".env" }

php artisan key:generate
php artisan storage:link

Write-Host ""
Write-Host "IMPORTANT: Create a MySQL database named barnabas_koncept." -ForegroundColor Yellow
Write-Host "Then open .env and confirm DB_DATABASE, DB_USERNAME and DB_PASSWORD." -ForegroundColor Yellow
Write-Host ""
Write-Host "After the database is ready, run:" -ForegroundColor Green
Write-Host "  php artisan migrate --seed" -ForegroundColor White
Write-Host "  php artisan serve" -ForegroundColor White
Write-Host ""
Write-Host "Admin login:" -ForegroundColor Green
Write-Host "  http://127.0.0.1:8000/admin/login" -ForegroundColor White
Write-Host "  Email: admin@barnabaskoncept.com" -ForegroundColor White
Write-Host "  Password: password" -ForegroundColor White
Write-Host ""
Write-Host "Change the default admin password before deployment/presentation." -ForegroundColor Yellow
