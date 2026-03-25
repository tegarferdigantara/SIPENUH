# SIPENUH

**Sistem Informasi Pendaftaran Umrah (SIPENUH)** - Aplikasi web untuk mengelola pendaftaran dan administrasi jamaah umrah.

## 📋 Deskripsi

SIPENUH adalah sistem informasi berbasis web yang dibangun dengan Laravel untuk mengelola seluruh proses pendaftaran jamaah umrah, mulai dari registrasi, verifikasi dokumen, manajemen data jamaah, hingga pelaporan. Sistem ini terintegrasi dengan WhatsApp Bot (SIPENUH-BOT) untuk memudahkan proses pendaftaran secara online.

## ✨ Fitur Utama

- **Manajemen Jamaah**: CRUD data jamaah dengan informasi lengkap
- **Verifikasi Dokumen**: Review dan validasi dokumen pendaftaran (KTP, Paspor, KK, Akta)
- **Dashboard Admin**: Dashboard interaktif untuk monitoring pendaftaran
- **Export Data**: Export data jamaah ke berbagai format (PDF, Excel, ZIP)
- **Role & Permission**: Manajemen hak akses berbasis role (Spatie Permission)
- **Image Processing**: Automatic image rotation dan optimization
- **API Integration**: REST API untuk integrasi dengan WhatsApp Bot
- **Responsive Design**: UI modern dengan TailwindCSS dan Alpine.js

## 🛠️ Tech Stack

### Backend
- **Framework**: Laravel 10.x
- **PHP**: ^8.1
- **Database**: MySQL/PostgreSQL
- **Authentication**: Laravel Sanctum
- **Authorization**: Spatie Laravel Permission

### Frontend
- **CSS Framework**: TailwindCSS 3.x
- **JavaScript**: Alpine.js 3.x
- **Build Tool**: Vite 4.x
- **Icons**: Heroicons/Lucide

### Libraries
- **PDF Generation**: barryvdh/laravel-dompdf
- **Image Processing**: intervention/image-laravel
- **HTTP Client**: Guzzle

## 📁 Struktur Project

```
SIPENUH/
├── app/
│   ├── Http/Controllers/    # Controllers
│   ├── Models/              # Eloquent models
│   ├── Helpers.php          # Helper functions
│   └── ...
├── config/                  # Configuration files
├── database/
│   ├── migrations/          # Database migrations
│   ├── seeders/             # Database seeders
│   └── factories/           # Model factories
├── public/                  # Public assets
├── resources/
│   ├── views/              # Blade templates
│   ├── css/                # Stylesheets
│   └── js/                 # JavaScript files
├── routes/
│   ├── web.php             # Web routes
│   └── api.php             # API routes
├── storage/                # Storage files
├── tests/                  # Tests
└── vendor/                 # Composer dependencies
```

## 🚀 Instalasi

### Prerequisites

- PHP >= 8.1
- Composer
- Node.js & npm
- MySQL/PostgreSQL
- PHP Extensions:
  - php-zip (untuk export data ke zip)
  - php-gd (untuk rotate image)
  - php-imagick (untuk rotate image)
  - php-mbstring
  - php-xml
  - php-curl

### Langkah Instalasi

1. **Clone repository**
```bash
git clone https://github.com/tegarferdigantara/SIPENUH
cd SIPENUH
```

2. **Install PHP dependencies**
```bash
composer install
```

3. **Install Node dependencies**
```bash
npm install
```

4. **Setup environment**
```bash
cp .env.example .env
```

5. **Generate application key**
```bash
php artisan key:generate
```

6. **Konfigurasi database di `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sipenuh
DB_USERNAME=root
DB_PASSWORD=
```

7. **Konfigurasi API untuk WhatsApp Bot**
```env
CHATBOT_API_KEY=your-secret-api-key
```

8. **Run migrations**
```bash
php artisan migrate
```

9. **Seed database (optional)**
```bash
php artisan db:seed
```

10. **Build assets**
```bash
npm run build
# atau untuk development
npm run dev
```

11. **Clear cache**
```bash
php artisan config:cache
php artisan config:clear
php artisan cache:clear
```

12. **Start development server**
```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## 📝 Konfigurasi

### Storage Link
Buat symbolic link untuk storage:
```bash
php artisan storage:link
```

### Permissions
Setup permissions untuk roles:
```bash
php artisan permission:cache-reset
```

### Scheduled Tasks
Untuk menjalankan scheduled tasks, tambahkan ke crontab:
```bash
* * * * * cd /path-to-project && php artisan schedule:run >> /dev/null 2>&1
```

## 🔌 API Endpoints

### Authentication
Semua API endpoint memerlukan API key di header:
```
X-API-Key: your-api-key
```

### Endpoints
- `POST /api/registrations` - Buat pendaftaran baru
- `GET /api/registrations/{id}` - Get detail pendaftaran
- `PATCH /api/registrations/{id}` - Update pendaftaran
- `DELETE /api/registrations/{id}` - Hapus pendaftaran
- `POST /api/upload-photo` - Upload foto dokumen

## 🎨 Development

### Run development server
```bash
php artisan serve
npm run dev
```

### Run tests
```bash
php artisan test
```

### Code formatting
```bash
./vendor/bin/pint
```

## 🔒 Security

- CSRF Protection
- SQL Injection Prevention (Eloquent ORM)
- XSS Protection
- API Key Authentication
- Role-based Access Control
- Input Validation & Sanitization

## 📦 Deployment

### Production Build
```bash
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Optimization
```bash
composer install --optimize-autoloader --no-dev
php artisan optimize
```

## 🐛 Troubleshooting

### Clear all cache
```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

### Permission issues
```bash
chmod -R 775 storage bootstrap/cache
```

## 👤 Author

Tegar Ferdigantara

## 🔗 Related Projects

- [SIPENUH-BOT](../SIPENUH-BOT) - WhatsApp Bot untuk pendaftaran online

## 🤝 Contributing

Contributions, issues, dan feature requests are welcome!

## 📞 Support

Untuk bantuan atau pertanyaan, silakan hubungi tim development.
