function cls() {
	var sum = 0;
	var t = document.getElementsByTagName("INPUT");
	for (var i = 0; i < t.length; i++) {
		if (t[i].type == 'text') {
			++sum;
			t[i].value = "";// 清空
		}
	}
}

function CheckTxtIsNull() {
	var e = e || window.event;
	var t1=document.getElementById("Name_Data").value
	var t2=document.getElementById("Value_Data").value
	if (t1== "") {
		if (e.preventDefault) {//通过取消默认事件来阻止表单的提交;
			e.preventDefault(); //for ff ,谷歌之类的现代浏览器;
		} else {
			e.returnValue = false; //for ie;
		}
		alert("名称不能为空");
	}
	if (t2== "") {		
		if (e.preventDefault) {//通过取消默认事件来阻止表单的提交;
			e.preventDefault(); //for ff ,谷歌之类的现代浏览器;
		} else {
			e.returnValue = false; //for ie;
		}
		alert("值不能为空");
	}
}

// 限制输入中文
function nocn() {
	for (i = 0; i < document.getElementsByName("value")[0].value.length; i++) {
		var c = document.getElementsByName("value")[0].value.substr(i, 1);
		var ts = escape(c);
		if (ts.substring(0, 2) == "%u") {
			document.getElementsByName("value")[0].value = "";
			alert("数值不能输入中文/全角字符");
		}
	}
}
