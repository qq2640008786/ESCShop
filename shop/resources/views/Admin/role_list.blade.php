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
<!-- jq 删除-->
<script type="text/javascript" src="static/js/custom/role.js"></script>
<script type="text/javascript" src="static/js/plugins/jquery.dataTables.min.js"></script>

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
        <div class="pageheader">
            <h1 class="pagetitle">角色管理</h1>
            <ul class="hornav">
                <font>
管理角色（management roles)，是指特定的管理行为类型。明茨伯格的10种管理行为可以被进一步组合为三个主要的方面，即人际关系角色、信息传递角色和决策制定角色。</font>
            </ul>
            @if(session('status'))
            <div class="notibar msgsuccess">
                  <a class="close"></a>
                  <p>{{(session('status'))}}
                    <script>setTimeout(function(){window.location.reload();},2000)</script></p>
              </div>
            @endif
            <div id="edit" class="edit">

            </div>
        </div><!--pageheader-->
        <div class="tableoptions">
            <button class="deletebutton radius3" title="table2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">删除所选</font></font></button> &nbsp;
            <button  title="table2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a href="{{url('/role_add')}}">添加角色</a></font></font></button> &nbsp;
        </div>

        <table cellpadding="0" cellspacing="0" border="0" id="table2" class="stdtable stdtablecb">
            <colgroup>
                <col class="con0" style="width: 4%">
                <col class="con1">
                <col class="con0">
                <col class="con1">
                <col class="con0">
                <col class="con1">
                <col class="con0">
            </colgroup>
                <thead>

                  <tr>
                  	<th class="head0"><div class="checker" id="uniform-undefined"><span><div class="checker" id="uniform-undefined"><span><input type="checkbox" class="checkall" style="opacity: 0;"></span></div></span></div></th>
                      <th class="head0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">角色</font></font></th>
                      <th class="head1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">角色描述</font></font></th>
                      <th class="head0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">状态</font></font></th>
                      <th class="head1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品操作</font></font></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $role)
                  <tr>
                  	<td align="center"><div class="checker" id="uniform-undefined"><span><div class="checker" id="uniform-undefined"><span><input type="checkbox" value="{{$role->role_id}}" style="opacity: 0;"></span></div></span></div></td>
                      <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$role->role_name}}</font></font></td>
                      <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$role->role_description}}</font></font></td>
                      <td class="center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$role->status}}</font></font></td>
                      <td class="center"><a href="{{url('role_edit')}}/{{$role->role_id}}" class="edit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">编辑</font></font></a> &nbsp; <a href="" class="delete" data-id="{{$role->role_id}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">删除</font></font></a></td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div><!--contentwrapper-->

	</div><!-- centercontent -->


</div><!--bodywrapper-->

</body>
</html>
