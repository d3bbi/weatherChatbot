<?php 

//function to check if value is a date

$processString = function ($getAnswerExpected, $getMsg, $getCities){
        if ($getAnswerExpected == "date"){
            // Check if check $getMsg contains a date and return just the date part of the string 
        }
        else if($getAnswerExpected === "country"){
            //Check if a country value exists in the $getMsg string return just the country
        }
        else if($getAnswerExpected === "city"){
            // explode the $getCities string into an array and check does any word in the $getMsg string match a city a city in array.
            // If match found, return just the city
        }
};