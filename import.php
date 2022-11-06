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


  $table = [];

  for($o=0;$o<count($second);$o++){



        $object = new wpis();

        $object->id = $second[$o][1][0][0];
        $object->user_login=$second[$o][7][0][0];
        // $object->user_pass=$second[0][0][0];
        $object->user_nicename=$second[$o][19][0][0];
        // $object->user_email=$second[0][0][0];
        // $object->user_url=$second[0][0][0];
        // $object->user_registered=$second[0][0][0];
        // $object->user_activation_key=$second[0][0][0];
        // $object->user_status=$second[0][0][0];
        // $object->display_name=$second[0][0][0];
        // $object->nip=$second[0][0][0];
        // $object->first_name=$second[0][0][0];
        // $object->last_name=$second[0][0][0];
        // $object->firma=$second[0][0][0];
        // $object->first_address_line=$second[0][0][0];
        // $object->second_address_line=$second[0][0][0];
        // $object->city=$second[0][0][0];
        // $object->kod=$second[0][0][0];
        // $object->wojewodztwo=$second[0][0][0];
        // $object->telefon=$second[0][0][0];
  
   

  }


  var_dump( $object->user_nicename);

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