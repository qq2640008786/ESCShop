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
                    <h3>商品添加</h3>
                </div><!--contenttitle-->

      <form class="stdform stdform2" method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  <p>
                      <label>商品名称</label>
                        <span class="field"><input type="text" name="goods_name" id="firstname2" class="longinput" /></span>
                    </p>

                    <p>
                      <label>上传图片</label>
                        <span class="field"><input type="file" name="goods_picture" onchange="javascript:PreviewImg(this);" id="picture" class="longinput" /></span>


                    </p>
                    <!-- <img id="logo" src=""> -->
                    <p>
                      <label>商品价格</label>
                        <span class="field"><input type="text" name="goods_price" id="lastname2" class="longinput" /></span>
                    </p>

                    <p>
                      <label>商品库存</label>
                        <span class="field"><input type="text" name="goods_stock" id="email2" class="longinput" /></span>
                    </p>
                    <p>
                      <label>商品描述 <small>记录下你的商品描述</small></label>
                        <span class="field"><textarea cols="80" rows="5" name="goods_description" id="location2" class="longinput"></textarea></span>
                    </p>

                    <p>
                      <label>所属种类</label>
                        <span class="field"><select name="species" id="selection2">
                          <option value="">Choose One</option>
                            <option value="1">Selection One</option>
                            <option value="2">Selection Two</option>
                            <option value="3">Selection Three</option>
                            <option value="4">Selection Four</option>
                        </select></span>
                    </p>


                    <p class="stdformbutton">
                      <button class="submit radius2">Submit Button</button>
                        <input type="reset" class="reset radius2" value="Reset Button" />
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
<script type="text/javascript" language="javascript">

    </script>
