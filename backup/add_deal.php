<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stylista</title>
    </head>
    <body>
        <div style="border: 1px solid black;">
            <form name="add_deal" action="process/process_deal.php" method="post">
                <input type="hidden" name="user_id" value="1" />
                <input type="hidden" name="action" value="add_deal" />
                <table>
                    <tr>
                        <td>
                            Deal Name:
                        </td>
                        <td>
                            <input type="text" name="deal_name">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Deal Description:
                        </td>
                        <td>
                            <textarea name="deal_desc"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="OK" />
                        </td>
                        <td>
                            <input type="reset" value="X" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
