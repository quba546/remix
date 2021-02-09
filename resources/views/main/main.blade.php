<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Remix Niebieszczany</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
    <header>
        <div class="header row mx-auto pt-3 pb-3">
            <div class="col-12 col-lg-3 d-flex align-items-center justify-content-center">
                <a href="#">
                    <img src="{{ url('/assets/remix-logo.png') }}" alt="Logo Remix Niebieszczany">
                </a>
            </div>
            <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center title">Remix Niebieszczany</div>
            <div class="col-12 col-lg-3 d-flex align-items-center justify-content-center">
                <span class="sign-in-icon">
                    <i class="fas fa-sign-in-alt mr-3"></i>
                </span>
                <span class="sign-in">
                    <a href="#" >Logowanie</a>
                </span>
            </div>
        </div>
        <nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fas fa-home mr-3"></i>Strona główna<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown ml-3">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-male mr-3"></i>Sezon</a>
                        <div class="dropdown-menu shadow p-3 mb-5 bg-white rounded" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Terminarz</a>
                            <a class="dropdown-item" href="#">Tabela</a>
                            <a class="dropdown-item" href="#">Kadra</a>
                            <a class="dropdown-item" href="#">Statystyki</a>
                        </div>
                    <li class="nav-item ml-3">
                        <a class="nav-link" href="#"><i class="fas fa-child mr-3"></i>Sekcje młodzieżowe</a>
                    </li>
                    <li class="nav-item ml-3">
                        <a class="nav-link" href="#"><i class="fas fa-info-circle mr-3"></i>O klubie</a>
                    </li>
                    <li class="nav-item ml-3">
                        <a class="nav-link" href="#"><i class="far fa-address-book mr-3"></i>Kontakt</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container mt-3 mb-3">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores consequuntur deleniti hic itaque provident reprehenderit vel voluptates! A accusantium aliquam earum ex iure modi, sed? Atque, culpa cumque dolorem dolores doloribus ducimus eius error exercitationem fuga magni nam natus nesciunt non nulla optio perspiciatis quas reprehenderit repudiandae tenetur totam veniam veritatis voluptates voluptatum? Alias animi architecto dolorum error ex exercitationem minus mollitia officiis sunt vitae? Accusantium animi asperiores cumque delectus dicta dignissimos dolor dolore ducimus ea eos eveniet explicabo fugiat id impedit iure laboriosam magni molestiae mollitia natus necessitatibus nostrum numquam optio pariatur, perferendis praesentium quae, quaerat quia quo quod reiciendis reprehenderit rerum sequi sunt tempora ullam voluptate, voluptatibus. Animi aperiam assumenda at earum exercitationem expedita explicabo facilis, hic ipsa itaque maxime minima minus molestias mollitia natus nostrum numquam omnis possimus, praesentium quia quis repellendus reprehenderit repudiandae temporibus unde voluptate voluptatum! Ab alias animi aspernatur atque doloremque earum enim eveniet, incidunt, ipsa perferendis sequi tempore ut? Alias aliquid animi asperiores aspernatur assumenda at blanditiis consectetur deleniti distinctio ea et ex facilis harum illo, impedit in incidunt ipsa iusto labore laboriosam magnam magni molestiae nisi placeat provident quae quaerat quibusdam quidem quis repellendus repudiandae sapiente vel vitae? A ad consectetur cum deleniti dolore doloremque ea et fugiat incidunt optio reprehenderit tenetur unde, voluptates. Corporis, itaque, quisquam. Accusamus, culpa cum cupiditate deserunt, doloribus ducimus eligendi et facilis illum in maiores mollitia quae, reprehenderit repudiandae suscipit. Fugiat incidunt laborum non obcaecati sit sunt? Commodi, ipsam maiores pariatur quam quis recusandae. Aliquid debitis dolorum, eum exercitationem maxime natus nemo officia sequi soluta. Doloremque dolorum molestiae quidem quis reiciendis, rerum velit. Aut autem blanditiis cumque delectus deleniti enim hic non, sed? Asperiores blanditiis, deserunt ipsum iusto nisi quibusdam quo reiciendis sequi suscipit totam? Architecto deleniti in ipsum minus nobis odio pariatur, perferendis quod repellendus veniam!
    </div>
    <footer id="footer">
        <div class="row mx-auto custom-footer">
            <div class="col-12 col-lg-4 pt-3 pb-3 text-center vertical-center">
                <table class="vertical-center">
                    <thead>
                    <tr>
                        <td>Regulaminy</td>
                        <td>Mapa strony</td>
                        <td>Klub w innych serwisach</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><a href="#">Polityka prywatności</a></td>
                        <td><a href="#">Sekcja młodzieżowa</a></td>
                        <td><a href="#">90minut.pl</a></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="#">O klubie</a></td>
                        <td><a href="#">laczynaspilka.pl</a></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="#">Kontakt</a></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-lg-4 pt-3 pb-3 text-center vertical-center">
                <span>Odwiedź nas w mediach społecznościowych</span>
                <br>
                <span class="social-icons">
                    <a href="#">
                        <i class="fab fa-facebook mr-5"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                </span>
                <br>
                <span>
                    Tel:<a href="tel:123123123"> 123123123</a>
                </span>
                <br>
                <span>
                    E-mail:<a href="mailto:example@domain.com"> example@domain.com</a>
                </span>
                <br>
                <span>NIP: 6871791491</span>
                <br>
                <span>REGON: 371011186</span>
            </div>
            <div class="col-12 col-lg-4 pt-3 pb-3 text-center vertical-center">
                <span>Wszelkie prawa zastrzeżone</span>
                <br>
                <span>&copy;<script>document.write(new Date().getFullYear().toString());</script> Remix Niebieszczany</span>
                <br>
                <span>Stronę wykonał Jakub Pałys</span>
            </div>
        </div>
    </footer>
    <script src="{{ mix('/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            setInterval(function() {
                let selector = $('#footer');

                let docHeight = $(window).height();
                let footerHeight = selector.height();
                let footerTop = selector.position().top + footerHeight;
                let marginTop = (docHeight - footerTop + 10);

                if (footerTop < docHeight)
                    selector.css('margin-top', marginTop + 'px'); // padding of 30 on footer
                else
                    selector.css('margin-top', '0px');
                // console.log("docheight: " + docHeight + "\n" + "footerheight: " + footerHeight + "\n" + "footertop: " + footerTop + "\n" + "new docheight: " + $(window).height() + "\n" + "margintop: " + marginTop);
            }, 250);
        });
    </script>
    <script>
        $(window).scroll(function(){
            if ($(this).scrollTop() > $('.header').height()) {
                $('#navbar_top').addClass("fixed-top");
                // add padding top to show content behind navbar
                $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
            }else{
                $('#navbar_top').removeClass("fixed-top");
                // remove padding top from body
                $('body').css('padding-top', '0');
            }
        });
    </script>
</body>
</html>
