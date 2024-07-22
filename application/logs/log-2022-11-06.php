<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-11-06 09:52:48 --> 404 Page Not Found: Faviconico/index
ERROR - 2022-11-06 09:52:59 --> 404 Page Not Found: _catalog/index
ERROR - 2022-11-06 09:53:01 --> 404 Page Not Found: _catalog/index
ERROR - 2022-11-06 09:56:31 --> Severity: Warning --> mysqli_stmt::bind_param(): Number of variables doesn't match number of parameters in prepared statement /home/simraish/public_html/v2/application/controllers/LaporanNew.php 1008
ERROR - 2022-11-06 09:56:36 --> Severity: Warning --> mysqli_stmt::bind_param(): Number of variables doesn't match number of parameters in prepared statement /home/simraish/public_html/v2/application/controllers/LaporanNew.php 1008
ERROR - 2022-11-06 09:56:54 --> Severity: Warning --> mysqli_stmt::bind_param(): Number of variables doesn't match number of parameters in prepared statement /home/simraish/public_html/v2/application/controllers/LaporanNew.php 1008
ERROR - 2022-11-06 10:03:01 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/simraish/public_html/v2/application/controllers/LaporanNew.php 204
ERROR - 2022-11-06 10:03:01 --> Severity: Warning --> Invalid argument supplied for foreach() /home/simraish/public_html/v2/application/controllers/LaporanNew.php 206
ERROR - 2022-11-06 10:03:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/simraish/public_html/v2/application/controllers/LaporanNew.php 204
ERROR - 2022-11-06 10:03:25 --> Severity: Warning --> Invalid argument supplied for foreach() /home/simraish/public_html/v2/application/controllers/LaporanNew.php 206
ERROR - 2022-11-06 10:04:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/simraish/public_html/v2/application/controllers/LaporanNew.php 204
ERROR - 2022-11-06 10:04:30 --> Severity: Warning --> Invalid argument supplied for foreach() /home/simraish/public_html/v2/application/controllers/LaporanNew.php 206
ERROR - 2022-11-06 10:07:14 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/simraish/public_html/v2/application/controllers/LaporanNew.php 204
ERROR - 2022-11-06 10:07:14 --> Severity: Warning --> Invalid argument supplied for foreach() /home/simraish/public_html/v2/application/controllers/LaporanNew.php 206
ERROR - 2022-11-06 10:20:55 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/simraish/public_html/v2/application/controllers/LaporanNew.php 204
ERROR - 2022-11-06 10:20:55 --> Severity: Warning --> Invalid argument supplied for foreach() /home/simraish/public_html/v2/application/controllers/LaporanNew.php 206
ERROR - 2022-11-06 10:21:25 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/simraish/public_html/v2/application/controllers/LaporanNew.php 204
ERROR - 2022-11-06 10:21:25 --> Severity: Warning --> Invalid argument supplied for foreach() /home/simraish/public_html/v2/application/controllers/LaporanNew.php 206
ERROR - 2022-11-06 10:37:02 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/simraish/public_html/v2/application/controllers/LaporanNew.php 204
ERROR - 2022-11-06 10:37:02 --> Severity: Warning --> Invalid argument supplied for foreach() /home/simraish/public_html/v2/application/controllers/LaporanNew.php 206
ERROR - 2022-11-06 10:45:15 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/simraish/public_html/v2/application/controllers/LaporanNew.php 204
ERROR - 2022-11-06 10:45:15 --> Severity: Warning --> Invalid argument supplied for foreach() /home/simraish/public_html/v2/application/controllers/LaporanNew.php 206
ERROR - 2022-11-06 10:50:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/simraish/public_html/v2/application/controllers/LaporanNew.php 204
ERROR - 2022-11-06 10:50:28 --> Severity: Warning --> Invalid argument supplied for foreach() /home/simraish/public_html/v2/application/controllers/LaporanNew.php 206
ERROR - 2022-11-06 10:52:22 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/simraish/public_html/v2/application/controllers/LaporanNew.php 204
ERROR - 2022-11-06 10:52:22 --> Severity: Warning --> Invalid argument supplied for foreach() /home/simraish/public_html/v2/application/controllers/LaporanNew.php 206
ERROR - 2022-11-06 11:04:40 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/simraish/public_html/v2/application/controllers/LaporanNew.php 204
ERROR - 2022-11-06 11:04:40 --> Severity: Warning --> Invalid argument supplied for foreach() /home/simraish/public_html/v2/application/controllers/LaporanNew.php 206
ERROR - 2022-11-06 11:13:20 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/simraish/public_html/v2/application/controllers/LaporanNew.php 204
ERROR - 2022-11-06 11:13:20 --> Severity: Warning --> Invalid argument supplied for foreach() /home/simraish/public_html/v2/application/controllers/LaporanNew.php 206
ERROR - 2022-11-06 11:13:39 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'simraish_simraisha_prod.d.created_at' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: 
		(
			SELECT 
				`d`.`created_at` AS `created_at`
				,`d`.`id_jurnal_header` AS `id_jurnal_header`
				,`h`.`tanggal` AS `tanggal`
				,`h`.`nama` AS `nama`
				,group_concat(`m`.`kode_akun` order by `d`.`id` ASC separator '<br />') AS `kode_akun`
				,group_concat(`m`.`nama_akun` order by `d`.`id` ASC separator '<br />') AS `nama_akun`
				,group_concat(if(`d`.`arus` = 'Debit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') order by `d`.`id` ASC separator '<br />') AS `debit_display`
				,group_concat(if(`d`.`arus` = 'Kredit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') order by `d`.`id` ASC separator '<br />') AS `kredit_display`
				,`h`.`id_klinik` AS `id_klinik`
				,`h`.`is_deleted` AS `is_deleted`
				,`h`.`id_reference` AS `id_reference`
				,`h`.`tipe_transaksi` AS `tipe_transaksi` 
				FROM `jurnal_header` `h` 
				INNER JOIN `jurnal_detail` `d` on `h`.`id` = `d`.`id_jurnal_header`
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun`
				WHERE `h`.`id_klinik` = 7 AND `h`.`is_deleted` = 0
				
				GROUP BY `d`.`id_jurnal_header`
		)
		UNION ALL 
		(
				SELECT 
				`h`.`created_at` AS `created_at`
				,`d`.`id_transaksi_header` AS `id_transaksi_header`
				,`h`.`tanggal` AS `tanggal`
				,`h`.`nama` AS `nama`
				,group_concat(`m`.`kode_akun` separator '<br />') AS `kode_akun`
				,group_concat(`m`.`nama_akun` separator '<br />') AS `nama_akun`
				,group_concat(if(`d`.`arus` = 'Debit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') separator '<br />') AS `debit_display`
				,group_concat(if(`d`.`arus` = 'Kredit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') separator '<br />') AS `kredit_display`
				,`h`.`id_klinik` AS `id_klinik`
				,`h`.`is_deleted` AS `is_deleted`
				,`d`.`id_transaksi_header` AS `id_reference`,'Transkasi Lain' AS `tipe_transaksi` 
				FROM `transaksi_lain_header` `h` 
				INNER JOIN `transaksi_lain_detail` `d` on `h`.`id` = `d`.`id_transaksi_header`
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun` 
				WHERE `h`.`id_klinik` = 7 AND `h`.`is_deleted` = 0
				
				GROUP BY `d`.`id_transaksi_header`
		) ORDER BY `tanggal` DESC LIMIT 10 OFFSET 0
