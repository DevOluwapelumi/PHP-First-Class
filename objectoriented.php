<?php
class First {

    //private properties and methods can only be accessed within the class//
    //protected properties cannot ba accessed outside of the class, but can be accessed within the class and when you extend the class//

    public $firstname = 'Dev_Pelumi';
    public $lastname = 'Darasimi';
    public $age = 30;
    // private $school = 'SQI';
    protected $school = 'SQI';
    protected $email = 'Pel16@gmail.com';


    public function get(){
        // return 'Hello, Whats up...'.$this->firstname;
        return 'Hello, my school name is...'.$this->school;
    }

    public function __construct($name, $schools){
        echo 'My name is...'.$name. ' and my school is...'.$schools;
    }
}

$first=new First('Oluwapelumi','SQI College of ICT');
echo '<br>';
// $first->firstname='dshbdshbsh';
echo $first->firstname;
echo '<br>';
echo $first->lastname;
echo '<br>';
echo $first->age;
echo '<br>';
echo '<br>';
$first->get();
echo $first->get();
echo '<br>';

// class Second extends First {
//     public function getname() {
//         echo '<br>';
//         echo '<br>';
//         return 'The name of my school is...'.$this->school;
//     }
// }
// $second=new Second;
// echo $second->getname();
?>