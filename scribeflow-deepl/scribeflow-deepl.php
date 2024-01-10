<!DOCTYPE html>
<html lang="en">

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

      // SCRIBEFLOW - CUSTOM SCRIBEFLOW DEEPL FUNCTION
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
          var translationTexts = {
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

    }
  });
</script>


</head>
