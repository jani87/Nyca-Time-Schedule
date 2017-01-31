<html>
<head>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="function.js"></script>
</head>
<body>
<div id="wrapper">




    <?php
    $host="localhost";
    $username="root";
    $password="root";
    $databasename="NycaTime";
    $connect=mysql_connect($host,$username,$password);
    $db=mysql_select_db($databasename);

    $select =mysql_query("SELECT * FROM Persons");
    ?>

    <table align="center" cellpadding="10" border="1" id="user_table">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Id</th>
            <th>Phone</th>
            <th>User Name</th>
            <th>Password</th>
            <th></th>
        </tr>
        <?php
        while ($row=mysql_fetch_array($select))
        {
            ?>
            <tr id="row<?php echo $row['id'];?>">
                <td id="first_val<?php echo $row['id'];?>"><?php echo $row['firstName'];?></td>
                <td id="last_val<?php echo $row['id'];?>"><?php echo $row['lastName'];?></td>
                <td id="email_val<?php echo $row['id'];?>"><?php echo $row['email'];?></td>
                <td id="phone_val<?php echo $row['id'];?>"><?php echo $row['phone'];?></td>
                <td id="user_val<?php echo $row['id'];?>"><?php echo $row['userName'];?></td>
                <td id="pass_val<?php echo $row['id'];?>"><?php echo $row['passwd'];?></td>
                <td>
                    <input type='button' class="edit_button" id="edit_button<?php echo $row['id'];?>" value="edit" onclick="edit_row('<?php echo $row['id'];?>');">
                    <input type='button' class="save_button" id="save_button<?php echo $row['id'];?>" value="save" onclick="save_row('<?php echo $row['id'];?>');">
                    <input type='button' class="delete_button" id="delete_button<?php echo $row['id'];?>" value="delete" onclick="delete_row('<?php echo $row['id'];?>');">
                </td>
            </tr>
            <?php
        }
        ?>

        <tr id="new_row">
            <td><input type="text" id="new_first"></td>
            <td><input type="text" id="new_last"></td>
            <td><input type="text" id="new_email"></td>
            <td><input type="text" id="new_phone"></td>
            <td><input type="text" id="new_user"></td>
            <td><input type="text" id="new_pass"></td>
            <td><input type="button" value="Insert Row" onclick="insert_row();"></td>
        </tr>
    </table>

</div>
</body>
</html>