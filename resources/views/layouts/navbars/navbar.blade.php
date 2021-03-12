@auth('petugas')
    @include('layouts.navbars.navs.admin.auth')
@endauth
    
@guest('petugas')
    @include('layouts.navbars.navs.public')
@endguest

@auth('masyarakat')
    @include('layouts.navbars.navs.public')
@endauth