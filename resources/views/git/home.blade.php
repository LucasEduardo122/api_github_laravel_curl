<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Git User</title>
    <link rel="stylesheet" href="{{asset('/site/css')}}/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <header>
        <h1 class="logo"><strong>Git</strong> User</h1>
        <div class="form">
            <form action="{{route('home.userGit')}}" method="post">
                @csrf
                <input type="text" class="{{$errors->has('user') ? 'is-invalid' : ''}}" name="user" placeholder="informe o nome do usuário">
                <div class="invalid-feedback">
                    {{$errors->first('user')}}
                </div>
                <button type="submit">Buscar</button>
            </form>
        </div>
    </header>
    <hr>
    <div class="container">
        @if($user)
        <div class="row profile">
            <div class="col-md-3">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="{{$user->avatar_url}}" class="img-responsive" alt="">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            {{$user->login}}
                        </div>
                        <div class="profile-usertitle-job">
                            Developer
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                        <button type="button" class="btn btn-success btn-sm">Follow</button>
                        <button type="button" class="btn btn-danger btn-sm">Message</button>
                    </div>
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li class="active">
                                <a href="#">
                                    <i class="glyphicon glyphicon-home"></i>
                                    GitUser </a>
                            </li>
                            <li>
                                <a href="{{$user->html_url}}">
                                    <i class="glyphicon glyphicon-user"></i>
                                    GitHub </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->

                    <div class="portlet light bordered">
                        <!-- STAT -->
                        <div class="row list-separated profile-stat">
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="uppercase profile-stat-title"> 37 </div>
                                <div class="uppercase profile-stat-text"> Projects </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="uppercase profile-stat-title"> 51 </div>
                                <div class="uppercase profile-stat-text"> Tasks </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="uppercase profile-stat-title"> 61 </div>
                                <div class="uppercase profile-stat-text"> Uploads </div>
                            </div>
                        </div>
                        <!-- END STAT -->
                        <div>
                            <h4 class="profile-desc-title">Sobre {{$user->name}}</h4>
                            <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore.
                            </span>

                        </div>
                    </div>



                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-content">
                    @forelse($repo as $git) 
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{$git->html_url}}">
                                {{$git->name}}
                            </a>
                        </li>
                    </ul>
                    @empty
                    <div class="alert alert-danger text-center" align="center" role="alert">
                        Repositório vazio!
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
        @endif
        @if(!$user)
        <div class="alert alert-danger text-center" align="center" role="alert">
            Nenhum usuário encontrado!
        </div>
        @endif
    </div>

    <footer>
        <p>@CopyRight GitUser</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>