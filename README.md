# School Management Application (Laravel)

## Installation Steps

### 1. Clone the repository
```bash
git clone https://github.com/SiddharthRathod/school-management.git
cd school-management
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Setup
1. Copy `.env.example` to `.env`:
   ```bash
   cp .env.example .env
   ```

2. Generate application key:
   ```bash
   php artisan key:generate
   ```

3. Update `.env` with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```

### 4. Run Migrations and Seeders
```bash
php artisan migrate --seed
```

### 5. Email Configuration
Update these settings in your `.env` for email functionality:
```env
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1  # or your SMTP server
MAIL_PORT=2525              # or your SMTP port
MAIL_USERNAME=your_mail_username
MAIL_PASSWORD=your_mail_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME="${APP_NAME}"
```

### 6. Queue Configuration
1. Set up your queue connection in `.env`:
   ```env
   QUEUE_CONNECTION=database
   ```

2. Create the jobs table:
   ```bash
   php artisan queue:table
   php artisan migrate
   ```

3. Start the queue worker in a separate terminal:
   ```bash
   php artisan queue:work
   ```

   For production with process monitoring, consider using Supervisor:
   ```ini
   [program:laravel-worker]
   process_name=%(program_name)s_%(process_num)02d
   command=php /path/to/your/school-management/artisan queue:work --sleep=3 --tries=3
   autostart=true
   autorestart=true
   user=www-data
   numprocs=2
   redirect_stderr=true
   stdout_logfile=/path/to/your/school-management/storage/logs/worker.log
   ```

### 7. Compile Assets
For development:
```bash
npm run dev
```

### 8. Start the Development Server
```bash
php artisan serve
```

## Default Credentials

### Admin
- Email: admin@mailinator.com
- Password: 123456789

### Teacher
- Email: teacher@mailinator.com
- Password: 123456789

## Troubleshooting

### Queue Worker Not Running
- Ensure the queue worker is running: `php artisan queue:work`
- Check failed jobs: `php artisan queue:failed`
- Retry failed jobs: `php artisan queue:retry all`

### Email Not Sending
1. Verify your SMTP credentials
2. Check your spam folder
3. Check Laravel logs: `storage/logs/laravel.log`
4. For local development, use Mailtrap or MailHog

### Storage Link Issues
If images or files aren't loading:
```bash
php artisan storage:link
```

## Contributing
Please feel free to submit issues and enhancement requests.
