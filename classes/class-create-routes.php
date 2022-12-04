<?php

add_action("rest_api_init", "create_routes");

function create_routes() {
	register_rest_route("wpdw", "data", [
    	"methods" => "GET",
      	"callback" => "retrieve_data"
    ]);
};

function retrieve_data($query) {
  	$range = (int) $query["range"];
  	$data = [];
	if ($range <= 0) {
    	for($i = 1; $i <= 30; $i++) {
        	$v = rand(1000, 4000);
          	$item = array(
            	"day" => $i,
              	"value" => $v
            );
          	array_push($data, $item);
        }
      	return $data;
    }
  
  	for($i = 1; $i <= $range; $i++) {
      $v = rand(1000, 4000);
      $item = array(
        "day" => $i,
        "value" => $v
      );
      array_push($data, $item);
    }
  	return $data;
  	
};