# Barnabas Koncept - PowerShell setup helper
# Run this INSIDE your Laravel project folder after extracting this package.
Write-Host "Barnabas Koncept setup starting..." -ForegroundColor Cyan

if (!(Test-Path "artisan")) {
    Write-Host "ERROR: artisan was not found. Open this terminal inside your Laravel project folder." -ForegroundColor Red
    exit 1
}

Write-Host "Copying project files..." -ForegroundColor Yellow
Copy-Item ".\barnabas_koncept\*" "." -Recurse -Force

if (!(Test-Path ".env")) {
    Copy-Item ".env.example" ".env"
}

php artisan key:generate
php artisan storage:link
php artisan migrate --seed

Write-Host ""
Write-Host "Setup complete." -ForegroundColor Green
Write-Host "Run: php artisan serve" -ForegroundColor Cyan
Write-Host "Admin: http://127.0.0.1:8000/admin/login" -ForegroundColor Cyan
Write-Host "Email: admin@barnabaskoncept.com" -ForegroundColor Cyan
Write-Host "Password: password" -ForegroundColor Cyan
