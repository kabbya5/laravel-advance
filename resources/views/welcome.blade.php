<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Styles -->
        <style>
            
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <h1>Pusher Test</h1>
        
        <div class="container my-4">
            <form action="{{ route('message.send') }}" method="POST">
                @csrf
                <div class="mb-3 form-grup">
                    <label  for="title" class="form-lable">  title</label>
                    <input id="title" type="text" name='title' class="form-control">
                </div>
                <div class="mb-3 form-grup">
                    <label for="title" class="form-lable">  message </label>
                    <textarea id="message" class="form-control" name="message" id="message" cols="30" rows="10">

                    </textarea>
                </div>

                <button type="submit" class="btn btn-primary"> save </button>
               
            </form>

            <div class="box-body">
                <div class="direct-chat-message" id="message"> </div>
            </div>
        </div>
        

        <script>

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;
        
            var pusher = new Pusher('22ceb9c89d1377cc2ab9', {
              cluster: 'ap2'
            });
        
            var channel = pusher.subscribe('message');
            channel.bind('my-event', function(data) {
              alert(JSON.stringify(data));
            });
          </script>
    </body>
</html>
