# FlatRock-RealEstateApp

Real Estate practise task with Laravel & Vue


<b>TODO</b> : 

<li>Finish integrating Vue</li>
<li> Add emailing </li>
<li> some other stuff...? </li>

<hr>

To run locally: 

<h3>First download or clone this repo </h3>

  <code>
    git clone  https://github.com/scyhhe/FlatRock-RealEstateApp.git
  </code>

<h3> Then cd to the folder & run composer install to install composer dependencies<h3>

  <code>
    composer install
  </code>

<h3>Copy .env.example to .env<h3>

  <code>
    cp .env.example .env
  </code>
 
<h3> Replace DB_* values in .env file to your preferences </h3>

<h3> Generate the application key via artisan </h3>
  <code>
    php artisan key:generate
  </code>
  
<h3> Run migrations </h3>

  <code>
    php artisan migrate
  </code>

<h3> Install Node modules </h3>
  
  <code>
    npm install
  </code>
  
<h3> Build <h3>

  <code>
    npm run dev
  </code>
  
OR, to recompile automatically on each save :

  <code>
    npm run watch
  </code>
  