ERROR - 2022-11-06 11:13:39 --> Severity: error --> Exception: Call to a member function result() on bool /home/simraish/public_html/v2/application/controllers/Pembukuan.php 199
ERROR - 2022-11-06 11:14:03 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'simraish_simraisha_prod.d.created_at' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: 
		(
			SELECT 
				`d`.`created_at` AS `created_at`
				,`d`.`id_jurnal_header` AS `id_jurnal_header`
				,`h`.`tanggal` AS `tanggal`
				,`h`.`nama` AS `nama`
				,group_concat(`m`.`kode_akun` order by `d`.`id` ASC separator '<br />') AS `kode_akun`
				,group_concat(`m`.`nama_akun` order by `d`.`id` ASC separator '<br />') AS `nama_akun`
				,group_concat(if(`d`.`arus` = 'Debit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') order by `d`.`id` ASC separator '<br />') AS `debit_display`
				,group_concat(if(`d`.`arus` = 'Kredit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') order by `d`.`id` ASC separator '<br />') AS `kredit_display`
				,`h`.`id_klinik` AS `id_klinik`
				,`h`.`is_deleted` AS `is_deleted`
				,`h`.`id_reference` AS `id_reference`
				,`h`.`tipe_transaksi` AS `tipe_transaksi` 
				FROM `jurnal_header` `h` 
				INNER JOIN `jurnal_detail` `d` on `h`.`id` = `d`.`id_jurnal_header`
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun`
				WHERE `h`.`id_klinik` = 7 AND `h`.`is_deleted` = 0
				 AND tanggal BETWEEN '2021-09-01' AND '2021-10-10'
				GROUP BY `d`.`id_jurnal_header`
		)
		UNION ALL 
		(
				SELECT 
				`h`.`created_at` AS `created_at`
				,`d`.`id_transaksi_header` AS `id_transaksi_header`
				,`h`.`tanggal` AS `tanggal`
				,`h`.`nama` AS `nama`
				,group_concat(`m`.`kode_akun` separator '<br />') AS `kode_akun`
				,group_concat(`m`.`nama_akun` separator '<br />') AS `nama_akun`
				,group_concat(if(`d`.`arus` = 'Debit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') separator '<br />') AS `debit_display`
				,group_concat(if(`d`.`arus` = 'Kredit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') separator '<br />') AS `kredit_display`
				,`h`.`id_klinik` AS `id_klinik`
				,`h`.`is_deleted` AS `is_deleted`
				,`d`.`id_transaksi_header` AS `id_reference`,'Transkasi Lain' AS `tipe_transaksi` 
				FROM `transaksi_lain_header` `h` 
				INNER JOIN `transaksi_lain_detail` `d` on `h`.`id` = `d`.`id_transaksi_header`
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun` 
				WHERE `h`.`id_klinik` = 7 AND `h`.`is_deleted` = 0
				 AND tanggal BETWEEN '2021-09-01' AND '2021-10-10'
				GROUP BY `d`.`id_transaksi_header`
		) ORDER BY `tanggal` DESC LIMIT 10 OFFSET 0
