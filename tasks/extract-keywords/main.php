<?php
// Extract keywords from a text
//This line is necessary to load the PHP client installed by Composer
require_once('vendor/autoload.php');
require_once('env.php');

//Change the next line to $yourApiKey = MY_OPENAI_KEY; if you didn't use an environment variable and set your key in a separate file
//$yourApiKey = getenv('MY_OPENAI_KEY');

//Create a client object
$client = OpenAI::client(MY_OPENAI_KEY);

//The $prompt variable stores our entire prompt
$prompt = " 
Extract keywords from this text:
 
Black-on-black ware is a 20th- and 21st-century pottery tradition developed by the Puebloan Native American ceramic artists in Northern New Mexico. Traditional reduction-fired blackware has been made for centuries by pueblo artists. Black-on-black ware of the past century is produced with a smooth surface, with the designs applied through selective burnishing or the application of refractory slip. Another style involves carving or incising designs and selectively polishing the raised areas. For generations several families from Kha'po Owingeh and P'ohwhóge Owingeh pueblos have been making black-on-black ware with the techniques passed down from matriarch potters. Artists from other pueblos have also produced black-on-black ware. Several contemporary artists have created works honoring the pottery of their ancestors.
";

//We send our prompt along with parameters to the API
//It creates a completion task
$result = $client->completions()->create([
    'model'=>"text-davinci-003",
    'prompt'=>$prompt,
    'temperature'=>0.5,
    'max_tokens'=>60,
    'top_p'=>1.0,
    'frequency_penalty'=>0.8,
    'presence_penalty'=>0.0,
]);

//After a few seconds the response will be stored in $results
//We can print the text answered by GPT
echo $result['choices'][0]['text']; 

?>