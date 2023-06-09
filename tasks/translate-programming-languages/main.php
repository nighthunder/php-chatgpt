<?php
// Translate programming languages
//This line is necessary to load the PHP client installed by Composer
require_once('vendor/autoload.php');
require_once('env.php');

//Change the next line to $yourApiKey = MY_OPENAI_KEY; if you didn't use an environment variable and set your key in a separate file
//$yourApiKey = getenv('MY_OPENAI_KEY');

//Create a client object
$client = OpenAI::client(MY_OPENAI_KEY);

//The $prompt variable stores our entire prompt
$prompt = " 
    ##### Translate this function  from Python into PHP
    ### Python
        
        def predict_proba(X: Iterable[str]):
            return np.array([predict_one_probas(tweet) for tweet in X])
        
    ### PHP
";

//We send our prompt along with parameters to the API
//It creates a completion task
$result = $client->completions()->create([
    'model'=>"text-davinci-003",
    'prompt'=>$prompt,
    'temperature'=>0,
    'max_tokens'=>150,
    'top_p'=>1.0,
    'frequency_penalty'=>0.0,
    'presence_penalty'=>0.0,
    'stop'=>["###"]
]);

//After a few seconds the response will be stored in $results
//We can print the text answered by GPT
echo $result['choices'][0]['text']; 

?>