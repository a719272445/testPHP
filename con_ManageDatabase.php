<!DOCTYPE html>
<html>
        <head>
        <meta   http-equiv="content-type" content="text/html" charset="UTF-8">
        <title>数据插入</title>
        <link href="CSS/Main.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">
#nav {
	width: 100px;
	border-color: #c5c6c4;
	border-style: solid;
	border-width: 0px 1px 1px 1px;
}
#nav h1 {
	margin: 0px;
	padding: 4px;
	font-size: 12px;
	font-weight: bold;
	font-family: Verdana;
	border-top: 1px solid #c5c6c4;
	background-color: #CCCCCC;
}
#nav h2 {
	margin: 0px;
	padding: 4px;
	font-size: 12px;
	font-family: Verdana;
	font-weight: normal;
}
#nav h2 a {
	color: #666666;
	text-decoration: none;
}
#nav h2 a:hover {
	color: #999999;
	text-decoration: underline;
}
</style>
        <script type="text/javascript" src="JavaScript/Main.js"></script>
        <script type="text/javascript" src="JavaScript/MyAjax.js"></script>
        <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
        </head>
        <body >
        <div align="center">
          <div id="main" align="center" style="padding: 3px; margin: 3px; border: thin solid #C0C0C0; width:720px"> &nbsp
            <div id="nav" style="float:left;width:9%">
              <h1>信息录入</h1>
              <h2><a href="#">基本</a></h2>
            </div>
            <div id="right" style="float:right;width:90%; background-color: #F8F8FF;" align="left">
              <div id="tablediv">
                <form id="form1" name="form1" action="http://anxing.wicp.net/UserSystem2/user/php/login2.php" method="get" >
                  <table  >
                    <tr>
                      <td width="8%" class="style1" align="right"> 名称：</td>
                      <td width="92%"><input type="text" name="name" id="Name_Data"  ></td>
                    </tr>
                    <tr>
                      <td class="style1" align="right"> 值：</td>
                      <td><input type="text" name="value" id="Value_Data" onkeyup="nocn()"></td>
                    </tr>
                    <tr>
                      <td ><input type="submit" name="RecordBtn" id="RecordBtn" value="录入" onclick="CheckTxtIsNull()"></td>
                      <td><input type="button" name="ClearBtn" id="ClearBtn" value="重置" onclick="cls()">
                        (ToXing)</td>
                    </tr>
                    <tr>
                      <td></td>
                    </tr>
                  </table>
                </form>
              </div>
            </div>
          </div>
          <div align="center" id="show" style="clear:both">
            <p>###在这里显示需要的数据###</p>
<!--             <form name="form2" method="post" action="ManageDatabase.php"> -->
              <table align="center" >
                <tr>
                  <td colspan="2">
                    <p>
                  <input name="GetData" type="button" value="获取数据(Xuan)" onclick="run_ajax()">
                  <input name="GetData2" type="button" value="获取数据(Zhen)" onclick="run_ajaxToGetData_Zhen()">
                  <br>                    
                  <textarea name="richtext" id="richtext" style="height:100px;width:500px;height:300px" readonly></textarea>
                  <br>
                  <div id="tableDiv"></div>
                  <br>
                    </p>
                  </td>
                </tr>
                <tr>
                  <td width="54">Name：
                    <br></td>
                  <td width="448"><input type="text" name="Name_Xuan" id="Name_Xuan"></td>
                </tr>
                <tr>
                  <td>Edition：                  </td>
                  <td><input type="text" name="Editon_Xuan" id="Editon_Xuan"></td>
                </tr>
                <tr>
                  <td colspan="2"><input type="button" name="InsertBtn" id="InsertBtn" value="添加数据到数据库(ToXuan)" onClick="run_ajaxToSetValue()"></td>
                </tr>
              </table>            
<!--             </form> -->
            <p><br>
            </p>
          </div>
          <div id="PHPDateDiv"> </div>
        </div>
</body>
</html>