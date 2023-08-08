
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
<title>إدارة الاستعارة</title>
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
    <div class="d-flex" id="wrapper">
        <div class="border-end bg-white " id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">إدارة الاستعارة</div>
            <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('worker.index') }}"> معلومات العتالين </a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('Sale.index') }}">إدارة الإستعارة</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('Buy.index') }}">إدارة الإرجاع </a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('Outlay.index') }}"> المصاريف</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('workers') }}"> العمال </a>
        </div>
        </div>
        <div id="page-content-wrapper">
            <!-- Top navigation-->
             <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">إخفاء القائمة</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                         <ul class="navbar-nav me-auto">

                        </ul>

                        <ul class="navbar-nav ms-auto">

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
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete" style="margin:0rem 0rem 0rem 60rem;" data-bs-whatever="@mdo"> حذف الكل</button>
                                        <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel2"> حذف الكل</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('Sale.create')}}" method="get">
                                                            <lable>إدخل كلمة السر</lable><br>
                                                            <input type="password" name="password" class="form-control" id="recipient-name"><br>
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                <button type="button" class=" btn  btn-outline-danger" data-bs-dismiss="modal" aria-label="Close" style="margin-right:10px;">إلغاء</button>
                                                                <button type="submit" class="btn  btn-outline-success" >حذف</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                       </div>
                                                      </div>
                                                </div>

                        <table class="table table-bordered table-hover col-10" id="table_id">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الصورة</th>
                                    <th>الاسم</th>
                                    <th>الهاتف</th>
                                    <th>الرقم الآلة</th>
                                    <th>نوع العملية </th>
                                    <th>السعر</th>
                                    <th> تاريخ </th>



                                    <?php $i=1; ?>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sale as $s)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    @foreach($porter as $p)
                                    @if($p->id == $s->proter_id)
                                    <td><img id="im" src="{{ asset('imgs/' . $p->picture) }}" style="width:70px;height:70px">
                                    </td>
                                    <td>{{$p->name}}</td>
                                    <td>{{$p->phone}}</td>
                                    @endif
                                    @endforeach
                                    @foreach($straples as $st)
                                    @if($s->straple_id == $st->id)
                                    <td>{{$st->number}}</td>
                                    @endif
                                    @endforeach
                                    <td>{{$s->Borrow_Type}}</td>
                                    <td>{{$s->Price}}</td>
                                    <td>{{$s->created_at}}</td>
        




                                </tr>
                                @endforeach
                            </tbody>
                        </table>

            

        </div>
        <script type="text/javascript">
            function GetClock(){
                d = new Date();
                nhour  = d.getHours();
            }
        </script>

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
