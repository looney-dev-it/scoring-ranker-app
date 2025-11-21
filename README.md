# scoring-ranker-app

-   How to install
    -   git clone <repo_name>
    -   Edit your own .env file => SMTP Server + Database
    -   Edit config/custom.php => Email addresses configuration
    -   composer setup
    -   php artisan migrate:fresh --seed

# config/custom.php

<?php

return [
    'admin_email' => ''no-reply-scoring-ranker@gmail.com',
    'from_email' => 'no-reply-scoring-ranker@gmail.com',
];


# .env file
Example for Gmail 
AIL_MAILER=smtp
MAIL_SCHEME=null
MAIL_HOST="smtp.gmail.com"
MAIL_PORT=465
MAIL_USERNAME="<your own email>@gmail.com"
MAIL_PASSWORD="<your own app key>"
MAIL_FROM_ADDRESS="<your own email>@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"
