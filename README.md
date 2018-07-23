# FlatRock-RealEstateApp

Real Estate practise task with Laravel & Vue


<b>TODO</b> : 

<li>Finish integrating Vue</li>
<li> Add emailing </li>
<li> some other stuff...? </li>

<hr>

To run locally: 

<ol>

<li>First download or clone this repo </li>

  <code>
    git clone  https://github.com/scyhhe/FlatRock-RealEstateApp.git
  </code>

<li> Then cd to the folder & run composer install to install composer dependencies</li>

  <code>
    composer install
  </code>

<li>Copy .env.example to .env</li>

  <code>
    cp .env.example .env
  </code>
 
<li> Replace DB_* values in .env file to your preferences </li>

<li> Generate the application key via artisan </li>
  <code>
    php artisan key:generate
  </code>
  
<li> Run migrations </li>

  <code>
    php artisan migrate
  </code>

<li> Install Node modules </li>
  
  <code>
    npm install
  </code>
  
<li> Build </li>

  <code>
    npm run dev
  </code>
 
  
<li>OR, to recompile automatically on each save : </li>

  <code>
    npm run watch
  </code>
  


