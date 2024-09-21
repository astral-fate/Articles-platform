# Articles-platform


## Create a new Laravle project

laravel new project 


# Set up the env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

```
composer require laravel/ui <br>
 php artisan ui bootstrap --auth <br>
 composer require laravel/sanctum <br>
# Set up the dir

```
project24/
├── public/
│   ├── css/
│   │   └── style.css
│   ├── js/
│   └── images/
├── resources/
│   └── views/
│       └── public/
│           ├── 404.html
│           ├── contact.html
│           ├── index.html
│           └── ...
└── 
```

# Run the serves




# Create the databses

```

php artisan make:migration create_users_table
php artisan make:migration create_categories_table
php artisan make:migration create_topics_table
php artisan make:migration create_testimonials_table
php artisan make:migration create_messages_table
```

# Create the models

```
php artisan make:model User
php artisan make:model Message
php artisan make:model Testimonial
php artisan make:model Topic
php artisan make:model Category
```


# Create the controllers
```

php artisan make:controller UserController
php artisan make:controller MessageController
php artisan make:controller TestimonialController
php artisan make:controller TopicController
php artisan make:controller CategoryController
```



# Create the classes 

```
php artisan make:class Car
```
# Update db
php artisan migrate

