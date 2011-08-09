<style type="text/css">
    h3{color:green; font-size:21px; font-weight:700; padding:100px 0 60px 0; margin:0;}
    .userbox{
	text-align:left;
	margin:0 auto;  
	font-size:16px;
	padding:10px 0 0 370px;;
}
</style>

<div id="success">
      <h3 style="color:green; font-size:21px; font-weight:700; padding-top:100px; margin: 0;">恭喜您！注册成功!</h3>
      <div class="userbox">用户名:<?php echo $member->member_name; ?></div>
      <div class="userbox">密&nbsp;&nbsp;&nbsp;&nbsp;码:<?php echo $pwd;?></div>
      <div class="userbox">地&nbsp;&nbsp;&nbsp;&nbsp;区:<?php echo Category::getAllAddress($model->user_category); ?></div>
      <div class="userbox">注册团队:<?php echo $model->user_team; ?></div>
      <div style="margin:0 auto; text-align:center; padding:60px 0; width: 300px;">请记好您的用户名和密码，方便以后查询自己在巾帼志愿队做过的一切事务！祝您拥有美好的一天！</div>
</div>

 


 
 

 
