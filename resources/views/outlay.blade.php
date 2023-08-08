
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
    <title>إدارة المصاريف</title>
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
            <!-- Sidebar-->
            <div class="border-end bg-white " id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">إدارة المصاريف</div>
                <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('worker.index') }}"> معلومات العتالين </a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('Sale.index') }}">إدارة الإستعارة</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('Buy.index') }}">إدارة الإرجاع </a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('Outlay.index') }}"> المصاريف</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('workers') }}"> العمال </a>
                </div>
            </div>

            <!-- Page content wrapper-->
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
                        <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">إضافة</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">إضافة مصروف</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('Outlay.store')}}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">ملاحظات</label>
                                                  <textarea class="form-control" name="note" id="" rows="3"></textarea>
                                                </div>
                                            
                                            <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">السعر</label>
                                                <input type="number" class="form-control" id="recipient-name" name="price">
                                            </div>
                                            <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">اسم المالك</label>

                                                <select name="user_id" class="form-control m-bot15" data-live-search="true" style="">
                                                <option value="1">اختر</option>
                                                                @foreach($user as $u)
                                                               
                                                                <option value="{{$u->id}}">{{$u->name}}</option>
                                                                @endforeach
                                                            </select></div><br>
                                                           <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">اسم العامل</label>

                                                             <select name="worker_id" class="form-control m-bot15" data-live-search="true" style="">
                                                             <option value="0">اختر</option>
                                                                @foreach($worker as $w)
                                                              
                                                                <option value="{{$w->id}}">{{$w->name}}</option>
                                                                @endforeach
                                                            </select></div><br>
</div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                        <button type="submit" class="btn btn-primary">إضافة</button>
                                    </div>
                                    </form>
                                </div>
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
                                        <th>ملاحظات</th>
                                        <th>السعر</th>
                                        <th>اسم المالك</th>
                                        <th>اسم العامل</th>
                                        <th> التاريخ</th>
                                        <th data-priority="7">حذف</th>
                                       <?php $i=1; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($outlay as $w)
                                    <tr>
                                      <td>{{ $i++ }}</td>
                                        <td>{{$w->note}}</td>
                                        <td>{{$w->price}}</td>
                                        <td>
                                        @foreach($user as $u)
                                        @if($u->id == $w->user_id)
                                        {{$u->name}}
                                        @endif
                                        @endforeach</td>
                                        <td>@foreach($worker as $wo)
                                            @if($w->worker_id == $wo->id)
                                            {{$wo->name}}
                                            @endif
                                            @endforeach</td>
                                            <td>{{$w->created_at}}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete{{$w->id}}" data-bs-whatever="@mdo">حذف</button>
                                            <div class="modal fade" id="delete{{$w->id}}" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel2">رسالة تحذير</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('Outlay.destroy',$w->id)}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <p>هل أنت متأكد من عملية الحذف؟</p>
                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                    <button type="button" class=" btn-outline-primary  m-1" data-bs-dismiss="modal" aria-label="Close">إغلاق</button>

                                                                    <button type="submit" class="btn  btn-outline-danger m-1">حذف</button>

                                                                </div>
                                                            </form>
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
