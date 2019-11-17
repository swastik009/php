<?php
/**
 * Created by PhpStorm.
 * User: Swastik
 * Date: 3/13/2019
 * Time: 7:37 PM
 */




require APPROOT . '/Views/partials/header.php';
require APPROOT . '/Views/partials/navbar.php';
require APPROOT . '/Views/partials/sidebar.php';
require APPROOT . '/Views/partials/breadcrumb.php';

    ?>

<div class="page-content">
    <div class="page-header">
        <h1>
            Manage your information
            <small>
                <i class="icon-double-angle-right"></i>
                <?php

                if($data['role'] == 'Super Admin') {

                    $roleStatus = ' <span class="label label-info arrowed-in-right arrowed">'.$data["role"].'</span>';

                    echo $roleStatus;
                }
                else {
                    $roleStatus = '<span class="label  label-purple arrowed">'.$data["role"].'</span>';
                    echo $roleStatus;
                }
                ?>
            </small>
        </h1>
    </div><!-- /.page-header -->








<form class="form-horizontal align-center" id="mainForm" method="post" enctype="multipart/form-data">
    <div class="col-xs-12 col-sm-3 center">
        <img src="<?php echo URLROOT ?>img/admins/<?php echo $data['image']?>"  class = "img-responsive img-thumbnail" id="image" >

        <div class="row">
            <div class="col-md-2 col-md-offset-2">
        <input type="file" id="fileImage" data-text="Upload an image" data-input="false" data-btnClass="btn-primary"  class="filestyle">
        <span id="ImgErr" style="color: red"></span>
        <span id="ImgLoader"></span>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-9">
<div class="profile-user-info">
    <div class="profile-info-row">
        <div class="profile-info-name"> First Name </div>
        <div class="profile-info-value">

        <input type="text" id="fname" class="col-xs-3"
        value="<?php echo ($data['fname']); ?>">


        </div>
        <div class="col-md-6">
            <span class="invalid-feedback" id="fnameErr"></span>
        </div>

    </div>


    <div class="space-12"></div>

    <div class="profile-info-row">
        <div class="profile-info-name"> Last Name </div>

        <div class="profile-info-value">

            <input type="text" id="lname"  class="col-xs-3"
                   value="<?php echo ($data['lname']); ?>">
            <div class="col-md-6">
                <span class="invalid-feedback" id="lnameErr"></span>
            </div>
        </div>
    </div>

    <div class="space-12"></div>

    <div class="profile-info-row">
        <div class="profile-info-name"> Email </div>

        <div class="profile-info-value">
            <input type="email" id="email" class="col-xs-3"
                   value="<?php echo ($data['email']); ?>" >
        </div>

        <div class="col-md-6">
            <span class="invalid-feedback" id="emailErr" ></span>
        </div>
    </div>


    <div class="space-12"></div>

    <div class="profile-info-row">
        <div class="profile-info-name">Password </div>

        <div class="profile-info-value">
            <input type="password" id="password" class="col-xs-3"
                   value="<?php echo ($data['password']); ?>" >
        </div>
        <div class="col-md-6">
            <span class="invalid-feedback" id="PasswordErr"> </span>
        </div>
    </div>

    <div class="space-12"></div>
    <div class="profile-info-row">
       <div class="profile-info-name">Confirm Password </div>

        <div class="profile-info-value">
            <input type="password" id="cPassword" class="col-xs-3"
                   value="" >
        </div>
        <div class="col-md-6">
            <span class="invalid-feedback" id="cPasswordErr"></span>
        </div>
    </div>

    <div class="space-14"></div>

    <div class="profile-info-row">
        <div class="profile-info-name">Phone number </div>

        <div class="profile-info-value">
            <input type="number" id="contact" class="col-xs-3"
                   value="<?php echo ($data['contact']); ?>" >
        </div>
        <div class="col-md-6">
            <span class="invalid-feedback" id="contactErr"></span>
        </div>
    </div>

    <div class="space-12"></div>

    <div class="profile-info-row">
        <div class="profile-info-name">Address </div>

        <div class="profile-info-value">
            <input type="text" id="address"  class="col-xs-3"
                   value="<?php echo ($data['address']); ?>" >
        </div>

        <div class="col-md-6">
            <span class="invalid-feedback" id="addressErr"></span>
        </div>
    </div>
    <div class="space-12"></div>

    <input type="hidden" id="id" value="<?php  echo $data['id']?>" ?>





    <button class="col-xs-12 btn btn-success" id="update"><i class="icon-ok"></i> Update </button>

