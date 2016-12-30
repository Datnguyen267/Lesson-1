
<div id="body">
<form action="<?php echo base_url()."guest/login/login" ?>" method="post" id="form-login">
<fieldset>
<legend>Login</legend>
<div><span class="success"><?php if(isset($b_Check) && $b_Check == false){echo "Tài khoản hoặc mật khẩu không đúng, xin vui lòng đăng nhập lại!";}?></span></div>
                <table>
                <tr>
                    <td>
                        <label for="username">Username</label>
                    </td>
                    <td>
                        <input class="form" type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />
                        <span class="error"><?php echo form_error('username'); ?></span>
                    </td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Password</label>
                    </td>
                    <td>
                        <input class="form" name="password" type="password"  size="50" />
                        <span class="error"><?php echo form_error('password'); ?></span>
                    </td>

                </tr>
                <tr>
                    <td colspan = "2" align = "right">
                        <div align = 'right'><input type="submit" id="save" value="Log in" /></div>
                    </td>
                </tr>
                </table>
            </fieldset>
        </form>
    </div>
