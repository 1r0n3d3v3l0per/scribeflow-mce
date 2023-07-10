# scribeflow-mce
# TinyMCE Toolbar with Deepl and OpenAI
## TinyMCE Toolbar Plugin

This custom plugin was created to integrate a new functionality into the TinyMCE toolbar, a rich text editor library (WYSIWYG). The plugin is compatible with versions 4, 5, and 6 of TinyMCE.

## Features

The TinyMCE Toolbar Plugin offers the following features:

1. **Translation with DeepL**: The plugin integrates a menu in the TinyMCE toolbar that allows you to quickly translate the selected text using the DeepL translation service. You can select the desired target language and obtain an accurate and reliable translation.

2. **Generation with OpenAI:** Use the "OpenAI" button in the toolbar to generate text using the OpenAI API. The generated text is based on the current prompt in the TinyMCE editor and is inserted at the cursor position.

3. **Toolbar Customization:** In addition to quick element insertion, the plugin enables you to customize the TinyMCE toolbar. You can add, remove, or rearrange buttons in the toolbar to fit the user's preferences.

4. **Flexible Configuration:** The plugin provides highly configurable options. You can modify the default plugin settings to adapt it to the requirements of your project.

## Installation Requirements

To ensure proper functionality, the TinyMCE Toolbar Plugin requires the following:

- TinyMCE 4.0 or later
- TinyMCE 5.0 or later
- TinyMCE 6.0 or later

## Installation for DeepL

To use the TinyMCE Toolbar Plugin with TinyMCE 4, 5, or 6, follow these steps:

1. Download the DeepL plugin package from the "Release" section of the GitHub repository.

2. Copy the plugin file into your project folder, in the appropriate path for your environment.

3. Include the plugin file in your HTML code, after including TinyMCE:

```html
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="path/to/plugin.js"></script>
```

```javascript
tinymce.init({
  toolbar: 'scribeflowdeepl',
  plugins: 'scribeflowdeepl',
  // Other configuration options for scribeflow DeepL
});
```

```javascript
tinymce.init({
  toolbar: 'customPlugin',
  plugins: 'customPlugin',
  customPlugin_options: {
    // Custom plugin options
  },
  // Other configuration options
});
```

## Installation for OpenAI

To use the scribeflow-mce Toolbar Plugin with TinyMCE 4, 5, or 6, follow these steps:

1. Download the OpenAI plugin package from the "Release" section of the GitHub repository.

2. Copy the plugin file into your project folder, in the appropriate path for your environment.

3. Obtain your OpenAI API key from the OpenAI website. 

4. Include the plugin file in your HTML code, after including TinyMCE:

```html
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="path/to/plugin.js"></script>
```

```javascript
tinymce.init({
  toolbar: 'scribeflowopenai',
  plugins: 'scribeflowopenai',
  // Other configuration options scribeflow for OpenAI
});
```

```javascript
tinymce.init({
  toolbar: 'customPlugin',
  plugins: 'customPlugin',
  customPlugin_options: {
    // Custom plugin options
  },
  // Other configuration options
});
```

## Plugin Showcase: Examples of Extraordinary Features!
![TinyMCE Toolbar Plugin by irn3 & Sara](https://i.imgur.com/6KL9Zhf.png)

![TinyMCE Toolbar Plugin by irn3 & Sara](https://i.imgur.com/nvwult0.png)


## Toolbar TinyMCE con Deepl e OpenAI

Questo plugin personalizzato è stato creato per integrare una nuova funzionalità nella toolbar di TinyMCE, una libreria di editor di testo ricco (WYSIWYG). Il plugin è compatibile con le versioni 4, 5 e 6 di TinyMCE. Inoltre, consentendo la generazione di testo utilizzando OpenAI tramite un prompt di ingresso.

## Funzionalità

Il plugin della toolbar di TinyMCE (scribeflow-mce) offre le seguenti funzionalità:

1. **Traduzione con DeepL**: Il plugin integra un menu nella toolbar di TinyMCE che consente di tradurre rapidamente il testo selezionato utilizzando il servizio di traduzione di DeepL. È possibile selezionare la lingua di destinazione desiderata e ottenere una traduzione accurata e affidabile.

2. **Generazione con OpenAI**: Utilizza il pulsante "OpenAI" nella toolbar per generare testo utilizzando l'API di OpenAI. Il testo generato si basa sul prompt attuale nell'editor TinyMCE e viene inserito nella posizione del cursore.

3. **Personalizzazione della toolbar**: Oltre all'inserimento rapido di elementi, il plugin consente di personalizzare la toolbar di TinyMCE. È possibile aggiungere, rimuovere o riorganizzare i pulsanti nella toolbar per adattarla alle preferenze dell'utente.

4. **Configurazione flessibile**: Il plugin è altamente configurabile tramite le opzioni fornite. È possibile modificare le impostazioni predefinite del plugin per adattarlo alle esigenze del progetto.

## Requisiti di installazione

Il plugin della toolbar di TinyMCE richiede quanto segue per funzionare correttamente:

- TinyMCE 4.0 o versione successiva
- TinyMCE 5.0 o versione successiva
- TinyMCE 6.0 o versione successiva

## Installazione di DeepL

Per utilizzare il plugin della toolbar di TinyMCE con TinyMCE 4, 5 o 6, segui questi passaggi:

1. Scarica il pacchetto del plugin dalla sezione "Release" di questo repository su GitHub.

2. Copia il file del plugin nella cartella del tuo progetto, nel percorso appropriato per il tuo ambiente.

3. Includi il file del plugin nel tuo codice HTML, dopo aver incluso TinyMCE:

```html
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="path/to/plugin.js"></script>
```
```javascript
tinymce.init({
  toolbar: 'scribeflowdeepl',
  plugins: 'scribeflowdeepl',
  // Altre opzioni di configurazione di scribeflow per DeepL
});
```

```
tinymce.init({
  toolbar: 'customPlugin',
  plugins: 'customPlugin',
  customPlugin_options: {
    // Opzioni del plugin personalizzate 
  },
  // Altre opzioni di configurazione
});
```

## Installation for OpenAI

Per utilizzare il plug-in scribeflow-mce Toolbar con TinyMCE 4, 5 o 6, attenersi alla seguente procedura:

1. Scarica il pacchetto del plug-in OpenAI dalla sezione "Release" del repository GitHub.

2. Copia il file del plug-in nella cartella del progetto, nel percorso appropriato per il tuo ambiente.

3. Genera la tua chiave API OpenAI dal sito Web OpenAI.

4. Includere il file del plugin nel codice HTML, dopo aver incluso TinyMCE:

```html
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="path/to/plugin.js"></script>
```

```javascript
tinymce.init({
  toolbar: 'scribeflowopenai',
  plugins: 'scribeflowopenai',
  // Altre opzioni di configurazione scribeflow per OpenAI
});
```

```javascript
tinymce.init({
  toolbar: 'customPlugin',
  plugins: 'customPlugin',
  customPlugin_options: {
    // Opzioni plug-in personalizzate
  },
  // Altre opzioni di configurazione
});
```

# Plugin Showcase: Esempi di funzionalità straordinarie!
![TinyMCE Toolbar Plugin by irn3 & Sara](https://i.imgur.com/6KL9Zhf.png)

![TinyMCE Toolbar Plugin by irn3 & Sara](https://i.imgur.com/nvwult0.png)
