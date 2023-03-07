<!--------

BY : khalysst on GitHub 
Background images / images in general extracted from CANVA (for visual purposes only!)
HTML, CSS and PHP-based website, for educational and submission purposes
By any means, please use this as your basis / reference only. 

----------->

<!DOCTYPE html>
<html>
<head>
    <title>Compatibility Checker</title>
</head>
<style>
    body {
        background: url('main.png');
        background-repeat: repeat-y;
        background-size: auto; 
        font-family: Arial;
        color: white; 
    }

    .user-form {
        margin-left: 705px;
        margin-top: 50px;
        color: black;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 10px;
        width: 25%;
    }

    #submit {
        display: inline-block;
        padding: 10px 20px;
        font-size: 18px;
        text-align: center;
        text-decoration: none;
        border-radius: 20px;
        background-color: transparent;
        color: #000;
        border: 2px solid #000;
        outline: none;
        width: 45%;
    }

    #submit:active {
        background-color: #000;
        color: #fff;
        border: 2px solid #000;
    }

    form {
        text-align: center;
    }

    input[type="text"], input[type="date"] {
        font-size:16px;
        font-family:Arial;
        border-color: gray;
        width: 57%;
        height: 26px;
        border-radius: 5px;
        border: 1px solid #000;
        outline: none;
    }

    input[type="text"]:focus,
    input[type="date"]:focus {
        outline: none;
        border-color: #4028AF;
        box-shadow: 0 0 5px #8B7DF6;
        transition: all 0.3s ease-in-out;
    }

    label {
        font-weight: bold;
        text-transform: uppercase;
    }

    .results {
        background: url('main2.png');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        color: #fff;
        text-align: center;
        font-family: Arial;
        font-size: 25px; 
    }

</style>
<body>

<!-- A lot of line breaks comin' thru. -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br> 
<br>
<br>
<br> 
<br>
<br>
<br>

<!-- First, require inputs from user -->
<div class="user-form">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <center><img src="header1.png" width = "40%"></center>

        <!-- For the user -->
        <label for="first_name1">First Name</label> <br>
        <input type="text" id="first_name1" name="first_name1" placeholder="John" required>
        <br>
        <br>

        <label for="last_name1">Last Name</label> <br>
        <input type="text" id="last_name1" name="last_name1" placeholder="Smith" required>
        <br>
        <br>

        <label for="birthday1">Birthday</label> <br>
        <input type="date" id="birthday1" name="birthday1" required> 
        <br>
        <br>

        <center><img src="header2.png" width = "40%"></center>

        <!-- For the user's "crush" -->
        <label for="first_name2">First Name</label> <br>
        <input type="text" id="first_name2" name="first_name2" placeholder="Jane" required>
        <br>
        <br>

        <label for="last_name2">Last Name</label> <br>
        <input type="text" id="last_name2" name="last_name2" placeholder="Doe" required>
        <br>
        <br>

        <label for="birthday2">Birthday</label> <br>
        <input type="date" id="birthday2" name="birthday2" required> 
        <br>
        <br>
        <br> 

        <input type="submit" value="Compute" name="submit" id="submit">
        <br>
        <br>
</form>
</div>

