<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading font-weight-bold">Menu administratora</div>
    <div class="list-group list-group-flush">
        <a href="{{route('admin.dashboard')}}" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action bg-light disabled font-weight-bold text-uppercase">Terminarz</a>
        <a href="{{route('admin.timetable.create')}}" class="list-group-item list-group-item-action bg-light pl-5">Dodaj kolejkę</a>
        <a href="{{route('admin.timetable.edit')}}" class="list-group-item list-group-item-action bg-light pl-5">Usuń kolejkę</a>
        <a href="#" class="list-group-item list-group-item-action bg-light disabled font-weight-bold text-uppercase">Mecze</a>
        <a href="{{route('admin.matches.last.edit')}}" class="list-group-item list-group-item-action bg-light pl-5">Ostatni mecz</a>
        <a href="{{route('admin.matches.upcoming.edit')}}" class="list-group-item list-group-item-action bg-light pl-5">Najbliższy mecz</a>
        <a href="{{route('admin.standing.create')}}" class="list-group-item list-group-item-action bg-light">Tabela</a>
        <a href="{{route('admin.players.index')}}" class="list-group-item list-group-item-action bg-light">Lista zawodników</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="list-group-item-logout list-group-item-action bg-light">Wyloguj</button>
        </form>
    </div>
</div>
<!-- /#sidebar-wrapper -->
