## Substantive

This application calls an API endpoint containing interactions between clients and research analysts, it has different sectors. It calculates the percentage of interactions of clients with these sectors and can also perform a search to see the result of a particular sector. It is designed with Laravel and Tailwind CSS

Built with Laravel

## Prerequisite

1. Composer
2. Laravel
3. Apache Server

### To Start

1. Clone or download
2. Run `composer update`
3. Run `cp .env.example .env` very important for some package dependencies!
4. Run `php artisan key:generate`
5. Set up database and add credentials to the .env file created in '3' above.
6. Run `php artisan config:cache` so as to sync with the edited environment variables
7. Run `php artisan migrate:fresh` to migrate the database
8. Run `npm install`
9. Run `npm run build`
10. Run `npm run dev`
11. Run `php artisan serve`
12. Hit the URL returned in '8' above in your web browser. Voila!

### Approach I used

- Install the laravel package
- Since it is a lightweight website, use tailwind CDN instead of installing the entire Tailwind package
- Implement the routes,
- Create the client controller
- Designed the html page and tables
- Call the api endpoint from the controller and calculate the percentage of interaction
- Implement the search

### Future Plan

- Create a CRUD: 
- Add a new entry, i.e, date, name, sector_id
- Add a new Client entire,
- Sort base on clients

PS: Again, item '3' above is very important due to some package dependency constraints.

### Who to talk to

Samuel Oluyede [email](mailto:masei25@gmail.com)

### Contribution

1. Fork this repository
2. Implement your feature
3. Create pull request
4. Add people as reviewer.
5. Cheers!

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
