function edit_row(id)
{
    var firstName=document.getElementById("first_val"+id).innerHTML;
    var lastName=document.getElementById("last_val"+id).innerHTML;
    var email=document.getElementById("email_val"+id).innerHTML;
    var phone=document.getElementById("phone_val"+id).innerHTML;
    var userName=document.getElementById("user_val"+id).innerHTML;
    var passwd=document.getElementById("pass_val"+id).innerHTML;

    document.getElementById("first_val"+id).innerHTML="<input type='text' id='first_text"+id+"' value='"+firstName+"'>";
    document.getElementById("last_val"+id).innerHTML="<input type='text' id='last_text"+id+"' value='"+lastName+"'>";
    document.getElementById("email_val"+id).innerHTML="<input type='text' id='email_text"+id+"' value='"+email+"'>";
    document.getElementById("phone_val"+id).innerHTML="<input type='text' id='phone_text"+id+"' value='"+phone+"'>";
    document.getElementById("user_val"+id).innerHTML="<input type='text' id='user_text"+id+"' value='"+userName+"'>";
    document.getElementById("pass_val"+id).innerHTML="<input type='text' id='pass_text"+id+"' value='"+passwd+"'>";


    document.getElementById("edit_button"+id).style.display="none";
    document.getElementById("save_button"+id).style.display="block";
}

function save_row(id)
{
    var firstName=document.getElementById("first_text"+id).value;
    var lastName=document.getElementById("last_text"+id).value;
    var email=document.getElementById("email_text"+id).value;
    var phone=document.getElementById("phone_text"+id).value;
    var userName=document.getElementById("user_text"+id).value;
    var passwd=document.getElementById("pass_text"+id).value;


    $.ajax
    ({
        type:'post',
        url:'insert.php',
        data:{
            edit_row:'edit_row',
            row_id:id,
            first_val:firstName,
            last_val:lastName,
            email_val:email,
            phone_val:phone,
            user_val:userName,
            pass_val:passwd

        },
        success:function(response) {
            if(response=="success")
            {
                document.getElementById("first_val"+id).innerHTML=firstName;
                document.getElementById("last_val"+id).innerHTML=lastName;
                document.getElementById("email_val"+id).innerHTML=email;
                document.getElementById("phone_val"+id).innerHTML=phone;
                document.getElementById("user_val"+id).innerHTML=userName;
                document.getElementById("pass_val"+id).innerHTML=passwd;
                document.getElementById("edit_button"+id).style.display="block";
                document.getElementById("save_button"+id).style.display="none";
            }
        }
    });
}

function delete_row(id)
{
    $.ajax
    ({
        type:'post',
        url:'insert.php',
        data:{
            delete_row:'delete_row',
            row_id:id,
        },
        success:function(response) {
            if(response=="success")
            {
                var row=document.getElementById("row"+id);
                row.parentNode.removeChild(row);
            }
        }
    });
}

function insert_row()
{
    var firstName=document.getElementById("new_first").value;
    var lastName=document.getElementById("new_last").value;
    var email=document.getElementById("new_email").value;
    var phone=document.getElementById("new_phone").value;
    var userName=document.getElementById("new_user").value;
    var passwd=document.getElementById("new_pass").value;

    $.ajax
    ({
        type:'post',
        url:'insert.php',
        data:{
            insert_row:'insert_row',
            first_val:firstName,
            last_val:lastName,
            email_val:email,
            phone_val:phone,
            user_val:userName,
            pass_val:passwd


        },
        success:function(response) {
            if(response!="")
            {
                var id=response;
                var table=document.getElementById("user_table");
                var table_len=(table.rows.length)-1;
                var row = table.insertRow(table_len).outerHTML="<tr id='row"+id+"'>" +
                    "<td id='first_val"+id+"'>"+firstName+"</td>" +
                    "<td id='last_val"+id+"'>"+lastName+"</td>" +
                    "<td id='email_val"+id+"'>"+email+"</td>" +
                    "<td id='phone_val"+id+"'>"+phone+"</td>" +
                    "<td id='user_val"+id+"'>"+userName+"</td>" +
                    "<td id='pass_val"+id+"'>"+passwd+"</td>" +
                    "<td><input type='button' class='edit_button' id='edit_button"+id+"' value='edit' onclick='edit_row("+id+");'/><input type='button' class='save_button' id='save_button"+id+"' value='save' onclick='save_row("+id+");'/><input type='button' class='delete_button' id='delete_button"+id+"' value='delete' onclick='delete_row("+id+");'/></td></tr>";

                document.getElementById("new_name").value="";
                document.getElementById("new_age").value="";
            }
        }
    });
}