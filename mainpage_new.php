<?php
session_start();
$conn = new mysqli("localhost","root","","sepm");

?>
<!-- let panels = document.querySelectorAll('main div');
  		panels.forEach(p => p.classList.remove('active'));
  		panels[n - 1].classList.add('active'); -->
<?php
if (isset($_SESSION['user']))
{
	include 'mainpage.html';
	echo "<script>
  	var nav_options = ['all', 'shop', 'med', 'others'];
	document.querySelectorAll('nav div a').forEach(e => e.addEventListener('click', _ => change(e.dataset.id)));

	function change(n) {
		document.getElementById('all').style.backgroundColor = '';
	  	document.getElementById('all').style.color = '';
	  	document.getElementById('med').style.backgroundColor = '';
	  	document.getElementById('med').style.color = '';
	  	document.getElementById('shop').style.backgroundColor = '';
	  	document.getElementById('shop').style.color = '';
	  	document.getElementById('others').style.backgroundColor = '';
	  	document.getElementById('others').style.color = '';
  		document.getElementById(nav_options[n-1]).style.backgroundColor = '#f0932b';
  		document.getElementById(nav_options[n-1]).style.color = 'black';
  		document.getElementById('shop_content').className = '';
  		document.getElementById('all_content').className = '';
  		document.getElementById('med_content').className = '';
  		document.getElementById('other_content').className = '';
  		var content_div = String(nav_options[n-1])+'_content';
  		document.getElementById(content_div).className = 'active';
  		document.getElementById('shop_content').style.display = 'none';
  		document.getElementById('all_content').style.display = 'none';
  		document.getElementById('med_content').style.display = 'none';
  		document.getElementById('other_content').style.display = 'none';
  		document.getElementById(content_div).style.display = 'block';

	}
	
	</script>";
	
	$user = $_SESSION['user'];
	$q1 = "SELECT * from images WHERE username = '$user'";
	$result = mysqli_query($conn,$q1);
				
	if(mysqli_num_rows($result) > 0)
	{
		
		$image_list = array();
		$image_name_list = array();
		$date_list = array();
		$category_list = array();

		while($z = mysqli_fetch_array($result))
		{

			array_push($image_list, $z["image"]);
			array_push($image_name_list, $z["name"]);
			array_push($date_list, $z["upload_date"]);
			array_push($category_list, $z["category"]);
		}

		$unique_date_list = array_unique($date_list);
		$unique_date_list = array_values($unique_date_list);
		function date_sort($a, $b) {
    			return strtotime($a) - strtotime($b);
			}
		usort($unique_date_list, "date_sort");
			// usort($date_list, "date_sort");

		for ($unique_dates=0; $unique_dates < count($unique_date_list); $unique_dates++)
		{
			$section = $unique_date_list[$unique_dates];
			echo "<script>
			var div = document.createElement('div');
			div.setAttribute('id', 'date_div');
			div.setAttribute('style', 'width: 100%; height: 20px; background-color: white; margin-left : 10px; margin-bottom: 10px;');
			var d = '$section';
			div.innerHTML = d.toString();
			document.getElementById('all_content').appendChild(div);
			</script>";


			for ($image_count = 0; $image_count < count($image_list); $image_count++)
			{
				if ($date_list[$image_count] == $section)
				{
					$current_image = $image_list[$image_count];
					$current_image_location = "images/".$user."/".$current_image;
					$current_image_name = $image_name_list[$image_count];
					$current_image_category = $category_list[$image_count];
					$current_image_description = strtoupper(strval($current_image_name)).'\n'.strval($section).'\n'.strval($current_image_category);
					echo "<script>
					var label = document.createElement('img');
					label.src = '$current_image_location';
					label.setAttribute('id', String('image'+'$section'+'$image_count'));
					label.setAttribute('style', 'width: 100px; height: 100px; border-radius: 4%; cursor: pointer;');
					var div = document.createElement('div');
					div.setAttribute('id', String('image_div'+'$section'+'$image_count'));
					div.setAttribute('style', 'width: 250px; height: 100px; background-color: white; cursor: pointer; display: inline-block; margin-left : 10px; margin-bottom: 10px; border-radius: 4%; overflow: hidden; text-overflow: ellipsis;');
					var a = document.createElement('a');
					a.setAttribute('id', String('image_a'+'$section'+'$image_count'));
					a.setAttribute('href', 'download.php?image=$current_image_location&name=$current_image_name&category=$current_image_category&date=$section');
					a.setAttribute('style', 'width: 250px; height: 100px; text-decoration : none; position: absolute; float: left;');
					var p = document.createElement('p');
					p.setAttribute('id', String('image_p'+'$section'+'$image_count'));
					p.innerText = '$current_image_description';
					p.setAttribute('style', 'width: 140px; height: 100px; top: -100px; float: right; color: blue;');
	
					document.getElementById('all_content').appendChild(div);
					document.getElementById(String('image_div'+'$section'+'$image_count')).appendChild(a);
					document.getElementById(String('image_div'+'$section'+'$image_count')).appendChild(label);
					document.getElementById(String('image_div'+'$section'+'$image_count')).appendChild(p);


					</script>";

				}
			}

		}

	}
	else{
		echo "<script>
			var div = document.createElement('div');
			div.setAttribute('id', 'empty');
			div.setAttribute('style', 'width: 100%; height: 50px; background-color: white; color: red; margin-left : 10px; margin-top: 10px; margin-top : 10px; margin-right : 10px; text-align: center;');
			var d = 'No files Uploaded';
			div.innerHTML = d.toString();
			document.getElementById('all_content').appendChild(div);
			</script>";

	}
	if(mysqli_num_rows($result) > 0)
	{
		
		$image_list = array();
		$image_name_list = array();
		$date_list = array();
		$category_list = array();

		while($z = mysqli_fetch_array($result))
		{

			array_push($image_list, $z["image"]);
			array_push($image_name_list, $z["name"]);
			array_push($date_list, $z["upload_date"]);
			array_push($category_list, $z["category"]);
		}


		if (in_array("Shopping", $category_list)){

			$unique_date_list = array_unique($date_list);
			$unique_date_list = array_values($unique_date_list);
			function date_sort($a, $b) {
    			return strtotime($a) - strtotime($b);
			}
			usort($unique_date_list, "date_sort");
			// usort($date_list, "date_sort");
			for ($unique_dates=0; $unique_dates < count($unique_date_list); $unique_dates++)
			{
				$section = $unique_date_list[$unique_dates];
				echo "<script>
				var div = document.createElement('div');
				div.setAttribute('id', 'date_div');
				div.setAttribute('style', 'width: 100%; height: 20px; background-color: white; margin-left : 10px; margin-bottom: 10px;');
				var d = '$section';
				div.innerHTML = d.toString();
				document.getElementById('shop_content').appendChild(div);
				</script>";


				for ($image_count = 0; $image_count < count($image_list); $image_count++)
				{
					if ($date_list[$image_count] == $section)
					{
						$current_image = $image_list[$image_count];
						$current_image_location = "images/".$user."/".$current_image;
						$current_image_name = $image_name_list[$image_count];
						$current_image_category = $category_list[$image_count];
						$current_image_description = strtoupper(strval($current_image_name)).'\n'.strval($section).'\n'.strval($current_image_category);
						if (strval($current_image_category) == 'Shopping'){
							echo "<script>
							var label = document.createElement('img');
							label.src = '$current_image_location';
							label.setAttribute('id', String('image'+'$section'+'$image_count'));
							label.setAttribute('style', 'width: 100px; height: 100px; border-radius: 4%; cursor: pointer;');
							var div = document.createElement('div');
							div.setAttribute('id', String('image_div'+'$section'+'$image_count'));
							div.setAttribute('style', 'width: 250px; height: 100px; background-color: white; cursor: pointer; display: inline-block; margin-left : 10px; margin-bottom: 10px; border-radius: 4%; overflow: hidden; text-overflow: ellipsis;');
							var a = document.createElement('a');
							a.setAttribute('id', String('image_a'+'$section'+'$image_count'));
							a.setAttribute('href', 'download.php?image=$current_image_location&name=$current_image_name&category=$current_image_category&date=$section');
							a.setAttribute('style', 'width: 250px; height: 100px; text-decoration : none; position: absolute; float: left;');
							var p = document.createElement('p');
							p.setAttribute('id', String('image_p'+'$section'+'$image_count'));
							p.innerText = '$current_image_description';
							p.setAttribute('style', 'width: 140px; height: 100px; top: -100px; float: right; color: blue;');
			
							document.getElementById('shop_content').appendChild(div);
							document.getElementById(String('image_div'+'$section'+'$image_count')).appendChild(a);
							document.getElementById(String('image_div'+'$section'+'$image_count')).appendChild(label);
							document.getElementById(String('image_div'+'$section'+'$image_count')).appendChild(p);


							</script>";
						}

					}
				}

			}

		}
		else{
			echo "<script>
			var div = document.createElement('div');
			div.setAttribute('id', 'empty');
			div.setAttribute('style', 'width: 100%; height: 50px; background-color: white; color: red; margin-left : 10px; margin-top: 10px; margin-top : 10px; margin-right : 10px; text-align: center;');
			var d = 'No files Uploaded for Shopping category';
			div.innerHTML = d.toString();
			document.getElementById('shop_content').appendChild(div);
			</script>";
		}

	}
	else{
		echo "<script>
			var div = document.createElement('div');
			div.setAttribute('id', 'empty');
			div.setAttribute('style', 'width: 100%; height: 50px; background-color: white; color: red; margin-left : 10px; margin-top: 10px; margin-top : 10px; margin-right : 10px; text-align: center;');
			var d = 'No files Uploaded';
			div.innerHTML = d.toString();
			document.getElementById('shop_content').appendChild(div);
			</script>";

	}
	if(mysqli_num_rows($result) > 0)
	{
		
		$image_list = array();
		$image_name_list = array();
		$date_list = array();
		$category_list = array();

		while($z = mysqli_fetch_array($result))
		{

			array_push($image_list, $z["image"]);
			array_push($image_name_list, $z["name"]);
			array_push($date_list, $z["upload_date"]);
			array_push($category_list, $z["category"]);
		}


		if (in_array("Medical", $category_list)){

			$unique_date_list = array_unique($date_list);
			$unique_date_list = array_values($unique_date_list);
			function date_sort($a, $b) {
    			return strtotime($a) - strtotime($b);
			}
			usort($unique_date_list, "date_sort");
			// usort($date_list, "date_sort");

			for ($unique_dates=0; $unique_dates < count($unique_date_list); $unique_dates++)
			{
				$section = $unique_date_list[$unique_dates];
				echo "<script>
				var div = document.createElement('div');
				div.setAttribute('id', 'date_div');
				div.setAttribute('style', 'width: 100%; height: 20px; background-color: white; margin-left : 10px; margin-bottom: 10px;');
				var d = '$section';
				div.innerHTML = d.toString();
				document.getElementById('med_content').appendChild(div);
				</script>";


				for ($image_count = 0; $image_count < count($image_list); $image_count++)
				{
					if ($date_list[$image_count] == $section)
					{
						$current_image = $image_list[$image_count];
						$current_image_location = "images/".$user."/".$current_image;
						$current_image_name = $image_name_list[$image_count];
						$current_image_category = $category_list[$image_count];
						$current_image_description = strtoupper(strval($current_image_name)).'\n'.strval($section).'\n'.strval($current_image_category);
						if (strval($current_image_category) == 'Medical'){
							echo "<script>
							var label = document.createElement('img');
							label.src = '$current_image_location';
							label.setAttribute('id', String('image'+'$section'+'$image_count'));
							label.setAttribute('style', 'width: 100px; height: 100px; border-radius: 4%; cursor: pointer;');
							var div = document.createElement('div');
							div.setAttribute('id', String('image_div'+'$section'+'$image_count'));
							div.setAttribute('style', 'width: 250px; height: 100px; background-color: white; cursor: pointer; display: inline-block; margin-left : 10px; margin-bottom: 10px; border-radius: 4%; overflow: hidden; text-overflow: ellipsis;');
							var a = document.createElement('a');
							a.setAttribute('id', String('image_a'+'$section'+'$image_count'));
							a.setAttribute('href', 'download.php?image=$current_image_location&name=$current_image_name&category=$current_image_category&date=$section');
							a.setAttribute('style', 'width: 250px; height: 100px; text-decoration : none; position: absolute; float: left;');
							var p = document.createElement('p');
							p.setAttribute('id', String('image_p'+'$section'+'$image_count'));
							p.innerText = '$current_image_description';
							p.setAttribute('style', 'width: 140px; height: 100px; top: -100px; float: right; color: blue;');
			
							document.getElementById('med_content').appendChild(div);
							document.getElementById(String('image_div'+'$section'+'$image_count')).appendChild(a);
							document.getElementById(String('image_div'+'$section'+'$image_count')).appendChild(label);
							document.getElementById(String('image_div'+'$section'+'$image_count')).appendChild(p);


							</script>";
						}

					}
				}

			}

		}
		else{
			echo "<script>
			var div = document.createElement('div');
			div.setAttribute('id', 'empty');
			div.setAttribute('style', 'width: 100%; height: 50px; background-color: white; color: red; margin-left : 10px; margin-top: 10px; margin-top : 10px; margin-right : 10px; text-align: center;');
			var d = 'No files Uploaded for Medical category';
			div.innerHTML = d.toString();
			document.getElementById('med_content').appendChild(div);
			</script>";
		}

	}
	else{
		echo "<script>
			var div = document.createElement('div');
			div.setAttribute('id', 'empty');
			div.setAttribute('style', 'width: 100%; height: 50px; background-color: white; color: red; margin-left : 10px; margin-top: 10px; margin-top : 10px; margin-right : 10px; text-align: center;');
			var d = 'No files Uploaded';
			div.innerHTML = d.toString();
			document.getElementById('med_content').appendChild(div);
			</script>";

	}
	if(mysqli_num_rows($result) > 0)
	{
		
		$image_list = array();
		$image_name_list = array();
		$date_list = array();
		$category_list = array();

		while($z = mysqli_fetch_array($result))
		{

			array_push($image_list, $z["image"]);
			array_push($image_name_list, $z["name"]);
			array_push($date_list, $z["upload_date"]);
			array_push($category_list, $z["category"]);
		}


		if (in_array("Others", $category_list)){

			$unique_date_list = array_unique($date_list);
			$unique_date_list = array_values($unique_date_list);
			function date_sort($a, $b) {
    			return strtotime($a) - strtotime($b);
			}
			usort($unique_date_list, "date_sort");
			// usort($date_list, "date_sort");

			for ($unique_dates=0; $unique_dates < count($unique_date_list); $unique_dates++)
			{
				$section = $unique_date_list[$unique_dates];
				echo "<script>
				var div = document.createElement('div');
				div.setAttribute('id', 'date_div');
				div.setAttribute('style', 'width: 100%; height: 20px; background-color: white; margin-left : 10px; margin-bottom: 10px;');
				var d = '$section';
				div.innerHTML = d.toString();
				document.getElementById('other_content').appendChild(div);
				</script>";


				for ($image_count = 0; $image_count < count($image_list); $image_count++)
				{
					if ($date_list[$image_count] == $section)
					{
						$current_image = $image_list[$image_count];
						$current_image_location = "images/".$user."/".$current_image;
						$current_image_name = $image_name_list[$image_count];
						$current_image_category = $category_list[$image_count];
						$current_image_description = strtoupper(strval($current_image_name)).'\n'.strval($section).'\n'.strval($current_image_category);
						if (strval($current_image_category) == 'Others'){
							echo "<script>
							var label = document.createElement('img');
							label.src = '$current_image_location';
							label.setAttribute('id', String('image'+'$section'+'$image_count'));
							label.setAttribute('style', 'width: 100px; height: 100px; border-radius: 4%; cursor: pointer;');
							var div = document.createElement('div');
							div.setAttribute('id', String('image_div'+'$section'+'$image_count'));
							div.setAttribute('style', 'width: 250px; height: 100px; background-color: white; cursor: pointer; display: inline-block; margin-left : 10px; margin-bottom: 10px; border-radius: 4%; overflow: hidden; text-overflow: ellipsis;');
							var a = document.createElement('a');
							a.setAttribute('id', String('image_a'+'$section'+'$image_count'));
							a.setAttribute('href', 'download.php?image=$current_image_location&name=$current_image_name&category=$current_image_category&date=$section');
							a.setAttribute('style', 'width: 250px; height: 100px; text-decoration : none; position: absolute; float: left;');
							var p = document.createElement('p');
							p.setAttribute('id', String('image_p'+'$section'+'$image_count'));
							p.innerText = '$current_image_description';
							p.setAttribute('style', 'width: 140px; height: 100px; top: -100px; float: right; color: blue;');
			
							document.getElementById('other_content').appendChild(div);
							document.getElementById(String('image_div'+'$section'+'$image_count')).appendChild(a);
							document.getElementById(String('image_div'+'$section'+'$image_count')).appendChild(label);
							document.getElementById(String('image_div'+'$section'+'$image_count')).appendChild(p);


							</script>";
						}

					}
				}

			}

		}
		else{
			echo "<script>
			var div = document.createElement('div');
			div.setAttribute('id', 'empty');
			div.setAttribute('style', 'width: 100%; height: 50px; background-color: white; color: red; margin-left : 10px; margin-top: 10px; margin-top : 10px; margin-right : 10px; text-align: center;');
			var d = 'No files Uploaded for Others category';
			div.innerHTML = d.toString();
			document.getElementById('other_content').appendChild(div);
			</script>";
		}

	}
	else{
		echo "<script>
			var div = document.createElement('div');
			div.setAttribute('id', 'empty');
			div.setAttribute('style', 'width: 100%; height: 50px; background-color: white; color: red; margin-left : 10px; margin-top: 10px; margin-top : 10px; margin-right : 10px; text-align: center;');
			var d = 'No files Uploaded';
			div.innerHTML = d.toString();
			document.getElementById('other_content').appendChild(div);
			</script>";

	}

}
else{
	echo '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>SEPM</title>
	<link rel="stylesheet" type="text/css" href="css01.css">

</head>
<body>
	<div id="static_portion" style="width: 100%; height: 300px;">
	<h1>Please Log in First!</h1>
	</div>
</body>
</html>';
}
?>
