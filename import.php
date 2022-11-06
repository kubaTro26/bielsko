<?php



define ('WP_DEBUG',true);
define( 'WP_DEBUG_DISPLAY', true );
define( 'WP_DEBUG_LOG', true );


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);







$servername = "localhost";
$username = "weblide2_mbmzam";
$password = "-]y-IMbc24YNHac7";
$dbname = "weblide2_msnew";



class wpis {

    public $id;
    public $user_login;
    public $user_pass;
    public $user_nicename;
    public $user_email;
    public $user_url;
    public $user_registered;
    public $user_activation_key;
    public $user_status;
    public $display_name;
    public $nip;
    public $first_name;
    public $last_name;
    public $firma;
    public $first_address_line;
    public $second_address_line;
    public $city;
    public $kod;
    public $wojewodztwo;
    public $telefon;



}






// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$content = file_get_contents('wp_users.sql');


//var_dump($content);

$matches;


//preg_match('/(foo)(bar)(baz)/', 'foobarbaz', $matches, PREG_OFFSET_CAPTURE);
preg_match_all('/\(.*\)/',$content, $matches );

//var_dump($matches);



foreach($matches[0] as $match){


   
   $matched[]= explode(',', $match);

}

$second = [];


foreach ($matched as $ma){
    


        $first = [];

        

     for($i=0; $i < count($ma); $i++){
      //str_contains($ma[$i] , '\'')

        $string = $ma[$i];

     

        $warunek = strpos($string , '\'');

        

        if($warunek){


          preg_match_all('/\'.*\'/',$string, $st );


        }
        elseif($warunek == false){

          preg_match_all('/[0-9][0-9].*/',$string, $st );

        }

        $first[]=$st;


        if($i==32){
          

          $second[]=$first;
        }
        

        

     }
}


  foreach($second as $sec){


    //var_dump($sec);
    for($k=0;$k<count($sec); $k++){
      var_dump($sec[$k]);
    }

  }


$sql = "INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, 
`user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, 
`display_name`, `nip`, `first_name`, `last_name`, `firma`, `first_address_line`, `second_address_line`,
 `city`, `kod`, `wojewodztwo`, `telefon`) VALUES ('998', 'test', '', 'test', 'testowy@gmail.com', 'test.com',
  '0000-00-00 00:00:00.000000', '', '0', 'test', '99999', 'test', 'testowy', '', '', '', '', '', '', '');";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

$conn->close();
?>