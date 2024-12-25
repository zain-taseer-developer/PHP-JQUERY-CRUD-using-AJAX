<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <form id="formReset">
  <label for="">Student ID</label>
  <input type="number" id="stuIdInput">
  <label for="">Student Name</label>
  <input type="text" id="stuNameInput">
  <label for="">Student City</label>
  <input type="text" id="stuCityInput">
  <!-- form submit btn -->
   <button type="submit" id="submitFormBtn">Submit</button>
  </form>


<!-- data we fetchefd from db -->
 <div class="fetchedData"></div>

 <!-- model -->
  <div class="model" style="display: none;">
    <div class="CloseBtn">x</div>
    <div class="updatedResponse"></div>
  </div>
<!-- jquery ajax -->
<script 
  src="https://code.jquery.com/jquery-3.7.1.js" 
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" 
  crossorigin="anonymous">
</script>

<!-- Your custom script -->
<script>
    jQuery(document).ready(function() {
      // $('.model').hide();
      // for data insert
        jQuery('#submitFormBtn').on('click', (e) => {
            e.preventDefault();
            var stuId = jQuery('#stuIdInput').val();
            var stuName = jQuery('#stuNameInput').val();
            var stucity = jQuery('#stuCityInput').val();
            
            $.ajax({
              url:"./insertData.php",
              type:"post",
              data:{
                idHere:stuId,
                nameHere:stuName,
                cityHere:stucity
              },
            success:function(returedResponse){
               if(returedResponse==1){
              console.log("data inserted in db ");
              selectedDataLoad();
               jQuery('#formReset')[0].reset();
               }
               else{
                console.log("data not inserted");
               }
            }
            })
        });

        // for data select from db
        function  selectedDataLoad(){
        $.ajax({
          url:"./selectData.php",
          type:"post",
          success:function(returedResponse){
              $('.fetchedData').html(returedResponse);
          }
        })
      }
      selectedDataLoad();


      // for data edit 
      jQuery(document).on('click', '.update-btn', function (e) {
    jQuery('.model').show();
//  console.log(e.target);
var toUpdateDataId=$(this).data("upadteid");
        $.ajax({
        url:"./editformProcess.php",
        type:"get",
        data:{
         idofdata:toUpdateDataId
        },
        success:function(editFormReturned){
          // console.log(editFormReturned);
          jQuery('.updatedResponse').html(editFormReturned);
        }
      })
    })

    jQuery('.CloseBtn').on('click',()=>{
      jQuery('.model').hide()
    })

    // update data that not we get from edit form
    jQuery(document).on('click','#updateFormBtn',function(e){
      e.preventDefault();
     var updatedid=jQuery('#updatestuIdInput').val();
     var updatedname=jQuery('#updatestuNameInput').val();
     var updatedcity=jQuery('#updatestuCityInput').val();

     $.ajax({
      url:"./updatedata.php",
      type:"post",
      data:{
        updatedid:updatedid,
        updatedname:updatedname,
        updatedcity:updatedcity
      },
      success:function(dataupdateResponse){
        if (dataupdateResponse == 1) {
              jQuery(".model").hide();
              selectedDataLoad();
              console.log("message success" );
            }else{
              console.log("some err");
            }
      }
     })

    })

    // delete data  code
  jQuery(document).on('click','.delete-btn',function(e){
console.log(e.target);
var todeleteID=$(this).data("delid");
$.ajax({
  url:"./deletedataProcess.php",
  type:"get",
  data:{
    idtodel:todeleteID
  },
  success:function(deleteSuccessMsg){
    if(deleteSuccessMsg==1){
 console.log(`data deleted successfully id ${deleteSuccessMsg}`);
 selectedDataLoad();
  }else{
    console.log("response is o from update query");
  }
}})
  })

    })


</script>

</body>
</html>