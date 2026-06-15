<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Reservasi Ruangan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    margin:0;
    background:#f4f6f9;
    overflow-x:hidden;
}

.sidebar{
    position:fixed;
    top:0;
    left:0;
    width:210px;
    height:100vh;
    background:#1f2d3d;
    transition:.3s;
    z-index:1000;
}

.sidebar.hide{
    margin-left:-210px;
}

.sidebar-header{
    color:white;
    font-size:20px;
    font-weight:bold;
    padding:20px;
    border-bottom:1px solid rgba(255,255,255,.1);
}

.menu-title{
    color:#9aa4af;
    font-size:12px;
    text-transform:uppercase;
    padding:15px 20px 5px;
}

.sidebar a{
    color:white;
    text-decoration:none;
    display:block;
    padding:12px 20px;
    transition:.3s;
}

.sidebar a:hover{
    background:#2d4059;
}

.content{
    margin-left:210px;
    transition:.3s;
}

.content.full{
    margin-left:0;
}

.topbar{
    background:#1f3552;
    color:white;
    padding:15px 25px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.hamburger{
    font-size:30px;
    cursor:pointer;
}

.user-area{
    display:flex;
    align-items:center;
    gap:10px;
}

.user-avatar{
    width:40px;
    height:40px;
    border-radius:50%;
    background:white;
    color:black;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
}

.logout-btn{
    width:100%;
    border:none;
    background:none;
    color:white;
    text-align:left;
    padding:12px 20px;
}

.logout-btn:hover{
    background:#dc3545;
}

</style>

</head>
<body>

<div class="sidebar">

    <div class="sidebar-header">
        Reservasi Ruangan
    </div>

    <div class="menu-title">
        MENU
    </div>

    <a href="{{ route('dashboard') }}">
        📊 Dashboard
    </a>

    <a href="{{ route('ruangan.index') }}">
        🏢 Ruangan
    </a>

    <a href="{{ route('peminjam.index') }}">
        👨‍🎓 Peminjam
    </a>

    <a href="{{ route('reservasi.index') }}">
        📅 Reservasi
    </a>

    <div class="menu-title">
        LAINNYA
    </div>

    <a href="{{ route('kalender.index') }}">
        📆 Kalender Reservasi
    </a>

    <a href="{{ route('profile.edit') }}">
        👤 Profile
    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit" class="logout-btn">
            🚪 Logout
        </button>
    </form>

</div>

<div class="content">

    <div class="topbar">

        <div class="hamburger" onclick="toggleSidebar()">
            ☰
        </div>

        <div class="user-area">

            <span>
                {{ Auth::user()->name }}
            </span>

            <div class="user-avatar">
                {{ strtoupper(substr(Auth::user()->name,0,1)) }}
            </div>

        </div>

    </div>

    <div class="container-fluid mt-4">

        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show shadow-sm mb-3">

                <strong>✓ Berhasil!</strong>
                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

            <script>
                setTimeout(function(){

                    let alert = document.querySelector('.alert');

                    if(alert){
                        alert.remove();
                    }

                },3000);
            </script>

        @endif

        @yield('content')

    </div>

</div>

<script>

function toggleSidebar()
{
    document.querySelector('.sidebar').classList.toggle('hide');
    document.querySelector('.content').classList.toggle('full');
}

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>