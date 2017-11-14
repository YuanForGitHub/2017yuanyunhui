/*$('#Tabs li').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
}) 和 data-toggle="tab" 冲突了
*/
//报名页面
var Gender="男",Major="计机",Grade="17",Class="1",Item="1";

function selectGender(obj){
	Gender = obj.options[obj.selectedIndex].value;
}
function selectMajor(obj){
	Major = obj.options[obj.selectedIndex].value;
}
function selectGrade(obj){
	Grade = obj.options[obj.selectedIndex].value;
}
function selectClass(obj){
	Class = obj.options[obj.selectedIndex].value;
}
function selectItem(obj){
	Item = obj.options[obj.selectedIndex].value;
}

function clearInput() {
	$("#name").val("");
	$("#phone_number").val("");
	$("#student_id").val("");
}

$("#submit").click(function(){
	var Name = $("#name").val();
	var Phone_number = $("#phone_number").val();
	var Student_id = $("#student_id").val();
	if(Name==""){
		alert("姓名不能为空");
		$("#name").focus();
		return;
	}
	if(Student_id==""){
		alert("学号不能为空");
		$("#student_id").focus();
		return;
	}
	if(Phone_number==""){
		//alert("联系方式不能为空");
		//$("#phone_number").focus();
		//return;
		Phone_number = 0;
	}
	alert("禁止录入！");
	// $.post(
	// 	"php/input.php",
	// 	{
	// 		"name":Name,"gender":Gender,"student_id":Student_id,"phone_number":Phone_number,
	// 		"major":Major,"grade":Grade,"class":Class,"item":Item 
	// 	},
	// 	function(data,status){
	// 		if(status=="success")
	// 			clearInput();
	// 			//alert(data);
	// 	}
	// )
})

//分组页面
function createContent(i,a1,a2,a3,a4,a5,a6,a7,a8){
	var content = " <tr><td>第"+i+"组</td>";
	if(a1["item"]=="25")
	{
		if(a1!=null)
			content += "<td>"+a1["grade"]+a1["major"]+a1["class"]+"</td>";
		if(a2!=null)
			content += "<td>"+a2["grade"]+a2["major"]+a2["class"]+"</td>";
		if(a3!=null)
			content += "<td>"+a3["grade"]+a3["major"]+a3["class"]+"</td>";
		if(a4!=null)
			content += "<td>"+a4["grade"]+a4["major"]+a4["class"]+"</td>";
		if(a5!=null)
			content += "<td>"+a5["grade"]+a5["major"]+a5["class"]+"</td>";
		if(a6!=null)
			content += "<td>"+a6["grade"]+a6["major"]+a6["class"]+"</td>";
		if(a7!=null)
			content += "<td>"+a7["grade"]+a7["major"]+a7["class"]+"</td>";
		if(a8!=null)
			content += "<td>"+a8["grade"]+a8["major"]+a8["class"]+"</td>";
		content += "</tr>";
	}
	else
	{
		if(a1!=null)
			content += "<td>"+a1["name"]+"<br>"+a1["grade"]+a1["major"]+a1["class"]+"</td>";
		if(a2!=null)
			content += "<td>"+a2["name"]+"<br>"+a2["grade"]+a2["major"]+a2["class"]+"</td>";
		if(a3!=null)
			content += "<td>"+a3["name"]+"<br>"+a3["grade"]+a3["major"]+a3["class"]+"</td>";
		if(a4!=null)
			content += "<td>"+a4["name"]+"<br>"+a4["grade"]+a4["major"]+a4["class"]+"</td>";
		if(a5!=null)
			content += "<td>"+a5["name"]+"<br>"+a5["grade"]+a5["major"]+a5["class"]+"</td>";
		if(a6!=null)
			content += "<td>"+a6["name"]+"<br>"+a6["grade"]+a6["major"]+a6["class"]+"</td>";
		if(a7!=null)
			content += "<td>"+a7["name"]+"<br>"+a7["grade"]+a7["major"]+a7["class"]+"</td>";
		if(a8!=null)
			content += "<td>"+a8["name"]+"<br>"+a8["grade"]+a8["major"]+a8["class"]+"</td>";
		content += "</tr>";
	}

	return content;
}


