<?php 

$noticeClass='active';
$addClass=$issueClass=$listClass=$addMemberClass=$listMemberClass=$issuedClass=$requestbookClass=$categoryClass=$listCategoriesClass=$profileClass='';


include_once ('../view/header.php');
include_once ('../controller/common.php');

$noticeObj = new common();
if(!empty($_POST['message'])){
  $notice=$noticeObj->addNotice();
}
?>

<body>
<div class="">
  <div class="">
    <div class="col-md-3">
      <?php 
      include 'left_menu.php';
      ?>    
    </div>
    <div class="col-md-9">
    <form name="noticeboard" id="noticeboard" action="" method="POST">
        <table cellpadding="3" cellspacing="3" width="auto" height="100%">
          <tr>
            <td>Message :</td>
            <td><textarea rows="5" cols="20" name="message"></textarea></td>
          </tr>
          <tr>
            <td>From Date :</td>
            <td><input type="date" name="from_date" id="from_date" required></td>
          </tr>
          <tr>
            <td>To Date :</td>
            <td><input type="date" name="to_date" id="to_date" required></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><button type="submit">Submit</button></td>
          </tr>
        </table>
        </form>
    </div>
  </div>
</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

 var dtToday = [];
  $(function(){
  var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        
        var maxDate = year + '-' + month + '-' + day;
        $('#from_date').attr('min', maxDate);
        $('#to_date').attr('min', maxDate);
  
    });
</script>


