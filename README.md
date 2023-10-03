## About the app

Technolgies that being used to develop this app was Laravel 10, Livewire, MySQL DB. Multiple roles based access control were added.

- `composer install`
- `php artisan migrate`
- `php artisan db:seed`
- `npm run dev`
- `php artisan serve`

Please check seeders for login credentials. Default password is `password`

# Assigned Roles for users
- staff admin (role id 1)
- staff editor (role id 2)
- staff viewer (role id 3)
- reader (role 4) (assumed readers aren't needed to login to view brrowed history)

