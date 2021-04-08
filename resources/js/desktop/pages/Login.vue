<template>
    <section id="login">
        <div class="banner-main">
            <h1>
                Login page
            </h1>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="login-section login-section2 conlumnLeft">
                        <h1>Log into your FretBay account.</h1>
                        <p class="h1">Enter your email address or username and password to access all FretBay services.</p>
                        <img src="images/conecLogImg.png" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="login-section login-section2">
                        <h2 class="fretBH">FretBay Identification</h2>

                        <form id="login_frm" name="login" action="" method="POST" autocomplete="off">
                            <input type="hidden" name="HRS"
                                   value="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoic2FxaWJqIiwicGFzcyI6InBha2lzdGFuMSEiLCJrZXkiOiJhYmNkIiwid2ViIjoieWVzIn0.59gwftKkCpif4RhHYf3HJauo2AyV669YUVr499spmmE">
                            <input type="hidden" name="ambassador" value="">

                            <div id="msg" style="color:red"></div>


                            <br>
                            <div class="clearfix"></div>

                            <div class="log-row">
                                <span id="wp-pseudo2">
                  <input type="text" name="username" id="pseudo2" class="lis form-control" placeholder="Login or Email"
                         autocomplete="off">
                  </span></div>
                            <!--log-row-->
                            <div class="log-row">

                                <span id="wp-password">
                  <input type="password" name="passwd" id="password" class="form-control" placeholder="Password"
                         autocomplete="off">
                  </span></div>
                            <!--log-row-->
                            <div class="log-row log-hm">
                                <button name="btn" id="loginsubmit" class="btn btn-primary">Sign in</button>
                            </div>
                            <!--log-row-->
                            <center>
                                Forgotten password? <a href="#" class="forgot">Sign up here</a>
                            </center>


                        </form>
                    </div><!--login-section-->

                    <p>Not yet registered on FretBay? <a href="#">Sign up here</a></p>


                </div>
            </div>
        </div>
    </section>

</template>
<script>
    export default {}
</script>
<style lang="scss" scoped>
    h1 {
        margin-top:0px;
    }

    p.h1 {
        font-size:20px;
    }
</style>
