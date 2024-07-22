<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-10-21 10:02:06 --> Query error: Duplicate entry '11111-16' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('11111', 'ASKARA NAVAL MAHESWARA', 'YOGYAKARTA', '2021-02-09', NULL, 'JL SOROSUTAN NO 09 UMBULHARJO', '082311186321', 'L', NULL, NULL, '', '16')
ERROR - 2022-10-21 10:02:07 --> Query error: Duplicate entry '11111-16' for key 'pasien.no_rm' - Invalid query: INSERT INTO `pasien` (`no_rm`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_telp`, `jenis_kelamin`, `golongan_darah`, `pekerjaan`, `keterangan`, `id_klinik`) VALUES ('11111', 'ASKARA NAVAL MAHESWARA', 'YOGYAKARTA', '2021-02-09', NULL, 'JL SOROSUTAN NO 09 UMBULHARJO', '082311186321', 'L', NULL, NULL, '', '16')
ERROR - 2022-10-21 18:09:57 --> Severity: Warning --> mysqli::query(): MySQL server has gone away /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-21 18:09:57 --> Severity: Warning --> mysqli::query(): Error reading result set's header /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-21 18:09:57 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_privilege`
WHERE `id_user` = '29'
ERROR - 2022-10-21 18:09:57 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/Menu_model.php 13
ERROR - 2022-10-21 18:09:57 --> Severity: Warning --> Error while sending QUERY packet. PID=3135503 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-21 18:09:57 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_icd10`
WHERE `id_register_pasien` = '21607'
ERROR - 2022-10-21 18:09:57 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienIcd10_model.php 27
ERROR - 2022-10-21 18:09:57 --> Severity: Warning --> Error while sending QUERY packet. PID=3135502 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-21 18:09:57 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_icd9`
WHERE `id_register_pasien` = '21607'
ERROR - 2022-10-21 18:09:57 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienIcd9_model.php 28
ERROR - 2022-10-21 18:09:57 --> Severity: Warning --> Error while sending QUERY packet. PID=3135500 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-21 18:09:57 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_layanan`
WHERE `id_register_pasien` = '21607'
ERROR - 2022-10-21 18:09:57 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienLayanan_model.php 28
ERROR - 2022-10-21 18:09:57 --> Severity: Warning --> Error while sending QUERY packet. PID=3135501 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-21 18:09:57 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `v_register_pasien_obat`
WHERE `id_register_pasien` = '21607'
AND `is_paket` =0
ERROR - 2022-10-21 18:09:57 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienObat_model.php 81
ERROR - 2022-10-21 18:09:57 --> Severity: Warning --> Error while sending QUERY packet. PID=3135504 /home/simraish/public_html/v2/system/database/drivers/mysqli/mysqli_driver.php 305
ERROR - 2022-10-21 18:09:57 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `register_pasien_rencana_kontrol`
WHERE `id_register_pasien` = '21607'
ERROR - 2022-10-21 18:09:57 --> Severity: error --> Exception: Call to a member function result() on boolean /home/simraish/public_html/v2/application/models/RegisterPasienRencanaKontrol_model.php 23
