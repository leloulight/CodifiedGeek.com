<?php
$array = array('employees'=>array(
    "Joel Mann"=>array(
        "2015-01-11"=>array(
            "Task1"=>array('hours'=>2),
            "Task4"=>array('hours'=>4)
        ),
        "2015-01-12"=>array(
            "Task1"=>array('hours'=>3)
        ),
        "2015-01-14"=>array(
            "Task3"=>array('hours'=>1)
        ),
        "2015-01-15"=>array(
            "Task2"=>array('hours'=>4)
        )
    ),
    ""=>array(
        "2015-01-11"=>array(
            "Task1"=>array('hours'=>2),
            "Task4"=>array('hours'=>4)
        ),
        "2015-01-12"=>array(
            "Task1"=>array('hours'=>3)
        ),
        "2015-01-14"=>array(
            "Task3"=>array('hours'=>1)
        ),
        "2015-01-15"=>array(
            "Task2"=>array('hours'=>4)
        )
    )));


foreach($array['employees'] as $employee => $dates) {

    echo "Employee Name: " . $employee . "<br />";

    foreach($dates as $date => $tasks) {
        echo "Date: " . $date . "<br />";

        foreach($tasks as $task => $hours) {
            echo "Task " . $task ." has " . $hours['hours'] . " hours.<br />";
        }
    }
}
//print_r($array);