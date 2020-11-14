<?php

/**
 * ECSHOP 管理中心配送方式管理語言文件
 * ============================================================================
 * 版權所有 2005-2009 上海商派網絡科技有限公司，並保留所有權利。
 * 網站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 這不是一個自由軟件！您只能在不用於商業目的的前提下對程序代碼進行修改和
 * 使用；不允許對程序代碼以任何形式任何目的的再發佈。
 * ============================================================================
 * $Author: liubo $
 * $Id: shipping.php 16881 2009-12-14 09:19:16Z liubo $
*/

$_LANG['shipping_name'] = '配送方式名稱';
$_LANG['shipping_version'] = '插件版本';
$_LANG['shipping_desc'] = '配送方式描述';
$_LANG['shipping_author'] = '插件作者';
$_LANG['insure'] = '保價費用';
$_LANG['support_cod'] = '貨到付款？';
$_LANG['shipping_area'] = '設置區域';
$_LANG['shipping_print_edit'] = '編輯打印模板';
$_LANG['shipping_print_template'] = '快遞單模板';
$_LANG['shipping_template_info'] = '訂單模板變量說明:<br/>{$shop_name}表示網店名稱<br/>{$province}表示網店所屬省份<br/>{$city}表示網店所屬城市<br/>{$shop_address}表示網店地址<br/>{$service_phone}表示網店聯繫電話<br/>{$order.order_amount}表示訂單金額<br/>{$order.region}表示收件人地區<br/>{$order.tel}表示收件人電話<br/>{$order.mobile}表示收件人手機<br/>{$order.zipcode}表示收件人郵編<br/>{$order.address}表示收件人詳細地址<br/>{$order.consignee}表示收件人名稱<br/>{$order.order_sn}表示訂單號';

/* 表單部分 */
$_LANG['shipping_install'] = '安裝配送方式';
$_LANG['install_succeess'] = '配送方式 %s 安裝成功！';

/* 提示信息 */
$_LANG['no_shipping_name'] = '對不起，配送方式名稱不能為空。';
$_LANG['no_shipping_desc'] = '對不起，配送方式描述內容不能為空。';
$_LANG['repeat_shipping_name'] = '對不起，已經存在一個同名的配送方式。';
$_LANG['uninstall_success'] = '配送方式 %s 已經成功卸載。';
$_LANG['add_shipping_area'] = '為該配送方式新建配送區域';
$_LANG['no_shipping_insure'] = '對不起，保價費用不能為空，不想使用請將其設置為0';
$_LANG['not_support_insure'] = '該配送方式不支持保價,保價費用設置失敗';
$_LANG['invalid_insure'] = '配送保價費用不是一個合法價格';
$_LANG['no_shipping_install'] = '您的配送方式尚未安裝，暫不能編輯模板';
$_LANG['edit_template_success'] = '快遞模板已經成功編輯。';

/* JS 語言 */
$_LANG['js_languages']['lang_removeconfirm'] = '您確定要卸載該配送方式嗎？';
$_LANG['js_languages']['shipping_area'] = '設置區域';

?>