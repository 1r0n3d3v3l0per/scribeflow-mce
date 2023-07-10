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
<html lang="en">

<head>
  <script src="https://cdn.tiny.cloud/1/INSERT-API-KEY/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

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

      // SCRIBEFLOW - CUSTOM TRANSLATION FUNCTION
      setup: function (editor) {
        var languages = [
          { code: "BG", name: "Bulgarian" },
          { code: "CS", name: "Czech" },
          { code: "DA", name: "Danish" },
          { code: "DE", name: "German" },
          { code: "EL", name: "Greek" },
          { code: "EN-GB", name: "English (UK)" },
          { code: "EN-US", name: "English (US)" },
          { code: "ES", name: "Spanish" },
          { code: "ET", name: "Estonian" },
          { code: "FI", name: "Finnish" },
          { code: "FR", name: "French" },
          { code: "HU", name: "Hungarian" },
          { code: "ID", name: "Indonesian" },
          { code: "IT", name: "Italian" },
          { code: "JA", name: "Japanese" },
          { code: "KO", name: "Korean" },
          { code: "LT", name: "Lithuanian" },
          { code: "LV", name: "Latvian" },
          { code: "NB", name: "Norwegian" },
          { code: "NL", name: "Dutch" },
          { code: "PL", name: "Polish" },
          { code: "PT-BR", name: "Portuguese" },
          { code: "PT-PT", name: "Portuguese (BR)" },
          { code: "RO", name: "Romanian" },
          { code: "RU", name: "Russian" },
          { code: "SK", name: "Slovak" },
          { code: "SL", name: "Slovenian" },
          { code: "SV", name: "Swedish" },
          { code: "TR", name: "Turkish" },
          { code: "UK", name: "Ukrainian" },
          { code: "ZH", name: "Chinese" }
        ];

        var currentLanguage = 'it';

        // Funzione per ottenere il testo di traduzione in base alla lingua corrente
        // Function to get the translation text based on the current language
        function getTranslationText() {
          var translateTexts = {
            bg: "Преведи с DeepL",
            cs: "Přeložit pomocí DeepL",
            da: "Oversæt med DeepL",
            de: "Mit DeepL übersetzen",
            el: "Μετάφραση με το DeepL",
            "en-gb": "Translate with DeepL",
            "en-us": "Translate with DeepL",
            es: "Traducir con DeepL",
            et: "Tõlgi DeepL-iga",
            fi: "Käännä DeepL:llä",
            fr: "Traduire avec DeepL",
            hu: "Fordítás a DeepL segítségével",
            id: "Terjemahkan dengan DeepL",
            it: "Traduci con DeepL",
            ja: "DeepLで翻訳する",
            ko: "DeepL로 번역하기",
            lt: "Versti su DeepL",
            lv: "Tulkot ar DeepL",
            nb: "Oversett med DeepL",
            nl: "Vertalen met DeepL",
            pl: "Tłumacz z DeepL",
            "pt-br": "Traduzir com o DeepL",
            "pt-pt": "Traduzir com o DeepL",
            ro: "Tradu cu DeepL",
            ru: "Перевести с DeepL",
            sk: "Preložiť pomocou DeepL",
            sl: "Prevedi z DeepL",
            sv: "Översätt med DeepL",
            tr: "DeepL ile Çevir",
            uk: "Перекласти з DeepL",
            zh: "使用 DeepL 翻译"
            // Aggiungo altre lingue e testi di traduzione se necessario per toolbar
            // Add more languages and translation texts if needed for toolbar
          };

          return translationTexts[currentLanguage] || "Translate with DeepL";
        }

        // Aggiorno il valore della lingua corrente quando l'utente cambia la lingua nell'editor
        // I update the value of the current language when the user changes the language in the editor        
        editor.on("init", function () {
          currentLanguage = editor.getParam("language") || "it";
        });


        editor.ui.registry.addMenuButton("scribeflowdeepl", {
          text: getTranslationText(),
          fetch: function (callback) {
            var items = [];

            for (var i = 0; i < languages.length; i++) {
              (function (i) {
                items.push({
                  type: "menuitem",
                  text: languages[i].name,
                  onAction: function () {
                    // Get selected text
                    var selectedText = editor.selection.getContent({
                      format: "text"
                    });

                    // Uso DeepL API per tradurre il testo selezionato
                    // I use DeepL API to translate the selected text
                    fetch("https://api-free.deepl.com/v2/translate", {
                      method: "POST",
                      headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                      },
                      body: `text=${selectedText}&target_lang=${languages[i].code}&auth_key=<?php echo $token; ?>`
                    })
                      .then(response => response.json())
                      .then(data => {
                        // Sostituisco il testo selezionato con il testo tradotto
                        // I replace the selected text with the translated text
                        editor.selection.setContent(data.translations[0].text);
                      })
                      .catch(error => {
                        console.error("Error while translating text:", error);
                      });
                  }
                });
              })(i);
            }

          callback(items);
        }
      });

      editor.ui.registry.addButton("scribeflow", {
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
