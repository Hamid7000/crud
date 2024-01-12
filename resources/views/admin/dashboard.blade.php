@include('adminlayout.header')

<body class="layout-4">
<!-- Page Loader -->
{{-- <div class="page-loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div> --}}
        
       @include('adminlayout.navbar')

       @include('adminlayout.sidebar')

        <!-- Start app main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Employees Data</h1>
                </div>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                      <tr>
                        
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->address }}</td>
                      </tr>
                      @endforeach
                     
                    </tbody>
                  </table>
                
              
            </section>
        </div>

      
    </div>
</div>

@include('adminlayout.script')
</body>

<!-- blank.html  Tue, 07 Jan 2020 03:35:42 GMT -->
</html>