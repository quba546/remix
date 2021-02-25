@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row mx-auto">
            <div class="col-12 mt-5 mb-5 bg-white shadow-lg">
                <div class="text-center p-3">
                    <h2 class="text-uppercase font-weight-bold mt-3">O nas</h2>
                    <hr>
                    <div class="text-justify mt-5">
                        <img src="{{ url('/assets/remix_stare.jpg') }}" alt="Stare zdjęcie grupowe drużyny"
                             class="float-left mr-3 mb-3 border border-success shadow-lg" width="60%">
                        <p>
                            Ludowy Klub Sportowy REMIX Niebieszczany został założony w 1994 roku. Powstanie drużyny
                            piłkarskiej, która będzie reprezentować Naszą miejscowość w lokalnych rozgrywkach sportowych
                            było marzeniem wielu osób. Niestety, pierwsze mecze Remix rozgrywał w sąsiedniej
                            miejscowości – Prusieku, ponieważ wtedy, w Niebieszczanach nie było jeszcze stadionu.
                            Dzięki wysiłkowi i zaangażowaniu wielu osób związanych z naszym klubem doczekaliśmy się
                            zbudowania w naszej miejscowości boiska. Zaraz po tym, kiedy Nasi piłkarze zaczęli rozgrywać
                            mecze na naszym stadionie klub zaczął odnosić pierwsze sukcesy. Dla naszej młodej drużyny
                            sukcesami takimi były: awans do wyższej klasy rozgrywkowej grupy krośnieńskiej – klasy A
                            oraz wygrana w corocznie organizowanym w okresie wakacyjnym Pucharze Wójta Gminy Sanok.
                        </p>
                        <h3>Pierwsze sukcesy</h3>
                        <p>
                            W rozgrywkach Pucharu Polski na szczeblu wojewódzkim nasza drużyna miała okazję zagrać z
                            Karpatami Krosno – zespołem, który był klasyfikowany kilka ligowych szczebli wyżej.
                            Niestety, na tym spotkaniu zakończył się udział naszego zespołu w tamtych rozgrywkach
                            organizowanych przez Polski Związek Piłki Nożnej. Jednak dla wszystkich uczestników tamtych
                            wydarzeń, zarówno piłkarzy, jak i kibiców była to niezapomniana przygoda. Nasz klub
                            startował potem jeszcze dwa razy w rozgrywkach Pucharu Polski – w sezonach 2004/2005 oraz
                            2006/2007. Występy te jednak Remix kończył już na pierwszej rundzie.
                        </p>
                        <h3>Powtórny awans do A klasy</h3>
                        <img src="{{ url('/assets/baraze_mecz.jfif') }}" alt="Mecz barażowy pomiędzy Remixem a Płowcami, sezon 2017/2018"
                             class="float-right ml-3 mb-3 border border-success shadow-lg" width="55%">
                        <p>
                            W tym czasie nasza drużyna prowadziła rozgrywki ligowe na szczeblu B klasy grupy
                            krośnieńskiej. Trwało to aż do sezonu 2016/2017, kiedy z powodu braków kadrowych Remix
                            Niebieszczany spadł do najniższej klasy rozgrywkowej. W następnym sezonie sytuacja kadrowa
                            nie wyglądała lepiej. Rozgrywki w klasie C zakończyliśmy na 4 miejscu. Po zakończeniu
                            sezonu z powodu reorganizacji struktur ligowych podjęto decyzję o likwidacji klasy C w
                            okręgu krośnieńskim. Dzięki temu kolejny sezon zaczynaliśmy już w klasie B. Sezon
                            rozpoczęliśmy już z dużo szerszą kadrą piłkarzy oraz nowym trenerem – Danielem Niemczykiem.
                            Ciężka praca na treningach i dobra gra zaowocowała zajęciem drugiego miejsce w ligowej
                            tabeli. Pozwoliło to nam rozgrywać baraże o wejście do wyższej klasy rozgrywkowej. W ramach
                            baraży zagraliśmy dwumecz z drużyną LKS Płowce/Stróże Małe. Dzięki dwóm zwycięstwom –
                            najpierw na naszym stadionie 4-3, a następnie w Płowcach 4-0 w końcu awansowaliśmy do
                            upragnionej A klasy. I tak do dnia dzisiejszego nasza drużyna występuje w rozgrywkach A
                            klasy grupy krośnieńskiej. W ostatnich sezonach głównie walczyliśmy o utrzymanie się w tej
                            klasie.
                        </p>
                        <img src="{{ url('/assets/puchar_wojta_2018.jpg') }}" alt="Mecz barażowy pomiędzy Remixem a Płowcami, sezon 2017/2018"
                             class="float-left mr-3 mb-3 border border-success shadow-lg" width="55%">
                        <h3>Obecnie</h3>
                        <p>
                            W 2016 roku dzięki inicjatywie rodziców oraz wielu pasjonatów futbolu z naszej miejscowości
                            założono cztery bardzo liczne grupy młodzików. W naszych zespołach młodzieżowych gra wiele
                            chłopców i dziewczynek z roczników 2004-2011. Biorą oni aktywny udział w turniejach
                            organizowanych w okolicznych miejscowościach. Jesteśmy świadomi, że nasza drużyna może
                            przetrwać tylko jeśli będzie posiadała liczne kadry młodzieżowe.
                        </p>
                        <p>
                            Obecnie we wszystkich kategoriach wiekowych od młodzików do seniorów do Naszego klubu
                            zapisanych jest około 115 piłkarzy i piłkarek.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
