# 📚 Dokumentasi Lengkap Database Estimasi Digital

**Versi:** 1.0  
**Updated:** 2024  
**Database:** estimasi_digital (MySQL 8.0+)  
**Framework:** Laravel 11+ dengan Spatie Permission & Media Library

---

## 📑 Daftar Isi

1. [Overview Database](#overview-database)
2. [Tabel Laravel Default](#tabel-laravel-default)
3. [Tabel Spatie Permission](#tabel-spatie-permission)
4. [Tabel Spatie Media Library](#tabel-spatie-media-library)
5. [Tabel Custom Business](#tabel-custom-business)
6. [Penempatan File di Laravel](#penempatan-file-di-laravel)
7. [Setup & Configuration](#setup--configuration)
8. [Best Practices](#best-practices)

---

## Overview Database

### Statistik Database
- **Total Tables:** 18 tabel
- **Total Users sample:** 3 users
- **Total Permissions:** 19 permissions
- **Total Roles:** 2 roles (admin, user)
- **Character Set:** utf8mb4 (Unicode support)
- **Engine:** InnoDB (Transaction support)

### Arsitektur Database

```
estimasi_digital/
├── Core Laravel Tables (5)
│   ├── users
│   ├── password_reset_tokens
│   ├── sessions
│   ├── failed_jobs
│   └── personal_access_tokens
│
├── Permission & Authorization (5)
│   ├── permissions
│   ├── roles
│   ├── model_has_permissions
│   ├── model_has_roles
│   └── role_has_permissions
│
├── File Management (1)
│   └── media
│
├── Content Management (4)
│   ├── buku_digital
│   ├── jurnal_digital
│   ├── kliping_digital
│   └── bahan_pustaka_digital
│
└── Audit & Protection (3)
    ├── access_log
    ├── modification_history
    └── file_protection_settings
```

---

## TABEL LARAVEL DEFAULT

### 1️⃣ USERS TABLE

**📋 Tujuan Utama:**
Menyimpan data pengguna yang terdaftar di sistem. Table ini adalah jantung dari authentication system dan menjadi reference key untuk semua aktivitas pengguna.

**📊 Struktur Table:**
```sql
CREATE TABLE users (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    email_verified_at TIMESTAMP NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    is_active BOOLEAN DEFAULT TRUE,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
)
```

**📝 Penjelasan Kolom:**

| Kolom | Tipe | Keterangan |
|-------|------|-----------|
| `id` | BIGINT UNSIGNED | Primary key, auto-increment, unique identifier untuk setiap user |
| `name` | VARCHAR(255) | Nama lengkap pengguna, tidak boleh kosong |
| `email` | VARCHAR(255) | Email unik untuk login, setiap user harus punya email berbeda |
| `email_verified_at` | TIMESTAMP | Tanggal verifikasi email, NULL jika belum verified |
| `role` | ENUM | Tipe role user: 'admin' (full access) atau 'user' (limited access) |
| `is_active` | BOOLEAN | Status user: TRUE (aktif) atau FALSE (non-aktif) |
| `password` | VARCHAR(255) | Password terenkripsi dengan bcrypt, panjang tetap 255 char |
| `remember_token` | VARCHAR(100) | Token untuk fitur "remember me" saat login |
| `created_at` | TIMESTAMP | Waktu pembuatan akun, otomatis terisi NOW() |
| `updated_at` | TIMESTAMP | Waktu update terakhir, otomatis update saat ada perubahan |

**🔑 Relationships:**
- Has many: `sessions`, `access_log`, `modification_history`, `personal_access_tokens`
- Has many through: `roles`, `permissions` (via Spatie)
- Polymorphic: `media` (via Spatie Media Library)

**📂 Penempatan di Aplikasi:**

**Model:** `app/Models/User.php`
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;

class User extends Model implements HasMedia
{
    use HasApiTokens, HasRoles;
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_active'
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    // Relasi ke sessions
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
    
    // Relasi ke access logs
    public function accessLogs()
    {
        return $this->hasMany(AccessLog::class);
    }
    
    // Relasi ke modification history
    public function modifications()
    {
        return $this->hasMany(ModificationHistory::class, 'modified_by');
    }
}
```

**Controller:** `app/Http/Controllers/Auth/`
- `RegisteredUserController.php` - Handle registrasi user baru
- `AuthenticatedSessionController.php` - Handle login/logout
- `PasswordResetLinkController.php` - Handle request reset password
- `NewPasswordController.php` - Handle reset password baru
- `EmailVerificationPromptController.php` - Handle verifikasi email

**Routes:** `routes/auth.php`
```php
Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->middleware('guest');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->middleware('guest');
```

**Middleware:** `app/Http/Middleware/Authenticate.php`
```php
// Check apakah user sudah login
// Redirect ke login jika belum
```

**🔐 Sample Data:**
```sql
INSERT INTO users (name, email, role, is_active, password, created_at, updated_at) VALUES
('Admin User', 'admin@estimasi.com', 'admin', TRUE, 
 '$2y$12$djY/J4nMhDFWF9D5c3JjKO.J6fkX8qX/Zl0k4l4l4l4l4l4l4l4l4', NOW(), NOW()),
('User One', 'user1@estimasi.com', 'user', TRUE, 
 '$2y$12$djY/J4nMhDFWF9D5c3JjKO.J6fkX8qX/Zl0k4l4l4l4l4l4l4l4l4', NOW(), NOW());
```

**📊 Queries Umum:**
```sql
-- Get user by email
SELECT * FROM users WHERE email = 'admin@estimasi.com';

-- Get all active admin users
SELECT * FROM users WHERE role = 'admin' AND is_active = TRUE;

-- Count total users
SELECT COUNT(*) as total FROM users;

-- Deactivate user
UPDATE users SET is_active = FALSE WHERE id = 2;

-- Get user dengan detail relasi
SELECT u.*, COUNT(DISTINCT al.id) as total_access
FROM users u
LEFT JOIN access_log al ON u.id = al.user_id
GROUP BY u.id;
```

**⚠️ Catatan Penting:**
- Email harus unik, tidak boleh ada duplikat
- Password selalu disimpan dalam bentuk hash (bcrypt)
- `role` di sini lebih sederhana, untuk kontrol granular gunakan Spatie Roles
- `is_active` berguna untuk suspend user tanpa menghapus data
- `email_verified_at` perlu di-set saat user verifikasi email via link

---

### 2️⃣ PASSWORD_RESET_TOKENS TABLE

**📋 Tujuan Utama:**
Menyimpan token temporary untuk fitur "lupa password". Setiap kali user request reset password, token unik dibuat dan disimpan di table ini dengan expiry time.

**📊 Struktur Table:**
```sql
CREATE TABLE password_reset_tokens (
    email VARCHAR(255) NOT NULL PRIMARY KEY,
    token VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL
)
```

**📝 Penjelasan Kolom:**

| Kolom | Tipe | Keterangan |
|-------|------|-----------|
| `email` | VARCHAR(255) | Email user yang request reset, menjadi primary key |
| `token` | VARCHAR(255) | Token unik yang dikirim via email, berbeda setiap kali request |
| `created_at` | TIMESTAMP | Waktu token dibuat, gunakan untuk check expiry (60 menit) |

**⏱️ Token Lifecycle:**
1. User klik "Lupa Password"
2. System cari user berdasarkan email
3. Generate token unik: `Str::random(64)`
4. Simpan ke table: `password_reset_tokens`
5. Kirim email dengan link: `/reset-password?token=...&email=...`
6. User klik link, akses halaman reset password
7. User submit password baru
8. System verify token & email masih valid (belum expired > 60 menit)
9. Update password di users table
10. Hapus token dari password_reset_tokens

**📂 Penempatan di Aplikasi:**

**Model:** `app/Models/PasswordReset.php` (optional, bisa langsung query table)
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $table = 'password_reset_tokens';
    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    
    protected $fillable = ['email', 'token'];
}
```

**Controller:** `app/Http/Controllers/Auth/PasswordResetLinkController.php`
```php
public function store(Request $request)
{
    $request->validate(['email' => 'required|email|exists:users']);
    
    $token = Str::random(64);
    
    // Simpan token
    DB::table('password_reset_tokens')->updateOrInsert(
        ['email' => $request->email],
        ['token' => Hash::make($token), 'created_at' => now()]
    );
    
    // Kirim email
    Mail::send('emails.password-reset', ['token' => $token], 
        function($message) use($request) {
            $message->to($request->email);
        }
    );
    
    return back()->with('status', 'Password reset link sent!');
}
```

**Controller:** `app/Http/Controllers/Auth/NewPasswordController.php`
```php
public function store(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email|exists:users',
        'password' => 'required|confirmed|min:8',
    ]);
    
    // Cari token
    $resetRecord = DB::table('password_reset_tokens')
        ->where('email', $request->email)
        ->first();
    
    if (!$resetRecord) {
        return back()->withErrors(['email' => 'Invalid token']);
    }
    
    // Verify token (dibuat <= 60 menit yang lalu)
    if (now()->diffInMinutes($resetRecord->created_at) > 60) {
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();
        return back()->withErrors(['token' => 'Token sudah expired']);
    }
    
    // Verify token value
    if (!Hash::check($request->token, $resetRecord->token)) {
        return back()->withErrors(['token' => 'Invalid token']);
    }
    
    // Update password
    $user = User::where('email', $request->email)->firstOrFail();
    $user->update(['password' => Hash::make($request->password)]);
    
    // Hapus token
    DB::table('password_reset_tokens')->where('email', $request->email)->delete();
    
    return redirect('/login')->with('status', 'Password has been reset');
}
```

**Routes:** `routes/auth.php`
```php
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.store');
```

**📧 Email View:** `resources/views/emails/password-reset.blade.php`
```blade
<h2>Reset Your Password</h2>

<p>Click the link below to reset your password:</p>

<a href="{{ route('password.reset', ['token' => $token, 'email' => $user->email]) }}">
    Reset Password
</a>

<p>This link expires in 60 minutes.</p>
```

**📊 Queries Umum:**
```sql
-- Cari token user
SELECT * FROM password_reset_tokens WHERE email = 'user@example.com';

-- Hapus token yang sudah expired (> 60 menit)
DELETE FROM password_reset_tokens 
WHERE TIMESTAMPDIFF(MINUTE, created_at, NOW()) > 60;

-- Count pending reset requests
SELECT COUNT(*) as pending FROM password_reset_tokens;

-- Cleanup task (jalankan via scheduler)
DELETE FROM password_reset_tokens 
WHERE created_at < DATE_SUB(NOW(), INTERVAL 24 HOUR);
```

**⚠️ Catatan Penting:**
- Token harus selalu di-hash sebelum disimpan
- Jangan simpan token plain text di database
- Set expiry time (biasanya 60 menit) di environment
- Implement rate limiting untuk prevent brute force
- Log setiap attempt reset password untuk security

---

### 3️⃣ SESSIONS TABLE

**📋 Tujuan Utama:**
Menyimpan data session pengguna yang sedang login. Setiap kali user login, session baru dibuat dan disimpan di table ini untuk tracking authentication state.

**📊 Struktur Table:**
```sql
CREATE TABLE sessions (
    id VARCHAR(255) NOT NULL PRIMARY KEY,
    user_id BIGINT UNSIGNED NULL,
    ip_address VARCHAR(45) NULL,
    user_agent LONGTEXT NULL,
    payload LONGTEXT NOT NULL,
    last_activity INT NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)
```

**📝 Penjelasan Kolom:**

| Kolom | Tipe | Keterangan |
|-------|------|-----------|
| `id` | VARCHAR(255) | Session ID unik, primary key, generate random string |
| `user_id` | BIGINT UNSIGNED | ID user yang login, nullable jika belum login atau guest session |
| `ip_address` | VARCHAR(45) | IP address user, support IPv4 (15 char) dan IPv6 (45 char) |
| `user_agent` | LONGTEXT | Info browser/device dari header User-Agent HTTP |
| `payload` | LONGTEXT | Data session terenkripsi, berisi array semua session data |
| `last_activity` | INT | Timestamp UNIX terakhir user melakukan activity, untuk track idle time |
| `created_at` | TIMESTAMP | Waktu session dibuat (saat user login) |
| `updated_at` | TIMESTAMP | Waktu session update terakhir |

**🔄 Session Lifecycle:**

1. **User Login:** Session baru dibuat dengan `session_id` unik
2. **Setiap Request:** `last_activity` di-update ke waktu request sekarang
3. **Session Data:** Disimpan terenkripsi di `payload` (format serialized PHP)
4. **Timeout:** Jika `last_activity` > 2 jam (config), session dianggap expired
5. **User Logout:** Session di-destroy dan dihapus dari table
6. **Garbage Collection:** Periodic cleanup untuk hapus session expired

**📂 Penempatan di Aplikasi:**

**Config:** `config/session.php`
```php
return [
    'driver' => env('SESSION_DRIVER', 'database'),
    'lifetime' => env('SESSION_LIFETIME', 120), // menit
    'expire_on_close' => false,
    'encrypt' => true,
    'table' => 'sessions',
    'store' => null,
    'lottery' => [2, 100], // Garbage collection probability
];
```

**Middleware:** `app/Http/Middleware/StartSession.php` (auto-generated)
- Menjalankan setiap kali request masuk
- Cek apakah ada cookie session_id
- Load session data dari database
- Decrypt payload
- Inject ke `$request->session()`

**Middleware:** `app/Http/Middleware/EncryptCookies.php` (auto-generated)
```php
public function handle($request, $next)
{
    // Encrypt sensitive cookies termasuk LARAVEL_SESSION
    return $next($request);
}
```

**Usage di Controller:**
```php
namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Get session data
        $user = auth()->user(); // Dari session
        
        // Store ke session
        $request->session()->put('notifications', 5);
        
        // Get dari session
        $notifications = $request->session()->get('notifications');
        
        // Check if key exists
        if ($request->session()->has('notifications')) {
            // ...
        }
        
        // Delete dari session
        $request->session()->forget('notifications');
        
        // Push ke array session
        $request->session()->push('breadcrumb', ['name' => 'Dashboard']);
    }
}
```

**Usage di Blade:**
```blade
<!-- Get session data -->
<p>{{ session('notifications') }}</p>

<!-- Flash message -->
@if ($message = session('status'))
    <div class="alert alert-success">{{ $message }}</div>
@endif
```

**Job untuk Cleanup Session:**
```php
// app/Console/Kernel.php
protected function schedule(Schedule $schedule)
{
    // Run every hour
    $schedule->command('session:gc')->hourly();
}

// app/Console/Commands/SessionGarbageCollection.php
public function handle()
{
    $expiration = now()->subMinutes(config('session.lifetime'));
    
    DB::table('sessions')
        ->where('last_activity', '<', $expiration->getTimestamp())
        ->delete();
}
```

**📊 Queries Umum:**
```sql
-- Get active sessions
SELECT * FROM sessions WHERE user_id IS NOT NULL;

-- Get sessions for specific user
SELECT * FROM sessions WHERE user_id = 1;

-- Get sessions from specific IP
SELECT * FROM sessions WHERE ip_address = '192.168.1.1';

-- Count active sessions
SELECT COUNT(*) as active_sessions FROM sessions 
WHERE user_id IS NOT NULL;

-- Find idle sessions (> 2 hours)
SELECT * FROM sessions 
WHERE (UNIX_TIMESTAMP() - last_activity) > 7200;

-- Delete expired sessions
DELETE FROM sessions 
WHERE (UNIX_TIMESTAMP() - last_activity) > 7200;

-- Track session by user
SELECT u.name, COUNT(s.id) as sessions, 
       MAX(s.last_activity) as last_activity
FROM users u
LEFT JOIN sessions s ON u.id = s.user_id
GROUP BY u.id;
```

**🔒 Security Best Practices:**
- Session data terenkripsi di database, aman dari unauthorized access
- Session ID di-store di secure cookie dengan flag HttpOnly
- Implement session fixation protection (regenerate ID saat login)
- Monitor untuk multiple concurrent sessions per user
- Log suspicious session activity

**⚠️ Catatan Penting:**
- Table ini akan sangat besar dalam waktu lama, perlu regular cleanup
- `last_activity` digunakan untuk auto-logout inactive users
- Payload berisi serialized PHP, jangan manually edit
- Garbage collection otomatis tapi bisa di-trigger manual via command
- Session.gc_maxlifetime di php.ini harus >= SESSION_LIFETIME di Laravel

---

### 4️⃣ FAILED_JOBS TABLE

**📋 Tujuan Utama:**
Mencatat semua job/task yang gagal dieksekusi dalam job queue system. Berguna untuk debugging, retry, dan monitoring system.

**📊 Struktur Table:**
```sql
CREATE TABLE failed_jobs (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    uuid VARCHAR(255) NOT NULL UNIQUE,
    connection TEXT NOT NULL,
    queue TEXT NOT NULL,
    payload LONGTEXT NOT NULL,
    exception LONGTEXT NOT NULL,
    failed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)
```

**📝 Penjelasan Kolom:**

| Kolom | Tipe | Keterangan |
|-------|------|-----------|
| `id` | BIGINT UNSIGNED | Auto-increment ID, primary key |
| `uuid` | VARCHAR(255) | Unique identifier untuk job, format UUID v4 |
| `connection` | TEXT | Nama connection queue yang digunakan (sync, database, redis, etc) |
| `queue` | TEXT | Nama queue (default, high-priority, emails, etc) |
| `payload` | LONGTEXT | Serialized job data, termasuk class name dan parameter |
| `exception` | LONGTEXT | Stack trace lengkap dari exception yang terjadi |
| `failed_at` | TIMESTAMP | Waktu job gagal, auto default CURRENT_TIMESTAMP |

**📂 Penempatan di Aplikasi:**

**Config:** `config/queue.php`
```php
return [
    'default' => env('QUEUE_CONNECTION', 'sync'),
    'connections' => [
        'sync' => [
            'driver' => 'sync',
        ],
        'database' => [
            'driver' => 'database',
            'table' => 'jobs',
            'queue' => 'default',
            'retry_after' => 90,
            'after_commit' => false,
        ],
        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
            'queue' => env('REDIS_QUEUE', 'default'),
            'retry_after' => 90,
            'block_for' => null,
            'after_commit' => false,
        ],
    ],
    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database'),
        'database' => env('DB_CONNECTION', 'mysql'),
        'table' => 'failed_jobs',
    ],
];
```

**Job Class Example:** `app/Jobs/ProcessExportBuku.php`
```php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessExportBuku implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    protected $bukuId;
    
    public function __construct($bukuId)
    {
        $this->bukuId = $bukuId;
    }
    
    public function handle()
    {
        $buku = BukuDigital::find($this->bukuId);
        
        if (!$buku) {
            throw new \Exception("Buku not found");
        }
        
        // Process export...
    }
    
    public function failed(\Exception $exception)
    {
        // Handle failure
        Log::error('Export failed: ' . $exception->getMessage());
    }
    
    public function retryUntil()
    {
        // Retry sampai 24 jam
        return now()->addDay();
    }
}
```

**Dispatch Job:**
```php
// Di controller atau command
ProcessExportBuku::dispatch($bukuId);

// Atau dengan delay
ProcessExportBuku::dispatch($bukuId)
    ->delay(now()->addMinutes(5));

// Atau ke queue spesifik
ProcessExportBuku::dispatch($bukuId)
    ->onQueue('exports');
```

**Artisan Commands:**
```bash
# List semua failed jobs
php artisan queue:failed

# Retry specific failed job
php artisan queue:retry <job_id>

# Retry semua failed jobs
php artisan queue:retry all

# Forget/delete specific failed job
php artisan queue:forget <job_id>

# Delete semua failed jobs
php artisan queue:flush

# Monitor queue (real-time)
php artisan queue:monitor

# Work queue (process jobs)
php artisan queue:work --tries=3 --timeout=90
```

**📊 Queries Umum:**
```sql
-- Get all failed jobs
SELECT * FROM failed_jobs;

-- Get failed jobs dari queue tertentu
SELECT * FROM failed_jobs WHERE queue = 'exports';

-- Count failed jobs by connection
SELECT connection, COUNT(*) as failed_count 
FROM failed_jobs 
GROUP BY connection;

-- Get failed jobs dari last 24 hours
SELECT * FROM failed_jobs 
WHERE failed_at > DATE_SUB(NOW(), INTERVAL 24 HOUR);

-- Find pattern dalam exception
SELECT id, exception, failed_at FROM failed_jobs 
WHERE exception LIKE '%timeout%';

-- Cleanup old failed jobs (> 30 days)
DELETE FROM failed_jobs 
WHERE failed_at < DATE_SUB(NOW(), INTERVAL 30 DAY);
```

**📊 Monitoring Dashboard Logic:**
```php
namespace App\Http\Controllers\Admin;

class QueueController extends Controller
{
    public function failedJobs()
    {
        $failedJobs = DB::table('failed_jobs')
            ->orderByDesc('failed_at')
            ->paginate(15);
        
        $stats = [
            'total_failed' => DB::table('failed_jobs')->count(),
            'today_failed' => DB::table('failed_jobs')
                ->whereDate('failed_at', today())
                ->count(),
            'by_connection' => DB::table('failed_jobs')
                ->groupBy('connection')
                ->selectRaw('connection, COUNT(*) as count')
                ->get(),
        ];
        
        return view('admin.queue.failed', compact('failedJobs', 'stats'));
    }
    
    public function retryJob($id)
    {
        Artisan::call('queue:retry', ['id' => $id]);
        
        return back()->with('success', 'Job retried');
    }
}
```

**🔍 Debugging Failed Jobs:**
```php
// View detail failure
$failedJob = DB::table('failed_jobs')->find(1);

// Payload decode
$payload = json_decode($failedJob->payload);

// Exception backtrace
echo $failedJob->exception;

// Log untuk analysis
Log::channel('queue-errors')->error($failedJob->exception);
```

**⚠️ Catatan Penting:**
- Failed jobs harus di-monitor dan di-clean secara regular
- Implement alerting untuk critical queue failures
- Set retry attempts & timeout dengan reasonable values
- Log detailed exception trace untuk debugging
- Buat monitoring dashboard untuk visibility

---

### 5️⃣ PERSONAL_ACCESS_TOKENS TABLE

**📋 Tujuan Utama:**
Menyimpan token API untuk REST API authentication via Laravel Sanctum. Berguna untuk mobile apps, third-party integrations, atau client applications yang perlu akses API.

**📊 Struktur Table:**
```sql
CREATE TABLE personal_access_tokens (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tokenable_type VARCHAR(255) NOT NULL,
    tokenable_id BIGINT UNSIGNED NOT NULL,
    name VARCHAR(255) NOT NULL,
    token VARCHAR(64) NOT NULL UNIQUE,
    abilities LONGTEXT NULL,
    last_used_at TIMESTAMP NULL,
    expires_at TIMESTAMP NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    INDEX idx_tokenable (tokenable_type, tokenable_id)
)
```

**📝 Penjelasan Kolom:**

| Kolom | Tipe | Keterangan |
|-------|------|-----------|
| `id` | BIGINT UNSIGNED | Primary key, auto-increment |
| `tokenable_type` | VARCHAR(255) | Model class name yang punya token, biasanya 'App\\Models\\User' |
| `tokenable_id` | BIGINT UNSIGNED | ID dari user yang punya token |
| `name` | VARCHAR(255) | Nama readable token (misal: "Mobile App Token", "Third Party API") |
| `token` | VARCHAR(64) | Token terenkripsi unik, berbeda setiap token |
| `abilities` | LONGTEXT | JSON array of permissions/abilities, misal: ["read", "write"] |
| `last_used_at` | TIMESTAMP | Waktu token terakhir digunakan, NULL jika belum pernah |
| `expires_at` | TIMESTAMP | Waktu token expire, NULL jika tidak ada expiry |
| `created_at` | TIMESTAMP | Waktu token dibuat |
| `updated_at` | TIMESTAMP | Waktu token update terakhir |

**📂 Penempatan di Aplikasi:**

**Config:** `config/sanctum.php`
```php
return [
    'stateful' => explode(',', env('SANCTUM_STATEFUL_DOMAINS', 'localhost,localhost:3000')),
    'guard' => ['web'],
    'middleware' => [
        'verify_csrf_token' => \App\Http\Middleware\VerifyCsrfToken::class,
        'encrypt_cookies' => \App\Http\Middleware\EncryptCookies::class,
    ],
];
```

**Model:** `app/Models/User.php`
```php
namespace App\Models;

use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasApiTokens;
    
    // Generate API token
    public function createToken($name, array $abilities = ['*'])
    {
        return $this->tokens()->create([
            'name' => $name,
            'token' => hash('sha256', $plainTextToken = Str::random(40)),
            'abilities' => $abilities,
        ]);
    }
}
```

**Route:** `routes/api.php`
```php
Route::middleware('auth:sanctum')->get('/user', function (