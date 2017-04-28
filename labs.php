<!DOCTYPE html>
<html lang="en">
<head>
	<title>bogdn.ru</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="themes/css/style.css" type="text/css">
</head>
 
<body>
<style>
input:invalid {
  border-color: red;
}
</style>
<div class="imgup">
</div>
	<nav>
		<div class="top-menu">
			<ul>
			<li><a href="index.html">Главная</a></li>
			<li><a href="about.html">обо мне</a></li>
			<li><a href="galary.html">Галерея</a></li>
			<li><a href="labs.php">лабораторные работы</a></li>
			<li><a href="contact.html">контакты</a></li>
			</ul>
		</div>
	</nav>
	<div class="news">
		Введите элементы множеств через одинарный пробел:<br><br>
		<form action="" method="get">	
			Массив А <input type="text" name="massA" value="<?=$_GET['massA']?>" min="0" max="10000" step="2"><br>
			Массив В <input type="text" name="massB" value="<?=$_GET['massB']?>"><br>
			<input type="submit" value="Сделать все действия">
		</form>
		
		<?php
			$arr1 = explode(" ", $_GET['massA']);
			$arr2 = explode(" ", $_GET['massB']);
			
			function quantity($arr)
			{
				$quan = 0;
				while($arr[$quan] != NULL)
				{
					$quan++;
				}			
				return $quan;
			}
			define('n', quantity($arr1));
			define('m', quantity($arr2));
			
			function validation($arr1,$arr2)
			{
				$i = 0;
				while ($arr1[$i] != NULL)
				{
					if($arr1[$i]%2 != 0 || ($arr1[$i]/10)%2 == 0 || ($arr1[$i]/100)%2 == 0 || ($arr1[$i]/1000)%2 != 0 || $arr1[$i] > 10000 && $arr1[$i] < -10000)
						return true;
					$i++;
				}
				$i = 0;
				while ($arr2[$i] != NULL)
				{
					if($arr2[$i]%2 != 0 || ($arr2[$i]/10)%2 == 0 || ($arr2[$i]/100)%2 == 0 || ($arr2[$i]/1000)%2 != 0 || $arr2[$i] > 10000 || $arr2[$i] < -10000)
						return true;
					$i++;
				}
			}
			
			function massOb($arr1,$arr2)
			{
				$res = $arr1;
				$k = n;
				for($i = 0; $i < m; $i++)
				{
					for($j = 0; $j < n; $j++)
					{
						if($arr2[$i] === $arr1[$j])
							break;
						if($j == n - 1)
						{
							$res[$k] = $arr2[$i];
							$k++;
						}
					}
				}
				return $res;
			}
	
			function massPer($arr1,$arr2)
			{
				$k = 0;
				for($i = 0; $i < n; $i++)
				{
					for($j = 0; $j < m; $j++)
						for($l = 0; $l <= k; $l++)
						{
							if($arr1[$i] === $arr2[$j])
							{
								$res[$k] = $arr1[$i];
								$k++;
								break;
							}
						}
				}
				return $res;
			}
	
			function massDop($a,$b)
			{
				$k = 0;
				for($i = 0; $i < n; $i++)
				{
					for($j = 0; $j < m; $j++)
					{
						if($a[$i] === $b[$j])
							break;
						if($j == m - 1)
						{
							$res[$k] = $a[$i];
							$k++;
						}
					}
				}
				return $res;
			}
			
			function massSim($arr1, $arr2)
			{
				$arr = massPer($arr1,$arr2);
				$p = quantity(arr);
				$k = 0;
				for($i = 0; $i < n; $i++)
					for($j = 0; $j < $p; $j++)
					{
						if($arr1[$i] === $arr[$j])
							break;
						if($j == $p - 1)
						{
							$res[$k] = $arr1[$i];
							$k++;
						}
					}
				for($i = 0; $i < m; $i++)
					for($j = 0; $j < $p; $j++)
					{
						if($arr2[$i] === $arr[$j])
							break;
						if($j == $p - 1)
						{
							$res[$k] = $arr2[$i];
							$k++;
						}
					}
			return $res;
			}
	
			if(validation($arr1,$arr2))
			{
				echo "введенные данные не корректны";
				return 0;
			}
			echo "Объединение двух массивов: ".implode(" ", massOb($arr1,$arr2));
			echo "<br>";	
			echo "<br>";
			echo "Пересечение двух массивов: ".implode(" ", massPer($arr1,$arr2));	
			echo "<br>";
			echo "<br>";
			echo "Дополнение множества (A\B): ".implode(" ", massDop($arr1,$arr2));
			echo "<br>";
			echo "<br>";
			echo "Симметрическая разность: ".implode(" ", massSim($arr1,$arr2));
	
?>
	</div>
</body>
</html>