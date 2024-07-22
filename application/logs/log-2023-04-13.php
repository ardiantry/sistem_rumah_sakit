<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-04-13 17:09:08 --> 404 Page Not Found: Faviconico/index
ERROR - 2023-04-13 17:50:28 --> Severity: Notice --> Undefined property: stdClass::$idDokter C:\xampp\htdocs\v2\application\controllers\Registrasi.php 200
ERROR - 2023-04-13 17:50:28 --> Severity: Notice --> Undefined property: stdClass::$pasien C:\xampp\htdocs\v2\application\controllers\Registrasi.php 201
ERROR - 2023-04-13 17:50:28 --> Severity: Notice --> Trying to get property 'id' of non-object C:\xampp\htdocs\v2\application\controllers\Registrasi.php 201
ERROR - 2023-04-13 17:53:56 --> Query error: Cannot add or update a child row: a foreign key constraint fails (`simraish_simraisha_prod`.`laboratory`, CONSTRAINT `laboratory_ibfk_2` FOREIGN KEY (`id_laboratory_type`) REFERENCES `laboratory_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE) - Invalid query: INSERT INTO `laboratory` (`no_registrasi`, `tanggal_daftar`, `id_laboratory_type`, `id_dokter`, `id_pasien`, `tarif`, `id_reference`, `tipe_reference`, `state_index`, `status`) VALUES ('LAB20230413175356', '2023-04-13 17:53', 'L001', '9', '1190', 200000, 21629, 'Rawat Jalan', 0, 'Pending')
ERROR - 2023-04-13 18:06:03 --> Severity: Compile Error --> Cannot declare class Pekerjaan_model, because the name is already in use C:\xampp\htdocs\v2\application\models\LaboratoryType_model.php 3
ERROR - 2023-04-13 18:06:06 --> 404 Page Not Found: Faviconico/index
ERROR - 2023-04-13 18:06:19 --> Severity: Notice --> Undefined variable: labtype C:\xampp\htdocs\v2\application\views\rawat_jalan\content\step3.php 290
ERROR - 2023-04-13 18:06:19 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\v2\application\views\rawat_jalan\content\step3.php 290
ERROR - 2023-04-13 18:06:33 --> Severity: Notice --> Undefined variable: labtype C:\xampp\htdocs\v2\application\views\rawat_jalan\content\step3.php 290
ERROR - 2023-04-13 18:06:33 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\v2\application\views\rawat_jalan\content\step3.php 290
ERROR - 2023-04-13 18:07:15 --> Severity: error --> Exception: Object of class stdClass could not be converted to string C:\xampp\htdocs\v2\application\views\rawat_jalan\content\step3.php 292
ERROR - 2023-04-13 18:23:31 --> Query error: Unknown column 'reference_type' in 'where clause' - Invalid query: SELECT *
FROM `laboratory`
WHERE `id_reference` = 21629
AND `reference_type` = 'Rawat Jalan'
ERROR - 2023-04-13 20:20:31 --> Severity: Warning --> Illegal string offset 'tanggal_daftar' C:\xampp\htdocs\v2\application\models\Laboratory_model.php 62
ERROR - 2023-04-13 20:20:31 --> Severity: error --> Exception: DateTime::__construct(): Failed to parse time string (2) at position 0 (2): Unexpected character C:\xampp\htdocs\v2\application\models\Laboratory_model.php 62
ERROR - 2023-04-13 21:03:46 --> Severity: Notice --> Undefined property: Laboratory::$UnitLayanan_model C:\xampp\htdocs\v2\application\controllers\Laboratory.php 60
ERROR - 2023-04-13 21:03:46 --> Severity: error --> Exception: Call to a member function getByKlinikSelect() on null C:\xampp\htdocs\v2\application\controllers\Laboratory.php 60
ERROR - 2023-04-13 21:03:46 --> 404 Page Not Found: Faviconico/index
ERROR - 2023-04-13 21:12:54 --> Severity: Notice --> Undefined variable: lab_type C:\xampp\htdocs\v2\application\views\rawat_jalan\content\step3.php 290
ERROR - 2023-04-13 21:12:54 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\v2\application\views\rawat_jalan\content\step3.php 290
