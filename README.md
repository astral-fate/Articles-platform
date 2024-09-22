**Project Description:**

This project involves developing a website for articles covering various topics, such as marketing, computer science, and more.

**Requirements:**

You are required to implement all pages in the `admin` folder, with the following exceptions:

- In `topics.html`, the column displaying the number of views is not required.
- For `login.html` and `register.html`, you may choose to use the provided files or use the implementation provided by `laravel/ui`.
- In `messages.html`, if you are unable to separate read and unread messages into distinct sections, you may combine them into a single table.

You are also required to implement all pages in the `public` folder, with the following exceptions:

- In `topic-listing.html`, pagination for popular topics is optional. Additionally, if you do not implement the number of views in `topics.html`, you only need to display the latest three topics in the popular topics section.
- In `index.html`, in browse topics you must display only three articles at most in each category
- In `index.html`, in what our clients says, display only 3 testimonials
- In `testimonials.html`, display all published testimonials
- In `topic-details.html`, 'web Design' will be replaced by category of topic, 'introduction to web design 101' is replaced by topic name, the save icon is used to increase the number of views "save icon is optional"	


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
 mkdir -p app/Mail
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


project24/
├── views/
│   ├── email/
│   │   └── contact-form.blade.php


├── Https/controllers/
│   └── Mail/
│       └── ContactFormMailable.php

```

# Run the serves


php artisan serve

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



![image](https://github.com/user-attachments/assets/e7d40669-cfb7-4f32-83ad-6b76d65d3358)

php artisan make:class ContactFormMailable
```
# Update db
php artisan migrate

