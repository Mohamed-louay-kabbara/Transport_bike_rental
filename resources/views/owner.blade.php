
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <!-- Datatable Dependency start -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>إدارة العمال</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Datatable Dependency end -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Simple Sidebar - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <body>
      
            </div>

            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
            
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                @guest
                                @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @endif


                                @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>


                <div class="container">

                    <div class="col-md-12">

                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <table class="table table-bordered table-hover col-10" id="table_id">
                                <thead>
                                    <tr>
                                      <th>#</th>
                                        <th>الاسم</th>
                                        <th>الهاتف</th>
                                        <th>الراتب الكامل </th>
                                        <th>السلفة </th>
                                        <th>الراتب الباقي </th>
                                        <th data-priority="7">أرقام</th>
                                       <?php $i=1;?>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($worker as $w)
                                    <?php $t=0 ?>
                                    <tr>
                                      <td>{{ $i++ }}</td>
                                        <td>{{$w->name}}</td>
                                        <td>{{$w->phone}}</td>
                                        <td>{{$w->salary}}</td>
                                        <td>
                                        @foreach($outlay as $u)
                                        @if($u->worker_id == $w->id)
                                       <?php $t+=$u->price ?>
                                        @endif
                                        @endforeach {{$t}}</td>
                                        <td> {{$w->salary-$t}}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#delete{{$w->id}}" data-bs-whatever="@mdo">أرقام</button>
                                            <div class="modal fade" id="delete{{$w->id}}" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel2">أرقام الكراجات والعربايات</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul>
                                                                @foreach($straples as $s)
                                                                @if($w->id == $s->user_id)
                                                                <li>{{$s->number}}</li>
                                                                @endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>

            </div>
            <script>
                $(document).ready(function() {
                    $('#table_id').DataTable({

                        dom: 'Bfrtip'
                        , responsive: true
                        , pageLength: 25,
                        // lengthMenu: [0, 5, 10, 20, 50, 100, 200, 500],

                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]

                    });
                });

            </script>


            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Core theme JS-->
            <script src="js/scripts.js"></script>
            <script>
                var msg = '{{Session::get('
                alert ')}}';
                var exist = '{{Session::has('
                alert ')}}';
                if (exist) {
                    alert(msg);
                }

            </script>
