<!DOCTYPE html>
<html>

  <head>
    <title>Administrador de Usuarios @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
      .table, table {
        width: 60%;
        border-collapse: collapse;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        align: center;
        margin: auto;
      }

      th,
      td {
        padding: 15px;
        background-color: rgba(255,255,255,0.2);
      }

      th {
        text-align: center;
      }

      thead {
        th {
          background-color: #55608f;
        }
      }

      tbody {
        tr {
          &:hover {
            background-color: rgba(255,255,255,0.3);
          }
        }
        td {
          position: relative;
          &:hover {
            &:before {
              content: "";
              position: absolute;
              left: 0;
              right: 0;
              top: -9999px;
              bottom: -9999px;
              background-color: rgba(255,255,255,0.2);
              z-index: -1;
            }
          }
        }
      }
      h1, h2 {
        margin: auto;
        padding: 20px;
        text-align: center;
      }
      a.navbar-brand{
        margin-left: 50px;

      }
      form{
        margin: auto;
        align: center;
        width: 40%;
        padding: 20px;
      }
      button.btn.btn-primary{
        text-align: center;
        margin: auto;
        padding: 10px;
        float: right;
        margin-top:20px;
      }
      div.form-group{
        
      }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand">Administrador de Usuarios</a>
    </nav>
    @yield('content')
  </body>

</html>