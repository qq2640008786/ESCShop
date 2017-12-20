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
        <div class="pageheader">
            <h1 class="pagetitle">商品管理</h1>
            <ul class="hornav">
                <font>
易订货帮助企业快速构建全渠道营销互动平台，连续三年蝉联最佳企业移动订货平台大奖。围绕品牌企业与下游客户的全渠道业务流程设计，以订单处理为核心，实现在商机管理、分销管控、商品促销、订单处理、库存采购、资金对账、支付物流、决策分析等业务环节的全程电子商务；实时数据决策，让生意更简单!</font>
            </ul>
        </div><!--pageheader-->
        <div class="tableoptions">
          	<button class="deletebutton radius3" title="表2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">删除所选</font></font></button> &nbsp;
            <button class="deletebutton radius3" title="表2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a href="{{url('/goods_add')}}">添加商品</a></font></font></button> &nbsp;
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
                      <th class="head1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品图片</font></font></th>
                      <th class="head0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品名称</font></font></th>
                      <th class="head1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品描述</font></font></th>
                      <th class="head0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品价格</font></font></th>
                      <th class="head1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品库存</font></font></th>
                      <th class="head1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">所属种类</font></font></th>
                      <th class="head1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">商品操作</font></font></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  	<td align="center"><div class="checker" id="uniform-undefined"><span><div class="checker" id="uniform-undefined"><span><input type="checkbox" style="opacity: 0;"></span></div></span></div></td>
                      <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">三叉戟</font></font></td>
                      <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Internet Explorer 4.0</font></font></td>
                      <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">赢95+</font></font></td>
                      <td class="center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">4</font></font></td>
                      <td class="center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">4</font></font></td>
                      <td class="center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">X</font></font></td>
                      <td class="center"><a href="" class="edit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">编辑</font></font></a> &nbsp; <a href="" class="delete"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">删除</font></font></a></td>
                  </tr>
                </tbody>
            </table>
        </div><!--contentwrapper-->

	</div><!-- centercontent -->


</div><!--bodywrapper-->

</body>
</html>
