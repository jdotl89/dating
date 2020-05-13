<?php
function getInDoor()
{
    $indoor = array("sleep", "eat", "catch", "toys", "climbing", "bathing", "staying", "licking");
    return $indoor;
}

function getOutDoor()
{
    $outdoor = array("catch", "walking", "swimming", "toys", "climbing", "chasing", "wondering", "sniffing");
    return $outdoor;
}

function getStates()
{
    $states = array("Washington", "Arizona", "Delaware", "Oregon", "Utah", "California", "Nevada", "New York");
    return $states;
}


function getGender()
{
    $gender = array("Male", "Female");
    return $gender;
}