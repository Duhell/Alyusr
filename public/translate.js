
document.addEventListener('DOMContentLoaded', function() {
    var initialLanguage = 'en';
    toggleLanguage(initialLanguage);

    document.querySelectorAll('.language').forEach(function(element) {
        element.addEventListener('click', function(e) {
            e.preventDefault();
            toggleLanguage(element.getAttribute('language'));
        });
    });
});

function toggleLanguage(language) {
    var labels = document.querySelectorAll('.language-label');

    labels.forEach(function(label) {
        var labelText = label.getAttribute('data-original'); // Store the original text

        if (!labelText) {
            labelText = label.textContent; // If original is not stored, get it from the current text
            label.setAttribute('data-original', labelText); // Store the original text
        }

        var separatorIndex = labelText.indexOf('/');

        if (separatorIndex !== -1) {
            if (language === 'en') {
                // Show only the English part
                label.textContent = labelText.substring(0, separatorIndex);
            } else if (language === 'ar') {
                // Show both English and Arabic parts
                label.textContent = labelText;
            }
        }
    });
}


document.querySelectorAll('.language').forEach(item => {
    item.addEventListener('click', async event => {
      event.preventDefault();
      var language = item.getAttribute('language') == 'en' ? `ar|en` : "en|ar";


      var elementsToTranslate = document.querySelectorAll('.translate-target');
      var textsToTranslate = Array.from(elementsToTranslate).map(element => element.innerText);

      const options = {
        method: 'GET',
        url: 'https://translated-mymemory---translation-memory.p.rapidapi.com/get',
        params: {
          langpair: `${language}`,  // language from the link
          q: textsToTranslate.join('\n'),  // Join all texts with a newline separator
          mt: '1',
          onlyprivate: '0',
          de: 'a@b.c'
        },
        headers: {
          'X-RapidAPI-Key': '4f28cadeddmshf23ec9c7ee4a5d8p1f98ecjsn247d6b37356c',
          'X-RapidAPI-Host': 'translated-mymemory---translation-memory.p.rapidapi.com'
        }
      };

      try {
        const response = await axios.request(options);
        var translatedTexts = response.data.responseData.translatedText.split('\n');

        elementsToTranslate.forEach((element, index) => {
          element.innerText = translatedTexts[index];
        });
      } catch (error) {
        console.error(error);
      }
    });
});





