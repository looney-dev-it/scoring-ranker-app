# 📊 Scoring Ranker App

## 📖 Project Description

Scoring Ranker App is a **fully configurable scoring application** that allows you to define your own categories and enable users to add scores while tracking their progress in the rankings.

In addition, the application includes a **built‑in Forum** that is automatically created for each category, fostering interaction and discussion among users.

The system is **securely developed on the Laravel framework**, ensuring reliability, scalability, and modern best practices.

This project was created as part of the **Backend Web Development course at EHB**.

---

## 🚀 Installation

1. **Clone the repository**

    ```bash
    git clone <repo_name>
    cd scoring-ranker-app
    ```

2. **Set up environment**

    - Edit your `.env` file (see example below for email configuration).
    - Configure your database and SMTP server.

3. **Configure emails**

    - Edit `config/custom.php` to set email addresses.

4. **Install dependencies**

    ```bash
    composer setup
    ```

5. **Initialize the database**

    ```bash
    php artisan migrate:fresh --seed
    ```

6. **Run your development environment**

    ```bash
    composer remote dev
    ```

7. **For production environment**
    ### Please refer to laravel documentation : https://laravel.com/docs/12.x/deployment
    ```bash
    composer setup --optimize-autoloader --no-dev
    npm run build
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    php artisan event:cache
    php artisan migrate --force
    ```

---

## ⚙️ Configuration

### `config/custom.php`

```php
<?php

return [
    'admin_email' => 'no-reply-scoring-ranker@gmail.com',
    'from_email'  => 'no-reply-scoring-ranker@gmail.com',
];
```

---

### `.env` (example with Gmail)

```env
MAIL_MAILER=smtp
MAIL_SCHEME=null
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=<your own email>@gmail.com
MAIL_PASSWORD=<your own app key>
MAIL_FROM_ADDRESS=<your own email>@gmail.com
MAIL_FROM_NAME=${APP_NAME}
```

---

## 📌 Notes

-   For Gmail, make sure to generate an **App Password** if you use two‑factor authentication.
-   Ensure your database is created before running `php artisan migrate`.

---

## 🛠️ Technologies Used

-   [Laravel](https://laravel.com/)
-   [Composer](https://getcomposer.org/)
-   [Livewire](https://livewire.laravel.com/)
