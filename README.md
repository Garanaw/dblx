<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About DBLX Proof of concept

This is a very basic application to add and search content. Sadly, that content cannot be deleted or modified yet.

### System Requirements

To run this application, you need:

- PHP 7.4
- Apache/NginX
- Composer
- Node
- A database system (usually, MySql).

### Installation

To install the package, you can either copy the `.env.example` file and rename it to `.env` or run the `install.sh` script in a Unix machine. This script will detect the absence of the file and will copy it for you. Then, you need to configure your database credentials and create the database to be used.

When this is done, you will need to run again the `install.sh` script, and it will take care of everything for you:

- **Composer**: it will run `composer install` to download your vendor folder, and will auto discover the installed packages
- **Node**: it will also run `npm install` and `npm run prod` to compile the assets
- **Migrations**: last but not least, it will run `php artisan migrate --step` to generate the tables in your database. There is no need to seed them, because the migration system will detect the linked seeders for each migration and run them for you

### Start using the application

To log in to the application, you can go to http://your-domain.com/login (usually localhost), and enter the following credentials:

- Email: `test@test.com`
- Password: `password`

You will be logged in with a basic user and will be ready to start creating content.

### How it works

First of all, you will need to go to Create Content (link in the dashboard, left side) and add a few posts. They will require to have a Title, a Description and the actual Content of the post. Optionally you can add images or videos, by either uploading them or passing a URL.

Once you have some content in your database, you can go to See My Content to list all the content created by you.

The main requirement was to be able to Search Content. The search form will be present everywhere in the application, beside the title of the page. It allows to search content by the passed in term (string). It will find the pieces of content containing that term in the Title, Description or Content, and will list it for you.

### Decisions made

To attach media to the pieces of content, [Spatie laravel-medialibrary](https://github.com/spatie/laravel-medialibrary) has been used. This is becuase:

- It is already made and working, and would save a lot of time.
- It handles different types of media files from different sources, stores them in different `Disk`s, and attaches them to any existing model (which allows to extend the functionality by adding, for example, avatars for users).
- It has been tested

To add a bit of extra security, the IDs are encoded with [Jensegger's Optimus Prime ID Transformer](https://github.com/jenssegers/optimus). This is because:

- It transforms the IDs in the database to show them in the frontend with fewer chances of having users discovering the real IDs in the database.
- It uses different numbers in different environments, so it can be used in production with a different configuration than development environments
- To add the ability to inject Models into routes, the Eloquent's method `resolveRouteBinding` has to be overridden to detect the encoded ID and change it back, which is a good exercise to understand how Eloquent works and how Laravel's Router injects Models into routes.

## The architecture

The system is built in a 3 layers' architecture. The layers are:

- **Http**: handles the requests and responses, and nothing else
- **Domain**: does all the business logic (not much in the system so far)
- **Data**: Takes care of reading and writing data

This architecture gives the flexibility to change the framework (not likely to happen anyways) by keeping the business logic untouched. It also allows to modify the data sources without having to modify how the HTTP layer works, or how the Domain layer handles the logic.

### The saving pipeline

The "Saving Pipeline" is a "pattern" (not a real pattern as far as I know, but let's call it so) that I have used to keep my repositories dry, and separate each database's write action in its own class (SRP). I find it specially useful when there are different tables to be modified, which usually requires a database's transaction.

### Data Transfer Objects

To keep the Domain and Data layers free from Request's contamination, a dedicated data transfer object exists for the Content Creation. It contains all the necessary data to save the piece of content with the optional media, and link it to the user that creates it.

## The Query Builders

The Content Model has its own query builder to extend the functionality and encapsulate the dedicated queries (like "search").

Also, Eloquent's query builder has been extended to add some missing methods ("LIKE" and "OR LIKE").

### The Migration system

Laravel throws an event when a table is migrated. This system takes advantage of that event, listens to it and reads the migration to find any potential seeder to be run. This way, any necessary data can be seeded to the database when the holder table is ready.

### The frontend

Although I'm more used to Bootstrap, This time I have decided to give Tailwind a try, as it comes by default with the latest versions of Laravel.

I find it more flexible, however it makes the code uglier due to the exaggerated number of classes required to do a simple design.

As for the javascript part, I have decided to use vanilla javascript, because the required scripts are minimum (only one to add media items).

# Caveats!

### Spatie Media Library

The way that Spatie's Media Library works is by generating absolute URLs to the media files. It can happen that, when you link a media item to a piece of content, it won't show up in the frontend. To ensure that all media items can be reached, you will need to ensure that your env variable "APP_URL" is set to the virtual host that you are using to see the application. Example:

Apache's virtual host
```xml
<VirtualHost *:80>
    #ServerName www.example.com

    ServerAdmin webmaster@localhost
    ServerName dblx.test
    ServerAlias www.dblx.test
    DocumentRoot /var/www/dblx/public

    &lt;Directory /var/www/dblx/&gt;
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Order allow,deny
        allow from all
        Require all granted
    </Directory>

	ErrorLog ${APACHE_LOG_DIR}/error.log
	CustomLog ${APACHE_LOG_DIR}/access.log combined

</VirtualHost>
```
Then, you need to set your `APP_URL` variable to `dblx.test`.

### Optimus Prime

The numbers for Optimus Prime are hardcoded in the configuration. This is because, for this proof of concept, they are not likely to change. However, in a real application, these numbers should go to the `.env` file.
