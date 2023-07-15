# Food management at home.

An application related to the use of products that we have at home to prepare ready meals, or to check what else we need.
<br />
Live Demo here: [website]

## Environment

To run this project, you will need to add the following environment

`node v18.16.0`

`composer 2.5.5`

`PHP v8.2.4`

`Laravel v10.13.1`

i have also (optional)

`xampp v3.3.0`

`git 2.40.0`

## Deployment

To deploy this project run

```bash
  git clone https://github.com/Exaliar/MakeMeal.git
  npm install
  composer update
  copy and paste .env.example and change name on .env (set up database)
  php artisan key:generate
  php artisan migrate --seed
  php artisan storage:link
  npm run dev
  php artisan serve
```

[website]: http://exaliar.webd.pro/make-meal
