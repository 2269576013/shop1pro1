<?php

/**
 * ECSHOP 管理中心模版管理程序
 * ============================================================================
 * 版权所有 2005-2009 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: mail_template.php 16881 2009-12-14 09:19:16Z liubo $
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

admin_priv('mail_template');

/*------------------------------------------------------ */
//-- 模版列表
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'list')
{
    /* 包含插件语言项 */
    $sql = "SELECT code FROM ".$ecs->table('plugins');
    $rs = $db->query($sql);
    while ($row = $db->FetchRow($rs))
    {
        /* 取得语言项 */
        if (file_exists('../plugins/'.$row['code'].'/languages/common_'.$_CFG['lang'].'.php'))
        {
            include_once(ROOT_PATH.'plugins/'.$row['code'].'/languages/common_'.$_CFG['lang'].'.php');
        }

    }

    /* 获得所有邮件模板 */
    $sql = "SELECT template_id, template_code FROM " .$ecs->table('mail_templates') . " WHERE  type = 'template'";
    $res = $db->query($sql);
    $cur = null;

    while ($row = $db->FetchRow($res))
    {
        if ($cur == null)
        {
            $cur = $row['template_id'];
        }

        $len = strlen($_LANG[$row['template_code']]);
        $templates[$row['template_id']] = $len < 18 ?
            $_LANG[$row['template_code']].str_repeat('&nbsp;', (18-$len)/2) ." [$row[template_code]]" :
            $_LANG[$row['template_code']] . " [$row[template_code]]";
    }

    assign_query_info();

    $smarty->assign('ur_here',      $_LANG['mail_template_manage']);
    $smarty->assign('templates',    $templates);
    $smarty->assign('template',     load_template($cur));
    $smarty->display('mail_template.htm');
}

/*------------------------------------------------------ */
//-- 载入指定模版
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'loat_template')
{
    $tpl = intval($_GET['tpl']);

    make_json_result(load_template($tpl));
}

/*------------------------------------------------------ */
//-- 保存模板内容
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'save_template')
{
    $_POST['subject'] = json_str_iconv($_POST['subject']);
    $_POST['content'] = json_str_iconv($_POST['content']);
    if (empty($_POST['subject']))
    {
        make_json_error($_LANG['subject_empty']);
    }
    else
    {
        $subject = trim($_POST['subject']);
    }

    if (empty($_POST['content']))
    {
        make_json_result($_LANG['content_empty']);
    }
    else
    {
        $content = trim($_POST['content']);
    }

    $type   = intval($_POST['is_html']);
    $tpl_id = intval($_POST['tpl']);
    if ($type)
    {
        $content = str_replace(array("\r\n", "\n"), array('<br />', '<br />'), $content);
    }
    else
    {
        $content = str_replace('<br />', '\n', $content);
    }
    $sql = "UPDATE " .$ecs->table('mail_templates'). " SET ".
                "template_subject = '" .str_replace('\\\'\\\'', '\\\'', $subject). "', ".
                "template_content = '" .str_replace('\\\'\\\'', '\\\'', $content). "', ".
                "is_html = '$type', ".
                "last_modify = '" .gmtime(). "' ".
            "WHERE template_id='$tpl_id'";

    if ($db->query($sql, "SILENT"))
    {
        make_json_result('',  $_LANG['update_success']);
    }
    else
    {
        make_json_error($_LANG['update_failed'] ."\n". $GLOBALS['db']->error());
    }
}

/**
 * 加载指定的模板内容
 *
 * @access  public
 * @param   string  $temp   邮件模板的ID
 * @return  array
 */
function load_template($temp_id)
{
    $sql = "SELECT template_subject, template_content, is_html ".
            "FROM " .$GLOBALS['ecs']->table('mail_templates'). " WHERE template_id='$temp_id'";
    $row = $GLOBALS['db']->GetRow($sql);

    return $row;
}

?>