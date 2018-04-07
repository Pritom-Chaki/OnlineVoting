<!DOCTYPE html>
<html>
<head>
	<title>Voting System</title>
	<link rel="stylesheet"  href="style.css"/>
</head>
<body>

<div style="background: black; color: white; text-align: center; width:100%; padding:7px; font-family: comic sans ms;">
	<h2>Vote for your favourite player</h2>
</div>
<div class="container">

  <form action="index.php" method="post" align="center">
	
	<img src="images/messi.jpg" width="280" height="250"/>
	<img src="images/cr7.jpg" width="280" height="250"/>
	<img src="images/neymar.jpg" width="280" height="250"/>

<input type="submit" name="messi" value="Vote for messi"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="ronaldo" value="Vote for ronaldo"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="neymar" value="Vote for neymar"/>
  </form>

  <?php
       
      $con = mysqli_connect("localhost","root","","mytest");

if(isset($_POST['messi']))
{
	$vote_messi="update vote set messi=messi+1";
	$run_messi = mysqli_query($con,$vote_messi);

	if($run_messi)
	{
		echo "<h2 align='center'> Your vote has been cast for Messi. </h2>";
		echo "<h2 align='center'><a href='index.php?result'>View Result</a></h2>";

	}
}

if(isset($_POST['ronaldo']))
{
	$vote_ronaldo="update vote set ronaldo=ronaldo+1";
	$run_ronaldo = mysqli_query($con,$vote_ronaldo);

	if($run_ronaldo)
	{
		echo "<h2 align='center'> Your vote has been cast for Ronaldo. </h2>";
		echo "<h2 align='center'><a href='index.php?result'>View Result</a></h2>";

	}
}

if(isset($_POST['neymar']))
{
	$vote_neymar="update vote set neymar=neymar+1";
	$run_neymar = mysqli_query($con,$vote_neymar);

	if($run_neymar)
	{
		echo "<h2 align='center'> Your vote has been cast for Neymar. </h2>";
		echo "<h2 align='center'><a href='index.php?result'>View Result</a></h2>";

	}
}
//New Section Started
if(isset($_GET['result']))
{
	$get_votes = "select * from vote";
	$run_votes = mysqli_query($con, $get_votes);
	$row_votes = mysqli_fetch_array($run_votes);

	         $messi = $row_votes['messi'];
	         $ronaldo = $row_votes['ronaldo'];
	         $neymar = $row_votes['neymar'];

	    $count = $messi+$ronaldo+$neymar;

	     $per_messi = round($messi*100/$count)."%";
	     $per_ronaldo = round($ronaldo*100/$count)."%";
	     $per_neymar = round($neymar*100/$count)."%";

	     echo 
	     "<div style='background: orange' padding: 10px; text-align: center;>
             <center>
                    <h2>Update Result:</h2>
                    <p style='background: black; color: white; padding: 10px; width: 500px;'>
                    <b>Lionel Messi: <b> $messi($per_messi)
                    </p>
                    <p style='background: black; color: white; padding: 10px; width: 500px;'>
                    <b>Cristiano Ronaldo: <b> $ronaldo($per_ronaldo)
                    </p>
                    <p style='background: black; color: white; padding: 10px; width: 500px;'>
                    <b>Neymar Jr: <b> $neymar($per_neymar)
                    </p>
             </center>
	     </div>
	     ";
}
  ?>
	</div>

<div style="background: black; color: white; text-align: center; width:100%; padding:7px; font-family: comic sans ms;">
	<h2>Created By Pritom Chaki</h2>
</div>

</body>
</html>