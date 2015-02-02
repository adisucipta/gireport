<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Open Software License version 3.0
 *
 * This source file is subject to the Open Software License (OSL 3.0) that is
 * bundled with this package in the files license.txt / license.rst.  It is
 * also available through the world wide web at this URL:
 * http://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['db_invalid_connection_str'] = 'Tidak dapat menemukan konfigurasi database berdasarkan string koneksi yang anda ajukan.';
$lang['db_unable_to_connect'] = 'Tidak dapat menghubungi server database menggunakan konfigurasi yang di sediakan.';
$lang['db_unable_to_select'] = 'Tidak dapat memilih database: %s';
$lang['db_unable_to_create'] = 'Tidak dapat membuat database: %s';
$lang['db_invalid_query'] = 'Query yang anda ajukan tidak valid.';
$lang['db_must_set_table'] = 'Anda harus mengatur table database untuk menggunakannya dengan query anda.';
$lang['db_must_use_set'] = 'Anda harus menggunakan metode "set" untuk mengupdate sebuah entry.';
$lang['db_must_use_index'] = 'Anda harus memperinci indeks untuk pencocokan pembaharuan batch.';
$lang['db_batch_missing_index'] = 'Satu atau lebih baris yang dikirim untuk pembaharuan batch tidak memiliki indeks yang spesifik.';
$lang['db_must_use_where'] = 'Update tidak di perkenankan kecuali mereka memuat klausa "where".';
$lang['db_del_must_use_where'] = 'Delete tidak di perkenankan kecuali mereka memuat klausa "where" atau "like".';
$lang['db_field_param_missing'] = 'Untuk mengambil field membutuhkan nama tabel sebagai parameter.';
$lang['db_unsupported_function'] = 'Fitur ini tidak tersedia untuk database yang anda pergunakan.';
$lang['db_transaction_failure'] = 'Transkaksi gagal: Melakukan restorasi kembali.';
$lang['db_unable_to_drop'] = 'Tidak dapat menghapus database yang di pilih.';
$lang['db_unsupported_feature'] = 'Fitur yang tidak di dukung oleh platform database yang anda gunakan.';
$lang['db_unsupported_compression'] = 'Kompresi file yang anda pilih tidak di dukung oleh server anda.';
$lang['db_filepath_error'] = 'Tidak dapat menulis data ke file path yang anda ajukan.';
$lang['db_invalid_cache_path'] = 'Cache path yang anda ajukan tidak valid atau tidak dapat di tulis.';
$lang['db_table_name_required'] = 'Nama tabel di butuhkan untuk operasi tersebut.';
$lang['db_column_name_required'] = 'Nama kolom di butuhkan untuk operasi tersebut.';
$lang['db_column_definition_required'] = 'Definisi kolom di butuhkan untuk operasi tersebut.';
$lang['db_unable_to_set_charset'] = 'Tidak dapat mengisi client connection dengan karakter set: %s';
$lang['db_error_heading'] = 'Terjadi kesalahan database';

/* End of file db_lang.php */
/* Location: ./system/language/english/db_lang.php */