</div>
</form>
<!-- Modal -->
<div class="modal fade" id="getCodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> Congratulations </h4>
            </div>
            <div class="modal-body" id="getCode" style="overflow-x: scroll;">
                AWESOME
            </div>
        </div>
    </div>
</div>

</div>
</div>

<?php

require APPROOT . '/Views/partials/footer.php';


?>

<script>
$(document).ready(function () {
    $("#ImgErr").hide();
    $("#ImgLoader").hide();


});
$(document).on('change',"#fileImage",function(e){
        $("#imageLoaderDis").remove();
        $('#ImgErr').html('');
        var property = e.target.files[0]; //gets the file
        var image_name = property.name;
        var form_data = new FormData(); //create a new form data instance
        form_data.append("fileImage",property); // appends fileimage,its property and so on
        $.ajax({
            url : '<?php echo URL?>/Users/imgUpload/'+"<?php echo $data['id'] ?>",
            method : 'POST',
            data: form_data,
            cache : false,
            contentType: false,
            processData : false,
            dataType:"json",
            beforeSend : function () {
                $("#ImgLoader").append('<img id="imageLoaderDis" src="<?php echo URLROOT?>img/loader.gif" style="height: 100px; width: 100px;">');
                $("#ImgLoader").fadeIn();
            },
            success:function (data) {
                console.log(data);
                if(data.errors!= ''){
                    console.log('here');
                    $("#ImgLoader").hide();
                    $('#ImgErr').html(data.errors).hide();
                    $('#ImgErr').fadeIn();

                }
                else{
                    $("#ImgLoader").fadeOut();
                    $("#image").hide();
                    $("#image").attr('src','<?php echo URLROOT ?>img/admins/'+data.imageName);
                    $("#image").fadeIn("slow");
                }
            }
        });


    });





</script>

<script>
    $('#update').click(function(e){
        e.preventDefault();
        var url = '<?php echo URL?>/Users/profileUpdate';
        $.ajax({
           url: url ,
            type:"POST",
            async:true,
            data:{
               fname:$("#fname").val(),
                lname:$("#lname").val() ,
                email:$("#email").val(),
                password:$("#password").val(),
                cPassword:$("#cPassword").val(),
                contact:$("#contact").val(),
                address:$("#address").val(),
                id:$("#id").val()
            },
            dataType:"json",
            success: function(data){
               console.log(data);
              if(data.status=='success')
              {
                  $("#getCode").html(data);
                  $("#getCodeModal").modal('show');
                  $('.invalid-feedback').fadeOut();
              }
              else{
                 //var dataObj = JSON.parse(data);
                  if(data.emailErr != ''){
                      $('#emailErr').html(data.emailErr).hide();
                      $('#emailErr').fadeIn();
                  }
                  if(data.fnameErr != ''){
                      $('#fnameErr').html(data.fnameErr).hide();
                      $('#fnameErr').fadeIn();
                  }
                  if(data.lnameErr != ''){
                      $('#lnameErr').html(data.lnameErr).hide();
                      $('#lnameErr').fadeIn();
                  }
                  if(data.contactErr != ''){
                      $('#contactErr').html(data.contactErr).hide();
                      $('#contactErr').fadeIn();
                  }



              }

            }

        });
    });

</script>
