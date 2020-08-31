@extends('forumclient.layout.forum')

@section('content')
   {{-- Navigation Header part --}}
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-success" style="padding-left: 10%; padding-right: 10%;">
        <a href="#" class="navbar-brand">ONLINE FORUM</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse4">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse4">
            <form class="form-inline ml-auto">
                <input type="text" class="form-control mr-sm-2" placeholder="Search">
                <button type="submit" class="btn btn-outline-light">Search</button>
            </form>
            <a href="#" class="nav-item nav-link active" style="color: white;">Login</a>
            <a href="#" class="nav-item nav-link active" style="color: white;">Register</a>
        </div>
    </nav>
    <div class="container-fluid" style="padding-left: 10%; padding-right: 10%;">
        <div class="row">
            <div class="col-4">
                <div style="width: 100%; height: 500px; background-color: #28a745; color: white; border-radius: 6px">dd</div>
            </div>
            <div class="col-8" style="text-align: right">
                
            </div>
        </div>
    </div>
@endsection