ERROR - 2022-11-06 11:14:03 --> Severity: error --> Exception: Call to a member function result() on bool /home/simraish/public_html/v2/application/controllers/Pembukuan.php 199
ERROR - 2022-11-06 11:36:18 --> Severity: Warning --> opendir(/var/webuzo-data/php/sessions/php73): failed to open dir: Permission denied /home/simraish/public_html/v2/system/libraries/Session/drivers/Session_files_driver.php 356
ERROR - 2022-11-06 11:36:18 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'simraish_simraisha_prod.d.created_at' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: 
		(
			SELECT 
				`d`.`created_at` AS `created_at`
				,`d`.`id_jurnal_header` AS `id_jurnal_header`
				,`h`.`tanggal` AS `tanggal`
				,`h`.`nama` AS `nama`
				,group_concat(`m`.`kode_akun` order by `d`.`id` ASC separator '<br />') AS `kode_akun`
				,group_concat(`m`.`nama_akun` order by `d`.`id` ASC separator '<br />') AS `nama_akun`
				,group_concat(if(`d`.`arus` = 'Debit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') order by `d`.`id` ASC separator '<br />') AS `debit_display`
				,group_concat(if(`d`.`arus` = 'Kredit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') order by `d`.`id` ASC separator '<br />') AS `kredit_display`
				,`h`.`id_klinik` AS `id_klinik`
				,`h`.`is_deleted` AS `is_deleted`
				,`h`.`id_reference` AS `id_reference`
				,`h`.`tipe_transaksi` AS `tipe_transaksi` 
				FROM `jurnal_header` `h` 
				INNER JOIN `jurnal_detail` `d` on `h`.`id` = `d`.`id_jurnal_header`
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun`
				WHERE `h`.`id_klinik` = 7 AND `h`.`is_deleted` = 0
				
				GROUP BY `d`.`id_jurnal_header`
		)
		UNION ALL 
		(
				SELECT 
				`h`.`created_at` AS `created_at`
				,`d`.`id_transaksi_header` AS `id_transaksi_header`
				,`h`.`tanggal` AS `tanggal`
				,`h`.`nama` AS `nama`
				,group_concat(`m`.`kode_akun` separator '<br />') AS `kode_akun`
				,group_concat(`m`.`nama_akun` separator '<br />') AS `nama_akun`
				,group_concat(if(`d`.`arus` = 'Debit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') separator '<br />') AS `debit_display`
				,group_concat(if(`d`.`arus` = 'Kredit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') separator '<br />') AS `kredit_display`
				,`h`.`id_klinik` AS `id_klinik`
				,`h`.`is_deleted` AS `is_deleted`
				,`d`.`id_transaksi_header` AS `id_reference`,'Transkasi Lain' AS `tipe_transaksi` 
				FROM `transaksi_lain_header` `h` 
				INNER JOIN `transaksi_lain_detail` `d` on `h`.`id` = `d`.`id_transaksi_header`
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun` 
				WHERE `h`.`id_klinik` = 7 AND `h`.`is_deleted` = 0
				
				GROUP BY `d`.`id_transaksi_header`
		) ORDER BY `tanggal` DESC LIMIT 10 OFFSET 0
