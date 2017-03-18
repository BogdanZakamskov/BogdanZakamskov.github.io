<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="themes/css/style.css" type="text/css">
	
</head>
 
<body>
<header>
</header>
	<nav>
		<div class="top-menu">
			<ul>
			<li><a href="index.html"> Главная </a></li>
			<li><a href="обо мне.html"> обо мне </a></li>
			<li><a href="galary.html"> Галерея </a></li>
			<li><a href="labs.php"> лабораторные работы </a></li>
			<li><a href="контакты.html"> контакты </a></li>
			</ul>
		</div>
	</nav>
	
	<div class="news">
		<form action="" method="get">	
			Массив А <input type="text" name="massA" value="<?=$_GET['massA']?>"><br>
			Массив В <input type="text" name="massB" value="<?=$_GET['massB']?>"><br>
			<input type="submit" value="Сделать все действия">
		</form>
		
		<?php
			$arr1 = explode(" ", $_GET['massA']);
			$arr2 = explode(" ", $_GET['massB']);
	
			function validation($arr1,$arr2)
			{
				if($arr1[0]%2 === 0 && $arr1[1]%2 === 1 && $arr1[2]%2 === 1 && $arr1[3]%2 === 0 && $arr2[0]%2 === 0 && $arr2[1]%2 === 1 && $arr2[2]%2 === 1 && $arr2[3]%2 === 0 && $arr1[4] == NULL && $arr2[4] == NULL)
					return false;
				return true;
			}
	
			function massOb($a,$b)
			{
				$res = $a[0].$a[1].$a[2].$a[3].massDop($b,$a);
				return $res;
			}
	
			function massPer($a,$b)
			{
				for($i = 0; $i < 4; $i++)
				{
					for($j = 0; $j < 4; $j++)
						if($a[$i] === $b[$j])
						{
							$res .= $a[$i];
							break;
						}
				}
		
				return $res;
			}
	
			function massDop($a,$b)
			{
				for($i = 0; $i < 4; $i++)
				{
					$k = 0;
					for($j = 0; $j < 4; $j++)
					{
						if($a[$i] !== $b[$j])
							$k++;
					}
					if($k == 4)
						$res .= $a[$i];
				}
		
				return $res;
			}
	
			if(validation($arr1,$arr2))
			{
				echo "введенные данные не корректны";
				return 0;
			}
			$res = massOb($arr1,$arr2);
			echo "Объединение двух массивов: { ";
			for($i = 0; $i < 16; $i++)
			{
				if ($res[0] == NULL)
				{
					echo "пустое множество }";
					break;
				}
				if ($res[$i] != NULL)
					echo $res[$i]." ";
				else
				{
					echo "}";
					break;
				}
			}
			echo "<br>";
			print_r ("Объединение двух массивов: ".massOb($arr1,$arr2));
			echo "<br>";	
			echo "<br>";
			print_r ("Пересечение двух массивов: ".massPer($arr1,$arr2));	
			echo "<br>";
			echo "<br>";
			print_r ("Дополнение множества (A\B): ".massDop($arr1,$arr2));
			echo "<br>";
			echo "<br>";
			print_r ("Симметрическая разность: ".massDop($arr1,$arr2).massDop($arr2,$arr1));
	
?>
	</div>
</body>
</html>