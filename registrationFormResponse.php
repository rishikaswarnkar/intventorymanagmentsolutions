<?php
// scripts/registrationFormResponse.php
session_start();
include ("../common/document_head.html");
?>
<body>
	<header>
		<?php
		include("myDbConnect.php");
		?>
	</header>
	<main>
		<article class="Registration">
		<?php
		include("registrationFormProcess.php");
		?>
		</article>
	</main>
	<footer>
	<?php
		include("../common/footer_row.html");
	?>
	</footer>
</body>
</html>