ERROR - 2022-11-06 11:36:18 --> Severity: error --> Exception: Call to a member function result() on bool /home/simraish/public_html/v2/application/controllers/Pembukuan.php 199
ERROR - 2022-11-06 11:36:21 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'simraish_simraisha_prod.d.created_at' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: 
		(
			SELECT 
				`d`.`created_at` AS `created_at`
				,`d`.`id_jurnal_header` AS `id_jurnal_header`
				,`h`.`tanggal` AS `tanggal`
				,`h`.`nama` AS `nama`
				,group_concat(`m`.`kode_akun` order by `d`.`id` ASC separator '<br />') AS `kode_akun`
				,group_concat(`m`.`nama_akun` order by `d`.`id` ASC separator '<br />') AS `nama_akun`
				,group_concat(if(`d`.`arus` = 'Debit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') order by `d`.`id` ASC separator '<br />') AS `debit_display`
				,group_concat(if(`d`.`arus` = 'Kredit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') order by `d`.`id` ASC separator '<br />') AS `kredit_display`
				,`h`.`id_klinik` AS `id_klinik`
				,`h`.`is_deleted` AS `is_deleted`
				,`h`.`id_reference` AS `id_reference`
				,`h`.`tipe_transaksi` AS `tipe_transaksi` 
				FROM `jurnal_header` `h` 
				INNER JOIN `jurnal_detail` `d` on `h`.`id` = `d`.`id_jurnal_header`
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun`
				WHERE `h`.`id_klinik` = 7 AND `h`.`is_deleted` = 0
				
				GROUP BY `d`.`id_jurnal_header`
		)
		UNION ALL 
		(
				SELECT 
				`h`.`created_at` AS `created_at`
				,`d`.`id_transaksi_header` AS `id_transaksi_header`
				,`h`.`tanggal` AS `tanggal`
				,`h`.`nama` AS `nama`
				,group_concat(`m`.`kode_akun` separator '<br />') AS `kode_akun`
				,group_concat(`m`.`nama_akun` separator '<br />') AS `nama_akun`
				,group_concat(if(`d`.`arus` = 'Debit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') separator '<br />') AS `debit_display`
				,group_concat(if(`d`.`arus` = 'Kredit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') separator '<br />') AS `kredit_display`
				,`h`.`id_klinik` AS `id_klinik`
				,`h`.`is_deleted` AS `is_deleted`
				,`d`.`id_transaksi_header` AS `id_reference`,'Transkasi Lain' AS `tipe_transaksi` 
				FROM `transaksi_lain_header` `h` 
				INNER JOIN `transaksi_lain_detail` `d` on `h`.`id` = `d`.`id_transaksi_header`
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun` 
				WHERE `h`.`id_klinik` = 7 AND `h`.`is_deleted` = 0
				
				GROUP BY `d`.`id_transaksi_header`
		) ORDER BY `tanggal` DESC LIMIT 10 OFFSET 0
