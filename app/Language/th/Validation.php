<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

// Validation language settings
return [
    // Core Messages
    'noRuleSets'      => 'ไม่มีการกำหนดชุดกฎในการกำหนดค่าการตรวจสอบ.',
    'ruleNotFound'    => '"{0}" ไม่ใช่กฎที่ถูกต้อง.',
    'groupNotFound'   => '"{0}" ไม่ใช่กลุ่มกฎการตรวจสอบ.',
    'groupNotArray'   => '"{0}" กลุ่มกฎต้องเป็นอาเรย์.',
    'invalidTemplate' => '"{0}" ไม่ใช่เทมเพลตการตรวจสอบที่ถูกต้อง.',
    
    // Rule Messages
    'alpha'                 => 'ฟิลด์ {field} อนุญาตให้มีเฉพาะอักษรเท่านั้น.',
    'alpha_dash'            => 'ฟิลด์ {field} อนุญาตให้มีเฉพาะอักษร, ตัวเลข, ขีดล่าง และขีดกลาง.',
    'alpha_numeric'         => 'ฟิลด์ {field} อนุญาตให้มีเฉพาะอักษรและตัวเลข.',
    'alpha_numeric_punct'   => 'ฟิลด์ {field} อนุญาตให้มีเฉพาะอักษร, ตัวเลข, ช่องว่าง และ ~ ! # $ % & * - _ + = | : .',
    'alpha_numeric_space'   => 'ฟิลด์ {field} อนุญาตให้มีเฉพาะอักษรและช่องว่าง.',
    'alpha_space'           => 'ฟิลด์ {field} อนุญาตให้มีเฉพาะอักษรและช่องว่าง.',
    'decimal'               => 'ฟิลด์ {field} ต้องมีหมายเลขทศนิยม.',
    'differs'               => 'ฟิลด์ {field} ต้องแตกต่างจากฟิลด์ {param}.',
    'equals'                => 'ฟิลด์ {field} ต้องเท่ากับ: {param}.',
    'exact_length'          => 'ฟิลด์ {field} ต้องมีความยาว {param} ตัวอักษร.',
    'greater_than'          => 'ฟิลด์ {field} ต้องมีหมายเลขมากกว่า {param}.',
    'greater_than_equal_to' => 'ฟิลด์ {field} ต้องมีหมายเลขมากกว่าหรือเท่ากับ {param}.',
    'hex'                   => 'ฟิลด์ {field} อนุญาตให้มีเฉพาะอักษรฐานสิบหก.',
    'in_list'               => 'ฟิลด์ {field} ต้องเป็นหนึ่งใน: {param}.',
    'integer'               => 'ฟิลด์ {field} ต้องมีหมายเลขจำนวนเต็ม.',
    'is_natural'            => 'ฟิลด์ {field} ต้องมีเฉพาะตัวเลข.',
    'is_natural_no_zero'    => 'ฟิลด์ {field} ต้องมีเฉพาะตัวเลขและต้องมากกว่าเลขศูนย์.',
    'is_not_unique'         => 'ฟิลด์ {field} ต้องมีค่าที่มีอยู่ในฐานข้อมูลแล้ว.',
    'is_unique'             => 'ฟิลด์ {field} ต้องมีค่าเฉพาะ.',
    'less_than'             => 'ฟิลด์ {field} ต้องมีหมายเลขน้อยกว่า {param}.',
    'less_than_equal_to'    => 'ฟิลด์ {field} ต้องมีหมายเลขน้อยกว่าหรือเท่ากับ {param}.',
    'matches'               => 'ฟิลด์ {field} ไม่ตรงกับฟิลด์ {param}.',
    'max_length'            => 'ฟิลด์ {field} ไม่สามารถยาวเกิน {param} ตัวอักษร.',
    'min_length'            => 'ฟิลด์ {field} ต้องยาวอย่างน้อย {param} ตัวอักษร.',
    'not_equals'            => 'ฟิลด์ {field} ไม่สามารถเป็น: {param}.',
    'not_in_list'           => 'ฟิลด์ {field} ต้องไม่เป็นหนึ่งใน: {param}.',
    'numeric'               => 'ฟิลด์ {field} ต้องมีเฉพาะตัวเลข.',
    'regex_match'           => 'ฟิลด์ {field} ไม่อยู่ในรูปแบบที่ถูกต้อง.',
    'required'              => 'ฟิลด์ {field} เป็นสิ่งที่จำเป็น.',
    'required_with'         => 'ฟิลด์ {field} เป็นสิ่งที่จำเป็นเมื่อ {param} ปรากฏ.',
    'required_without'      => 'ฟิลด์ {field} เป็นสิ่งที่จำเป็นเมื่อ {param} ไม่ปรากฏ.',
    'string'                => 'ฟิลด์ {field} ต้องเป็นสตริงที่ถูกต้อง.',
    'timezone'              => 'ฟิลด์ {field} ต้องเป็นเขตเวลา (timezone) ที่ถูกต้อง.',
    'valid_base64'          => 'ฟิลด์ {field} ต้องเป็นสตริง base64 ที่ถูกต้อง.',
    'valid_email'           => 'ฟิลด์ {field} ต้องมีที่อยู่อีเมลที่ถูกต้อง.',
    'valid_emails'          => 'ฟิลด์ {field} ต้องมีที่อยู่อีเมลที่ถูกต้องทั้งหมด.',
    'valid_ip'              => 'ฟิลด์ {field} ต้องมี IP ที่ถูกต้อง.',
    'valid_url'             => 'ฟิลด์ {field} ต้องมี URL ที่ถูกต้อง.',
    'valid_url_strict'      => 'ฟิลด์ {field} ต้องมี URL ที่ถูกต้อง.',
    'valid_date'            => 'ฟิลด์ {field} ต้องมีวันที่ที่ถูกต้อง.',
    'valid_json'            => 'ฟิลด์ {field} ต้องมี JSON ที่ถูกต้อง.',
    
    // Credit Cards
    'valid_cc_num' => 'ฟิลด์ {field} ดูเหมือนไม่ใช่หมายเลขบัตรเครดิตที่ถูกต้อง.',
    
    // Files
    'uploaded' => 'ฟิลด์ {field} ไม่ใช่ไฟล์ที่อัปโหลดที่ถูกต้อง.',
    'max_size' => 'ฟิลด์ {field} เป็นไฟล์ที่ใหญ่เกินไป.',
    'is_image' => 'ฟิลด์ {field} ไม่ใช่ไฟล์ภาพที่อัปโหลดที่ถูกต้อง.',
    'mime_in'  => 'ฟิลด์ {field} ไม่มีประเภท mime ที่ถูกต้อง.',
    'ext_in'   => 'ฟิลด์ {field} ไม่มีนามสกุลไฟล์ที่ถูกต้อง.',
    'max_dims' => 'ฟิลด์ {field} ไม่ใช่ภาพหรือมีความกว้างหรือความสูงเกินไป.',
];
