/**
 * Created by root on 2/21/18.
 */
$(function () {

    setTimeout(function () {
        $("#showQty").fadeOut();
    },2000);

    $("body").delegate('#btnChangePassword','click',function () {
        var id=$("#idi").val();
       var password=$("#c_password").val();
       var confirm_password=$("#c_confirm_password").val();

       $.ajax({
          type : 'get',
           url : 'changePassword',
           data : {id:id,password:password,confirm_password:confirm_password},
           success:function (msg) {
              $("#showChangePassword").html();
              if(msg==="<div class='alert alert-success'>The password change success.</div>"){
                  setInterval(function () {
                      window.location.reload();
                  },2000);

              }
           }
       });
    });

    $("#sale_item").on('keyup',function () {
        setTimeout(function () {
            $("#sale_form").submit();
        },2000);
    });

    $("body").delegate('#btnDelProduct','click',function () {
       var id=$(this).attr('idd');

       var con=confirm('Are you sure delete Product?');
       if(con){
           $.ajax({
              type : 'get',
               url : 'delete-product',
               data : {id:id},
               success:function (msg) {
                   window.location.reload();
               }
           });
       }
    });

    setInterval(function () {
        $("#dp").fadeOut();
    },2000);

    $("#myTable").dataTable();

    $("body").delegate('#btnCatDel','click',function () {
       var id=$(this).attr('idd');

       var conf=confirm('Are you sure delete Category?');
       if(conf){
           $.ajax({
              type : 'get',
               url : 'delCat',
               data : {id:id},
               success:function (msg) {
                   $(".showDel").html();
                   if(msg==="<div class='alert alert-success'>Category delete success.</div>"){
                       window.location.reload();

                   }

               }
           });
       }
    });

    $("#btnNewCat").on('click',function () {
       var cat_name=$("#cat_name").val();

       $.ajax({
          type : 'get',
           url : 'insertCat',
           data : {cat_name:cat_name},
           success:function (msg) {
               $("#showCat").html(msg)
               if(msg==="<div class='alert alert-success'>Insert Category success.</div>"){
                   setInterval(function () {
                       $("#cat_name").val('');
                       window.location.reload();
                   },2000);
               }
           }
       });
    });


});