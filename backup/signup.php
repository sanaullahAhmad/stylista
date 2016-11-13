<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stylista</title>
    </head>
    <body>
        <div style="border: 1px solid black; text-align: center;">
            <table>
                <form name="user_signup" action="process/process_user.php" method="post">
                    <input type="hidden" name="action" value="add_user" />
                    <tr>
                        <td>
                            <label>Full Name:</label>
                        </td>
                        <td>
                            <input type="text" name="full_name" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Nic. Number:</label>
                        </td>
                        <td>
                            <input type="text" name="nic_num" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Shop Name:</label>
                        </td>
                        <td>
                            <input type="text" name="shop_name" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Location:</label>
                        </td>
                        <td>
                            <input type="text" name="location" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>User email:</label>
                        </td>
                        <td>
                            <input type="text" name="email" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Password:</label>
                        </td>
                        <td>
                            <input type="password" name="user_password" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Confirm Password:</label>
                        </td>
                        <td>
                            <input type="password" name="c_pass" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Phone:</label>
                        </td>
                        <td>
                            <input type="text" name="user_phone" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                         <input type="submit" value="OK" />
                        </td>
                        <td>
                            <input type="Reset" name="X" />
                        </td>
                    </tr>
                </form>
            </table>
        
        </div>
        
    </body>
</html>