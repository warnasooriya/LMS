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



function Load_modal_for_article_details_admin(id)
{

    $.ajax({
        type: "POST",
        url: 'pages/article_det_for_admin/' + id,
        success: function (html) {

            document.getElementById('modal_data').innerHTML = html;
        },
        error: function (html) {
            //       document.getElementById('progress').innerHTML = '';
        }

    });
}




function Update_User_Types(userid)
{
    var aa = document.getElementById('admin').checked;
    var a = 0;

    if (aa == true)
    {
        a = 1;
    } else
    {
        a = 2;
    }
    $.ajax({
        type: "POST",
        url: 'pages/Update_User_Types/' + userid + '/' + a,
        success: function (html) {
            $("#progress").notify("User Type Updated Successfully !", "success");

        },
        error: function (html) {
            //       document.getElementById('progress').innerHTML = '';
        }

    });
}


function stateChange(newState) {
    setTimeout(function () {
        if (newState == -1) {

            Load_editText();
        }
    }, 500);
}

function Load_Page(url, place)
{

    if (url == 'pages/compose') {

        stateChange(-1);
    }

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


function Load_Message(messageid, inbox)
{

    $.ajax({
        type: "POST",
        url: 'pages/readmail/' + messageid + '/' + inbox,
        success: function (html) {
            document.getElementById('MainCtrl').innerHTML = html;
        },
        error: function (html) {
            //       document.getElementById('progress').innerHTML = '';
        }

    });
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


function Get_Class_Id(description)
{

    $.ajax({
        type: "POST",
        url: 'pages/Get_Field_value_Given_Field/clases/class_id/class_description/' + description,
        success: function (html) {

            document.getElementById('classid').value = html;
        },
        error: function (html) {
            //       document.getElementById('progress').innerHTML = '';
        }

    });


}

Load_Page('pages/messagebar', 'messagebar');

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



function Remove_comment(commentid)
{
    $.ajax({
        type: "POST",
        url: 'pages/Remove_Comments/' + commentid,
        success: function (html) {
            Load_Page('pages/commentmanage', 'MainCtrl');
            $(".panel-heading").notify("Comment Removed Successfully", "success");
        },
        error: function (html) {
            //       document.getElementById('progress').innerHTML = '';
        }

    });
}


function Remove_article(articleid)
{
    $.ajax({
        type: "POST",
        url: 'pages/Remove_Article/' + articleid,
        success: function (html) {
            Load_Page('pages/articlemnabage', 'MainCtrl');
            $(".panel-heading").notify("Comment Removed Successfully", "success");
        },
        error: function (html) {
            //       document.getElementById('progress').innerHTML = '';
        }

    });
}


function Update_Comment_Status(commentid, stat)
{
document.getElementById("progress").innerHTML = '<img src="images/load.GIF"/>'
    $.ajax({
        type: "POST",
        url: 'pages/Update_Comment_Status/' + commentid + "/" + stat,
        success: function (html) {

            Load_Page('pages/commentmanage', 'MainCtrl');
             document.getElementById('progress').innerHTML = '';
        },
        error: function (html) {
          document.getElementById('progress').innerHTML = '';
        }

    });

}



function Update_User_Account_Status(userid, stat)
{
    document.getElementById("progress").innerHTML = '<img src="images/load.GIF"/>'
    $.ajax({
        type: "POST",
        url: 'pages/Update_Account_Status/' + userid + "/" + stat,
        success: function (html) {
            Load_Page('usermanage', 'MainCtrl');
            document.getElementById('progress').innerHTML = '';
        },
        error: function (html) {
            document.getElementById('progress').innerHTML = '';
        }

    });

}


function Update_Article_Status(articleId, stat)
{

    $.ajax({
        type: "POST",
        url: 'pages/Update_Article_Status/' + articleId + "/" + stat,
        success: function (html) {

            Load_Page('pages/articlemnabage', 'MainCtrl');
        },
        error: function (html) {
            //       document.getElementById('progress').innerHTML = '';
        }

    });

}


function Update_Article_Status(articleId, stat)
{

    $.ajax({
        type: "POST",
        url: 'pages/Update_Article_Status/' + articleId + "/" + stat,
        success: function (html) {

            Load_Page('pages/articlemnabage', 'MainCtrl');
        },
        error: function (html) {
            //       document.getElementById('progress').innerHTML = '';
        }

    });

}



function Update_Message_read_status(msgid, stat)
{
    Load_Page('pages/readmail/' + msgid + '/' + stat, 'MainCtrl');

}



function Update_User_Group(userid)
{
    var groupid = document.getElementById('ugid').value;
    var todo = 0;
    if (document.getElementById(userid).checked)
    {
        todo = 1;
    }
    $.ajax({
        type: "POST",
        url: 'pages/Update_User_group/' + userid + "/" + groupid + "/" + todo,
        success: function (html) {
            var n = Number(html);
            if (n == 1)
            {
                $("#usergroupid").notify("User Added to Group Successfully", "success");
            }
            if (n == 2)
            {
                $("#usergroupid").notify("User Removed From Group Successfully", "warning");
            }
            //Load_Page('pages/messagebar', 'messagebar');
            //Load_Page('pages/readmail/' + message_id, 'MainCtrl');
        },
        error: function (html) {
            //       document.getElementById('progress').innerHTML = '';
        }

    });
}





var myVar = setInterval(function () {

    Unreaded_message_Notification();
    Load_msgs();
}, 1000);


Unreaded_message_Notification();

function Unreaded_message_Notification()
{
    $.ajax({
        type: "POST",
        url: 'pages/count_unreaded_messages',
        success: function (html) {
            var a = Number(html);
            if (a >= 0) {

                document.getElementById('msgs').innerHTML = html;
                document.getElementById('msg1').innerHTML = html;
                document.getElementById('msg4').innerHTML = html;
            } else
            {
                window.location.assign("login");
            }
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



function Advance_controll()
{

    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
    function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    );

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
        showInputs: false
    });

}