````markdown
# 📊 Scoring Ranker App

A Laravel application to manage and rank scores with custom configuration (emails, topics, etc.).

---

## 🚀 Installation

1. **Clone the repository**
    ```bash
    git clone <repo_name>
    cd scoring-ranker-app
    ```
````

2. **Set up environment**

    - Create your `.env` file (see example below).
    - Configure your database and SMTP server.

3. **Configure emails**

    - Edit `config/custom.php` to set email addresses.

4. **Install dependencies**

    ```bash
    composer install
    ```

5. **Initialize the database**
    ```bash
    php artisan migrate:fresh --seed
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
