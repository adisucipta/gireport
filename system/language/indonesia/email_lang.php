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

$lang['email_must_be_array'] = 'Metode validasi email harus sebuah array.';
$lang['email_invalid_address'] = 'Alamat email tidak valid: %s';
$lang['email_attachment_missing'] = 'Tidak dapat menemukan attachment email berikut: %s';
$lang['email_attachment_unreadable'] = 'Tidak dapat membuka attachment: %s';
$lang['email_no_recipients'] = 'Anda harus memasukan penerima: To, Cc, atau Bcc';
$lang['email_send_failure_phpmail'] = 'Tidak dapat mengirim email menggunakan PHP mail().  Server anda mungkin tidak di konfigurasi menigirim email dengan metode ini.';
$lang['email_send_failure_sendmail'] = 'Tidak dapat mengirim email menggunakan PHP Sendmail.  Server anda mungkin tidak di konfigurasi menigirim email dengan metode ini.';
$lang['email_send_failure_smtp'] = 'Tidak dapat mengirim email menggunakan PHP SMTP.  Server anda mungkin tidak di konfigurasi menigirim email dengan metode ini.';
$lang['email_sent'] = 'Pesan anda sudah terkirim dengan sukses menggunakan protokol berikut: %s';
$lang['email_no_socket'] = 'Tidak dapat membuka socket untuk Sendmail. Tolong cek konfigurasi.';
$lang['email_no_hostname'] = 'Anda tidak mengisi SMTP hostname.';
$lang['email_smtp_error'] = 'Menemui problem SMTP sebagai berikut : %s';
$lang['email_no_smtp_unpw'] = 'Kesalahan: Anda harus mengisi SMTP username dan password.';
$lang['email_failed_smtp_login'] = 'Gagal mengirim AUTH LOGIN. Problem: %s';
$lang['email_smtp_auth_un'] = 'Gagal untuk membuktikan username. Problem: %s';
$lang['email_smtp_auth_pw'] = 'Gagal untuk membuktikan password. Problem: %s';
$lang['email_smtp_data_failure'] = 'Tidak dapat menigirim data: %s';
$lang['email_exit_status'] = 'Kode status keluar: %s';

/* End of file email_lang.php */
/* Location: ./system/language/english/email_lang.php */