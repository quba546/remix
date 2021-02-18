<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading font-weight-bold">Menu administratora</div>
    <div class="list-group list-group-flush">
        <a href="{{route('admin.dashboard')}}" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="{{route('admin.matches.last.edit')}}" class="list-group-item list-group-item-action bg-light">Ostatni mecz</a>
        <a href="{{route('admin.matches.upcoming')}}" class="list-group-item list-group-item-action bg-light">Najbliższy mecz</a>
        <a href="{{route('admin.standings')}}" class="list-group-item list-group-item-action bg-light">Tabela</a>
        <a href="{{route('admin.player.list')}}" class="list-group-item list-group-item-action bg-light">Lista zawodników</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Wyloguj</a>
    </div>
</div>
<!-- /#sidebar-wrapper -->
