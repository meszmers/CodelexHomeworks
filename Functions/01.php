<?php

//Create a function that accepts any string and returns the same value with added "codelex" by the end of it. Print this value out.

function putTogether(string $a): string {
    return "$a codelex";
}
echo putTogether("I like");