<?php 
require 'function.php';
//Ambil data yang di id yang dilempar dari form jabatan.php
$id=$_GET["id"];

if(jabatan_hapus($id)>0)
{
	echo "
			<script>
					alert('data berhasil dihapus')
					document.location.href='jabatan.php'

			</script>
			";	

		}else
		{
			echo "
			<script>
				alert('data berhasil dihapus')
				document.location.href='jabatan.php'

			</script>
			";
		}
