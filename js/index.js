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
		alert("联系方式不能为空");
		$("#phone_number").focus();
		return;
	}
	$.post(
		"php/input.php",
		{
			"name":Name,"gender":Gender,"student_id":Student_id,"phone_number":Phone_number,
			"major":Major,"grade":Grade,"class":Class,"item":Item 
		},
		function(data,status){
			if(status=="success")
				clearInput();
				alert(data);
		}
	)
})

//分组页面
function createContent(i,a1,a2,a3,a4,a5,a6,a7,a8){
	var content = " <tr><td>第"+i+"组</td>";
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
			// alert(data);
		}
	)
}

//录分页面
$("#query").click(function(){
	var gradeItem = $("#gradeItem").selectpicker("val");
	var gradePosition = $("#gradePosition").selectpicker("val");
	$.get(
		"php/",
		{"item":gradeItem,"position":gradePosition},
		function (data,status) {
			
		}
		)
})