<?php

// BrownBearBot
//
// A PHP-based Twitterbot that uses the TwitterOAuth library

$consumer_key = "xxxxxSECRETxxxxx";
$consumer_secret = "xxxxxSECRETxxxxx";
$access_key = "xxxxxSECRETxxxxx";
$access_secret = "xxxxxSECRETxxxxx";

require_once('twitteroauth.php');// Use the twitteroauth library
$twitter = new TwitterOAuth ($consumer_key ,$consumer_secret , $access_key , $access_secret );// Connect to Twitter using TwitterOAuth library

$randomReply = array();// Create a new arry called randomReply
$newTweetCount = 0;// Set the tweets count to zero
$lastTweetScreenName = NULL;

$myUserInfo = $twitter->get('account/verify_credentials');// Get ShouldBot's info
$myLastTweet = $twitter->get('statuses/user_timeline', array('user_id' => $myUserInfo->id_str, 'count' => 1));// Use ShouldBot's info to get ShouldBot's last tweet

$lastColorAnimal = $myLastTweet[0]->text; // Get new @mentions since the user's last tweet
$animalPos = strpos($lastColorAnimal, "I see a ")+8;
$lastColorAnimal = substr($lastColorAnimal,$animalPos,(strpos($lastColorAnimal, " looking at me.")-$animalPos))

$randomColor = array("Red","Orange","Yellow","Green","Blue","Purple","Red","Orange","Yellow","Green","Blue","Indigo","Violet","Purple","Magenta","Cyan","Pink","Brown","White","Gray","Black","Tan","Aqua","Sea Green","Wild Strawberry","Mango","Pear","Polka Dot","Tutti Fruiti","Neon Green","Neon Pink","Grey","Beige","Chartreuse","Khaki","Salmon","Fuchsia","Maroon","Plum","Burnt Sienna","Turquoise","Peach","Periwinkle","Silver","Gold","Copper","Mauve","Mustard","Scarlet","Dark Blue","Dark Green","Dark Purple","Light Green","Light Blue","Light Brown","Light Purple","Colorless","Opaque","Cerulean","Lavendar","Olive","Lime","Ecru","Eggshell","Off-white","Aquamarine","Ochre","Sage","Sepia","Teal","Taupe","Ruby","Lilac","Chocolate","Cream","Crimson","Rose","Azure","Lemon","Pale");
$randomAnimal = array("Aardvark","Alligator","Alpaca","Antelope","Ape","Armadillo","Baboon","Badger","Bat","Bear","Beaver","Bison","Boar","Buffalo","Bull","Camel","Canary","Capybara","Cat","Chameleon","Cheetah","Chimpanzee","Chinchilla","Chipmunk","Cougar","Cow","Coyote","Crocodile","Crow","Deer","Dingo","Dog","Donkey","Dromedary","Elephant","Elk","Ewe","Ferret","Finch","Fish","Fox","Frog","Gazelle","Gila monster","Giraffe","Gnu","Goat","Gopher","Gorilla","Grizzly bear","Ground hog","Guinea pig","Hamster","Hedgehog","Hippopotamus","Hog","Horse","Hyena","Ibex","Iguana","Impala","Jackal","Jaguar","Kangaroo","Koala","Lamb","Lemur","Leopard","Lion","Lizard","Llama","Lynx","Mandrill","Marmoset","Mink","Mole","Mongoose","Monkey","Moose","Mountain goat","Mouse","Mule","Muskrat","Mustang","Mynah bird","Newt","Ocelot","Opossum","Orangutan","Oryx","Otter","Ox","Panda","Panther","Parakeet","Parrot","Pig","Platypus","Polar bear","Porcupine","Porpoise","Prairie dog","Puma","Rabbit","Raccoon","Ram","Rat","Reindeer","Reptile","Rhinoceros","Salamander","Seal","Sheep","Shrew","Silver fox","Skunk","Sloth","Snake","Squirrel","Tapir","Tiger","Toad","Turtle","Walrus","Warthog","Weasel","Whale","Wildcat","Wolf","Wolverine","Wombat","Woodchuck","Yak","Zebra");

shuffle($randomColor);
if(strpos($lastColorAnimal,$randomColor[0]) !== FALSE ){
	$newColor = $randomColor[1];
}
else{
	$newColor = $randomColor[0];
}

shuffle($randomAnimal);
if(strpos($lastColorAnimal,$randomAnimal[0]) !== FALSE ){
	$newAnimal = $randomAnimal[1];
}
else{
	$newAnimal = $randomAnimal[0];
}

$newTweet = $lastColorAnimal.", ".$lastColorAnimal.", What do you see? I see a ".$newColor." ".$newAnimal." looking at me. #".$newColor.$newAnimal;


//$twitter->post('statuses/update', array('status' => $replyTweet,'in_reply_to_status_id' => $tweet->id_str));// Post tweet
$newTweetCount++;// Add one to output counter

echo "<br/>";echo $newTweetCount." ".$newTweet."\n";echo "<br/>";// If bot is run manually, user will see the final tweet.

echo "<br/>";echo "Success! Check BrownBearBot for ".$newTweetCount." new tweets.";// If bot is run manually, user will see this text.
?>