<?php

    class Zodiac {
        public $zodiacSign;
        public $zodiacSymbol;
        public $startDate;
        public $endDate; 
        public $zodiacIndex; // Index of Zodiac object in the compatibility array

        function ComputeZodiacCompatibility($zodiac1, $zodiac2) {
            // 0 = Great Match, 1 = Favorable, 2 = Not Favorable
            // To multidimensional array to assess compatibility from Aries to Pisces 
            $compatibility = array(
                array('0','0','0','2','2','2','0','0','0','2','2','1'),
				array('0','0','0','2','2','2','0','0','0','1','1','1'),
                array('0','0','0','2','2','2','0','0','0','1','1','1'),
                array('2','1','2','0','0','0','2','1','2','0','0','0'),
                array('2','1','2','0','0','0','2','2','1','0','0','1'),
                array('2','1','2','0','0','0','2','1','2','0','0','0'),
                array('0','0','1','2','1','1','0','0','0','2','2','2'),
                array('1','0','0','1','2','2','0','0','0','2','2','1'),
                array('0','0','0','2','2','2','0','0','0','2','1','1'),
                array('2','1','1','0','0','0','2','2','2','0','0','0'),
                array('1','1','2','0','0','0','2','2','2','0','0','0'),
                array('1','1','1','0','1','0','2','2','2','0','0','0')
            );
            return $compatibility[$zodiac1][$zodiac2]; // Provide the indicated compatibility of two Zodiac signs assessed
        }

        function GetZodiacSign() {
            return $this->zodiacSign;
        }

        function GetZodiacIndex() {
            return $this->zodiacIndex;
        }

        function __construct($date) {
            $date = explode('-', $date); // Store stripped strings to variable $date
            $month = $date[1];
            $day = $date[2];
            $year = $date[0];

            
            // Classify zodiac sign of the user 
            if(($month == 3 && $day > 20) || ($month == 4 && $day < 20)){
				$this->zodiacSign = "ARIES";
				$this->zodiacIndex = 0;
			} elseif(($month == 4 && $day > 19) || ($month == 5 && $day < 21)){
				$this->zodiacSign = "TAURUS";
				$this->zodiacIndex = 3;
			} elseif(($month == 5 && $day > 20) || ($month == 6 && $day < 22)){
				$this->zodiacSign = "GEMINI";
				$this->zodiacIndex = 6;
			} elseif(($month == 6 && $day > 21) || ($month == 7 && $day < 23)){
				$this->zodiacSign = "CANCER";
				$this->zodiacIndex = 9;
			} elseif(($month == 7 && $day > 22) || ($month == 8 && $day < 23)){
				$this->zodiacSign = "LEO";
				$this->zodiacIndex = 1;
			} elseif(($month == 8 && $day > 22) || ($month == 9 && $day < 23)){
				$this->zodiacSign = "VIRGO";
				$this->zodiacIndex = 4;
			} elseif(($month == 9 && $day > 22) || ($month == 10 && $day < 24)){
				$this->zodiacSign = "LIBRA";
				$this->zodiacIndex = 7;
			} elseif(($month == 10 && $day > 23) || ($month == 11 && $day < 22)){
				$this->zodiacSign = "SCORPIO";
				$this->zodiacIndex = 10;
			} elseif(($month == 11 && $day > 21) || ($month == 12 && $day < 22)){
				$this->zodiacSign = "SAGITTARIUS";
				$this->zodiacIndex = 2;
			} elseif(($month == 12 && $day > 21) || ($month == 1 && $day < 20)){
				$this->zodiacSign = "CAPRICORN";
				$this->zodiacIndex = 5;
			} elseif(($month == 1 && $day > 19) || ($month == 2 && $day < 19)){
				$this->zodiacSign = "AQUARIUS";
				$this->zodiacIndex = 8;
			} elseif(($month == 2 && $day > 18) || ($month == 3 && $day < 21)){
				$this->zodiacSign = "PISCES";
				$this->zodiacIndex = 11;
			}

            // Finds line that corresponds to the Zodiac object zodiacSign, then assign the variables' values to the Zodiac object properties
            $file = fopen('Zodiac.txt', 'r');
			while ($line = fgets($file)){
				$details = explode(';', $line);
				if($details[0] == $this->zodiacSign){
					$this->zodiacSymbol = $details[1];
					$this->startDate = $details[2];
					$this->endDate = $details[3];
				}
			}
			fclose($file);

            // End Zodiac class
        }
    }

    class Person {
        public $firstName;
        public $lastName;
        public $birthday;
        public $zodiac;

        function __construct($firstName, $lastName, $birthday) {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->birthday = $birthday;
            $this->zodiac = new Zodiac($birthday);
        }

        function GetFullName() {
            return $this->lastName . ', ' . $this->firstName; 
        }

        function GetZodiac() {
            return $this->zodiac->GetZodiacSign();
        }

        function GetZodiacIndex(){
			return $this->zodiac->getZodiacIndex();
		}

        function GetCompatibility($zodiac1, $zodiac2){
			return $this->zodiac->ComputeZodiacCompatibility($zodiac1, $zodiac2);
		}

        // End Person class
    }    
