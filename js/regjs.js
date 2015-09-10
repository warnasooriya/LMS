function showMyImage(fileInput, imageid) {
    //document.getElementById(imageid).innerHTML = '<img src="../images/wait.GIF"/>'
    var files = fileInput.files;
    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var imageType = /image.*/;
        if (!file.type.match(imageType)) {
            continue;
        }
        var img = document.getElementById(imageid);
        img.file = file;
        var reader = new FileReader();
        reader.onload = (function (aImg) {
            return function (e) {
                aImg.src = e.target.result;
            };
        })(img);
        reader.readAsDataURL(file);
    }
}









function Load_Page(url, place)
{

    //document.getElementById('progress').innerHTML = '<img src="images/wait.GIF"/>';
    $.ajax({
        type: "POST",
        url: url,
        success: function (html) {
            document.getElementById(place).innerHTML = html;
        },
        error: function (html) {
            //       document.getElementById('progress').innerHTML = '';
        }

    });
    //  document.getElementById('progress').innerHTML = '';
}



function Register_Load(value, place)
{

    if (value == "Student")
    {
        Load_Page('pages/student_register', place);

    } else
    {
        Load_Page('pages/teacher_register', place);
    }

}

function Validate_Confirm_Password(pw1_id, pw2_id)
{
    var ans = 0;
    var p1 = document.getElementById(pw1_id).value;
    var p2 = document.getElementById(pw2_id).value;
    var p1check = Check_password_len(p1, 6);
    var p2check = Check_password_len(p2, 6);
    if (p1check) {
        document.getElementById("conformp1").innerHTML = "<img src='images/correct.png'>";
        ans += 1;
    } else
    {
        document.getElementById("conformp1").innerHTML = "<img src='images/wrong.png' alt='Password Length Must be atleast 6 Characters'>";
        $("#conformp1").notify("Password Should Be 6 Characters", "error");
    }


    if (p1check == true && p2check == true)
    {
        if (p1 == p2) {
            document.getElementById("conformp2").innerHTML = "<img src='images/correct.png'>";
            ans += 1;
        } else
        {
            document.getElementById("conformp2").innerHTML = "<img src='images/wrong.png'>";
            $("#conformp1").notify("Invalied Confirmation", "error");
            //return false;
        }
    }

    if (ans == 2) {
        document.getElementById("btn").disabled = false;
    } else
    {
        document.getElementById("btn").disabled = true;
    }

    return ans;
}


function Check_password_len(pass, len)
{
    var l = Number(len);
    var stat = false;
    var tlen = pass.length;
    if (tlen >= l) {
        stat = true;
    } else
    {
        stat = false;
    }

    return stat;
}






function Get_User_ID()
{
    $.ajax({
        type: "POST",
        url: 'pages/Get_Field_value_Given_Field_post/users/user_id/user_name/to',
        data: $('form').serialize(),
        success: function (html) {
            document.getElementById('userid').value = html;
        },
        error: function (html) {
            //       document.getElementById('progress').innerHTML = '';
        }

    });
}


function Get_From_ID()
{
    $.ajax({
        type: "POST",
        url: 'pages/Get_Field_value_Given_Field_post/users/user_id/user_name/from',
        data: $('form').serialize(),
        success: function (html) {
            document.getElementById('from_id').value = html;
        },
        error: function (html) {
            //       document.getElementById('progress').innerHTML = '';
        }

    });
}



function Get_Group_ID(groupname)
{

    alert(groupname);
    $.ajax({
        type: "POST",
        url: 'pages/Get_Field_value_Given_Field/message_groups/group_id/group_title/' + groupname,
        success: function (html) {

            document.getElementById('groupid').value = html;
        },
        error: function (html) {
            //       document.getElementById('progress').innerHTML = '';
        }

    });
}



function Load_msgs()
{

    $.ajax({
        type: "POST",
        url: 'pages/messagebar',
        success: function (html) {
            document.getElementById('messagebar').innerHTML = html;
        },
        error: function (html) {
            //       document.getElementById('progress').innerHTML = '';
        }

    });

}


function Compose_Validation()
{

    var toid = document.getElementById('userid').value;
    var groupid = document.getElementById('group').value;

    var to = 0;
    var group = 0;
    try {
        to = Number(toid);
        group = Number(groupid);
    } catch (ex)
    {
        to = 0;
        group = 0;
    }

    if (to == "NaN") {
        to = 0;
    }
    if (group == "NaN")
    {
        group = 0;
    }

    if (to > 0 || group > 0) {
        document.getElementById('btn').disabled = false;
    } else
    {
        $("#to").notify("Please Enter User Who are the Message Recipient", "error");

    }

}




function get_messages_group_id(name)
{

    $.ajax({
        type: "POST",
        url: 'pages/Get_Field_value_Given_Field/message_groups/group_id/group_title/' + name,
        success: function (html) {

            document.getElementById('ugid').value = html;
            Load_Page('pages/Load_message_group_users/' + html, 'message_group_users_table');
        },
        error: function (html) {
            //       document.getElementById('progress').innerHTML = '';
        }

    });
}

function Create_Group()
{
    $.ajax({
        type: "POST",
        url: 'create_group',
        data: $('form').serialize(),
        success: function (html) {
            var a = Number(html)
            if (a > 0)
            {
                Load_Page('pages/nmessage_groups', 'msg_group_details');
                document.getElementById('mgroup').value = '';
                $("#progress").notify("Group Created Successfully", "success");

            } else
            {
                $("#progress").notify("Error Creating Group", "error");
            }

        },
        error: function (html) {
            //       document.getElementById('progress').innerHTML = '';
        }

    });
}


