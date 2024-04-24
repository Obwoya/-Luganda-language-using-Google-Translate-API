<?php
if(isset($_POST['submit'])) {
    require_once 'vendor/autoload.php'; // Include Google API Client Library

    // Function to translate text using Google Translate API
    function translateText($text, $targetLanguage) {
        $apiKey = 'YOUR_GOOGLE_TRANSLATE_API_KEY';
        $client = new Google\Service\Translate\Google_Service_Translate(new Google\Client(['apiKey' => $apiKey]));
        $translation = $client->translations->listTranslations($text, $targetLanguage);
        return $translation[0]['translatedText'];
    }

    // Translate the input text or document into Luganda
    if(!empty($_POST['text'])) {
        $text = $_POST['text'];
        $translatedText = translateText($text, 'lg');
        echo '<strong>Translated Text:</strong><br>' . $translatedText;
    } elseif(!empty($_FILES['file']['tmp_name'])) {
        $fileContent = file_get_contents($_FILES['file']['tmp_name']);
        $words = str_word_count($fileContent);
        if ($words > 2000) {
            echo 'Error: Document exceeds the maximum word limit of 2000 words.';
        } else {
            $translatedDocument = translateText($fileContent, 'lg');
            echo '<strong>Translated Document:</strong><br>' . $translatedDocument;
        }
    } else {
        echo 'Please enter text or upload a document.';
    }
}
?>