function showItem(obj) {
	var item = obj.options[obj.selectedIndex].value;
	$("#tb").html("");
	$.get(
		"php/show.php",
		{"item":item},
		function (data,status) {
			var a = eval(data);
			var k=1;
			for(var i=0;i<a.length;i+=8)
			{	
			 	var content = createContent(k++,a[i],a[i+1],a[i+2],a[i+3],a[i+4],a[i+5],a[i+6],a[i+7]);
				$("#tb").append(content);
			}
		}
	)
}

//录分页面
function addAthlete(i,a) {
	var gradeAthlete = $("#gradeAthlete").find("td");
	var gradeGrade = $("#gradeGrade").find("td");
	gradeAthlete.eq(0).text("第"+i+"组");
	for(var i=0;i<8;i++){
		if(i<a.length)
		{
			gradeAthlete.eq(i+1).html(a[i]["name"]+"<br>"+a[i]["grade"]+a[i]["major"]+a[i]["class"]);
			gradeGrade.eq(i+1).find("input").eq(0).val(a[i]["minute"]);
			gradeGrade.eq(i+1).find("input").eq(1).val(a[i]["second"]);
		}
		else 
		{
			gradeAthlete.eq(i+1).html("");
			gradeGrade.eq(i+1).find("input").eq(0).val("");
			gradeGrade.eq(i+1).find("input").eq(1).val("");
		}
	}
}

$("#gradeQuery").click(function(){
	var gradeItemQuery = $("#gradeItemQuery").selectpicker("val");
	var gradeGroupQuery = $("#gradeGroupQuery").selectpicker("val");
	var t = $("#gradeGrade");
	if(gradeItemQuery=="8"||gradeItemQuery=="9"||gradeItemQuery=="10"
		||gradeItemQuery=="12"||gradeItemQuery=="20"||gradeItemQuery=="21"
		||gradeItemQuery=="22"||gradeItemQuery=="23")
	{
		t.find("input:even").attr("placeholder","米");
		t.find("input:odd").attr("placeholder","不填");
	}
	else if(gradeItemQuery=="11"||gradeItemQuery=="24")
	{
		t.find("input:even").attr("placeholder","个");
		t.find("input:odd").attr("placeholder","不填");
	}
	else 
	{
		t.find("input:even").attr("placeholder","分");
		t.find("input:odd").attr("placeholder","秒");
	}
	$.get(
		"php/testG.php",
		{"item":gradeItemQuery,"group":gradeGroupQuery},
		function (data,status) {
				var a = eval(data);
				if(a==null)
					alert("没有对应数据");
				else
					addAthlete(gradeGroupQuery,a);
			}
		)
})
$("#submitGrade").click(function(){
	var item = $("#gradeItemQuery").selectpicker("val");
	var group = $("#gradeGroupQuery").selectpicker("val");
	var gradeGrade = $("#gradeGrade").find("td");
	var grade = new Array();
	for(var i=0;i<8;i++){
		var minute = gradeGrade.eq(i+1).find("input").eq(0).val();
		var second = gradeGrade.eq(i+1).find("input").eq(1).val();
		grade[i] = new Array(minute,second);
	}
	$.post(
		"php/testSubmit.php",
		{"item":item,"group":group,"grade":grade},
		function (data,status) {
				alert(data);
			}
		)
})

//排名页面
function createAthlete(i,a,item) {
	var c0 = "<tr><td>第"+(i+1)+"名</td>";
	var c1 = "<td>"+a["name"]+"<br>"+a["grade"]+a["major"]+a["class"]+"</td>";
	var c2 = "<td>"+a["minute"]+"</td></tr>";
	return c0+c1+c2;
}
function rankList(a,item) {
	var list;
	for(var i=0;i<a.length;i++){
		list += createAthlete(i,a[i],item);
	}
	$("#rankList").html(list);
}

$("#rankQuery").click(function(){
	var item = $("#rankItemQuery").selectpicker("val");
	$.get(
		"php/rank.php",
		{"item":item},
		function (data,status) {
				var a = eval(data);
				if(a==null)
					alert("没有对应数据");
				else
					rankList(a,item);
			}
		)
})

//导出
$("#downloadButton").click(function(){
	var item = $("#downloadItem").selectpicker("val");
	location = "php/download.php?item="+item;
})