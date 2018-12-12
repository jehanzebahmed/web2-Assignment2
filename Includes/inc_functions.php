<?php
function checkNull($string){
        if($string != null){
        return $string;
        }
        else return '';
    }

function cleanText($string){
        $string = str_replace(' ', '', $string);  //https://stackoverflow.com/questions/1703320/remove-excess-whitespace-from-within-a-string/17181283
        $string = filter_var($string, FILTER_SANITIZE_STRING); //http://php.net/manual/en/filter.filters.sanitize.php
        return $string;
        }    




















?>