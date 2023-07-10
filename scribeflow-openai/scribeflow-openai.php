<?php
// Creo la tabella dei token, se non esiste.
// I create the token table, if it does not exist.
$sql_create_table = "CREATE TABLE IF NOT EXISTS tokens (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    data_1 VARCHAR(255),
    data_4 VARCHAR(255)
)";

mysqli_query($dbh, $sql_create_table);

// Recupero il token API dalla tabella dei token
// I retrieve the API token from the token table
$sql_fetch_token = "SELECT data_4 FROM tokens WHERE data_1 = 'tokens'";
$result = mysqli_query($dbh, $sql_fetch_token);

// Controllo se ci sono risultati
// Check if there are any results
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $token = $row['data_4'];
} else {
    echo "No results";
}

// Visualizzo il modulo per inserire il token API
// I display the form to enter the API token
echo <<<HTML
<form action="process.php" method="POST">
    <label for="api_token">API Token:</label>
    <input type="text" name="api_token" id="api_token" required>
    <input type="submit" value="Save">
</form>
HTML;

// Elaboro l'invio del modulo
// I process the form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate the user input
    $api_token = mysqli_real_escape_string($dbh, $_POST["api_token"]);
    $api_token = trim($api_token);
    // Eseguo una validazione aggiuntiva, se necessario
    // I perform additional validation, if necessary

    // Memorizzo il token API nel database
    // I store the API token in the database
    $sql_store_token = "INSERT INTO tokens (data_1, data_4) VALUES ('tokens', '$api_token')";
    mysqli_query($dbh, $sql_store_token);
}
?>


<!DOCTYPE html>
<html lang="it">

<head>
  <script src="https://cdn.tiny.cloud/1/INSERT-API-KEY/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

  <script>
    tinymce.init({
      selector: "textarea",
      language: "it",
      editor_deselector: "mceNoEditor",
      plugins: "advlist anchor autolink autoresize autosave bbcode charmap code codesample directionality emoticons fullpage fullscreen help hr image imagetools importcss insertdatetime legacyoutput link lists media nonbreaking pagebreak paste preview print save searchreplace tabfocus table template textcolor textpattern toc visualblocks visualchars wordcount",
      toolbar: "formatselect | bold italic strikethrough forecolor backcolor | emoticons | scribeflowdeepl | scribeflowopenai | link | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent | removeformat | link image media insertfile",
      relative_urls: false,
      remove_script_host: false,

      image_advtab: true,
      height: 400,
      max_height: 500,
      extended_valid_elements: "i[class|src|style]",

      // SCRIBEFLOW - CUSTOM SCRIBEFLOW OPENAI FUNCTION
      setup: function (editor) {
      editor.ui.registry.addButton("scribeflowopenai", {
        text: "Genera con OpenAI",
        onAction: function() {
          var apiKey = "TOKEN_API_OPENAI";

          var promptText = editor.getContent();

          axios
            .post(
              "https://api.openai.com/v1/engines/text-davinci-003/completions",
              {
                prompt: promptText,
                max_tokens: 500,
                temperature: 1,
                top_p: 1,
                frequency_penalty: 0,
                n: 1,
                stop: null
              },
              {
                headers: {
                  Authorization: "Bearer " + apiKey,
                  "Content-Type": "application/json"
                }
              }
            )
            .then(function(response) {
              var generatedText = response.data.choices[0].text;
              editor.selection.setContent(generatedText);
            })
            .catch(function(error) {
              console.error("Errore nella generazione del testo:", error);
            });
        }
      });
    }
  });
</script>


</head>
