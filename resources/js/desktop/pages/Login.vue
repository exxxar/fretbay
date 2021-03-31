<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <section class="login-section login-section2 conlumnLeft">
                    <h1>Log into your FretBay account.</h1>
                    <p class="h1">Enter your email address or username and password to access all FretBay services.</p>
                    <img src="https://fretbay.com/fr/images/conecLogImg.png" class="img-responsive">
                </section>
            </div>
            <div class="col-md-6">
                <section class="login-section login-section2">
                    <h2 class="fretBH">FretBay Identification</h2>

                    <form id="login_frm" name="login" action="" method="POST" autocomplete="off">
                        <input type="hidden" name="HRS" value="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoic2FxaWJqIiwicGFzcyI6InBha2lzdGFuMSEiLCJrZXkiOiJhYmNkIiwid2ViIjoieWVzIn0.59gwftKkCpif4RhHYf3HJauo2AyV669YUVr499spmmE">
                        <input type="hidden" name="ambassador" value="">

                        <div id="msg" style="color:red"></div>


                        <br>
                        <div class="clearfix"></div>

                        <div class="log-row"><i class="glyphicon glyphicon-user"></i> <span id="wp-pseudo2">
                  <input type="text" name="username" id="pseudo2" class="lis form-control" placeholder="Login or Email" autocomplete="off">
                  </span> </div>
                        <!--log-row-->
                        <div class="log-row"><i class="glyphicon glyphicon-lock"></i> <span id="wp-password">
                  <input type="password" name="passwd" id="password" class="form-control" placeholder="Password" autocomplete="off">
                  </span> </div>
                        <!--log-row-->
                        <div class="log-row log-hm">
                            <button name="btn" id="loginsubmit" class="btn">Sign in</button>
                        </div>
                        <!--log-row-->
                        <center>
                            Forgotten password? <a href="oublie.php" class="forgot">Sign up here</a>
                        </center>

                        <div class="clearfix"></div>

                        <!--clearfix-->
                    </form>
                </section><!--login-section-->
                <center class="no-mem">
                    Not yet registered on FretBay? <a href="etape.php">Sign up here</a>
                </center>
                <div class="clearfix"></div><!--clearfix-->
            </div>
        </div>
    </div>
</template>
<script>
    export default {

    }
</script>