ERROR - 2022-11-06 11:36:21 --> Severity: error --> Exception: Call to a member function result() on bool /home/simraish/public_html/v2/application/controllers/Pembukuan.php 199
ERROR - 2022-11-06 11:42:02 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'simraish_simraisha_prod.d.created_at' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: 
		(
			SELECT 
				`d`.`created_at` AS `created_at`
				,`d`.`id_jurnal_header` AS `id_jurnal_header`
				,`h`.`tanggal` AS `tanggal`
				,`h`.`nama` AS `nama`
				,group_concat(`m`.`kode_akun` order by `d`.`id` ASC separator '<br />') AS `kode_akun`
				,group_concat(`m`.`nama_akun` order by `d`.`id` ASC separator '<br />') AS `nama_akun`
				,group_concat(if(`d`.`arus` = 'Debit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') order by `d`.`id` ASC separator '<br />') AS `debit_display`
				,group_concat(if(`d`.`arus` = 'Kredit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') order by `d`.`id` ASC separator '<br />') AS `kredit_display`
				,`h`.`id_klinik` AS `id_klinik`
				,`h`.`is_deleted` AS `is_deleted`
				,`h`.`id_reference` AS `id_reference`
				,`h`.`tipe_transaksi` AS `tipe_transaksi` 
				FROM `jurnal_header` `h` 
				INNER JOIN `jurnal_detail` `d` on `h`.`id` = `d`.`id_jurnal_header`
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun`
				WHERE `h`.`id_klinik` = 7 AND `h`.`is_deleted` = 0
				
				GROUP BY `d`.`id_jurnal_header`
		)
		UNION ALL 
		(
				SELECT 
				`h`.`created_at` AS `created_at`
				,`d`.`id_transaksi_header` AS `id_transaksi_header`
				,`h`.`tanggal` AS `tanggal`
				,`h`.`nama` AS `nama`
				,group_concat(`m`.`kode_akun` separator '<br />') AS `kode_akun`
				,group_concat(`m`.`nama_akun` separator '<br />') AS `nama_akun`
				,group_concat(if(`d`.`arus` = 'Debit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') separator '<br />') AS `debit_display`
				,group_concat(if(`d`.`arus` = 'Kredit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') separator '<br />') AS `kredit_display`
				,`h`.`id_klinik` AS `id_klinik`
				,`h`.`is_deleted` AS `is_deleted`
				,`d`.`id_transaksi_header` AS `id_reference`,'Transkasi Lain' AS `tipe_transaksi` 
				FROM `transaksi_lain_header` `h` 
				INNER JOIN `transaksi_lain_detail` `d` on `h`.`id` = `d`.`id_transaksi_header`
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun` 
				WHERE `h`.`id_klinik` = 7 AND `h`.`is_deleted` = 0
				
				GROUP BY `d`.`id_transaksi_header`
		) ORDER BY `tanggal` DESC LIMIT 10 OFFSET 0
