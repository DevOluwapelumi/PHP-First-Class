<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First PHP Class</title>
</head>
<body>
    <div>How are you?</div>
</body>
</html>
<?php
echo '<br>';
$number=80;
echo "Welcome DevOluwapelumi to the World of PHP";
echo '<br>';
$name="Hello world";
echo $name;
echo '<br>';
$school='SQI College of ICT';
echo $school;

echo '<br>';
$obj=new stdClass;
$obj->firstname='Oluwapelumi';
$obj->lastname='Oluwadarasimi';
$obj->age=100;
print_r($obj);
echo '<br>';
print_r($obj->firstname);
echo '<br>';'


            //Invalid Array//
            $firstarray=[1,2,3,4, 'PHP we move!!!'];
            print_r($firstarray);
            echo '<br>';
            $secondarray=array('Damilola','Aremu');
            print_r($secondarray);
            echo '<br>';

            //Associate Array//
            $thirdarray=[
                "age"=>80,
                "lastname"=>"Dolly Pee",
                "school"=>"SQI",
            ];
            // print_r($thirdarray);
            print_r($thirdarray['lastname']);
            echo '<br>';

            //Multidimensional Array//
            array_push($firstarray, $secondarray, $thirdarray);
            print_r($firstarray);
            echo '<br>';

            echo 'My name is '.$name;
            echo '<br>';
            for ($i=0; $i < count($firstarray); $i++) { 
                print_r($firstarray[$i]);
            }
?>