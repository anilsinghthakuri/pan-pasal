
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @livewireStyles
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
    <title>Pos Billing System</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="{{asset('font/fonts.css')}}">



</head>
<body>
    <audio id="audio" src="beep/beep-07.mp3" ></audio>
    <section class="section__billing">
        <div class="container-fluid">

                <div class="row">

                    <div class="col-md-6">
                        <div class="item__right">
                            @livewire('possale')

                            <section class="footer__part">
                                @livewire('pos')
                            </section>
                        </div>

                    </div>

                    <div class="col-md-6">

                        @livewire('poschoose')


                    </div>
                </div>

        </div>
    </section>

    <script>
        function play(){
             var audio = document.getElementById("audio");
             audio.play();
        }
    </script>

    @livewireScripts
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
