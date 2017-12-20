<div class="topheader">
    <div class="left">
        <h1 class="logo">Ama.<span>Admin</span></h1>
        <span class="slogan">后台管理系统</span>

        <div class="search">
          <form action="" method="post">
              <input type="text" name="keyword" id="keyword" value="请输入" />
                <button class="submitbutton"></button>
            </form>
        </div><!--search-->

        <br clear="all" />

    </div><!--left-->

    <div class="right">
      <!--<div class="notification">
            <a class="count" href="ajax/notifications.html"><span>9</span></a>
      </div>-->
        <div class="userinfo">
          <img src="static/images/thumbs/avatar.png" alt="" />
            <span>{{session('user')['role']}}</span>
        </div><!--userinfo-->

        <div class="userinfodrop">
          <div class="avatar">
              <a href=""><img src="static/images/thumbs/avatarbig.png" alt="" /></a>

            </div><!--avatar-->
            <div class="userdata">
              <h4>{{session('user')['nickname']}}</h4>
                <span class="email">{{session('user')['email']}}</span>
                <ul>
                  <li><a href="editprofile.html">编辑资料</a></li>
                    <li><a href="accountsettings.html">账号设置</a></li>
                    <li><a href="help.html">帮助</a></li>
                    <li><a href="{{url('/login_out')}}">退出</a></li>
                </ul>
            </div><!--userdata-->
        </div><!--userinfodrop-->
    </div><!--right-->
</div><!--topheader-->
<div class="header">
  <ul class="headermenu">
      <li class="current"><a href="{{url('/index')}}"><span class="icon icon-flatscreen"></span>首页</a></li>
        <li><a href="manageblog.html"><span class="icon icon-pencil"></span>博客管理</a></li>
        <li><a href="messages.html"><span class="icon icon-message"></span>查看消息</a></li>
        <li><a href="reports.html"><span class="icon icon-chart"></span>统计报表</a></li>
    </ul>

   <div class="headerwidget">
      <div class="earnings">
          <div class="one_half">
              <h4>Today's Earnings</h4>
                <h2>$640.01</h2>
            </div><!--one_half-->
            <div class="one_half last alignright">
              <h4>Current Rate</h4>
                <h2>53%</h2>
            </div><!--one_half last-->
        </div><!--earnings-->
    </div><!--headerwidget-->

</div><!--header-->
<div class="vernav2 iconmenu">
  <ul>
      <li><a href="#formsub" class="editor">商品管理</a>
          <span class="arrow"></span>
          <ul id="formsub">
                <li><a href="{{url('goods_list')}}">商品管理</a></li>
                <li><a href="{{url('species_list')}}"> 种类管理</a></li>
            </ul>
        </li>
        <!--<li><a href="filemanager.html" class="gallery">文件管理</a></li>-->
        <li><a href="{{url('role_list')}}" class="elements">角色管理</a></li>
        <li><a href="widgets.html" class="widgets">网页插件</a></li>
        <li><a href="calendar.html" class="calendar">日历事件</a></li>
        <li><a href="support.html" class="support">客户支持</a></li>
        <li><a href="typography.html" class="typo">文字排版</a></li>
        <li><a href="tables.html" class="tables">数据表格</a></li>
  <li><a href="buttons.html" class="buttons">按钮 &amp; 图标</a></li>
        <li><a href="#error" class="error">错误页面</a>
          <span class="arrow"></span>
          <ul id="error">
              <li><a href="notfound.html">404错误页面</a></li>
                <li><a href="forbidden.html">403错误页面</a></li>
                <li><a href="internal.html">500错误页面</a></li>
                <li><a href="offline.html">503错误页面</a></li>
            </ul>
        </li>
        <li><a href="#addons" class="addons">其他页面</a>
          <span class="arrow"></span>
          <ul id="addons">
              <li><a href="newsfeed.html">新闻订阅</a></li>
                <li><a href="profile.html">资料页面</a></li>
                <li><a href="productlist.html">产品列表</a></li>
                <li><a href="photo.html">图片视频分享</a></li>
                <li><a href="gallery.html">相册</a></li>
                <li><a href="invoice.html">购物车</a></li>
            </ul>
        </li>
    </ul>
    <a class="togglemenu"></a>
    <br /><br />
</div><!--leftmenu-->
