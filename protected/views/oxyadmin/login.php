<?php

/* 
 * Admin login page
 */
require_once dirname(__FILE__).'/layout/header.php';
?>
<body id="login-bg"> 

    <!-- Start: login-holder -->
    <div id="login-holder">

        <!-- start logo -->
        <div id="logo-login">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/oxyadmin">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" height="40" alt="" />
            </a>
        </div>
        <!-- end logo -->

        <div class="clear"></div>

        <!--  start loginbox ................................................................................. -->
        <div id="loginbox">

            <!--  start login-inner -->
            <div id="login-inner">
                <form method="post">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Username</th>
                            <td><input type="text"  class="login-inp" name="loginuser" /></td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td><input type="password" value="" class="login-inp" name="loginpassword" /></td>
                            <input type="hidden" name="redirect" value="<?php echo isset($_REQUEST['call']) ? htmlentities($_REQUEST['call']) : ''; ?>" />
                        </tr>
                        <!-- <tr>
                            <th></th>
                            <td valign="top"><input type="checkbox" class="checkbox-size" id="login-check" />
                                <label for="login-check">Remember me</label>
                            </td>
                        </tr> -->
                        <tr>
                            <th></th>
                            <td><input type="submit" class="submit-login"  /></td>
                        </tr>
                    </table>
                </form>
            </div>
            <!--  end login-inner -->
            <div class="clear"></div>
            <a href="" class="forgot-pwd">Forgot Password?</a>
        </div>
        <!--  end loginbox -->

        <!--  start forgotbox ................................................................................... -->
        <div id="forgotbox">
            <div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
            <!--  start forgot-inner -->
            <div id="forgot-inner">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <th>Email address:</th>
                        <td><input type="text" value=""   class="login-inp" /></td>
                    </tr>
                    <tr>
                        <th> </th>
                        <td><input type="button" class="submit-login"  /></td>
                    </tr>
                </table>
            </div>
            <!--  end forgot-inner -->
            <div class="clear"></div>
            <a href="" class="back-login">Back to login</a>
        </div>
        <!--  end forgotbox -->
    </div>
    <!-- End: login-holder -->
    <?php if(isset($err_msg)): ?>
    <script type="text/javascript"> alert('<?php echo $err_msg; ?>'); </script>
    <?php endif; ?>
</body>
<?php require_once dirname(__FILE__).'/layout/footer.php'; ?>