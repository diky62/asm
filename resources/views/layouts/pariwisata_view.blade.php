<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>PT.Angga Saputra Mandiri</title>
    <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}"
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- CUSTOM STYLE  -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- DATATABLE STYLE  -->
    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    {{-- full calendar --}}
    <link rel='stylesheet' href='{{asset('fullcalendar/fullcalendar.css')}}' />

    <style type="text/css">
        #calendar {
        max-width: 900px;
        margin: 0 auto;
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
        }
    </style>
    @yield('css')

</head>
<body>
    <div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">

                    <img src="{{asset('gambar/logo.png')}}" width="120"/>
                </a>

            </div>

            <div class="right-div">
                <a href="#" class="btn btn-danger pull-right" onclick="logout()"><i class="fa fa-sign-out-alt"></i> LOG ME OUT</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="{{url('schedule')}}"  @yield('#')><i class="fa fa-calendar-check"></i> Schedule</a></li>
                            <li><a href="{{url ('orderbus')}}"  @yield('#')><i class="fa fa-bus-alt "></i> Sewa Bus Pariwisata</a></li>
                            <li><a href="{{url ('ordertour')}}"  @yield('#')><i class="fa fa-ticket-alt "></i> Paket Wisata</a></li>
                            <!-- <li><a href="#"  @yield('#')>Laporan</a></li> -->
                             

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
     <!-- MENU SECTION END-->
    <div class="content-wrapper">
        {{-- <section class="content"> --}}
        @yield('content')
        {{-- </section>   --}}
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   &copy; 2019 Diki Darmawan Fitriyadi |<a href="#" target="#"  > Politeknik Negeri Indramayu</a> 
                </div>

            </div>
        </div>
    </section>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- jQuery 3 -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- CORE JQUERY  -->
    <script src="{{ asset('assets/js/jquery-1.10.2.js') }}"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- Sawal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.26.12/sweetalert2.all.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="{{asset('js/dataTables/jquery.dataTables.js')}}"></script>
    <!-- Full Calendar -->
    <script src="{{asset('fullcalendar/lib/moment.min.js')}}"></script>
    <script src="{{asset('fullcalendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('fullcalendar/locale/id.js')}}"></script>
    <!-- Print This -->
    <script src="{{asset('js/printThis.js')}}" charset="utf-8"></script>
    <!-- curency -->
    <script src="{{asset('js/jquery.mask.js')}}"></script>
{{-- <script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : [
                @foreach($tasks as $task)
                {
                    title : '{{ $task->name }}',
                    start : '{{ $task->task_date }}',
                    url : '{{ route('tasks.edit', $task->id) }}'
                },
                @endforeach
            ]
        })
    });
</script> --}}

    <script type="text/javascript">
        $(document).ready(function(){
            $("#table").DataTable();
        });

        const logout = ()=>{
        swal({
            type:"info",
            title: "Logout from here?",
            confirmButtonText: "<i class='fa fa-thumbs-up'></i> Yes, Log me out",
            showCancelButton:true,
            cancelButtonColor: '#d33',
            cancelButtonText: "<i class='fa fa-window-close'></i> Cancel"
        }).then(res=>{
          if(res.value){
              $("#logout-form").submit();
          }
        });
      }
    </script>

    <script>
        function myFunction() {
            var x = document.getElementById("fname");
             x.value = x.value.toLowerCase().replace(/b[a-z]/g, function(letter) {
            return letter.toUpperCase();
          });
        }
    </script>

    <script type="text/javascript">
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }
    </script>

    @yield('script')
  
</body>
</html>
