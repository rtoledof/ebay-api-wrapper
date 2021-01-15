<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::get("/", function (){
	return "Hello World";
});


SimpleRouter::get("/search", function (){
	return "functions php";
});