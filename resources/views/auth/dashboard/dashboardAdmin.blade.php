<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/jsVue/App.js')
    
</head>

<body>
    
    <div id="app" data-name='{{ Auth::user()->name }}' data-i='{{Auth::user()->id}}'>
    </div>
</body>

</html>