function Create_class()
{
    $.ajax({
        type: "POST",
        url: 'create_class',
        data: $('form').serialize(),
        success: function (html) {
            var a = Number(html)
            if (a > 0)
            {
                Load_Page('pages/create_class', 'msg_group_details');
                document.getElementById('classname').value = '';
                document.getElementById('location').value = '';
                $("#progress").notify("Class Created Successfully", "success");

            } else
            {
                $("#progress").notify("Error Creating Class", "error");
            }

        },
        error: function (html) {
            //       document.getElementById('progress').innerHTML = '';
        }

    });
}




function Load_Message_indexpage(msg, stat)
{

    var ss = "error";
    if (stat == 1)
    {
        ss = "success";
    }

    $("#msgsPb").notify(msg, ss);





}


function Delete_Messages()
{

    var tbl = document.getElementById("msg_inbox");
    var rowcount = document.getElementById('msg_inbox').rows.length;

    for (var x = 0; x < rowcount; x++)
    {

        var cb = tbl.rows[x].cells[0].children[0];

        if (cb.checked) {
            var url = "remove_data/remove/message_attachment/message_id/" + cb.id;
            DoDelete(url);
            url = "remove_data/remove/messages/messages_id/" + cb.id;
            DoDelete(url);
        }

    }
}



function Delete_Sent_Messages()
{

    var tbl = document.getElementById("sent_box");
    var rowcount = document.getElementById('sent_box').rows.length;

    for (var x = 0; x < rowcount; x++)
    {

        var cb = tbl.rows[x].cells[0].children[0];

        if (cb.checked) {
            var url = "remove_data/remove/sent_message_attachment/sent_message_id/" + cb.id;
            DoDelete_Sent_msg(url);
            url = "remove_data/remove/sent_messages/sent_messages_id/" + cb.id;
            DoDelete_Sent_msg(url);
        }

    }
}

function DoDelete_Sent_msg(url)
{

    $.ajax({
        type: "POST",
        url: url,
        success: function (html) {
            Load_Page('pages/sentMessages', 'MainCtrl');
        },
        error: function (html) {
            //       document.getElementById('progress').innerHTML = '';
        }

    });
}

function DoDelete(url)
{

    $.ajax({
        type: "POST",
        url: url,
        success: function (html) {
            Load_Page('pages/messages', 'MainCtrl');
        },
        error: function (html) {
            //       document.getElementById('progress').innerHTML = '';
        }

    });
}

function Load_editText()
{
    $(".textarea").cleanData;
    $(".textarea").wysihtml5();
}

function Create_Comment()
{
    if (validate())
    {
        document.getElementById('progress').innerHTML = '<img src="../images/wait.GIF"/>'
        $.ajax({
            type: "POST",
            url: '../comments',
            data: $('form').serialize(),
            success: function (html) {

                var n = Number(html);
                if (n > 0) {
                    $("#progress").notify("Comment Added Successfully it will post quickly when Approved by Admin", "success");
                    document.getElementById('progress').innerHTML = '';
                } else
                {
                    $("#progress").notify("Comment Not Post Successfully Please Try Again", "error");
                    document.getElementById('progress').innerHTML = '';
                }

            },
            error: function (html) {
                document.getElementById('progress').innerHTML = '';
            }

        });
    }
}

function validate()
{
    var ans = 0;
    ans += ValidateText("name", "Name");
    ans += ValidateEmail("email");
    ans += ValidateText("comment", "Comment");



    if (ans == 0) {
        return  true;
    } else
    {
        return false;
    }
}


function ValidateText(elementID, fieldname)
{
    var ans = 0;
    if (document.getElementById(elementID).value.trim() == "") {

        $("#progress").notify("Please fill out " + fieldname + " ", "error");
        ans = 1;
        $("#" + elementID + "").focus();
    }
    return ans;
}



function validateTextOnly(elementID, fieldname) {
    var ans = 0;
    var text = document.getElementById(elementID).value.trim();
    if (text == "") {
        $("#" + elementID + "").notify("Please Fill out " + fieldname + " ", "error");
        ans = 1;
    }
    var regText = /[0-9]/;
    var a = regText.test(text);
    if (a == true) {
        $("#" + elementID + "").notify("Cannot Use Numbers for  " + fieldname + " ", "error");
        ans = 1;
    }
    return ans;

}


function validateNumbersOnly(elementID, fieldname) {
    var ans = 0;

    var nameReg = /[^0-9]/
    var text = document.getElementById(elementID).value.trim();
    if (text == "") {
        ans = 1;
        $("#" + elementID + "").notify("Please Fill out " + fieldname + " ", "warn");
    }

    var a = nameReg.test(text);

    if (a == true)
    {
        ans = 1;
        $("#" + elementID + "").notify("Please Enter Valid Data for  " + fieldname + " ", "warn");
        $("#" + ElementID + "").focus();
    }

    return ans;
}



function ValidateEmail(ElementID) {
    var ans = 0;
    var email = document.getElementById(ElementID);
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(email.value)) {
        $("#progress").notify("Please Enter Correct Email ", "error");
        $("#" + ElementID + "").focus();
        ans = 1;
    }
    return ans;
}