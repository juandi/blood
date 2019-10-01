## About TechTest

- The objective has been to reproduce the problem raised for the techpump technical test.
- The idea has been to cache the call of the list to avoid calls to that json in a constant way, and that this cache lasts the 15 minutes that takes in renewing itself.
- From there, the laravel itself (and synfony also) caches the views, so it is not necessary to cache that.
- The slug of the page determines the style that we load according to the affiliate that is.

## Installing

Clone the repository, create a DB 'techpump' and run the migrations and the seeders

## Tips

The application has been tested in a laravel.local domain

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
