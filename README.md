<div align="center">
<img src="https://gitlab.griffith.ie/Davidor/chatbot-weather-api/-/raw/master/images/headerBot.png">
<br/>
<h1>Weather Chatbot Version 1.0</h1>
<h3>A chatbot that will help you choose the best clothes for your trip!</h3>
<p align="center">
  <a href="#about">About</a> •
  <a href="#somposer">Composer</a> •
  <a href="#installation">Installation</a> •
  <a href="#developer-guide">Developer Guide</a> •
  <a href="#contribution">Contribution</a> •
  <a href="#testing">Testing</a> •
</p>
<br>
<h3> :computer: Developed by: The PHP Three. </h3>
</div>


## About
The Weather Chatbot is a chatbot that will help the user to plan the clothing requirement for his/her trip by reviewing the weather for each location and suggest appropriate clothing.
The Web interface is divided into two main columns. On the left-hand side we have the chatbot where the user can interact and enter the details of the trip.
<div align="center">
<img src="https://gitlab.griffith.ie/Davidor/chatbot-weather-api/-/raw/master/images/interface1.png">
</div>

On the right-hand side will be displayed the suggestion of clothes that the user could pack for the trip.
<div align="center">
<img src="https://gitlab.griffith.ie/Davidor/chatbot-weather-api/-/raw/master/images/interface2.png">
</div>


## Composer

This project uses composer to declare the libraries the project depends on. These are stated in the composer.json file.

```javascript
{
    "name": "college/weatherbot",
    "description": "weatherbot",
    "type": "project",
    "require": {
        "phpunit/phpunit": ">=1.0"
    },
    "minimum-stability": "dev",
	   "autoload": {
       "classmap": [
           "src/"
       ]
   }
}
```

## Installation

All files in the git directory should be copied to the htdocs folder or subfolder on the webserver or within xampp.

The chatbot can then be accessed using the root url and index.php

XAMPP Example url
https://localhost/index.php


## Developer Guide

Structure of the project: 

:page_facing_up: **index.php:** Contains the HTML that structure the interface and AJAX queries<br/><br/>
:page_facing_up: **message.php:** The main response logic for the bot.<br/><br/>
:page_facing_up: **script.js:** javascript file which controls the voice integration<br/><br/>
:page_facing_up: **style.css:** applies style to the interface.<br/><br/>
:page_facing_up: **functionsTest.php:** test case using php unit.<br/><br/>
:page_facing_up: **Composer.json:** Autoloads php libraries<br/><br/>
:file_folder: **Images:** Contains images used by the bot to display which clothes should be packed.<br/><br/>
:file_folder: **Vendor:** PHP libraries used by composer<br/><br/>
:file_folder: **functions:** Folder contains main bot functions:
- :page_facing_up: **functionProcessDate**: function that validate and process the date entered by the user<br/><br/>
- :page_facing_up: **functionProcessCountry**: function that validate the country using the City API and returns it<br/><br/>
 - :page_facing_up: **functionProcessCity**: function that validate the city using the City API and returns it<br/><br/>
 - :page_facing_up: **functionProcessWeather**: function that retrieve the weather conditions from the OpenWeather API<br/><br/>
 - :page_facing_up: **functionWeatherMatrix**: function that choose the best clothes depending on the weather conditions<br/><br/>


## Contribution
The project was developed by:<br/>

**{+ Cian Scarborough +}** - Student number 3000011<br/>
**{+ David O'Reilly +}** - Student number 3018591<br/>
**{+ Deborah Rimei +}** - Student number 3015579<br/>



## Testing 

To execute the test cases for this project:
1. Open command prompt
2. Change directory to the directory that contains the project.
3. Use the command vendor\bin\phpunit functionsTest.php

All of our test cases will then be executed.

## User instructions

Simply start answering the questions the bot asks and you will get the answers you need.

## Project documentation
You can see our working documentation [here](https://docs.google.com/document/d/1i1-oTLxIDAYIC_Fa_N_PRxnnJ2b6ZOjK/)
