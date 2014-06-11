<?php 

if (Login::isLogged(Login::$_login_front)){
    Helper::redirect(Login::$_dashborad_front);
}

$objForm = new Form();
$objValid = new Validation($objForm);
$objUser = new User();

// login form
if ($objForm->isPost('login_email')){
    if ($objUser->isUser($objForm->getPost('login_email'),
        $objForm->getPost('login_password'))){
        
        Login::loginFront($objUser->_id, Url::getReferrerUrl());
    } else {
        $objValid->add2Errors('login');
    }
}


require_once('_header.php'); 

?>

<h1>Login</h1>

<form action="" method="post">
      
    <table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
        <tr>
            <th>
                <label for="login_email">Login:</label>
            </th>
            <td>
                <?php echo $objValid->validate('login');  ?>
                <input type="text" name="login_email" id="login_email" class="fld" value="" />
            </td>
        </tr>
        <tr>
            <th>
                <label for="login_password">Password:</label>
            </th>
            <td>
                <input type="password" name="login_password" id="login_password" class="fld" value="" />
            </td>
        </tr>
        <tr>
            <th>&#160;</th>
            <td>
                <label for="btn_login" class="sbm sbm_blue fl_l">
                    <input type="submit" id="btn_login" class="btn" value="Login" />
                </label>
            </td>
        </tr>
          
    </table>
      
</form>

<div class="dev br_td">&#160;</div>
<h3>Not registered yet?</h3>

<form action="" method="post">
    <table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
        
        <tr>
            <th>
                <label for="first_name">First name: *</label>
            </th>
            <td>
                <input type="text" name="first_name" id="first_name"
                       class="fld" value="" />
            </td>
        </tr>
        <tr>
            <th>
                <label for="last_name">Last name: *</label>
            </th>
            <td>
                <input type="text" name="last_name" id="first_name"
                       class="fld" value="" />
            </td>
        </tr>   
        <tr>
            <th>
                <label for="address_1">Address 1: *</label>
            </th>
            <td>
                <input type="text" name="address_1" id="address_1"
                       class="fld" value="" />
            </td>
        </tr>    
        <tr>
            <th>
                <label for="address_2">Address 2:</label>
            </th>
            <td>
                <input type="text" name="address_2" id="address_1"
                       class="fld" value="" />
            </td>
        </tr>     
        <tr>
            <th>
                <label for="town">Town: *</label>
            </th>
            <td>
                <input type="text" name="town" id="town"
                       class="fld" value="" />
            </td>
        </tr>
        <tr>
            <th>
                <label for="county">County: *</label>
            </th>
            <td>
                <input type="text" name="county" id="county"
                       class="fld" value="" />
            </td>
        </tr>
        <tr>
            <th>
                <label for="post_code">Post code: *</label>
            </th>
            <td>
                <input type="text" name="post_code" id="post_code"
                       class="fld" value="" />
            </td>
        </tr>
        <tr>
            <th>
                <label for="country">Country: *</label>
            </th>
            <td>
                <?php echo $objForm->getCountriesSelect(229); ?>
            </td>
        </tr> 
        <tr>
            <th>
                <label for="email">Email address: *</label>
            </th>
            <td>
                <input type="text" name="email" id="email"
                       class="fld" value="" />
            </td>
        </tr>       
        <tr>
            <th>
                <label for="password">Password: *</label>
            </th>
            <td>
                <input type="password" name="password" id="password"
                       class="fld" value="" />
            </td>
        </tr>    
        <tr>
            <th>
                <label for="confirm_password">Confirm password: *</label>
            </th>
            <td>
                <input type="password" name="confirm_password" id="confirm_password"
                       class="fld" value="" />
            </td>
        </tr> 
        <tr>
            <th>&#160;</th>
            <td>
                <label for="btn" class="sbm sbm_blue fl_l">
                    <input type="submit" id="btn_login" class="btn" value="Register" />
                </label>
            </td>
        </tr>
        
    </table>
    
    
</form>


<?php require_once('_footer.php') ?>