?>

<?php
    // If user clicks on "Compute", then start assessing inputs 
    if(isset($_POST['submit'])) {

    // Create new Person objects 
    $person1 = new Person($_POST['first_name1'],$_POST['last_name1'],$_POST['birthday1']);
    $person2 = new Person($_POST['first_name2'],$_POST['last_name2'],$_POST['birthday2']);

    // Concatenate the first and last names of the users 
    $name1 = $person1->GetFullName();
    $name2 = $person2->GetFullName();

    // Remove special characters and spacings from the names
    $name1 = preg_replace('/[^a-zA-Z]/', '', $name1);
    $name2 = preg_replace('/[^a-zA-Z]/', '', $name2);

    // Conversion of the names to lowercase in order to make the comparison less case-sensitive
    $name1 = strtolower($name1); 
    $name2 = strtolower($name2);

    // Count the number of similar letters between two names 
    $similar1 = array_intersect(str_split($name1), str_split($name2));
    $similar2 = array_intersect(str_split($name2), str_split($name1));

    // Add to make the total number of common letters
    $total_similar = count($similar1) + count($similar2);

    // Compute the FLAMES result 
    $flames = array(1 => 'F', 2 => 'L', 3 => 'A', 4 => 'M', 5 => 'E', 0 => 'S');
    $flames_key = ($total_similar % 6);
    $flames_res = $flames[$flames_key];

    // Display status using switch case, based on the FLAMES result
    switch ($flames_res) {
        case 'F':
            $flames_stat = "FRIENDS";
            break;
        case 'L':
            $flames_stat = "LOVERS";
            break;
        case 'A':
            $flames_stat ="ANGER";
            break;
        case 'M':
            $flames_stat = "MARRIED";
            break;
        case 'E':
            $flames_stat = "ENGAGED";
            break;
        case 'S':
            $flames_stat = "SOULMATES";
            break;
    }

    // Get all objects and assess them to respective methods
    $user = $person1->GetFullName();
    $crush = $person2->GetFullName();
    $userZodiac = $person1->GetZodiac();
    $crushZodiac = $person2->GetZodiac();
    $userZodiacIndex = $person1->GetZodiacIndex();
    $crushZodiacIndex = $person2->GetZodiacIndex();

    // Compute the zodiac compatibility of the user and his/her crush
    $compat = $person1->GetCompatibility($userZodiacIndex, $crushZodiacIndex);
    if ($compat == '0'){
	    $compat = "GREAT MATCH";
    } elseif($compat == '2'){
        $compat = "NOT FAVORABLE MATCH";
    } else {
        $compat = "FAVORABLE MATCH";
    }

    // Prompt user a successful assessment and inform that the results can be scrolled down
    echo "<script>alert('Compatibility successfully assessed! Scroll down to see results.');</script>";
?>
<br>
<div class="results">

<!-- A lot of line breaks comin' thru. -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<!-- Display the results. -->
Your Name: <b><?php echo "$user" ?></b> <br>
Your Zodiac Sign: <b><?php echo "$userZodiac" ?> </b> <br>
Your Crush's Name: <b> <?php echo "$crush" ?> </b> <br>
Your Crush's Zodiac Sign: <b> <?php echo "$crushZodiac" ?> </b> <br>
<br>
<br>
<center><img src="header.png" width = "14%"></center>
<br>
Based on FLAMES, you and your crush are <b><?php echo "$flames_stat." ?> </b>
<br>
<br>
<center><img src="header0.png" width = "24%"></center>
<br>
Based on ASTROLOGY, you and your crush are a <b><?php echo "$compat." ?> </b>
<br>
<br>
<br>
</div> 
<?php 
// End of line for if statement above in order for the results to appear after user clicks "Compute".
}
?>

</body>
</html>