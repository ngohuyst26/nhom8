<?php
session_start();
include_once '../login/login_function.php';
include_once '../config/database.php';
//Lấy thông tin email
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $connect = new connect();
    $data = "SELECT * FROM users WHERE email = '$email'";
    $result = $connect->pdo_query($data);
    if ($result == null) {
        $thongbao = "Thông tin đăng nhập không hợp lệ";
    } else {
//Kiểm tra email với pass có đúng không
        foreach ($result as $info) {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                if ($info['email'] == $email && password_verify($password, $info['password']) && ($info['role'] == '1' || $info['role'] == '2' || $info['role'] == '3'
                        || $info['role'] == '4' || $info['role'] == '5' || $info['role'] == '6' || $info['role'] == '7')) {
                    if ($info['role'] == '1') {
                        //Phân quyền khi đăng nhập luôn
                        $info['check'] = array(
                            //Cho phép vào trang quản lý người dùng role = 4
                            "\?page=users&action=list$",
                            "\?page=users&action=edit&id=\d+$",
                            "\?page=users&action=list&id=\d+$",
                            "\?page=users&action=list&page-item=\d+$",
                            "\?page=users&action=add$",
                            //Cho phép vào trang quản lý sản phẩm role = 3
                            "\?page=product&action=add$",
                            "\?page=product&action=list$",
                            "\?page=product&action=del$",
                            "\?page=product&action=draft$",
                            "\?page=product&action=add-variants",
                            "\?page=product&action=edit&product=\d+$",
                            "\?page=product&action=variants&product=\d+$",
                            "\?page=product&action=edit-variants&product=\d+&del_setoption=\d+$",
                            "\?page=product&action=edit-variants&product=\d+&option_del=\d+$",
                            "\?page=product&action=edit-variants&product=\d+$",
                            "\?page=product&action=edit-variants&product=\d+&variant_del=\d+$",
                            //Cho phép vào trang đơn hàng role = 5
                            "\?page=order&action=list$",
                            "\?page=order&action=order-detail&order=\d+$",
                            "\?page=order&action=edit&edit_order=\d+$",
                            "\?page=order&action=list&del_order=\d+$",
                            //Cho phép vào trang bài viết role = 2
                            "\?page=posts&action=edit&id=\d+$",
                            "\?page=posts&action=add$",
                            "\?page=posts&action=list$",
                            "\?page=posts&action=list&f=trash$",
                            "\?page=posts&action=list&f=note$",
                            "\?page=categoriesPost&action=list$",
                            "\?page=categoriesPost&action=edit&id=\d+$",
                            "\?page=posts&action=list&offset=\d+$",
                            "\?page=posts&action=list&category=\+\d+$",
                            "\?page=posts&action=list&category=all$",
                            "\?page=posts&action=list&category=\+\d+&category=%\d+&offset=\d+$",
                            "\?page=posts&action=list&f=trash&category=\+\d+&f=trash&category=%\d+&offset=\d+$",
                            "\?page=posts&action=list&f=note&category=\+\d+&f=note&category=%\d+&offset=\d+$",
                            "\?page=posts&action=list&f=trash&category=%\d+&offset=\d+$",
                            "\?page=posts&action=list&f=note&category=%\d+&offset=\d+$",
                            "\?page=posts&action=list&category=%\d+&offset=\d+$",
                            "\?page=posts&action=list&f=trash&f=trash&offset=\d+$",
                            "\?page=posts&action=list&f=note&f=note&offset=\d+$",
                            "\?page=posts&action=list&f=note&offset=\d+$",
                            "\?page=posts&action=list&f=trash&offset=\d+$",
                            "\?page=posts&action=list&+key=|[a-zA-Z]$",
                            "\?page=posts&action=list&f=note&category=\+\d+$",
                            "\?page=posts&action=list&f=trash&category=\+\d+$",
//                        Chưa thấy cái xóa bài viết đâu
                            //Cho phép vào trang mã ưu đãi role = 6
                            "\?page=discounts&action=add-discount$",
                            "\?page=discounts&action=list-discount$",
                            "\?page=discounts&action=edit-discount&id=\d+$",
                            "\?page=discounts&action=list-discount&id=\d+$",
                            //Chưa thấy cái xóa đâu với edit
                            //Cho phép vào trang loại sản phẩm role = 7
                            "\?page=category&action=add$",
                            "\?page=category&action=list$",
                            "\?page=category&action=edit&id\d+$",
                            "\?page=category&action=list&id=\d+$",
                            "\?page=category&action=edit&id=\d+$",
                        );
                        $_SESSION['id'] = $info['id'];
                        $_SESSION['email'] = $email;
                        $_SESSION['user'] = $info['name'];
                        $_SESSION['pass'] = $password;
                        $_SESSION['admin'] = $info;
                        $_SESSION['role'] = $info['role'];
                        header('Location: /admin');
                    } else if ($info['role'] == '2') {
                        $info['check'] = array(
                            //Cho phép vào trang bài viết
                            "\?page=posts&action=edit&id=\d+$",
                            "\?page=posts&action=add$",
                            "\?page=posts&action=list$",
                            "\?page=posts&action=list&f=trash$",
                            "\?page=posts&action=list&f=note$",
                            "\?page=categoriesPost&action=list$",
                            "\?page=categoriesPost&action=edit&id=\d+$",
                            "\?page=posts&action=list&offset=\d+$",
                            "\?page=posts&action=list&category=\+\d+$",
                            "\?page=posts&action=list&category=all$",
                            "\?page=posts&action=list&category=\+\d+&category=%\d+&offset=\d+$",
                            "\?page=posts&action=list&f=trash&category=\+\d+&f=trash&category=%\d+&offset=\d+$",
                            "\?page=posts&action=list&f=note&category=\+\d+&f=note&category=%\d+&offset=\d+$",
                            "\?page=posts&action=list&f=trash&category=%\d+&offset=\d+$",
                            "\?page=posts&action=list&f=note&category=%\d+&offset=\d+$",
                            "\?page=posts&action=list&category=%\d+&offset=\d+$",
                            "\?page=posts&action=list&f=trash&f=trash&offset=\d+$",
                            "\?page=posts&action=list&f=note&f=note&offset=\d+$",
                            "\?page=posts&action=list&f=note&offset=\d+$",
                            "\?page=posts&action=list&f=trash&offset=\d+$",
                            "\?page=posts&action=list&+key=|[a-zA-Z]$",
                            "\?page=posts&action=list&f=note&category=\+\d+$",
                            "\?page=posts&action=list&f=trash&category=\+\d+$",
//                        Chưa thấy cái xóa bài viết đâu
                        );
                        $_SESSION['id'] = $info['id'];
                        $_SESSION['email'] = $email;
                        $_SESSION['user'] = $info['name'];
                        $_SESSION['pass'] = $password;
                        $_SESSION['admin'] = $info;
                        header('Location: /admin');
                    } else if ($info['role'] == '3') {
                        //Cho phép vào trang quản lý sản phẩm
                        $info['check'] = array(
                            "\?page=product&action=add$",
                            "\?page=product&action=list$",
                            "\?page=product&action=del$",
                            "\?page=product&action=draft$",
                            "\?page=product&action=edit-variants&product=\d+$",
                            "\?page=product&action=edit&product=\d+$",
                            "\?page=product&action=edit-variants&product=\d+&del_setoption=\d+$",
                            "\?page=product&action=edit-variants&product=\d+&option_del=\d+$",
                        );
                        $_SESSION['id'] = $info['id'];
                        $_SESSION['email'] = $email;
                        $_SESSION['user'] = $info['name'];
                        $_SESSION['pass'] = $password;
                        $_SESSION['admin'] = $info;
                        header('Location: /admin');
                    } else if ($info['role'] == '4') {
                        //Cho phép vào trang người dùng
                        $info['check'] = array(
                            "\?page=users&action=list$",
                            "\?page=users&action=edit&id=\d+$",
                            "\?page=users&action=list&page-item=\d+$",
                            "\?page=users&action=add$",
                            "\?page=users&action=list&id=\d+$",
                        );
                        $_SESSION['role'] = $info['role'];
                        $_SESSION['id'] = $info['id'];
                        $_SESSION['email'] = $email;
                        $_SESSION['user'] = $info['name'];
                        $_SESSION['pass'] = $password;
                        $_SESSION['admin'] = $info;
                        header('Location: /admin');
                    } else if ($info['role'] == '5') {
                        //Cho phép vào trang đơn hàng
                        $info['check'] = array(
                            "\?page=order&action=list$",
                            "\?page=order&action=order-detail&order=\d+$",
                            "\?page=order&action=edit&edit_order=\d+$",
                            "\?page=order&action=list&del_order=\d+$",
                        );
                        $_SESSION['id'] = $info['id'];
                        $_SESSION['email'] = $email;
                        $_SESSION['user'] = $info['name'];
                        $_SESSION['pass'] = $password;
                        $_SESSION['admin'] = $info;
                    } else if ($info['role'] == '6') {
                        //Cho phép vào trang mã giảm giá
                        $info['check'] = array(
                            "\?page=discounts&action=add-discount$",
                            "\?page=discounts&action=list-discount$",
                            "\?page=discounts&action=edit-discount&id=\d+$",
                            "\?page=discounts&action=list-discount&id=\d+$",
                        );
                        $_SESSION['email'] = $email;
                        $_SESSION['user'] = $info['name'];
                        $_SESSION['pass'] = $password;
                        $_SESSION['admin'] = $info;
                        $_SESSION['role'] = $info['role'];
                        header('Location: /admin');
                    } else if ($info['role'] == '7') {
                        //Cho phép vào trang loại sản phẩm
                        $info['check'] = array(
                            "\?page=category&action=add$",
                            "\?page=category&action=list$",
                            "\?page=category&action=edit&id\d+$",
                            "\?page=category&action=list&id=\d+$",
                            "\?page=category&action=edit&id=\d+$",
                        );
                        $_SESSION['email'] = $email;
                        $_SESSION['user'] = $info['name'];
                        $_SESSION['pass'] = $password;
                        $_SESSION['admin'] = $info;
                        $_SESSION['role'] = $info['role'];
                        header('Location: /admin');
                    }

//Lưu cooke
                    if (isset($_POST['ghinho']) && ($_POST['ghinho'])) {
                        setcookie("email", $email, time() + (86400));
                        setcookie("pass", $password, time() + (86400));
                    }

                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400');

    body, html {
        font-family: 'Source Sans Pro', sans-serif;
        background-color: #1d243d;
        padding: 0;
        margin: 0;
    }

    #particles-js {
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .container{
        margin: 0;
        top: 50px;
        left: 50%;
        position: absolute;
        text-align: center;
        transform: translateX(-50%);
        background-color: rgb( 33, 41, 66 );
        border-radius: 9px;
        border-top: 10px solid #79a6fe;
        border-bottom: 10px solid #8BD17C;
        width: 400px;
        height: 500px;
        box-shadow: 1px 1px 108.8px 19.2px rgb(25,31,53);
    }

    .box h4 {
        font-family: 'Source Sans Pro', sans-serif;
        color: #5c6bc0;
        font-size: 18px;
        margin-top:94px;;
    }

    .box h4 span {
        color: #dfdeee;
        font-weight: lighter;
    }

    .box h5 {
        font-family: 'Source Sans Pro', sans-serif;
        font-size: 13px;
        color: #a1a4ad;
        letter-spacing: 1.5px;
        margin-top: -15px;
        margin-bottom: 70px;
    }

    .box input[type = "text"],.box input[type = "password"] {
        display: block;
        margin: 20px auto;
        background: #262e49;
        border: 0;
        border-radius: 5px;
        padding: 14px 10px;
        width: 320px;
        outline: none;
        color: #d6d6d6;
        -webkit-transition: all .2s ease-out;
        -moz-transition: all .2s ease-out;
        -ms-transition: all .2s ease-out;
        -o-transition: all .2s ease-out;
        transition: all .2s ease-out;

    }
    ::-webkit-input-placeholder {
        color: #565f79;
    }

    .box input[type = "text"]:focus,.box input[type = "password"]:focus {
        border: 1px solid #79A6FE;

    }

    a{
        color: #5c7fda;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    label input[type = "checkbox"] {
        display: none; /* hide the default checkbox */
    }

    /* style the artificial checkbox */
    label span {
        height: 13px;
        width: 13px;
        border: 2px solid #464d64;
        border-radius: 2px;
        display: inline-block;
        position: relative;
        cursor: pointer;
        float: left;
        left: 7.5%;
    }

    .btn1 {
        border:0;
        background: #7f5feb;
        color: #dfdeee;
        border-radius: 100px;
        width: 340px;
        height: 49px;
        font-size: 16px;
        position: absolute;
        top: 79%;
        left: 8%;
        transition: 0.3s;
        cursor: pointer;
    }

    .btn1:hover {
        background: #5d33e6;
    }

    .rmb {
        position: absolute;
        margin-left: -24%;
        margin-top: 0px;
        color: #dfdeee;
        font-size: 13px;
    }

    .forgetpass {
        position: relative;
        float: right;
        right: 28px;
    }

    .dnthave{
        position: absolute;
        top: 92%;
        left: 24%;
    }

    [type=checkbox]:checked + span:before {/* <-- style its checked state */
        font-family: FontAwesome;
        font-size: 16px;
        content: "\f00c";
        position: absolute;
        top: -4px;
        color: #896cec;
        left: -1px;
        width: 13px;
    }

    .typcn {
        position: absolute;
        left: 339px;
        top: 282px;
        color: #3b476b;
        font-size: 22px;
        cursor: pointer;
    }

    .typcn.active {
        color: #7f60eb;
    }

    .error {
        background: #ff3333;
        text-align: center;
        width: 337px;
        height: 20px;
        padding: 2px;
        border: 0;
        border-radius: 5px;
        margin: 10px auto 10px;
        position: absolute;
        top: 31%;
        left: 7.2%;
        color: white;
        display: none;
    }

    .footer {
        position: relative;
        left: 0;
        bottom: 0;
        top: 605px;
        width: 100%;
        color: #78797d;
        font-size: 14px;
        text-align: center;
    }

    .footer .fa {
        color: #7f5feb;;
    }
</style>
<body>
<body id="particles-js"></body>
<div class="animated bounceInDown">
    <div class="container">
        <span class="error animated tada" id="msg"></span>
        <form name="form1" class="box" method="POST">
            <h4>Admin<span> Login</span></h4>
            <h5>Sign in to your account</h5>
            <input type="text" name="email" placeholder="Email" >
            <input type="password" id="password" name="password" placeholder="Passsword">
                <input type="checkbox" name="ghinho"> Remember me
            <input type="submit" value="Sign in" class="btn1">
        </form>
        <div style="color: red">
            <?php
            if (isset($thongbao)){
                echo  $thongbao;
            }
            ?>
        </div>
    </div>
</div>
</body>

</html>