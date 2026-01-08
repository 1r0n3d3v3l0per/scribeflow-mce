# scribeflow-mce
# TinyMCE Toolbar with DeepL and OpenAI
## TinyMCE Toolbar Plugin

This custom plugin was created to integrate a new functionality into the TinyMCE toolbar, a rich text editor library (WYSIWYG). The plugin is compatible with TinyMCE versions 5, 6, and 7.

## Features

The TinyMCE Toolbar Plugin offers the following features:

1. **Translation with DeepL**: The plugin integrates a menu in the TinyMCE toolbar that allows you to quickly translate the selected text using the DeepL translation service. You can select the desired target language and obtain an accurate and reliable translation.

2. **Generation with OpenAI:** Use the "OpenAI" button in the toolbar to generate text using the OpenAI API (GPT-4o-mini). The generated text is based on the current prompt in the TinyMCE editor and is inserted at the cursor position.

3. **Toolbar Customization:** In addition to quick element insertion, the plugin enables you to customize the TinyMCE toolbar. You can add, remove, or rearrange buttons in the toolbar to fit the user's preferences.

4. **Flexible Configuration:** The plugin provides highly configurable options. You can modify the default plugin settings to adapt it to the requirements of your project.

## Installation Requirements

To ensure proper functionality, the TinyMCE Toolbar Plugin requires the following:

- TinyMCE 5.0 or later
- TinyMCE 6.0 or later
- TinyMCE 7.0 or later (recommended)

## Installation for DeepL

To use the TinyMCE Toolbar Plugin with TinyMCE 5, 6, or 7, follow these steps:

1. Download the DeepL plugin package from the "Release" section of the GitHub repository.

2. Copy the plugin file into your project folder, in the appropriate path for your environment.

3. Include the plugin file in your HTML code, after including TinyMCE:

```html
<script src="https://cdn.tiny.cloud/1/your-api-key/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script src="path/to/plugin.js"></script>
```

```javascript
tinymce.init({
  selector: 'textarea',
  toolbar: 'scribeflowdeepl',
  plugins: 'scribeflowdeepl',
  // Other configuration options for scribeflow DeepL
});
```

### DeepL API Authentication

The plugin uses the DeepL API v2 with HTTP header authentication:

```javascript
headers: {
  "Authorization": "DeepL-Auth-Key YOUR_API_KEY",
  "Content-Type": "application/json"
}
```

## Installation for OpenAI

To use the scribeflow-mce Toolbar Plugin with TinyMCE 5, 6, or 7, follow these steps:

1. Download the OpenAI plugin package from the "Release" section of the GitHub repository.

2. Copy the plugin file into your project folder, in the appropriate path for your environment.

3. Obtain your OpenAI API key from the OpenAI website.

4. Include the plugin file in your HTML code, after including TinyMCE:

```html
<script src="https://cdn.tiny.cloud/1/your-api-key/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script src="path/to/plugin.js"></script>
```

```javascript
tinymce.init({
  selector: 'textarea',
  toolbar: 'scribeflowopenai',
  plugins: 'scribeflowopenai',
  // Other configuration options scribeflow for OpenAI
});
```

### OpenAI API (Chat Completions)

The plugin uses the OpenAI Chat Completions API with the GPT-4o-mini model:

```javascript
fetch("https://api.openai.com/v1/chat/completions", {
  method: "POST",
  headers: {
    "Authorization": "Bearer YOUR_API_KEY",
    "Content-Type": "application/json"
  },
  body: JSON.stringify({
    model: "gpt-4o-mini",
    messages: [{ role: "user", content: promptText }],
    max_tokens: 1000
  })
})
```

You can change the model to `gpt-4o` for higher quality or `gpt-4-turbo` for faster responses.

