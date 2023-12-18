<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Manpower Recruitment Agency" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Yaramay" />
    <meta name="generator" content="Saudi Manpower Recruitment Agency" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/alyusr-logo.png') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('icofont/icofont.min.css') }}">


    <title>Al Yusr</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <livewire:nav-component />


    {{ $slot }}


    <livewire:footer-component />


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
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
    </script>
</body>

</html>