ERROR - 2022-11-06 11:42:03 --> Severity: error --> Exception: Call to a member function result() on bool /home/simraish/public_html/v2/application/controllers/Pembukuan.php 199
ERROR - 2022-11-06 11:42:49 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/simraish/public_html/v2/application/controllers/LaporanNew.php 204
ERROR - 2022-11-06 11:42:49 --> Severity: Warning --> Invalid argument supplied for foreach() /home/simraish/public_html/v2/application/controllers/LaporanNew.php 206
ERROR - 2022-11-06 11:59:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/simraish/public_html/v2/application/controllers/LaporanNew.php 204
ERROR - 2022-11-06 11:59:32 --> Severity: Warning --> Invalid argument supplied for foreach() /home/simraish/public_html/v2/application/controllers/LaporanNew.php 206
ERROR - 2022-11-06 13:12:00 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'simraish_simraisha_prod.d.created_at' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: 
		(
			SELECT 
				`d`.`created_at` AS `created_at`
				,`d`.`id_jurnal_header` AS `id_jurnal_header`
				,`h`.`tanggal` AS `tanggal`
				,`h`.`nama` AS `nama`
				,group_concat(`m`.`kode_akun` order by `d`.`id` ASC separator '<br />') AS `kode_akun`
				,group_concat(`m`.`nama_akun` order by `d`.`id` ASC separator '<br />') AS `nama_akun`
				,group_concat(if(`d`.`arus` = 'Debit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') order by `d`.`id` ASC separator '<br />') AS `debit_display`
				,group_concat(if(`d`.`arus` = 'Kredit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') order by `d`.`id` ASC separator '<br />') AS `kredit_display`
				,`h`.`id_klinik` AS `id_klinik`
				,`h`.`is_deleted` AS `is_deleted`
				,`h`.`id_reference` AS `id_reference`
				,`h`.`tipe_transaksi` AS `tipe_transaksi` 
				FROM `jurnal_header` `h` 
				INNER JOIN `jurnal_detail` `d` on `h`.`id` = `d`.`id_jurnal_header`
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun`
				WHERE `h`.`id_klinik` = 7 AND `h`.`is_deleted` = 0
				
				GROUP BY `d`.`id_jurnal_header`
		)
		UNION ALL 
		(
				SELECT 
				`h`.`created_at` AS `created_at`
				,`d`.`id_transaksi_header` AS `id_transaksi_header`
				,`h`.`tanggal` AS `tanggal`
				,`h`.`nama` AS `nama`
				,group_concat(`m`.`kode_akun` separator '<br />') AS `kode_akun`
				,group_concat(`m`.`nama_akun` separator '<br />') AS `nama_akun`
				,group_concat(if(`d`.`arus` = 'Debit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') separator '<br />') AS `debit_display`
				,group_concat(if(`d`.`arus` = 'Kredit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') separator '<br />') AS `kredit_display`
				,`h`.`id_klinik` AS `id_klinik`
				,`h`.`is_deleted` AS `is_deleted`
				,`d`.`id_transaksi_header` AS `id_reference`,'Transkasi Lain' AS `tipe_transaksi` 
				FROM `transaksi_lain_header` `h` 
				INNER JOIN `transaksi_lain_detail` `d` on `h`.`id` = `d`.`id_transaksi_header`
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun` 
				WHERE `h`.`id_klinik` = 7 AND `h`.`is_deleted` = 0
				
				GROUP BY `d`.`id_transaksi_header`
		) ORDER BY `tanggal` DESC LIMIT 10 OFFSET 0
ERROR - 2022-11-06 13:12:00 --> Severity: error --> Exception: Call to a member function result() on bool /home/simraish/public_html/v2/application/controllers/Pembukuan.php 199
ERROR - 2022-11-06 13:13:10 --> 404 Page Not Found: Faviconico/index
ERROR - 2022-11-06 13:13:28 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/simraish/public_html/v2/application/controllers/LaporanNew.php 204
ERROR - 2022-11-06 13:13:28 --> Severity: Warning --> Invalid argument supplied for foreach() /home/simraish/public_html/v2/application/controllers/LaporanNew.php 206
ERROR - 2022-11-06 13:15:30 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/simraish/public_html/v2/application/controllers/LaporanNew.php 204
ERROR - 2022-11-06 13:15:30 --> Severity: Warning --> Invalid argument supplied for foreach() /home/simraish/public_html/v2/application/controllers/LaporanNew.php 206
ERROR - 2022-11-06 13:16:38 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/simraish/public_html/v2/application/controllers/LaporanNew.php 204
ERROR - 2022-11-06 13:16:38 --> Severity: Warning --> Invalid argument supplied for foreach() /home/simraish/public_html/v2/application/controllers/LaporanNew.php 206
ERROR - 2022-11-06 13:32:58 --> 404 Page Not Found: Faviconico/index
ERROR - 2022-11-06 14:14:32 --> Severity: Warning --> opendir(/var/webuzo-data/php/sessions/php73): failed to open dir: Permission denied /home/simraish/public_html/v2/system/libraries/Session/drivers/Session_files_driver.php 356
ERROR - 2022-11-06 17:38:26 --> Severity: Warning --> opendir(/var/webuzo-data/php/sessions/php73): failed to open dir: Permission denied /home/simraish/public_html/v2/system/libraries/Session/drivers/Session_files_driver.php 356
ERROR - 2022-11-06 19:24:07 --> 404 Page Not Found: Faviconico/index