## Plugin Showcase: Examples of Extraordinary Features!
![TinyMCE Toolbar Plugin by irn3 & Sara](https://i.imgur.com/6KL9Zhf.png)

![TinyMCE Toolbar Plugin by irn3 & Sara](https://i.imgur.com/nvwult0.png)


---

## Toolbar TinyMCE con DeepL e OpenAI

Questo plugin personalizzato è stato creato per integrare una nuova funzionalità nella toolbar di TinyMCE, una libreria di editor di testo ricco (WYSIWYG). Il plugin è compatibile con le versioni 5, 6 e 7 di TinyMCE. Inoltre, consentendo la generazione di testo utilizzando OpenAI tramite un prompt di ingresso.

## Funzionalità

Il plugin della toolbar di TinyMCE (scribeflow-mce) offre le seguenti funzionalità:

1. **Traduzione con DeepL**: Il plugin integra un menu nella toolbar di TinyMCE che consente di tradurre rapidamente il testo selezionato utilizzando il servizio di traduzione di DeepL. È possibile selezionare la lingua di destinazione desiderata e ottenere una traduzione accurata e affidabile.

2. **Generazione con OpenAI**: Utilizza il pulsante "OpenAI" nella toolbar per generare testo utilizzando l'API di OpenAI (GPT-4o-mini). Il testo generato si basa sul prompt attuale nell'editor TinyMCE e viene inserito nella posizione del cursore.

3. **Personalizzazione della toolbar**: Oltre all'inserimento rapido di elementi, il plugin consente di personalizzare la toolbar di TinyMCE. È possibile aggiungere, rimuovere o riorganizzare i pulsanti nella toolbar per adattarla alle preferenze dell'utente.

4. **Configurazione flessibile**: Il plugin è altamente configurabile tramite le opzioni fornite. È possibile modificare le impostazioni predefinite del plugin per adattarlo alle esigenze del progetto.

## Requisiti di installazione

Il plugin della toolbar di TinyMCE richiede quanto segue per funzionare correttamente:

- TinyMCE 5.0 o versione successiva
- TinyMCE 6.0 o versione successiva
- TinyMCE 7.0 o versione successiva (consigliato)

## Installazione di DeepL

Per utilizzare il plugin della toolbar di TinyMCE con TinyMCE 5, 6 o 7, segui questi passaggi:

1. Scarica il pacchetto del plugin dalla sezione "Release" di questo repository su GitHub.

2. Copia il file del plugin nella cartella del tuo progetto, nel percorso appropriato per il tuo ambiente.

3. Includi il file del plugin nel tuo codice HTML, dopo aver incluso TinyMCE:

```html
<script src="https://cdn.tiny.cloud/1/your-api-key/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script src="path/to/plugin.js"></script>
```

```javascript
tinymce.init({
  selector: 'textarea',
  toolbar: 'scribeflowdeepl',
  plugins: 'scribeflowdeepl',
  // Altre opzioni di configurazione di scribeflow per DeepL
});
```

### Autenticazione API DeepL

Il plugin utilizza l'API DeepL v2 con autenticazione tramite header HTTP:

```javascript
headers: {
  "Authorization": "DeepL-Auth-Key LA_TUA_API_KEY",
  "Content-Type": "application/json"
}
```

## Installazione di OpenAI

Per utilizzare il plug-in scribeflow-mce Toolbar con TinyMCE 5, 6 o 7, attenersi alla seguente procedura:

1. Scarica il pacchetto del plug-in OpenAI dalla sezione "Release" del repository GitHub.

2. Copia il file del plug-in nella cartella del progetto, nel percorso appropriato per il tuo ambiente.

3. Genera la tua chiave API OpenAI dal sito Web OpenAI.

4. Includere il file del plugin nel codice HTML, dopo aver incluso TinyMCE:

```html
<script src="https://cdn.tiny.cloud/1/your-api-key/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script src="path/to/plugin.js"></script>
```

```javascript
tinymce.init({
  selector: 'textarea',
  toolbar: 'scribeflowopenai',
  plugins: 'scribeflowopenai',
  // Altre opzioni di configurazione scribeflow per OpenAI
});
```

### API OpenAI (Chat Completions)

Il plugin utilizza l'API Chat Completions di OpenAI con il modello GPT-4o-mini:

```javascript
fetch("https://api.openai.com/v1/chat/completions", {
  method: "POST",
  headers: {
    "Authorization": "Bearer LA_TUA_API_KEY",
    "Content-Type": "application/json"
  },
  body: JSON.stringify({
    model: "gpt-4o-mini",
    messages: [{ role: "user", content: promptText }],
    max_tokens: 1000
  })
})
```

Puoi cambiare il modello in `gpt-4o` per una qualità superiore o `gpt-4-turbo` per risposte più veloci.

## Plugin Showcase: Esempi di funzionalità straordinarie!
![TinyMCE Toolbar Plugin by irn3 & Sara](https://i.imgur.com/6KL9Zhf.png)

![TinyMCE Toolbar Plugin by irn3 & Sara](https://i.imgur.com/nvwult0.png)
