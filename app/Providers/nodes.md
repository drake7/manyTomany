1.  Add module for authentication

    composer require laravel/ui

2. Install module

    composer install

3. Add scaffolding for ui

    php artisan ui bootstrap --auth


4.  Install dependencies in package.json

    npm install

5. Build views with vite for static consumption

    npm run build

6. Modify our AuthService file set the directory to `/`

7. Comment out routes for web.php

If you want to see the routes that are part of your app

    php artisan route:list