<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Forms | Amanda Admin Template</title>
<link rel="stylesheet" href="static/css/style.default.css" type="text/css" />
<script src="static/js/jquery.min.js"></script>
<script type="text/javascript" src="static/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="static/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="static/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="static/js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="static/js/plugins/jquery.validate.min.js"></script>
<script type="text/javascript" src="static/js/plugins/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="static/js/plugins/charCount.js"></script>
<script type="text/javascript" src="static/js/plugins/ui.spinner.min.js"></script>
<script type="text/javascript" src="static/js/plugins/chosen.jquery.min.js"></script>
<script type="text/javascript" src="static/js/custom/general.js"></script>
<script type="text/javascript" src="static/js/custom/forms.js"></script>

<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body class="withvernav">

<div class="bodywrapper">
@include('layouts.master')
    <div class="centercontent">
      <div class="contenttitle2">
                    <h3>个人信息</h3>
                </div><!--contenttitle-->
        @if(!empty($errors) && count($errors) > 0)
        <div class="notibar msgerror">
              <a class="close"></a>
              <p>{{ $errors->all()[0]}}</p>
          </div>
        @endif

      <form class="stdform stdform2" method="post" action="">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id" value="{{$data->id}}">
                  <p>
                      <label>昵称</label>
                        <span class="field"><input type="text" name="nickname" value="{{$data->nickname}}" id="nickname" class="longinput" /></span>
                    </p>
                    <p>
                      <label>email</label>
                        <span class="field"><input type="text" name="email" value="{{$data->email}}" id="nickname" class="longinput" /></span>
                    </p>

                    <p>
                      <label>性别</label>
                          <span class="field"><input type="text" name="sex" disabled value="@if($data->sex == 1)男@elseif($data->sex == 0)女@else保密@endif" id="firstname2" class="longinput" /></span>
                    </p>

                    <p>
                      <label>角色</label>
                          <span class="field"><input type="text" name="role" disabled value="{{$data->role}}" id="firstname2" class="longinput" /></span>
                    </p>


                    <p>
                      <label>IP</label>
                          <span class="field"><input type="text" name="IP" disabled value="{{$ip}}" id="firstname2" class="longinput" /></span>
                    </p>

                    <p class="stdformbutton">
                      <button type="submit" class="submit radius2">提交个人信息</button>
                    </p>
                </form>
                <br />

        </div>
    </div><!--contentwrapper-->

    </div>
	</div><!-- centercontent -->
</div><!--bodywrapper-->

</body>
</html>
