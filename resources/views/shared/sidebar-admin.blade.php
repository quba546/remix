<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading font-weight-bold">Menu administratora</div>
    <div class="list-group list-group-flush">
        <a href="{{route('admin.dashboard')}}" class="list-group-item list-group-item-action bg-light sidebar-icon"><i class="fas fa-home"></i> Dashboard</a>
        @can('moderator-level')
        <a href="#" class="list-group-item list-group-item-action bg-light disabled font-weight-bold text-uppercase sidebar-icon">Terminarz</a>
        <a href="{{route('admin.timetable.create')}}" class="list-group-item list-group-item-action bg-light pl-5 sidebar-icon"><i class="far fa-calendar-plus"></i> Dodaj kolejkę</a>
        <a href="{{route('admin.timetable.edit')}}" class="list-group-item list-group-item-action bg-light pl-5 sidebar-icon"><i class="far fa-calendar-minus"></i> Usuń kolejkę</a>
        <a href="#" class="list-group-item list-group-item-action bg-light disabled font-weight-bold text-uppercase sidebar-icon">Mecze</a>
        <a href="{{route('admin.matches.last.edit')}}" class="list-group-item list-group-item-action bg-light pl-5 sidebar-icon"><i class="fas fa-backward"></i> Ostatni mecz</a>
        <a href="{{route('admin.matches.upcoming.edit')}}" class="list-group-item list-group-item-action bg-light pl-5 sidebar-icon"><i class="fas fa-forward"></i> Najbliższy mecz</a>
        <a href="{{route('admin.standing.create')}}" class="list-group-item list-group-item-action bg-light sidebar-icon"><i class="fas fa-table"></i> Tabela</a>
        <a href="{{route('admin.players.index')}}" class="list-group-item list-group-item-action bg-light sidebar-icon"><i class="fas fa-list"></i> Lista zawodników</a>
        @endcan
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="list-group-item-logout list-group-item-action bg-light sidebar-icon"><i class="fas fa-sign-out-alt"></i> Wyloguj</button>
        </form>
    </div>
</div>
<!-- /#sidebar-wrapper -->
