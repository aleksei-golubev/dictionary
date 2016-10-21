<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <div class="container">
        
        </div>
          <nav>
    <div class="nav-wrapper" style="padding-left:50px;">
      <a href="#" class="brand-logo">Dictionary administration</a>
    </div>
  </nav>
  <div class="section" id="authSection" style="display:none;">
        <div class="row">
            <form class="col s6 offset-s3 card-panel">
            <div class="row">
                <h5>This page needs authorization</h5>
            </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="login" type="text" class="validate">
                  <label for="login">User name</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="password" type="password" class="validate">
                  <label for="password">Password</label>
                </div>
              </div>
              <div class="row">
                <div class="col s12">
                <button class="btn waves-effect waves-light" type="button" id="loginButton">Login
                    <i class="material-icons right">send</i>
                </button>
                </div>
              </div>
            </form>
        </div>    
    </div>
    
    <div class="section" id="adminSection"></div>
    
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
      <script type="text/javascript" src="/admin/js/main.js"></script>
    </body>
  </html>