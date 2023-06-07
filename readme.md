##################

<h1>Using Chatgpt API with php</h1>

<h2>Requirements</h2>

<p> Have PHP 8.1 or later and install composer</p>

```
php -v
composer -v
```

<p> Have a OpenAI account and create an API key:</p>

<a href="https://platform.openai.com/account/api-keys" target="_blank">https://platform.openai.com/account/api-keys</a>

<p>Install OpenAI client in a existing composer project:</p>
<a href="https://github.com/openai-php/client" target="_blank">OpenAI Client repo</a>
```
composer require openai-php/client
```
```
composer require guzzlehttp/guzzle
```

<p>Alternatively start a new project</p>

```
composer init
```
<p>Inside the command in the dependencies phase ask for the search of openai-php/client and guzzlehttp/guzzle </p>

<h2>How to use</h2>

<p>Run composer install:</p>
```
composer install
```
<p>Ready!</p>

```
// get the autload 
require_once('vendor/autoload.php'); 

$yourApiKey = getenv('YOUR_API_KEY');
$client = OpenAI::client($yourApiKey);

$result = $client->completions()->create([
    'model' => 'text-davinci-003',
    'prompt' => 'PHP is',
]);

echo $result['choices'][0]['text']; // an open-source, widely-used, server-side scripting language.

```
<p></p>